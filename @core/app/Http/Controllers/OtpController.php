<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OtpController extends Controller
{
    public function showForm()
    {
        return view('otp-test');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $verifySid = env('TWILIO_VERIFY_SERVICE_SID');

        $twilio = new Client($sid, $token);

        $twilio->verify
            ->v2
            ->services($verifySid)
            ->verifications
            ->create($request->phone, "sms");

        return back()->with('success', __('OTP sent to :phone', ['phone' => $request->phone]));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'otp_code' => 'required'
        ]);

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $verifySid = env('TWILIO_VERIFY_SERVICE_SID');

        $twilio = new Client($sid, $token);

        $verification_check = $twilio->verify
            ->v2
            ->services($verifySid)
            ->verificationChecks
            ->create([
                "to" => $request->phone,
                "code" => $request->otp_code
            ]);

       if ($verification_check->status === "approved") {
    return back()->with('success', __('OTP Verified Successfully!'));
} else {
    return back()->with('error', __('Invalid OTP.'));
}
    }
}
