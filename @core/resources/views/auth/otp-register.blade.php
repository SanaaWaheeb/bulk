{{-- resources/views/auth/otp-register.blade.php --}}

@extends('frontend.frontend-page-master')
@section('page-title', 'OTP Verification')
@section('content')
<section class="login-page-wrapper py-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center">Verify OTP</h2><br>
                @include('backend.partials.message')

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('user.register.otp.verify') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Enter the OTP sent to {{ $phone }}</label>
                        <input type="text" name="otp_code" class="form-control" placeholder="Enter OTP" required>
                    </div>
                    <div class="form-group btn-wrapper">
                        <button type="submit" class="submit-btn boxed-btn reverse-color">Verify & Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
