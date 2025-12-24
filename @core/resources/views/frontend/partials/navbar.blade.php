@php
    $home_page_variant = isset($home_page) ? $home_page : get_static_option('home_page_variant');
@endphp

<div class="header-style-01  header-variant-{{$home_page_variant}} @if(request()->path() !== '/') inner-page @endif">
    <div class="header-style-01">
        <div class="topbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="topbar-inner">
                            <div class="left-contnet">
                                <ul class="info-items">
                                    @php
                                        $all_icon_fields =  filter_static_option_value('home_page_01_topbar_info_list_icon_icon',$global_static_field_data);
                                        $all_icon_fields =  !empty($all_icon_fields) ? unserialize($all_icon_fields) : [];
                                        $all_title_fields = filter_static_option_value('home_page_01_topbar_info_list_text',$global_static_field_data);
                                        $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [];
                                    @endphp
                                    @foreach($all_icon_fields as $index => $icon)
                                    <li><i class="{{$icon}}"></i> {{isset($all_title_fields[$index]) ? $all_title_fields[$index] : ''}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="right-contnet">
                                <div class="social-link">
                                    <ul>
                                        @foreach($all_social_item as $data)
                                            <li><a href="{{$data->url}}"><i class="{{$data->icon}}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="volunteer-right">
                                    <ul class="info-items-02">
                                        <x-front-user-login-li/>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@php
            // Determine if current language is English (normalize locale like en or en_frontend)
            $currentLocale = function_exists('get_user_lang') ? get_user_lang() : (session('lang') ?? app()->getLocale());
            $isEnglish = \Illuminate\Support\Str::startsWith($currentLocale, 'en');
        @endphp

        @if($isEnglish)
            <style>
                /* Make only the navbar layout RTL, keep menu items themselves LTR */
                .en-rtl-navbar { direction: rtl; }
                .en-rtl-navbar .navbar-nav.keep-ltr { direction: ltr; }
                /* keep dropdown caret and toggler pleasant */
                .en-rtl-navbar .navbar-toggler { margin-left: 0; margin-right: auto; }
                .en-rtl-navbar .logo-wrapper { margin-left: 15px; margin-right: 0; }
            </style>
        @endif

        <nav class="navbar navbar-area navbar-expand-lg has-topbar nav-style-02 @if($isEnglish) en-rtl-navbar @endif" @if($isEnglish) dir="rtl" @endif>
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
    <a href="{{url('/')}}" class="logo logo-limit">
        @if(!empty(filter_static_option_value('site_logo',$global_static_field_data)))
            {!! render_image_markup_by_attachment_id(filter_static_option_value('site_logo',$global_static_field_data)) !!}
        @else
            <h2 class="site-title">{{filter_static_option_value('site_title',$global_static_field_data)}}</h2>
        @endif
    </a>
</div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                     <ul class="navbar-nav @if($isEnglish) keep-ltr @endif">
                         {!! render_frontend_menu($primary_menu) !!}
                        <li class="search-lists">
                          @if(!empty(get_static_option('home_page_navbar_search_show_hide')))
                            <div class="search navbar-search position-relative">
                                <div class="search-open">
                                    <i class="las la-search icon"></i>
                                </div>
                                <div class="search-bar">
                                    <form class="menu-search-form" action="{{ route('frontend.donation.search') }}">
                                        <div class="search-close"> <i class="las la-times"></i> </div>
                                        <input class="item-search" name="search" id="search" type="text" placeholder="{{__('Search Here.....')}}">
                                        <button type="submit"> {{__('Search')}}</button>
                                    </form>
                                </div>
                            </div>
                          @endif
                        </li>
                    </ul>
                </div>
                @php
    // جلب لغة المستخدم الحالية من نظام السكربت
    // لو عندك helper اسمه get_user_lang() استخدمه:
    $currentLocale = function_exists('get_user_lang')
        ? get_user_lang()
        : (session('lang') ?? app()->getLocale());

    // نخلي القيم ثابتة حسب الـ slug اللي تستخدمه في الروت
    $labels = [
        'en' => 'English',
        'ar' => 'العربية',
    ];

    $currentLabel = $labels[$currentLocale] ?? 'English';
@endphp

@if(!empty(filter_static_option_value('home_page_navbar_button_status',$global_static_field_data)))
    <li class="nav-item dropdown" style="list-style: none; margin-left: 15px;">
        <button class="btn btn-sm btn-outline-light dropdown-toggle d-flex align-items-center"
                type="button"
                id="languageDropdown"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                style="
                    padding: 6px 18px;
                    font-size: 13px;
                    border-radius: 999px;
                    background-color: #333;
                    color: #fff;
                    border-color: transparent;
                ">
            <span style="margin-inline-end: 6px;">
                {{ $currentLabel }}
            </span>
        </button>

        <div class="dropdown-menu dropdown-menu-right shadow-sm border-0"
             aria-labelledby="languageDropdown"
             style="min-width: 150px; font-size: 13px;">
            <a href="{{ route('home.language.switch', 'en') }}"
               class="dropdown-item @if($currentLocale === 'en') active @endif">
                English
            </a>
            <a href="{{ route('home.language.switch', 'ar') }}"
               class="dropdown-item @if($currentLocale === 'ar') active @endif">
                العربية
            </a>
        </div>
    </li>

    <div class="nav-right-content d-flex align-items-center">
        <ul class="nav mb-0">
            <li class="nav-item">
                <x-front-donate-btn/>
            </li>
        </ul>
    </div>
@endif

            </div>
        </nav>
    </div>
</div>
