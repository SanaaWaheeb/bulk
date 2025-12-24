@extends('frontend.frontend-page-master')

@php
    $locale   = app()->getLocale();
    $isArabic = (strpos($locale, 'ar') === 0);

    // العنوان
    $titleAr = $page_post->title ?? '';
    $titleEn = $page_post->title_en ?? '';

    $pageTitle = $isArabic
        ? ($titleAr ?: $titleEn)
        : ($titleEn ?: $titleAr);

    // المحتوى
    $contentAr = $page_post->page_content ?? '';
    $contentEn = $page_post->page_content_en ?? '';

    $pageContent = $isArabic
        ? ($contentAr ?: $contentEn)
        : ($contentEn ?: $contentAr);

    // الميتا ديسكربشن (لو عملت أعمدة *_en هتشتغل، لو لأ هتستخدم نفس القيمة)
    $metaDescAr = $page_post->meta_description ?? '';
    $metaDescEn = $page_post->meta_description_en ?? null;
    $metaDescription = $isArabic
        ? ($metaDescAr ?: $metaDescEn)
        : ($metaDescEn ?: $metaDescAr);

    // الميتا تاجز
    $metaTagsAr = $page_post->meta_tags ?? '';
    $metaTagsEn = $page_post->meta_tags_en ?? null;
    $metaTags = $isArabic
        ? ($metaTagsAr ?: $metaTagsEn)
        : ($metaTagsEn ?: $metaTagsAr);

    // OG Meta Title
    $ogTitleAr = $page_post->og_meta_title ?? '';
    $ogTitleEn = $page_post->og_meta_title_en ?? null;
    $ogTitle = $isArabic
        ? ($ogTitleAr ?: $ogTitleEn)
        : ($ogTitleEn ?: $ogTitleAr);

    // OG Meta Description
    $ogDescAr = $page_post->og_meta_description ?? '';
    $ogDescEn = $page_post->og_meta_description_en ?? null;
    $ogDesc = $isArabic
        ? ($ogDescAr ?: $ogDescEn)
        : ($ogDescEn ?: $ogDescAr);
@endphp

@section('page-meta-data')
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="tags" content="{{ $metaTags }}">
@endsection

@section('site-title')
    {{ $pageTitle }}
@endsection

@section('page-title')
    {{ $pageTitle }}
@endsection

@section('og-meta')
    <meta name="og:title" content="{{ $ogTitle }}">
    <meta name="og:description" content="{{ $ogDesc }}">
    {!! render_og_meta_image_by_attachment_id($page_post->og_meta_image) !!}
@endsection

@section('content')
    <section class="dynamic-page-content-area padding-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(!auth()->guard('web')->check() && $page_post->visibility === 'everyone')
                        <div class="dynamic-page-content-wrap">
                            {!! $pageContent !!}
                        </div>
                    @elseif(auth()->guard('web')->check())
                        <div class="dynamic-page-content-wrap">
                            {!! $pageContent !!}
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <p>
                                <a class="text-primary" href="{{route('user.login')}}">{{__('login')}}</a>
                                {{__(' to see this page')}}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
