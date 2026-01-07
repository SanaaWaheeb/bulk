<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\SetLocale;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/';
     public function redirectTo()
    {
        // return 'https://bulk.com.sa/';
        //return route('user.home');
        return route ('homepage');

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Override username functions
     * @since 1.0.0
     * */
    public function username()
    {
        return 'username';
    }

    /**
     * show admin login page
     * @since 1.0.0
     * */
    public function showAdminLoginForm()
    {
        return view('auth.admin.login');
    }

    /**
     * admin login system
     * */
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|min:6'
        ], [
            'username.required' => __('username required'),
            'password.required' => __('password required')
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {

            return response()->json([
                'msg' => __('Login Success Redirecting'),
                'type' => 'success',
                'status' => 'ok'
            ]);
        }
        return response()->json([
            'msg' => __('Your Username or Password Is Wrong !!'),
            'type' => 'danger',
            'status' => 'not_ok',
        ]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('frontend.user.login');
    }

    /**
     * Send OTP to phone number
     */
public function sendLoginOtp(Request $request)
{
    // ✅ Validation with translated messages
    $request->validate([
        'phone' => ['required', 'digits:9'],
    ], [
        'phone.required' => __('validation.phone_required'),
        'phone.digits'   => __('validation.phone_digits'),
    ]);

    // Normalize phone (remove non-digits)
    $rawPhone = preg_replace('/\D/', '', $request->phone);

    // Remove leading 0 if exists
    if (str_starts_with($rawPhone, '0')) {
        $rawPhone = substr($rawPhone, 1);
    }

    // ✅ Phone must start with 5
    if (!str_starts_with($rawPhone, '5')) {
        $msg = __('validation.phone_must_start_5');

        if ($request->expectsJson()) {
            return response()->json(['message' => $msg], 422);
        }

        return back()->with('error', $msg)->withInput();
    }

    // Find user by username = phone
    $user = \App\User::where('username', $rawPhone)->first();

    if (!$user) {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => __('validation.not_registered')
            ], 404);
        }

        return back()->with(
            'error',
            __('validation.not_registered_phone', ['phone' => $request->phone])
        );
    }

    $fullPhone = '+966' . $rawPhone;

    try {
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $twilio->verify->v2->services(env('TWILIO_VERIFY_SERVICE_SID'))
            ->verifications->create($fullPhone, 'sms');
    } catch (\Exception $e) {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => __('validation.send_code_failed_error', [
                    'error' => $e->getMessage(),
                ])
            ], 500);
        }

        return back()
            ->with('error', __('validation.send_code_failed'))
            ->withInput();
    }

    Session::put('login_phone', $fullPhone);

    if ($request->expectsJson()) {
        return response()->json([
            'message' => __('validation.code_sent_success'),
            'phone'   => $fullPhone,
        ]);
    }

    return back()
        ->with('success', __('validation.code_sent_to', ['phone' => $fullPhone]))
        ->with('otp_sent', true);
}



    /**
     * Verify OTP and login user
     */


public function verifyLoginOtp(Request $request)
{
    $request->validate([
        'phone'    => 'required',
        'otp_code' => 'required',
    ]);

    // 👈 تحديد لغة المستخدم الحالية
    $locale = function_exists('get_user_lang')
        ? get_user_lang()
        : app()->getLocale();

    // 👈 تعريف الرسائل باللغتين
    $messages = [
        'login_success' => $locale === 'en'
            ? 'Logged in successfully.'
            : 'تم تسجيل الدخول بنجاح!',

        'no_account' => $locale === 'en'
            ? 'No account found for this phone number.'
            : 'لا يوجد حساب مرتبط بهذا الرقم.',

        'invalid_otp' => $locale === 'en'
            ? 'Invalid verification code.'
            : 'رمز التحقق غير صالح.',

        'verify_failed' => $locale === 'en'
            ? 'Verification failed.'
            : 'فشل في التحقق.',
    ];

    $sid       = env('TWILIO_SID');
    $token     = env('TWILIO_TOKEN');
    $verifySid = env('TWILIO_VERIFY_SERVICE_SID');

    try {
        $twilio = new Client($sid, $token);

        $verification_check = $twilio->verify
            ->v2
            ->services($verifySid)
            ->verificationChecks
            ->create([
                'to'   => $request->phone,
                'code' => $request->otp_code,
            ]);

        if ($verification_check->status === 'approved') {

            // 👈 تأكد إن منطق القص ده يناسب فورمات رقم تليفونك
            $user = \App\User::where('username', substr($request->phone, 4))->first();

            if ($user) {
                Auth::login($user);
                Session::forget('login_phone');

                if ($request->expectsJson()) {
                    $token = $user->createToken('MobileApp')->plainTextToken;

                    return response()->json([
                        'message' => $messages['login_success'],
                        'token'   => $token,
                        'user_id' => $user->id,
                        'name'    => $user->name,
                    ]);
                }

                return redirect()
                    ->route('homepage')
                    ->with('success', $messages['login_success']);
            }

            // لا يوجد حساب
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => $messages['no_account'],
                ], 404);
            }

            return back()
                ->with('error', $messages['no_account'])
                ->with('otp_sent', true);
        }

        // كود غير صحيح
        if ($request->expectsJson()) {
            return response()->json([
                'message' => $messages['invalid_otp'],
            ], 422);
        }

        return back()
            ->with('error', $messages['invalid_otp'])
            ->with('otp_sent', true);

    } catch (\Exception $e) {

        if ($request->expectsJson()) {
            return response()->json([
                'message' => $messages['verify_failed'] . ' ' . $e->getMessage(),
            ], 500);
        }

        return back()
            ->with('error', $messages['verify_failed'])
            ->with('otp_sent', true);
    }
}


}