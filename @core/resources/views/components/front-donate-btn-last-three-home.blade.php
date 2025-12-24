@if(get_static_option('home_page_navbar_button_status'))
    @php
        // URL الزر
        $button_url = get_static_option('home_page_navbar_button_url')
            ?: route('frontend.support.ticket');

        // لغة المستخدم الحالية
        $locale   = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
        $isArabic = \Illuminate\Support\Str::startsWith($locale, 'ar');

        // العناوين من الـ DB مباشرة
        $title_ar = get_static_option('home_page_navbar_button_title');
        $title_en = get_static_option('home_page_navbar_button_title_en');

        // اختيار النص حسب اللغة مع Fallback
        $btnTitle = $isArabic
            ? ($title_ar ?: $title_en)
            : ($title_en ?: $title_ar);
    @endphp

    <li id="donate">
        <a href="{{ $button_url }}">{{ $btnTitle }}</a>
    </li>
@endif
