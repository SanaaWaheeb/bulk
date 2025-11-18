<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Country;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;




class RegisterController extends Controller
{

    use RegistersUsers;

    public function redirectTo(){
        return route('homepage');
    }
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
    }

    protected function validator(array $data)
    {
        // if Google reCAPTCHA validation is needed
        $enableGoogleCaptcha = !empty(get_static_option('site_google_captcha_enable'));
        // validation rules
        $rules = [
            'name' => ['required', 'string', 'max:191'],
            'username' => ['required', 'regex:/^0?5\d{8}$/', 'unique:users,username'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'city' => ['required'],
            'district'=> ['required'],
            'agree_terms' => ['required'],
        ];
        // Add Google reCAPTCHA validation
        if ($enableGoogleCaptcha) {
            $rules['g-recaptcha-response'] = 'required';
        }
        // custom error messages
        $messages = [
        'g-recaptcha-response.required' => __('التحقق من Google reCAPTCHA مطلوب'),
        'name.required' => __('الاسم مطلوب'),
        'name.max' => __('يجب ألا يزيد الاسم عن 191 حرفًا'),
        'username.required' => __('رقم الجوال مطلوب'),
        'city.required' => __('المدينة مطلوب'),
        'district.required' => __('الحي مطلوب'),
        'username.unique' => __('رقم الجوال مستخدم من قبل'),
        'username.regex' => __('رقم الجوال يجب أن يكون رقمًا سعوديًا صالحًا (مثال: 5XXXXXXXX)'),
        // 'email.unique' => __('البريد الإلكتروني مستخدم من قبل'),
        // 'email.required' => __('البريد الإلكتروني مطلوب'),
        'password.required' => __('كلمة المرور مطلوبة'),
        'password.confirmed' => __('كلمتا المرور غير متطابقتين'),
        'agree_terms.required' => __('يجب الموافقة على الشروط والأحكام وسياسات الخصوصية'),

        ];
        // Create the Validator instance
        $validator = Validator::make($data, $rules, $messages);

        // Validate the captcha_token conditionally
        if (!$enableGoogleCaptcha) {
            $validator->sometimes('captcha_token', function ($attribute, $value) {
                return !google_captcha_check($value);
            }, function ($validator) {
                $validator->errors()->add('captcha_token', __('Google reCAPTCHA verification failed'));
            });
        }

        // Return the Validator instance
        return $validator;
    }
    protected function adminValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:admins'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            // 'email' => $data['email'],
            'country_id' => $data['country_id'],
            'city' => $data['city'],
            'district'=> $data['district'],
            'username' => $data['username'],
            'phone' => $data['username'],
            'password' => Hash::make('Adjkmx@saz.a21!sa'),
        ]);

        return $user;
    }
    protected function createAdmin(Request $request)
    {
        $this->adminValidator($request->all())->validate();
         Admin::create([
            'name' => $request['name'],
            'username' => $request['username'],
            // 'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);


        return redirect()->route('admin.home');
    }

    public function showAdminRegistrationForm()
    {
        return view('auth.admin.register');
    }

    public function showRegistrationForm()
    {
        $all_countries = Country::select('id','name')->get();
        return view('frontend.user.register',compact('all_countries'));
    }

public function sendRegisterOtp(Request $request)
{
    $validator = $this->validator($request->all());

    if ($validator->fails()) {
        if ($request->expectsJson()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'خطأ في التحقق من البيانات'
            ], 422);
        }
        return back()->withErrors($validator)->withInput();
    }

    $rawPhone = preg_replace('/\D/', '', $request->username);
    if (str_starts_with($rawPhone, '0')) {
        $rawPhone = substr($rawPhone, 1);
    }
    if (!str_starts_with($rawPhone, '5')) {
        $msg = 'يجب أن يبدأ رقم الجوال بالرقم 5';
        if ($request->expectsJson()) {
            return response()->json(['message' => $msg], 422);
        }
        return back()->with('error', $msg)->withInput();
    }

    $fullPhone = '+966' . $rawPhone;

    $userData = [
        'name' => $request->name,
        // 'email' => $request->email,
        'username' => $rawPhone,
        'country_id' => $request->country_id,
        'city' => $request->city,
        'district'=> $request->district,

        'password' => 'Adjkmx@saz.a21!sa',
        'password_confirmation' => 'Adjkmx@saz.a21!sa',
        'phone' => $fullPhone,
        'agree_terms' => $request->agree_terms,
    ];

    // ✅ إذا كان API request (من الجوال مثلاً)، خزنه في Cache
    if ($request->expectsJson()) {
        $token = Str::uuid()->toString();
        Cache::put("register_data_{$token}", $userData, now()->addMinutes(10));
    } else {
        // ✅ وإلا خزنه في Session (لأن الويب يعتمد على جلسة)
        Session::put('register_user_data', $userData);
        Session::put('register_phone', $fullPhone);
    }

    try {
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $twilio->verify->v2->services(env('TWILIO_VERIFY_SERVICE_SID'))
            ->verifications->create($fullPhone, "sms");
    } catch (\Exception $e) {
        return response()->json(['message' => 'فشل إرسال الرمز: ' . $e->getMessage()], 500);
    }

    if ($request->expectsJson()) {
        return response()->json([
            'message' => 'تم إرسال رمز التحقق بنجاح',
            'token' => $token ?? null
        ]);
    }

    return back()->with('success', 'OTP sent')->with('otp_register_sent', true);
}



public function verifyRegisterOtp(Request $request)
{
    $request->validate(['otp_code' => 'required']);

    if ($request->expectsJson()) {
        $token = $request->header('X-Register-Token');
        if (!$token) {
            return response()->json(['message' => 'Token غير موجود'], 400);
        }

        $userData = Cache::get("register_data_{$token}");
        if (!$userData) {
            return response()->json(['message' => 'انتهت الجلسة. حاول مرة أخرى.'], 419);
        }

        $fullPhone = $userData['phone'];
    } else {
        // من الويب
        $userData = Session::get('register_user_data');
        $fullPhone = Session::get('register_phone');

        if (!$userData || !$fullPhone) {
            $msg = 'انتهت الجلسة. حاول مرة أخرى.';
            return redirect()->route('user.register')->with('error', $msg);
        }
    }

    try {
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $verification = $twilio->verify->v2->services(env('TWILIO_VERIFY_SERVICE_SID'))
            ->verificationChecks->create([
                'to' => $fullPhone,
                'code' => $request->otp_code
            ]);
    } catch (\Exception $e) {
        return response()->json(['message' => 'فشل التحقق من الرمز: ' . $e->getMessage()], 500);
    }

    if ($verification->status === 'approved') {
        $validator = $this->validator($userData);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $this->create($userData);
        Auth::login($user);

        // حذف البيانات
        if ($request->expectsJson()) {
            Cache::forget("register_data_{$token}");
        } else {
            Session::forget(['register_user_data', 'register_phone', 'otp_register_sent']);
        }

        return $request->expectsJson()
            ? response()->json([
                
                'message' => 'تم التسجيل وتسجيل الدخول بنجاح'])
            : redirect()->route('user.home.edit.profile')->with('success', 'تم التسجيل بنجاح!');
    }

    return response()->json(['message' => 'رمز التحقق غير صالح'], 400);
}

}

