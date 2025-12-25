@extends('frontend.frontend-page-master')

@php
    // صورة البوست
    $post_img   = null;
    $blog_image = get_attachment_image_by_id($blog_post->image,"full",false);
    $post_img   = !empty($blog_image) ? $blog_image['img_url'] : '';

    // ✅ تحديد لغة المستخدم الحالية
    $locale   = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
    $isArabic = (strpos($locale, 'ar') === 0);

    // ✅ العنوان حسب اللغة مع Fallback
    $titleAr = $blog_post->title_ar ?? null;
    $titleEn = $blog_post->title_en ?? null;
    $baseTitle = $blog_post->title;

    $displayTitle = $isArabic
        ? ($titleAr ?: ($baseTitle ?: $titleEn))
        : ($titleEn ?: ($baseTitle ?: $titleAr));

    // ✅ المحتوى حسب اللغة مع Fallback
    $contentAr   = $blog_post->blog_content_ar ?? null;
    $contentEn   = $blog_post->blog_content_en ?? null;
    $baseContent = $blog_post->blog_content;

    $displayContent = $isArabic
        ? ($contentAr ?: ($baseContent ?: $contentEn))
        : ($contentEn ?: ($baseContent ?: $contentAr));

    // ✅ المؤلف حسب اللغة مع Fallback
    $authorAr   = $blog_post->author_ar ?? null;
    $authorEn   = $blog_post->author_en ?? null;
    $baseAuthor = $blog_post->author;

    $displayAuthor = $isArabic
        ? ($authorAr ?: ($baseAuthor ?: $authorEn))
        : ($authorEn ?: ($baseAuthor ?: $authorAr));

           $locale = function_exists('get_user_lang')
        ? get_user_lang()
        : app()->getLocale();

    // نجيب العنوان حسب اللغة: blog_single_page_share_title_en / _ar
    $shareTitleKey = 'blog_single_page_share_title_' . $locale;

    $shareTitle = get_static_option($shareTitleKey)
        ?? get_static_option('blog_single_page_share_title'); // Fallback للقيمة القديمة
         // نجيب العنوان حسب اللغة: blog_single_page_related_post_title_en / _ar
    $relatedKey = 'blog_single_page_related_post_title_' . $locale;

    // نحاول نجيب القيمة، ولو طلعت فاضية نرجع للقديم
    $relatedTitle = get_static_option($relatedKey);
    if (empty($relatedTitle)) {
        $relatedTitle = get_static_option('blog_single_page_related_post_title');
    }
@endphp

@section('style')
    @if(!empty(get_static_option('site_disqus_key')))
        <script id="dsq-count-scr" src="//{{get_static_option('site_disqus_key')}}.disqus.com/count.js" async></script>
    @endif
@endsection

@section('og-meta')
    <meta name="og:title" content="{{ purify_html($blog_post->og_meta_title) }}">
    <meta name="og:description" content="{{ purify_html($blog_post->og_meta_description) }}">
    {!! render_og_meta_image_by_attachment_id($blog_post->og_meta_image) !!}
    <meta name="og:tags" content="{{ purify_html($blog_post->meta_tags) }}">
@endsection

@section('page-meta-data')
    <meta name="description" content="{{ purify_html($blog_post->meta_description) }}">
    <meta name="tags" content="{{ purify_html($blog_post->meta_tags) }}">
@endsection

@section('site-title')
    {{ purify_html($displayTitle) }}
@endsection

@section('page-title')
    {{ purify_html($displayTitle) }}
@endsection

@section('content')
    <section class="blog-details-content-area padding-top-100 padding-bottom-60">
        <div class="container">
            <div class="row">
                {{-- المحتوى الرئيسي --}}
                <div class="col-lg-8">
                    <div class="blog-details-item">
                        <div class="thumb">
                            @if (!empty($blog_image))
                                <img src="{{ $blog_image['img_url'] }}" alt="{{ purify_html($displayTitle) }}">
                            @endif
                        </div>

                        <div class="entry-content">
                            <ul class="post-meta">
                                <li>
                                    <i class="fas fa-calendar-alt"></i>
                                    @php
                                        $dateObj = \Carbon\Carbon::parse($blog_post->created_at);
                                        // اجعل اللغة حسب واجهة المستخدم
                                        $dateLocale = $isArabic ? 'ar' : 'en';
                                        $dateText = $dateObj->locale($dateLocale)->translatedFormat($isArabic ? 'd F Y' : 'd M Y');
                                    @endphp
                                    {{ $dateText }}
                                </li>
                                <li>
                                    <i class="fas fa-user"></i>
                                    {{ purify_html($displayAuthor) }}
                                </li>
                                <li>
                                    <div class="cats">
                                        <i class="fas fa-folder"></i>
                                        @php
                                            $locale    = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
                                            $isEnglish = (strpos(strtolower($locale), 'en') === 0);
                                            $catObj    = \App\BlogCategory::find($blog_post->blog_categories_id);
                                        @endphp
                                        @if($catObj)
                                            @php
                                                $catName = $isEnglish && !empty($catObj->name_en) ? $catObj->name_en : $catObj->name;
                                                $catSlug = Str::slug($catName);
                                            @endphp
                                            <a href="{{ route('frontend.blog.category', ['id' => $catObj->id, 'any' => $catSlug]) }}">{{ purify_html($catName) }}</a>
                                        @endif
                                    </div>
                                </li>
                            </ul>

                            <div class="content-area mt-4" dir="{{ $isArabic ? 'rtl' : 'ltr' }}">
                                {!! $displayContent !!}
                            </div>
                        </div>

                        {{-- التاجز + الشير --}}
                        <div class="blog-details-footer">
                            @php
                                $all_tags = explode(',', purify_html($blog_post->tags));
                            @endphp

                            @if(count($all_tags) > 1)
                                <div class="left">
                                    <ul class="tags">
                                        <li class="title">
                                            {{ get_static_option('blog_single_page_tags_title_' . $locale)
                                                ?? get_static_option('blog_single_page_tags_title') }}
                                        </li>
                                        @foreach($all_tags as $tag)
                                            @php $slug = Str::slug($tag); @endphp
                                            @if (!empty($slug))
                                                <li>
                                                    <a href="{{ route('frontend.blog.tags.page',['name' => $slug]) }}">
                                                        {{ $tag }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="right">
    <ul class="social-share">
        <li class="title">
            {{ $shareTitle }}
        </li>
        {!! single_post_share(
            route('frontend.blog.single', purify_html($blog_post->slug)),
            purify_html($displayTitle),
            $post_img
        ) !!}
    </ul>
</div>
                        </div>
                    </div>

                    {{-- البوستات المتعلقة --}}
                    @if(count($all_related_blog) > 1)
                        <div class="related-post-area margin-top-40">
                            <div class="section-title ">
    <h4 class="title ">{{ $relatedTitle }}</h4>
</div>

                            <div class="related-news-carousel global-carousel-init"
                                 data-desktopitem="2"
                                 data-mobileitem="1"
                                 data-tabletitem="1"
                                 data-margin="30"
                                 data-dots="true">
                                @foreach($all_related_blog as $data)
                                    @if($data->id === $blog_post->id) @continue @endif

                                    @php
                                        $relTitleAr = $data->title_ar ?? null;
                                        $relTitleEn = $data->title_en ?? null;
                                        $relBase    = $data->title;

                                        $relDisplayTitle = $isArabic
                                            ? ($relTitleAr ?: ($relTitleEn ?: $relBase))
                                            : ($relTitleEn ?: ($relTitleAr ?: $relBase));
                                    @endphp

                                    <x-frontend.blog.grid01
                                        :image="$data->image"
                                        :date="$data->created_at"
                                        :author="$data->author"
                                        :catid="$data->blog_categories_id"
                                        :slug="$data->slug"
                                        :title="$relDisplayTitle">
                                    </x-frontend.blog.grid01>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Disqus --}}
                    <div class="disqus-comment-area margin-top-40">
                        <div id="disqus_thread"></div>
                    </div>
                </div>

                {{-- السايدبار --}}
                <div class="col-lg-4">
                    <div class="widget-area">
                        {!! render_frontend_sidebar('blog',['column' => false]) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @if(!empty(get_static_option('site_disqus_key')))
        <div id="disqus_thread"></div>
        <script>
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://{{ get_static_option('site_disqus_key') }}.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
    @endif
@endsection
