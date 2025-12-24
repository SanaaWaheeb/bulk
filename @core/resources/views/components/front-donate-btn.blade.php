@if(get_static_option('home_page_navbar_button_status'))
    @php
        // URL الزر
        $button_url = get_static_option('home_page_navbar_button_url')
            ?: route('frontend.campaign.user');

        // لغة المستخدم الحالية
        $locale   = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
        $isArabic = \Illuminate\Support\Str::startsWith($locale, 'ar');

        // القيم من الـ DB مباشرة (مش من $global_static_field_data)
        $subtitle_ar = get_static_option('home_page_navbar_button_subtitle');
        $subtitle_en = get_static_option('home_page_navbar_button_subtitle_en');

        $title_ar    = get_static_option('home_page_navbar_button_title');
        $title_en    = get_static_option('home_page_navbar_button_title_en');

        // اختيار النص حسب اللغة مع Fallback
        $btnSubtitle = $isArabic
            ? ($subtitle_ar ?: $subtitle_en)
            : ($subtitle_en ?: $subtitle_ar);

        $btnTitle = $isArabic
            ? ($title_ar ?: $title_en)
            : ($title_en ?: $title_ar);
    @endphp

    <a href="{{ $button_url }}">
        <div class="info-bar-item
            @if(isset($home) && $home == '02') style-01 @endif
            @if(isset($home) && $home == '03') style-02 @endif
        ">
            <div class="icon">
                <i class="{{ filter_static_option_value('home_page_navbar_button_icon', $global_static_field_data) }}"></i>
            </div>
            <div class="content">
                <span class="title">{{ $btnSubtitle }}</span>
                <p class="details">{{ $btnTitle }}</p>
            </div>
        </div>
    </a>
@endif
