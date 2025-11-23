<section class="breadcrumb-area breadcrumb-bg "
    {!! render_background_image_markup_by_attachment_id(get_static_option('site_breadcrumb_bg')) !!}
>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--<div class="breadcrumb-inner" style="padding: 100px 0 20px 0 !important;">-->
                {{-- <style>
                    .breadcrumb-inner {
                        padding: 120px 0 25px 0 !important; /* للويب */
                    }
                    @media (min-width: 768px) and (max-width: 1024px) {
                        .breadcrumb-inner {
                             padding: 90px 0 25px 0 !important;/* للايباد والتابلت */
                        }
                    }
                
                    @media(max-width: 768px) {
                        .breadcrumb-inner {
                            padding: 140px 0 40px 0 !important; /* للجوال */
                            text-align: center;
                        }
                    }
                </style> --}}

                <div class="breadcrumb-inner">
                    {{-- @if(!request()->is('product/*'))--}}
                    <h1 class="page-title">@yield('page-title')</h1>
                    {{-- @endif  --}}
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">{{__('Home')}}</a></li>
                        @if(request()->is(get_static_option('blog_page_slug').'/*') || request()->is(get_static_option('blog_page_slug').'-category'.'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('blog_page_slug')}}">{{get_static_option('blog_page_name')}}</a></li>

                        @elseif(request()->is(get_static_option('career_with_us_page_slug').'/*') || request()->is(get_static_option('career_with_us_page_slug').'-category'.'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('career_with_us_page_slug')}}">{{get_static_option('career_with_us_page_name')}}</a></li>
                        @elseif(request()->is(get_static_option('events_page_slug').'/*') || request()->is(get_static_option('events_page_slug').'-category'.'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('events_page_slug')}}">{{get_static_option('events_page_name')}}</a></li>
                        @elseif(request()->is(get_static_option('success_story_page_slug').'/*') || request()->is(get_static_option('success_story_page_slug').'-category'.'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('success_story_page_slug')}}">{{get_static_option('success_story_page_name')}}</a></li>

                        @elseif(request()->is(get_static_option('donation_page_slug').'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('donation_page_slug')}}">{{get_static_option('donation_page_name')}}</a></li>
                        @endif
                        {{-- <li>@yield('page-title')</li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
