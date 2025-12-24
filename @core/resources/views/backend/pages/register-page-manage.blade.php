@extends('backend.admin-master')
@section('site-title')
    {{__('Register Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
           <div class="card">
    <div class="card-body">
        <h4 class="header-title"> {{ __('Register Page Settings') }}</h4>
        <form action="{{ route('admin.register.page.settings') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- 🔹 Arabic Terms & Conditions Page --}}
            <div class="form-group">
                <label for="register_page_terms_of_service_url">
                    {{ __('Terms and Condition Page (AR)') }}
                </label>
                <select class="form-control" name="register_page_terms_of_service_url" id="register_page_terms_of_service_url">
                    <option value="">{{ __('Select Terms & Conditions Page (Arabic)') }}</option>
                    @foreach($pages as $page)
                        <option value="{{ $page->id }}"
                            @if (get_static_option('register_page_terms_of_service_url') == $page->id) selected @endif>
                            {{ __($page->title) }}
                        </option>
                    @endforeach
                </select>
                <span class="info-text">{{ __('You can create new pages if you do not have.') }}</span>
            </div>

            {{-- 🔹 English Terms & Conditions Page --}}
            <div class="form-group">
                <label for="register_page_terms_of_service_url_en">
                    {{ __('Terms and Condition Page (EN)') }}
                </label>
                <select class="form-control" name="register_page_terms_of_service_url_en" id="register_page_terms_of_service_url_en">
                    <option value="">{{ __('Select Terms & Conditions Page (English)') }}</option>
                    @foreach($pages as $page)
                        <option value="{{ $page->id }}"
                            @if (get_static_option('register_page_terms_of_service_url_en') == $page->id) selected @endif>
                            {{ __($page->title) }}
                        </option>
                    @endforeach
                </select>
                <span class="info-text">{{ __('You can create new pages if you do not have.') }}</span>
            </div>

            {{-- 🔹 Arabic Privacy Policy Page --}}
            <div class="form-group">
                <label for="register_page_privacy_policy_url">
                    {{ __('Privacy Policy Page (AR)') }}
                </label>
                <select class="form-control" name="register_page_privacy_policy_url" id="register_page_privacy_policy_url">
                    <option value="">{{ __('Select Privacy Policy Page (Arabic)') }}</option>
                    @foreach($pages as $page)
                        <option value="{{ $page->id }}"
                            @if (get_static_option('register_page_privacy_policy_url') == $page->id) selected @endif>
                            {{ __($page->title) }}
                        </option>
                    @endforeach
                </select>
                <span class="info-text">{{ __('You can create new pages if you do not have.') }}</span>
            </div>

            {{-- 🔹 English Privacy Policy Page --}}
            <div class="form-group">
                <label for="register_page_privacy_policy_url_en">
                    {{ __('Privacy Policy Page (EN)') }}
                </label>
                <select class="form-control" name="register_page_privacy_policy_url_en" id="register_page_privacy_policy_url_en">
                    <option value="">{{ __('Select Privacy Policy Page (English)') }}</option>
                    @foreach($pages as $page)
                        <option value="{{ $page->id }}"
                            @if (get_static_option('register_page_privacy_policy_url_en') == $page->id) selected @endif>
                            {{ __($page->title) }}
                        </option>
                    @endforeach
                </select>
                <span class="info-text">{{ __('You can create new pages if you do not have.') }}</span>
            </div>

            {{-- 🔹 Recaptcha --}}
            <div class="form-group">
                <label for="recaptcha_2_site_key">{{ __('Google Recaptcha 2 (Site Key)') }}</label>
                <input type="text"
                       name="recaptcha_2_site_key"
                       class="form-control"
                       value="{{ get_static_option('recaptcha_2_site_key') }}"
                       id="recaptcha_2_site_key">
            </div>

            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">
                {{ __('Update Changes') }}
            </button>
        </form>
    </div>
</div>

            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        (function($){
            "use strict";
            $(document).ready(function(){
                <x-btn.update/>
            });
        }(jQuery));
    </script>
@endsection
