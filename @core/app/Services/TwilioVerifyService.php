<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioVerifyService
{
    protected $twilio;
    protected $verifySid;

    public function __construct()
    {
        $this->twilio = new Client(
            config('services.twilio.sid'),
            config('services.twilio.token')
        );

        $this->verifySid = config('services.twilio.verify_sid');
    }

    public function sendVerification($phoneNumber)
    {
        return $this->twilio->verify->v2->services($this->verifySid)
            ->verifications
            ->create($phoneNumber, 'sms');
    }

    public function checkVerification($phoneNumber, $code)
    {
        return $this->twilio->verify->v2->services($this->verifySid)
            ->verificationChecks
            ->create([
                'to' => $phoneNumber,
                'code' => $code,
            ]);
    }
}
