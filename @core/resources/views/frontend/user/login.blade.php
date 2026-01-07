@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Login')}}
@endsection
@section('content')
<section class="login-page-wrapper">
    <div class="container">
        <div class="row justify-content-center py-5 my-5">
            <div class="col-lg-6">
                <div class="login-form-wrapper">
                    <h2>{{ $title ?? __('Login To Your Account') }}</h2><br>
                    <x-msg.error/>
                    <x-msg.success/>
                    
                    @if(!session('otp_sent'))
                        {{-- Step 1: Send OTP Form --}}
                        <form action="{{ route('login.send.otp') }}" method="POST" class="account-form" id="login_form_order_page">
                            @csrf
                            <div class="error-wrap"></div>
                            <div class="form-group">
<div class="input-group" style="direction: ltr;">
    <div class="input-group-prepend">
        <span class="input-group-text p-0 d-flex align-items-center justify-content-center"
              style="background-color: #eee;
                     width: 50px;
                     font-size: 14px;
                     font-weight: normal;
                     height: 38px;
                     border: 1px solid #ced4da;">
            +966
        </span>
    </div>
    <input type="tel" name="phone" id="phone_input" class="form-control" placeholder="{{__('5XXXXXXXX')}}" required style="height: 38px"; 
    maxlength="9">
</div>

                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" id="login_btn" class="submit-btn boxed-btn reverse-color ">{{__('Send verification code')}}</button>
                            </div>
                        </form>
                    @else
                        {{-- Step 2: Verify OTP Form --}}
                        <form action="{{ route('login.verify.otp') }}" method="POST" class="account-form" id="verify_otp_form">
                            @csrf
                            <div class="error-wrap"></div>
                            <div class="form-group">
                                <label>{{ __('Mobile Number') }}</label>
<input type="text" name="phone" class="form-control" 
       value="{{ session('login_phone') ?? old('phone') }}"
       style="background-color: #f5f5f5; color: #666; text-align: left;"
       dir="ltr" readonly required>

                            <div class="form-group">
                                <label>{{__('Enter verification code')}}</label>
                                <input type="text" name="otp_code" class="form-control" 
                                       placeholder="{{__('Enter verification code')}}" required>
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" id="verify_btn" class="submit-btn boxed-btn reverse-color ">{{__('Verify Code')}}</button>
                            </div>
                        </form>
                        
                        {{-- Option to resend OTP --}}
                        <div class="text-center mt-3">
                            <form action="{{ route('login.send.otp') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="phone" value="{{ substr(session('login_phone'), 4) }}">
                                <button type="submit" class="btn btn-link">{{__('Resend Verification Code')}}</button>
                            </form>
                        </div>
                    @endif

                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                <label class="custom-control-label" for="remember">{{__('Remind me')}}</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a class="d-block" href="{{ route('user.register') }}" style="color:#000; text-decoration: none;
                            transition: color 0.3s ease;"; onmouseover="this.style.color='#007bff'" 
                            onmouseout="this.style.color='#000'">{{__('Create New Account?')}}</a>

                        </div>
                        <div class="col-lg-12">
                            <div class="social-login-wrap">
                                @if(get_static_option('enable_facebook_login'))
                                    <a href="{{ route('login.facebook.redirect') }}" class="facebook">
                                        <i class="fab fa-facebook-f"></i> {{__('Login With Facebook')}}
                                    </a>
                                @endif
                                @if(get_static_option('enable_google_login'))
                                    <a href="{{ route('login.google.redirect') }}" class="google">
                                        <i class="fab fa-google"></i> {{__('Login With Google')}}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
(function($){
    "use strict";
    
    $(document).ready(function() {
    
       $('#phone_input').on('input', function() {
    this.value = this.value.replace(/\D/g,''); 
});

        $(document).on('submit', '#login_form_order_page', function () {
            $('#login_btn').text('{{ __("Please Wait") }}');
        });
        
        $(document).on('submit', '#verify_otp_form', function () {
            $('#verify_btn').text('{{ __("Verifying...") }}');
        });
    });
})(jQuery);
</script>
@endsection
