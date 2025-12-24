@php
    use Illuminate\Support\Str;

    // تحديد اللغة الحالية
    $locale   = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
    $isArabic = (strpos($locale, 'ar') === 0);

    // نص زر "اقرأ المزيد" بالعربي والإنجليزي من الإعدادات
    $readMoreAr = get_static_option('blog_page_read_more_btn_text');       // العربي
    $readMoreEn = get_static_option('blog_page_read_more_btn_text_en');    // الإنجليزي (أنت أضفته في لوحة التحكم)

    // اختيار النص حسب اللغة مع Fallback
    $readMoreText = $isArabic
        ? ($readMoreAr ?: $readMoreEn)
        : ($readMoreEn ?: $readMoreAr);
@endphp

<div class="blog-classic-item-01 margin-bottom-60">
    <div class="thumbnail">
        <a href="{{ route('frontend.blog.single', $slug) }}">
            {!! render_image_markup_by_attachment_id($image) !!}
        </a>
    </div>

    <div class="content-wrapper">
        <div class="news-date">
            <h5 class="title">{{ date('d', strtotime($date)) }}</h5>
            <span>{{ date('M', strtotime($date)) }}</span>
        </div>

        <div class="content">
            <ul class="post-meta">
                <li>
                    <a href="{{ route('frontend.blog.single', $slug) }}">
                        {{ __('By') }}
                        <span>{{ $author ?? __('Anonymous') }}</span>
                    </a>
                </li>
                <li class="cats">
                    <i class="fas fa-microchip"></i>
                    @isset($catid)
                        @php
                            $locale    = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
                            $isEnglish = (strpos(strtolower($locale), 'en') === 0);
                            $catObj    = \App\BlogCategory::find($catid);
                        @endphp
                        @if($catObj)
                            @php
                                $catName = $isEnglish && !empty($catObj->name_en) ? $catObj->name_en : $catObj->name;
                                $catSlug = Str::slug($catName);
                            @endphp
                            <a href="{{ route('frontend.blog.category', ['id' => $catObj->id, 'any' => $catSlug]) }}">{{ purify_html($catName) }}</a>
                        @endif
                    @endisset
                </li>
            </ul>

            <h4 class="title">
                <a href="{{ route('frontend.blog.single', $slug) }}">
                    {{ $title ?? '' }}
                </a>
            </h4>
        </div>
    </div>

    <div class="blog-bottom">
        <p>{!! Str::words(purify_html_raw(strip_tags($content)), 80) !!}</p>
        <div class="btn-wrapper">
            <a href="{{ route('frontend.blog.single', $slug) }}" class="boxed-btn reverse-color">
                {{ $readMoreText }}
            </a>
        </div>
    </div>
</div>
