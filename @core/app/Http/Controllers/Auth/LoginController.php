<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Session;

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
    $request->validate([
    'phone' => ['required', 'digits:9']
], [
    'phone.required' => 'رقم الجوال مطلوب',
    'phone.regex' => 'رقم الجوال يجب أن يبدأ بـ 5 ويحتوي على 9 أرقام فقط'
]);

    $rawPhone = preg_replace('/\D/', '', $request->phone);
    if (str_starts_with($rawPhone, '0')) {
        $rawPhone = substr($rawPhone, 1);
    }

    if (!str_starts_with($rawPhone, '5')) {
        if ($request->expectsJson()) {
            return response()->json(['message' => __('Phone number must start with digit 5')], 422);
        }
            return back()->with('error', 'Phone number must start with digit 5')->withInput();
    }

    $user = \App\User::where('username', $rawPhone)->first();

    if (!$user) {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'أنت غير مسجل. الرجاء إنشاء حساب.'], 404);
        }
       return back()->with('error', 'أنت غير مسجل بالرقم '.$request->phone.'، يُرجى إنشاء حساب.');
    }

    $fullPhone = '+966' . $rawPhone;

    try {
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $twilio->verify->v2->services(env('TWILIO_VERIFY_SERVICE_SID'))
            ->verifications->create($fullPhone, "sms");
    } catch (\Exception $e) {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'فشل إرسال الرمز: ' . $e->getMessage()], 500);
        }
        return back()->with('error', 'فشل في إرسال الرمز.')->withInput();
    }

    Session::put('login_phone', $fullPhone);

    if ($request->expectsJson()) {
        return response()->json(['message' => 'تم إرسال الرمز بنجاح', 'phone' => $fullPhone]);
    }

    return back()
    ->with('success', __('Verification code has been sent to') . ' ' . $fullPhone)
    ->with('otp_sent', true);
}



    /**
     * Verify OTP and login user
     */
    public function verifyLoginOtp(Request $request)
{
    $request->validate([
        'phone' => 'required',
        'otp_code' => 'required'
    ]);

    $sid = env('TWILIO_SID');
    $token = env('TWILIO_TOKEN');
    $verifySid = env('TWILIO_VERIFY_SERVICE_SID');

    try {
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
            $user = \App\User::where('username', substr($request->phone, 4))->first();

            if ($user) {
                Auth::login($user);
                Session::forget('login_phone');

                if ($request->expectsJson()) {
                    // إنشاء توكن باستخدام Laravel Sanctum أو Passport
                    $token = $user->createToken('MobileApp')->plainTextToken;

                    return response()->json([
                        'message' => 'تم تسجيل الدخول بنجاح',
                        'token' => $token,
                        'user_id' => $user->id,
                        'name' => $user->name,
                        // أضف بيانات إضافية إذا احتجت
                    ]);
                }
                       
                        return redirect()->route('homepage')->with('success', 'تم تسجيل الدخول بنجاح!');

                        //return redirect()->route('user.home.edit.profile')->with('success', 'تم تسجيل الدخول بنجاح!');
                        
            } else {
                if ($request->expectsJson()) {
                    return response()->json(['message' => 'لا يوجد حساب بهذا الرقم'], 404);
                }

                return back()->with('error', 'لا يوجد حساب مرتبط بهذا الرقم.')->with('otp_sent', true);
            }
        } else {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'رمز غير صحيح'], 422);
            }

                return back()->with('error', 'رمز التحقق غير صالح.')->with('otp_sent', true);
        }
    } catch (\Exception $e) {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'فشل في التحقق: ' . $e->getMessage()], 500);
        }

        return back()->with('error', 'فشل في التحقق.')->with('otp_sent', true);
    }
}

}