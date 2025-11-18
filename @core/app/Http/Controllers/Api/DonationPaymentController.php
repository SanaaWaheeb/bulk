<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use App\Cause;
use App\CauseCategory;
use App\CauseLogs;
use App\CauseUpdate;
use App\Comment;
use App\Events;
use App\EventsCategory;
use App\Helpers\DonationHelpers;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Recuring;
use App\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DonationPaymentController extends Controller
{
    public function pay(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|string|max:191',
            'cause_id' => 'required|string',
            'amount' => 'required|numeric',
            'price' => 'required|numeric',
            'selected_payment_gateway' => 'required|string',
            'address' => 'nullable|string|max:500', // إضافة حقل العنوان
        ], [
            'name.required' => __('Name field is required'),
            'email.required' => __('Email field is required'),
            'amount.required' => __('Amount field is required'),
        ]);

        if ($validate->fails()) {
            return response()->json(['validation_errors' => $validate->messages()], 422);
        }

        $user_id = auth('sanctum')->user()?->id;
        $cause = Cause::find($request->cause_id);
        if (!$cause) {
            return response()->json(['msg' => __('Cause not found'), 'type' => 'error']);
        }

        // منع صاحب الحملة من التبرع لحملته
        // if ($cause->user_id == $user_id) {
        //     return response()->json(['msg' => __('Campaign owner cannot donate to own campaign'), 'type' => 'error']);
        // }

        // تحقق من الحد الأدنى
        $min_donation = get_static_option('minimum_donation_amount');
        if ($request->price < $min_donation) {
            return response()->json(['msg' => __('Minimum Donation Amount is : ') . amount_with_currency_symbol($min_donation), 'type' => 'error']);
        }

        // احسب الرسوم والمكافآت
        $amount = $request->amount;
        $price = $request->price;
        $admin_charge = DonationHelpers::get_donation_charge($price, false) ?? 0;
        $transaction_fee = DonationHelpers::get_transaction_fee($price, false) ?? 0;
        $reward_point = 0;
        $reward_amount = 0;

        $min_goal = Reward::where('status', 'publish')->min('reward_goal_from');
        if ($cause->reward == 'on' && $price >= $min_goal) {
            $reward_point = Reward::where('status', 'publish')
                ->where('reward_goal_from', '<=', $price)
                ->where('reward_goal_to', '>=', $price)
                ->value('reward_point') ?? 0;
            $reward_amount = $reward_point / get_static_option('reward_amount_for_point');
        }

        // إنشاء سجل التبرع
        $log = CauseLogs::create([
            'recuring_token' => null,
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'cause_id' => $request->cause_id,
            'gift_id' => $request->gift_id ?? null,
            'amount' => $amount,
            'price' => $price / $amount,
            'totalPrice' => $price,
            'admin_charge' => $admin_charge,
            'transaction_fee' => $transaction_fee,
            'reward_point' => $reward_point,
            'reward_amount' => $reward_amount,
            'anonymous' => $request->anonymous ?? 0,
            'payment_gateway' => $request->selected_payment_gateway,
            'user_id' => $user_id,
            'status' => 'pending',
            'track' => Str::random(20),
            'custom_fields' => null,
            'attachments' => null,
            'address' => $request->address, // حفظ العنوان
        ]);

        // تحديث الحملة بالمبلغ الجديد
        $cause->increment('raised', $amount);

        // إشعار
        Notification::create([
            'cause_log_id' => $log->id,
            'title' => 'New purchase order received',
            'type' => 'cause_log',
        ]);

        // معالجة التحويل البنكي
        if ($request->selected_payment_gateway == 'manual_payment') {
            // جعل الملف المرفق اختياري للدفع اليدوي
            $manual_validate = Validator::make($request->all(), [
                'manual_payment_attachment' => 'nullable|file|max:10240|mimes:jpeg,jpg,png,pdf'
            ]);

            if ($manual_validate->fails()) {
                return response()->json(['validation_errors' => $manual_validate->messages()], 422);
            }

            try {
                // تحقق من وجود الملف قبل الرفع
                if ($request->hasFile('manual_payment_attachment')) {
                    $attachment = $request->file('manual_payment_attachment');
                    $fileName = 'purchase_' . $log->id . '_' . time() . '.' . $attachment->getClientOriginalExtension();
                    $attachment->move('assets/uploads/attachment/', $fileName);
                    $log->update(['manual_payment_attachment' => $fileName, 'status' => 'pending']);
                } else {
                    // لا يوجد ملف - فقط حدث الحالة
                    $log->update(['status' => 'pending']);
                }

                return response()->json([
                    'order_id' => $log->id,
                    'msg' => __('Purchase Order Submitted Successfully'),
                    'type' => 'success',
                    'success_url' => route('frontend.donation.payment.success', ['id' => rand(100000,999999).$log->id.rand(100000,999999)]),
                    'cancel_url' => route('frontend.donation.payment.cancel'),
                ]);
            } catch (\Exception $e) {
                return response()->json(['msg' => __('File upload failed: ') . $e->getMessage(), 'type' => 'error'], 500);
            }
        }

        return response()->json([
            'msg' => __('Purchase Order Success'),
            'type' => 'success',
            'order_id' => $log->id,
            'success_url' => route('frontend.donation.payment.success', ['id' => rand(100000,999999).$log->id.rand(100000,999999)]),
            'cancel_url' => route('frontend.donation.payment.cancel'),
        ]);
    }

    public function payment_status_update($id)
    {
        if(empty($id)) abort(404);

        $order_details = CauseLogs::find($id);

        if(!is_null($order_details)){
            $order_details->status = 'complete';
            $order_details->save();

            $product_details = Cause::find($order_details->cause_id);
            $product_details->raised = (int) $product_details->raised + (int) $order_details->amount;
            $product_details->save();

            return response()->json([
                'msg'=> __('Payment status updated'),
                'type' => 'success'
            ]);
        }

        return response()->json([
            'msg' => __('Payment status update failed'),
            'type'=> 'error'
        ]);
    }

    // دالة إلغاء الطلب
    public function cancelDonation($id)
    {
        try {
            $user_id = auth('sanctum')->user()?->id;
            
            if (!$user_id) {
                return response()->json(['msg' => __('Unauthorized'), 'type' => 'error'], 401);
            }

            $donation = CauseLogs::where('id', $id)
                ->where('user_id', $user_id)
                ->where('status', 'pending')
                ->first();

            if (!$donation) {
                return response()->json([
                    'msg' => __('Donation not found or cannot be cancelled'), 
                    'type' => 'error'
                ], 404);
            }

            // تحديث حالة الطلب إلى cancelled
            $donation->status = 'cancel';
            $donation->save();

            // إنقاص المبلغ من الحملة إذا كان مضافًا مسبقًا
            $cause = Cause::find($donation->cause_id);
            if ($cause) {
                $cause->raised = max(0, (int)$cause->raised - (int)$donation->amount);
                $cause->save();
            }

            // إشعار بالإلغاء
            Notification::create([
                'cause_log_id' => $donation->id,
                'title' => 'Purchase order cancelled by user',
                'type' => 'cause_log_cancelled',
            ]);

            return response()->json([
                'msg' => __('Order cancelled successfully'),
                'type' => 'success'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'msg' => __('An error occurred: ') . $e->getMessage(),
                'type' => 'error'
            ], 500);
        }
    }
}