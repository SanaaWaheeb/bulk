<div class="contribute-single-item">
    <div class="thumb">
        @if($featured === 'on')
            <span class="badge"><i class="fas fa-bookmark"></i></span>
        @endif
        {!! render_image_markup_by_attachment_id($image,'','grid') !!}
    </div>
    <div class="content">
        <div class="progress-content">
            <div class="progress-item">
                <div class="single-progressbar">
                    <div class="donation-progress" data-percentage="{{get_percentage($amount,$raised)}}"></div>
                </div>
            </div>
<div class="goal">
    <h4 class="raised">{{ __('Quantity') }}: {{ intval($raised ?? 0) }}</h4>
    <h4 class="raised">{{ __('Goal') }}: {{ intval($amount) }}</h4>
</div>

        </div>
        @php
            $locale = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
            $isEnglish = strpos($locale,'en') === 0;
            // Prefer explicit English/Arabic fields with safe fallbacks
            $resolvedTitle = $isEnglish
                ? ($titleEn ?? $title ?? $titleAr)
                : ($titleAr ?? $title ?? $titleEn);
        @endphp
        <h3 class="title">
            <a href="{{route('frontend.donations.single',$slug)}}">{{ $resolvedTitle }}</a>
        </h3>
        <h3 class="price">
            {{ __('Price') }}: {{ $price }}SR
        </h3>
        <div class="btn-wrapper margin-top-30">
            <a href="{{route('frontend.donations.single',$slug)}}" class="boxed-btn">{{__('Details')}}</a>
        </div>
    </div>
</div>