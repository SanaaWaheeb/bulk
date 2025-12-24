@extends('frontend.frontend-page-master')

@php
    use Illuminate\Support\Str;

    // اللغة الحالية
    $locale   = app()->getLocale();
    $isArabic = Str::startsWith($locale, 'ar');

    // قيم الإعدادات (عربي / إنجليزي) مع Fallback
    $faqNameAr   = get_static_option('faq_page_name');
    $faqNameEn   = get_static_option('faq_page_name_en');

    $metaDescAr  = get_static_option('faq_page_meta_description');
    $metaDescEn  = get_static_option('faq_page_meta_description_en');

    $metaTagsAr  = get_static_option('faq_page_meta_tags');
    $metaTagsEn  = get_static_option('faq_page_meta_tags_en');

    $pageTitle = $isArabic
        ? ($faqNameAr ?: $faqNameEn)
        : ($faqNameEn ?: $faqNameAr);

    $pageMetaDesc = $isArabic
        ? ($metaDescAr ?: $metaDescEn)
        : ($metaDescEn ?: $metaDescAr);

    $pageMetaTags = $isArabic
        ? ($metaTagsAr ?: $metaTagsEn)
        : ($metaTagsEn ?: $metaTagsAr);
@endphp

@section('site-title')
    {{ $pageTitle }}
@endsection

@section('page-title',     __('FAQ'))

@section('page-meta-data')
    <meta name="description" content="{{ $pageMetaDesc }}">
    <meta name="tags" content="{{ $pageMetaTags }}">
@endsection

@section('content')
    <div class="faq-page-content-area padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion-wrapper">
                        @php $rand_number = rand(9999,99999999); @endphp
                        <div id="accordion_{{$rand_number}}">
                            @foreach($all_faqs as $key => $data)
                                @php
                                    $aria_expanded = $data->is_open === 'on' ? 'true' : 'false';

                                    // سؤال وجواب حسب اللغة مع Fallback
                                    $questionAr = $data->title ?? '';
                                    $questionEn = $data->title_en ?? '';

                                    $answerAr   = $data->description ?? '';
                                    $answerEn   = $data->description_en ?? '';

                                    $question = $isArabic
                                        ? ($questionAr ?: $questionEn)
                                        : ($questionEn ?: $questionAr);

                                    $answer = $isArabic
                                        ? ($answerAr ?: $answerEn)
                                        : ($answerEn ?: $answerAr);
                                @endphp

                                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingOne_{{$key}}" itemprop="name">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse"
                                               data-target="#collapseOne_{{$key}}"
                                               role="button"
                                               aria-expanded="{{ $aria_expanded }}"
                                               aria-controls="collapseOne_{{$key}}">
                                                {{ $question }}
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne_{{$key}}"
                                         class="collapse @if($data->is_open == 'on') show @endif"
                                         aria-labelledby="headingOne_{{$key}}"
                                         data-parent="#accordion_{{$rand_number}}"
                                         itemscope
                                         itemprop="acceptedAnswer"
                                         itemtype="https://schema.org/Answer">
                                        <div class="card-body" itemprop="text">
                                            {!! $answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> <!-- /#accordion -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
