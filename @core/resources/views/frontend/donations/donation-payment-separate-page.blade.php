@extends('frontend.frontend-page-master')

@section('og-meta')
    <meta property="og:url" content="{{route('frontend.donations.single',$donation->slug)}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$donation->title}}"/>
    {!! render_og_meta_image_by_attachment_id($donation->image) !!}
@endsection

@section('site-title')
    {{$donation->title}}
@endsection

@section('page-title')
    {{$donation->title_ar}}
@endsection

@section('page-meta-data')
    <meta name="description" content="{{$donation->meta_tags}}">
    <meta name="tags" content="{{$donation->meta_description}}">
@endsection

@section('style')
    <x-media.css/>
    <style>
        #termsAndConditions, #privacyPolicy {
            margin-top: 20px;
            border-radius: 5px;
        }

        #termsAndConditions label, #privacyPolicy label {
            display: block;
            margin-bottom: 20px;
        }

        #termsAndConditions input[type="checkbox"], #privacyPolicy input[type="checkbox"] {
            height: auto;
            margin-right: 5px;
        }

        #termsAndConditions a, #privacyPolicy a {
            color: var(--main-color-one);
            cursor: pointer;
        }

        .donation_wrapper a {
            all: unset;
            display: unset;
            color: unset;
            font-size: unset;
            font-weight: unset;
            text-decoration: unset;
            border-radius: unset;
            background: unset;
        }

        .donation_wrapper a:hover {
            background: unset;
        }
        
        .goback-btn {
    color: #333 !important;
    background-color: transparent !important;
    border: 1px solid #333; /* add border to keep visible shape */
    padding: 6px 12px;
    display: inline-block;
    transition: color 0.3s ease, background-color 0.3s ease;
}

.goback-btn:hover {
    color: #fff !important;
    background-color: #000 !important; /* black hover bg */
    border-color: #000 !important;
    text-decoration: none;
}


    </style>
@endsection

@section('content')
@php
    $selected_quantity = request()->get('number') ?? 1;
@endphp
@php
    $max_available = max(1, $donation->amount - $donation->raised);
@endphp

<section class="blog-content-area padding-top-120 padding-bottom-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="donation_wrapper">
                    <div class="btn-wrapper">
                        <a href="{{route('frontend.donations.single',$donation->slug)}}" class="goback-btn pull-right">{{__('Go Back')}}</a>
                    </div>

                    <x-msg.error/>
                    <x-msg.success/>

                    <form action="{{route('frontend.donations.log.store')}}" method="post" enctype="multipart/form-data" class="donation-form-wrapper">
                        @csrf
                        <input type="hidden" name="cause_id" value="{{$donation->id}}">
                        <input type="hidden" name="price" value="{{$donation->price}}">
                        <input type="hidden" name="selected_payment_gateway" value="manual_payment">
                        <!--<input type="hidden" name="phone" placeholder="{{__('Phone')}}" value="{{auth()->user()->phone}}">-->
                                
                        <div class="tab_section mb-4">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="one_time_donation_tab" role="tabpanel">
                                    <div class="single_amount_wrapper">
                                        @php
                                            $custom_amounts_once = 1;
                                            $custom_amounts_once = !empty($custom_amounts_once) ? explode(',', $custom_amounts_once) : [1];
                                        @endphp
                                    </div>

<div style="display: flex; align-items: center; gap: 10px;">
    <label for="donation_amount_user_input" style="margin: 0;">{{ __('الكمية: ') }}</label>
<input type="number" name="amount"
       value="{{ min($selected_quantity, $max_available) }}" step="1"
       min="1" max="{{ $max_available }}"
       id="donation_amount_user_input" class="form-control" style="width: 80px; border: 1px solid #ced4da;">

</div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <input type="text" name="name" placeholder="{{__('Name')}}"
                                   @if(auth()->check()) value="{{auth()->user()->name}}" @endif class="form-control">
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
        <input type="text" name="phone" class="form-control"
       value="{{ auth()->user()->username  ?? '' }}" required style="height: 38px;">
    </div>
</div>

                        
                        
                        {{-- <div class="form-group">
                            <input type="email" name="email" placeholder="{{__('Email')}}"
                                   @if(auth()->check()) value="{{auth()->user()->email}}" @endif class="form-control">
                        </div> --}}
                        
                        <div class="form-group">
                            <input type="text" name="city" placeholder="{{__('City')}}"
                                   @if(auth()->check()) value="{{auth()->user()->city}}" @endif class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="district" placeholder="{{__('الحي')}}"
                                   @if(auth()->check()) value="{{auth()->user()->district}}" @endif class="form-control">
                        </div>
                         <div class="form-group">
                            <input type="text" name="address" placeholder="{{__('Address')}}"
                                   @if(auth()->check()) value="{{auth()->user()->address}}" @endif class="form-control">
                        </div>


                        <!--{!! render_payment_gateway_for_form() !!}-->

                        <!--@if(!empty(get_static_option('manual_payment_gateway')))-->
                        <!--    <div class="form-group manual_payment_transaction_field">-->
                        <!--        <div class="label">{{__('Attach Your Bank Document')}}</div>-->
                        <!--        <input class="form-control btn btn-warning btn-sm" type="hidden" name="manual_payment_attachment">-->
                        <!--        <span class="help-info">{!! get_manual_payment_description() !!}</span>-->
                        <!--    </div>-->
                        <!--@endif-->

                        @if(get_static_option('donation_terms_and_conditions') && get_static_option('donation_privacy_policy'))
                        <div id="termsAndConditions">
                            <label>
                                <input type="checkbox" name="agreeTerms" required>
                                {{__('أوافق على')}}
                                <a href="{{ route('frontend.dynamic.page',[getSlugByPageId(get_static_option('donation_terms_and_conditions')), get_static_option('donation_terms_and_conditions')]) }}" target="_blank">{{__('الشروط والأحكام')}}</a>
                                {{__('و')}}
                                <a href="{{ route('frontend.dynamic.page',[getSlugByPageId(get_static_option('donation_privacy_policy')), get_static_option('donation_privacy_policy')]) }}" target="_blank">{{__('وسياسة الخصوصية')}}</a>
                            </label>
                        </div>
                        @endif

                        <div class="donate-seperate-page-button">
                            <div class="btn-wrapper">
                                <button class="boxed-btn reverse-color btn-sm" type="submit">
                                    {{ __('اكمال الطلب') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="donation-amount-details-wrapper">
                    <h3 class="title">{{__('تفاصيل الطلب')}}</h3>
                    <div class="your-area-donation-wrap">
                        <div class="thumb">
                            {!! render_image_markup_by_attachment_id($donation->image,'','thumb') !!}
                        </div>

                    </div>
                    <ul>
                        <li>
                            <span>{{ __('سعر المنتج') }}</span>
                            <span class="price">{{ amount_with_currency_symbol($donation->price ?? 0) }}</span>
                        </li>
                        <li>
                            <span>{{ __('Quantity') }}</span>
                            <span class="price donation_amount">{{ $selected_quantity }}</span>
                        </li>
                        <li class="total">
                            <span>{{ __('الاجمالي') }}</span>
                            <span class="price total_amount">
                                {{ amount_with_currency_symbol(($donation->price ?? 0) * $selected_quantity) }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<x-media.markup
    :userUpload="true"
    :imageUploadRoute="route('user.upload.media.file')">
</x-media.markup>
@endsection

@section('scripts')
<script src="{{asset('assets/frontend/js/jQuery.rProgressbar.min.js')}}"></script>
<script>
    (function ($) {
        'use strict';

        $(document).ready(function () {
function updateTotal() {
    let quantityInput = $('#donation_amount_user_input');
    let quantity = parseInt(quantityInput.val()) || 1;
    let max = {{ $max_available }};
    
    if (quantity > max) {
        quantity = max;
        quantityInput.val(max);
    }

    let unitPrice = {{ $donation->price ?? 0 }};
    let total = unitPrice * quantity;

    $('.donation_amount').text(quantity);
    $('.total_amount').text(total.toLocaleString() + ' ريال');

}


            $(document).on('input', '#donation_amount_user_input', function () {
                updateTotal();
            });

            updateTotal(); // initial calculation
        });
    })(jQuery);
</script>

<x-media.js
    :deleteRoute="route('user.upload.media.file.delete')"
    :imgAltChangeRoute="route('user.upload.media.file.alt.change')"
    :allImageLoadRoute="route('user.upload.media.file.all')">
</x-media.js>
@endsection
