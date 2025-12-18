@props([
    'featured'      => null,
    'image'         => null,
    'amount'        => 0,
    'raised'        => 0,
    'price'         => null,
    'market_price'  => null,
    'slug'          => '',
    'title'         => null,
    'title_ar'      => null,
    'excerpt'       => null,
    'deadline'      => null,
    'reward'        => null,])
    @php
    // عناوين/قيم افتراضية آمنة
    $title      = $title ?? ($title_ar ?? '');
    $imgId      = $image ?? null;
    $goal       = (float)($amount ?? 0);
    $raisedAmt  = (float)($raised ?? 0);
    $priceVal   = isset($price) ? (float)$price : null;
    $marketPriceVal = isset($market_price) ? (float)$market_price : null;

    // نسبة التقدّم
    $progress   = $goal > 0 ? min(100, round(($raisedAmt / max($goal,1)) * 100)) : 0;

    // المدة (deadline)
    $deadlineD  = !empty($deadline) ? \Carbon\Carbon::parse($deadline) : null;
    $isExpired  = $deadlineD ? $deadlineD->isPast() : false;
    $isSoon     = $deadlineD && $deadlineD->isFuture() && $deadlineD->lte(now()->addDays(5));
    $daysLeft   = $deadlineD ? now()->diffInDays($deadlineD, false) : null; // سالب = منتهي

    // مكتمل تمويلاً (بلغ/تجاوز الهدف)
    $isDone     = $goal > 0 && $raisedAmt >= $goal;
@endphp

<div class="contribute-single-item card h-100 shadow-sm border-0 donation-card">

    {{-- الصورة + الشارات --}}
    <div class="thumb position-relative">
        <a href="{{ route('frontend.donations.single', $slug) }}">
            {!! render_image_markup_by_attachment_id($imgId, '', 'grid') !!}
        </a>

        <div class="position-absolute top-0 start-0 m-2 d-flex gap-2 flex-wrap">
            @if(!empty($featured) && $featured === 'on')
                <span class="badge bg-success"><i class="las la-award"></i> مميز</span>
            @endif
            @if(!empty($reward) && $reward === 'on')
                <span class="badge bg-info text-dark"><i class="las la-gift"></i> مكافأة</span>
            @endif

            {{-- شارات الحالة وفق منطق الفرز --}}
            {{-- @if($isDone)
                <span class="badge bg-primary">مكتمل</span>
            @elseif($isExpired)
                <span class="badge bg-secondary">منتهي</span>
            @elseif($isSoon)
                <span class="badge bg-warning text-dark">قريب ينتهي</span>
            @endif --}}
        </div>
    </div>

    <div class="content p-3 d-flex flex-column">

        {{-- العنوان --}}
        <h3 class="title mb-2">
            <a href="{{ route('frontend.donations.single', $slug) }}" class="text-decoration-none">
                {{ $title }}
            </a>
        </h3>
@if(!is_null($marketPriceVal))
    <div class="price h6 mb-1">
        {{ __('Market Price') }}: {{ number_format($marketPriceVal, 0, '.', ',') }}
    </div>
@endif

        {{-- السعر (إن وُجد) - أرقام فقط بدون ريال --}}
        @if(!is_null($priceVal))
            <div class="price h6 mb-2">{{ __('Price') }}: {{ number_format($priceVal, 0, '.', ',') }}</div>
        @endif

        {{-- وصف مختصر --}}
        @if(!empty($excerpt))
            <div class="excpert text-muted small mb-3">
                {{ \Illuminate\Support\Str::limit(strip_tags($excerpt), 120) }}
            </div>
        @endif

        {{-- شريط التقدّم + أرقام واضحة --}}
        <div class="progress-content mb-2">
            <div class="single-progressbar">
                <div class="donation-progress"
                     data-percentage="{{ $progress }}"
                     style="width: {{ $progress }}%;"></div>
            </div>

            <div class="d-flex justify-content-between text-muted small mt-2 goal">
                <span>{{ __('Raised') }}: <strong>{{ number_format($raisedAmt, 0, '.', ',') }}</strong></span>
                <span>{{ __('Goal') }}: <strong>{{ number_format($goal, 0, '.', ',') }}</strong></span>
                <span>{{ $progress }}%</span>
            </div>
        </div>

        {{-- معلومات المدة --}}
        @if($deadlineD)
            <div class="text-muted small mb-2">
                @if($isExpired)
                 {{ __('Expired at') }}: {{ $deadlineD->format('Y-m-d') }}
                @elseif(!is_null($daysLeft))
                 {{ __('Ends in') }}: {{ $daysLeft }} {{ __('days') }} ({{ $deadlineD->format('Y-m-d') }})
                @endif
            </div>
        @endif

        {{-- زر التفاصيل --}}
        <div class="btn-wrapper mt-auto">
            <a href="{{ route('frontend.donations.single', $slug) }}" class="boxed-btn w-100">
                {{ $buttontext ?? __('Details') }}
            </a>
        </div>
    </div>
</div>

{{-- تحسينات خفيفة في حال نقص CSS بالثيم + منع أي "ريال" يضاف تلقائياً --}}
<style>
    .donation-card .thumb img { width:100%; height:auto; display:block; }
    .single-progressbar { background:#eee; height:8px; border-radius:6px; overflow:hidden; }
    .single-progressbar .donation-progress { background:#0d6efd; height:8px; transition:width .35s ease; }

    /* لو الثيم يضيف "ريال" عبر ::before/::after على الأرقام داخل .goal أو .price */
    .goal strong::before, .goal strong::after,
    .goal span::before,   .goal span::after,
    .price::before,       .price::after,
    .price *::before,     .price *::after {
        content: '' !important;
    }
    .currency, .currency-symbol, .currency_sign, .currencySymbol, .currency-icon, .amount-suffix {
        display: none !important;
    }
</style>
