@extends('frontend.frontend-page-master')
@section('site-title')
    {{ get_static_option('blog_page_name') }}
@endsection
@section('page-title',     __('Blogs'))
@section('page-meta-data')
    <meta name="description" content="{{ get_static_option('blog_page_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('blog_page_meta_tags') }}">
@endsection

@section('content')
    @php
        // detect current language (ar / en ...)
        $locale   = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
        $isArabic = (strpos($locale, 'ar') === 0);
    @endphp

    <section class="blog-content-area our-attoryney padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach($all_blogs as $data)
                        @php
                            // pick title, author, content based on lang with fallback
                            $titleAr   = $data->title ?? '';
                            $titleEn   = $data->title_en ?? '';

                            $authorAr  = $data->author ?? '';
                            $authorEn  = $data->author_en ?? '';

                            $contentAr = $data->blog_content ?? '';
                            $contentEn = $data->blog_content_en ?? '';

                            $title   = $isArabic ? ($titleAr ?: $titleEn)   : ($titleEn ?: $titleAr);
                            $author  = $isArabic ? ($authorAr ?: $authorEn) : ($authorEn ?: $authorAr);
                            $content = $isArabic ? ($contentAr ?: $contentEn) : ($contentEn ?: $contentAr);
                        @endphp

                        <x-frontend.blog.list01
                            :image="$data->image"
                            :date="$data->created_at"
                            :title="$title"
                            :slug="$data->slug"
                            :author="$author"
                            :catid="$data->blog_categories_id"
                            :content="$content">
                        </x-frontend.blog.list01>
                    @endforeach

                    <nav class="pagination-wrapper" aria-label="Page navigation ">
                        {{ $all_blogs->links() }}
                    </nav>
                </div>

                <div class="col-lg-4">
                    <div class="widget-area">
                        {!! render_frontend_sidebar('blog',['column' => false]) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
