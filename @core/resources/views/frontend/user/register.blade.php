@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Register')}}
@endsection
@section('content')
    <section class="login-page-wrapper py-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    @if(!empty(get_static_option('site_google_captcha_enable')))
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                    @endif

                    <div class="login-form-wrapper">
                        <h2 class="text-center">{{__('Register New Account')}}</h2><br>
                        @include('backend.partials.message')
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(!session('otp_register_sent'))
                            {{-- Step 1: Registration Info & Send OTP --}}
                            <form action="{{route('register.send.otp')}}" method="post" class="account-form">
                                @csrf
                                <input type="hidden" name="captcha_token" id="gcaptcha_token">

                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="{{__('Name')}}" required>
                                </div>
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
        <input type="text" name="username"  id="phone_input" class="form-control" placeholder="{{__('5XXXXXXXX')}}" required style="height: 38px;"
        maxlength="9">
    </div>
</div>

                                <!--<div class="form-group">-->
                                <!--    <input type="email" name="email" class="form-control" placeholder="{{__('Email')}}" required>-->
                                <!--</div>-->
                                <div class="form-group">
                                    <select id="country" class="form-control" name="country_id" value="196">
                                        <option value="196">السعودية</option>
                                        @foreach($all_countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="city" class="form-control" placeholder="{{__('City')}}">
                               </div>
                               <div class="form-group">
                                    <input type="text" name="district" class="form-control" placeholder="{{__('الحي')}}" required>
                                </div>
                                <!--@if(!empty(get_static_option('site_google_captcha_enable')))-->
                                <!--    <div class="form-group">-->
                                <!--        <div class="g-recaptcha" data-sitekey="{{ get_static_option('recaptcha_2_site_key')}}"></div>-->
                                <!--        @if ($errors->has('g-recaptcha-response'))-->
                                <!--            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--@endif-->

                                <div class="form-group form-check col-12">
                                    <input type="checkbox" class="form-check-input" name="agree_terms" id="Check11" required>
                                    <label class="form-check-label" for="Check11">
                                        {{__('من خلال إنشاء حساب، فإنك توافق على')}}
                                        <a href="{{ route('frontend.dynamic.page',[getSlugByPageId(get_static_option('register_page_terms_of_service_url')), get_static_option('register_page_terms_of_service_url')]) }}">{{__('شروط الخدمة والأحكام')}},</a>
                                        {{__('و')}}
                                        <a href="{{ route('frontend.dynamic.page',[getSlugByPageId(get_static_option('register_page_privacy_policy_url')), get_static_option('register_page_privacy_policy_url')]) }}">{{__('سياسة الخصوصية')}}</a>
                                    </label>
                                </div>

                                <div class="form-group btn-wrapper">
                                    <button type="submit" class="submit-btn boxed-btn reverse-color">{{__('إرسال رمز التحقق')}}</button>
                                </div>
                            </form>
                        @else
                            {{-- Step 2: OTP Verification --}}
                            <form action="{{ route('register.verify.otp') }}" method="POST" class="account-form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="otp_code" class="form-control" placeholder="{{__('Enter OTP Code')}}" required>
                                </div>
                                <div class="form-group btn-wrapper">
                                    <button type="submit" class="submit-btn boxed-btn reverse-color">{{__('Verify & Register')}}</button>
                                </div>
                            </form>
                        @endif

                        <div class="row mb-4 rmber-area">
                            <div class="col-12 text-center">
                                <a href="{{route('user.login')}}">{{__('Already Have account?')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{get_static_option('site_google_captcha_v3_site_key')}}"></script>
<script>
    grecaptcha.ready(function () {
        grecaptcha.execute("{{get_static_option('site_google_captcha_v3_site_key')}}", {action: 'homepage'}).then(function (token) {
            document.getElementById('gcaptcha_token').value = token;
        });
    });

    (function($){
        "use strict";

        $(document).ready(function() {
            
            $('#phone_input').on('input', function() {
                this.value = this.value.replace(/\D/g,'');
                if(this.value.length > 9){
                    this.value = this.value.slice(0,9); 
                }
            });
        });
    })(jQuery);
</script>
@endsection