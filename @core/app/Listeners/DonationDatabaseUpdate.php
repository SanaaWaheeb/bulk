<?php

namespace App\Listeners;

use App\Cause;
use App\CauseLogs;
use App\Events\DonationSuccess;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class DonationDatabaseUpdate
{
    public function __construct()
    {
        //
    }

    public function handle(DonationSuccess $event)
    {
        if (empty($event->data) || !isset($event->data['donation_log_id'])) {
            Log::error('DonationDatabaseUpdate: Missing event data or donation_log_id');
            return;
        }

        $payment_log_details = CauseLogs::findOrFail($event->data['donation_log_id']);
        $new_status = $event->data['payment_status'] ?? 'complete';
        $transaction_id = $event->data['transaction_id'] ?? null;
        
        // Get the current status before updating
        $current_status = $payment_log_details->status;

        Log::info('DonationDatabaseUpdate: Processing', [
            'donation_log_id' => $payment_log_details->id,
            'current_status' => $current_status,
            'new_status' => $new_status,
            'payment_gateway' => $payment_log_details->payment_gateway,
            'amount' => $payment_log_details->amount
        ]);

        // Skip processing if status hasn't changed
        if ($current_status === $new_status) {
            Log::info('DonationDatabaseUpdate: Status unchanged, skipping');
            return;
        }

        // Manual amount adjustment logic
        $this->updateDonationAmount($payment_log_details, $current_status, $new_status);

        // Update donation log status/transaction id
        if ($payment_log_details->payment_gateway === 'manual_payment') {
            $payment_log_details->status = 'pending';
        } else {
            $payment_log_details->status = $new_status;
        }
        $payment_log_details->transaction_id = $transaction_id;
        $payment_log_details->save();

        Log::info('DonationDatabaseUpdate: Updated payment log', [
            'new_status' => $payment_log_details->status,
            'transaction_id' => $transaction_id
        ]);
    }

    private function updateDonationAmount($payment_log_details, $current_status, $new_status)
    {
        // Skip manual payments
        if ($payment_log_details->payment_gateway === 'manual_payment') {
            return;
        }

        $amount = (int) $payment_log_details->amount;
        
        $cause = Cause::find($payment_log_details->cause_id);
        if (!$cause) {
            Log::error('Cause not found for donation', ['cause_id' => $payment_log_details->cause_id]);
            return;
        }

        $amount_change = 0;

        // State transition logic - your exact requirements:
        if ($current_status === 'pending' && $new_status === 'complete') {
            // pend -> complete: no change
            $amount_change = 0;
        } elseif ($current_status === 'cancelled' && $new_status === 'complete') {
            // cancel -> complete: increase
            $amount_change = $amount;
        } elseif ($current_status === 'complete' && $new_status === 'pending') {
            // complete -> pend: no change
            $amount_change = 0;
        } elseif ($current_status === 'complete' && $new_status === 'cancelled') {
            // complete -> cancel: decrease
            $amount_change = -$amount;
        } elseif ($current_status === 'pending' && $new_status === 'cancelled') {
            // pend -> cancel: decrease
            $amount_change = -$amount;
        }

        // Apply the amount change directly
        if ($amount_change !== 0) {
            $old_raised = (int) $cause->raised;
            $new_raised = max(0, $old_raised + $amount_change);
            $cause->raised = $new_raised;
            $cause->save();

            Log::info('Manual donation amount update', [
                'donation_id' => $payment_log_details->id,
                'cause_id' => $cause->id,
                'status_change' => $current_status . ' -> ' . $new_status,
                'amount_change' => $amount_change,
                'old_raised' => $old_raised,
                'new_raised' => $new_raised
            ]);
        }
    }
}