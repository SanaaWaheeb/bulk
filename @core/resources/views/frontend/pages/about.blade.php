@extends('frontend.frontend-page-master')
@section('site-title')
    {{ get_static_option('about_page_name') }}
@endsection
@section('page-title',     __('About us'))
@section('page-meta-data')
    <meta name="description" content="{{ get_static_option('about_page_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('about_page__meta_tags') }}">
@endsection

@section('content')
@php
    use Illuminate\Support\Str;

    // اللغة الحالية
    $locale   = app()->getLocale();
    $isArabic = Str::startsWith($locale, 'ar');

    /* =========================
     * 1) ABOUT US (من نحن)
     * ========================= */

    $aboutSubtitleAr = get_static_option('about_page_about_section_subtitle');
    $aboutSubtitleEn = get_static_option('about_page_about_section_subtitle_en');

    $aboutTitleAr = get_static_option('about_page_about_section_title');
    $aboutTitleEn = get_static_option('about_page_about_section_title_en');

    $aboutDescAr = get_static_option('about_page_about_section_description');
    $aboutDescEn = get_static_option('about_page_about_section_description_en');

    $aboutSubtitle = $isArabic
        ? ($aboutSubtitleAr ?: $aboutSubtitleEn)
        : ($aboutSubtitleEn ?: $aboutSubtitleAr);

    $aboutTitle = $isArabic
        ? ($aboutTitleAr ?: $aboutTitleEn)
        : ($aboutTitleEn ?: $aboutTitleAr);

    $aboutDesc = $isArabic
        ? ($aboutDescAr ?: $aboutDescEn)
        : ($aboutDescEn ?: $aboutDescAr);

    /* =========================
     * 2) OUR MISSION (مهمتنا)
     * ========================= */

    $missionTitleAr = get_static_option('about_page_our_mission_title');
    $missionTitleEn = get_static_option('about_page_our_mission_title_en');

    $missionDescAr = get_static_option('about_page_our_mission_description');
    $missionDescEn = get_static_option('about_page_our_mission_description_en');

    $missionTitle = $isArabic
        ? ($missionTitleAr ?: $missionTitleEn)
        : ($missionTitleEn ?: $missionTitleAr);

    $missionDesc = $isArabic
        ? ($missionDescAr ?: $missionDescEn)
        : ($missionDescEn ?: $missionDescAr);

    // أيقونات + عناوين لستة "مهمتنا"
    $missionIcons = get_static_option('about_page_our_mission_list_section_icon');
    $missionIcons = !empty($missionIcons) ? unserialize($missionIcons) : [];

    $missionListTitlesAr = get_static_option('about_page_our_mission_list_section_title');
    $missionListTitlesAr = !empty($missionListTitlesAr) ? unserialize($missionListTitlesAr) : [];

    $missionListTitlesEn = get_static_option('about_page_our_mission_list_section_title_en');
    $missionListTitlesEn = !empty($missionListTitlesEn) ? unserialize($missionListTitlesEn) : [];

    /* =========================
     * 3) WHAT WE DO (ماذا نفعل)
     * ========================= */

    $whatSubtitleAr = get_static_option('about_page_what_we_do_area_subtitle');
    $whatSubtitleEn = get_static_option('about_page_what_we_do_area_subtitle_en');

    $whatTitleAr = get_static_option('about_page_what_we_do_area_title');
    $whatTitleEn = get_static_option('about_page_what_we_do_area_title_en');

    $whatSubtitle = $isArabic
        ? ($whatSubtitleAr ?: $whatSubtitleEn)
        : ($whatSubtitleEn ?: $whatSubtitleAr);

    $whatTitle = $isArabic
        ? ($whatTitleAr ?: $whatTitleEn)
        : ($whatTitleEn ?: $whatTitleAr);

    // عناصر What We Do
    $whatIcons = get_static_option('about_page_what_we_do_section_icon');
    $whatIcons = !empty($whatIcons) ? unserialize($whatIcons) : [];

    $whatTitlesAr = get_static_option('about_page_what_we_do_section_title');
    $whatTitlesAr = !empty($whatTitlesAr) ? unserialize($whatTitlesAr) : [];

    $whatTitlesEn = get_static_option('about_page_what_we_do_section_title_en');
    $whatTitlesEn = !empty($whatTitlesEn) ? unserialize($whatTitlesEn) : [];

    $whatDescAr = get_static_option('about_page_what_we_do_section_description');
    $whatDescAr = !empty($whatDescAr) ? unserialize($whatDescAr) : [];

    $whatDescEn = get_static_option('about_page_what_we_do_section_description_en');
    $whatDescEn = !empty($whatDescEn) ? unserialize($whatDescEn) : [];

    $whatUrlAr = get_static_option('about_page_what_we_do_section_url');
    $whatUrlAr = !empty($whatUrlAr) ? unserialize($whatUrlAr) : [];

    $whatUrlEn = get_static_option('about_page_what_we_do_section_url_en');
    $whatUrlEn = !empty($whatUrlEn) ? unserialize($whatUrlEn) : [];
@endphp

    <!-- About Section -->
    <div class="about-area padding-top-115 padding-bottom-120">
        <div class="container">

            {{-- ========== WHO WE ARE / ABOUT US ========== --}}
            @if(!empty(get_static_option('about_page_about_us_section_status')))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-title-content margin-bottom-50">
                            <div class="section-title desktop-left">
                                <span>{{ $aboutSubtitle }}</span>
                                <h3 class="title">{!! render_colored_text($aboutTitle) !!}</h3>
                            </div>
                            <div class="section-paragraph">
                                {!! $aboutDesc !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- ========== OUR MISSION ========== --}}
            @if(!empty(get_static_option('about_page_our_mission_section_status')))
                <div class="about-content-area padding-top-60 padding-bottom-60">
                    <div class="bg-img" {!! render_background_image_markup_by_attachment_id(get_static_option('about_page_our_mission_left_image_image')) !!}></div>
                    <div class="row">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="about-content">
                                <div class="section-title">
                                    <h3 class="title">{{ $missionTitle }}</h3>
                                    <div>{!! $missionDesc !!}</div>
                                </div>
                                <div class="content">
                                    <ul>
                                        @foreach($missionIcons as $idx => $icon)
                                            @php
                                                $liTitleAr = $missionListTitlesAr[$idx] ?? '';
                                                $liTitleEn = $missionListTitlesEn[$idx] ?? '';
                                                $liTitle   = $isArabic
                                                    ? ($liTitleAr ?: $liTitleEn)
                                                    : ($liTitleEn ?: $liTitleAr);
                                            @endphp
                                            <li>
                                                <i class="{{ $icon }}"></i> {{ $liTitle }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    {{-- ========== COUNTER SECTION (بدون تعدد لغات حتى الآن) ========== --}}
    @if(!empty(get_static_option('about_page_counterup_section_status')))
        <div class="counterup-area bg-image padding-bottom-105 padding-top-110"
             {!! render_background_image_markup_by_attachment_id(get_static_option('about_page_counterup_background_image')) !!}
        >
            <div class="container">
                <div class="row">
                    @foreach($all_counterup as $data)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-counterup-01">
                                <div class="icon">
                                    <i class="{{ $data->icon }}"></i>
                                </div>
                                <div class="content">
                                    <div class="count-wrap">
                                        <span class="count-num">{{ $data->number }}</span>{{ $data->extra_text }}
                                    </div>
                                    <h4 class="title">{{ $data->title }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- ========== WHAT WE DO AREA ========== --}}
    @if(!empty(get_static_option('about_page_what_we_do_section_status')))
        <section class="problem-area padding-top-100 padding-bottom-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-11 col-11">
                        <div class="section-title b-top desktop-center padding-top-25 margin-bottom-55">
                            <span>{{ $whatSubtitle }}</span>
                            <h2 class="title">{!! render_colored_text($whatTitle) !!}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($whatIcons as $idx => $icon)
                        @php
                            $itemTitleAr = $whatTitlesAr[$idx] ?? '';
                            $itemTitleEn = $whatTitlesEn[$idx] ?? '';

                            $itemDescAr  = $whatDescAr[$idx] ?? '';
                            $itemDescEn  = $whatDescEn[$idx] ?? '';

                            $itemUrlAr   = $whatUrlAr[$idx] ?? '';
                            $itemUrlEn   = $whatUrlEn[$idx] ?? '';

                            $itemTitle = $isArabic
                                ? ($itemTitleAr ?: $itemTitleEn)
                                : ($itemTitleEn ?: $itemTitleAr);

                            $itemDesc = $isArabic
                                ? ($itemDescAr ?: $itemDescEn)
                                : ($itemDescEn ?: $itemDescAr);

                            $itemUrl = $isArabic
                                ? ($itemUrlAr ?: $itemUrlEn)
                                : ($itemUrlEn ?: $itemUrlAr);
                        @endphp

                        <div class="col-lg-4 col-md-6">
                            <div class="problem-single-item margin-bottom-30">
                                <div class="icon style-0{{ $idx }}">
                                    <i class="{{ $icon }}"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="{{ $itemUrl }}">{{ $itemTitle }}</a>
                                    </h4>
                                    <p>{{ $itemDesc }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- باقي الأقسام (Testimonials / Team) تظل كما هي الآن --}}
    @if(!empty(get_static_option('about_page_testimonial_section_status')))
        <section class="testimonial-area-02 padding-bottom-100 padding-top-120" style="background-image: url({{asset('assets/frontend/img/shape/03.png')}});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-12 p-0">
                        <div class="section-title desktop-center margin-bottom-50">
                            <span>{{ get_static_option('about_page_testimonial_subtitle') }}</span>
                            <h3 class="title">{!! render_colored_text(get_static_option('about_page_testimonial_title')) !!}</h3>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters justify-content-center">
                    <div class="col-lg-7">
                        <div class="global-carousel-init slider-dots"
                             data-loop="true"
                             data-desktopitem="1"
                             data-mobileitem="1"
                             data-tabletitem="1"
                             data-dots="true"
                             data-margin="0"
                             data-autoplay="true"
                        >
                            @foreach($all_testimonial as $data)
                                <div class="single-testimonial-item dark">
                                    <div class="thumb bg-image" {!! render_background_image_markup_by_attachment_id($data->image) !!}>
                                        <div class="icon">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="author-details">
                                            <div class="author-meta">
                                                <h4 class="title">{{ $data->name }}</h4>
                                                <span class="designation">{{ $data->designation }}</span>
                                            </div>
                                        </div>
                                        <p class="description">{{ $data->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(!empty(get_static_option('about_page_team_member_section_status')))
        <section class="volunteer-area padding-bottom-120 padding-top-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="volunteer-title-content margin-bottom-50">
                            <div class="section-title desktop-left">
                                <span>{{ get_static_option('about_page_team_member_section_subtitle') }}</span>
                                <h3 class="title">{!! render_colored_text(get_static_option('about_page_team_member_section_title')) !!}</h3>
                            </div>
                            <div class="section-paragraph volunteer-slider-container"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="global-carousel-init slider-dots"
                             data-loop="true"
                             data-desktopitem="4"
                             data-mobileitem="1"
                             data-tabletitem="2"
                             data-dots="true"
                             data-nav="true"
                             data-margin="30"
                             data-autoplay="true"
                             data-navcontainer=".volunteer-slider-container"
                        >
                            @foreach($all_team_members as $data)
                                <x-frontend.team.grid
                                    :image="$data->image"
                                    :index="$loop->index"
                                    :name="$data->name"
                                    :iconone="$data->icon_one"
                                    :icononeurl="$data->icon_one_url"
                                    :icontwo="$data->icon_two"
                                    :icontwourl="$data->icon_two_url"
                                    :iconthree="$data->icon_three"
                                    :iconthreeurl="$data->icon_three_url" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
