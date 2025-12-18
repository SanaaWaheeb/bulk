<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
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
    'reward'        => null,]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
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
    'reward'        => null,]); ?>
<?php foreach (array_filter(([
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
    'reward'        => null,]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
    '
    <?php
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
?>

<div class="contribute-single-item card h-100 shadow-sm border-0 donation-card">

    
    <div class="thumb position-relative">
        <a href="<?php echo e(route('frontend.donations.single', $slug)); ?>">
            <?php echo render_image_markup_by_attachment_id($imgId, '', 'grid'); ?>

        </a>

        <div class="position-absolute top-0 start-0 m-2 d-flex gap-2 flex-wrap">
            <?php if(!empty($featured) && $featured === 'on'): ?>
                <span class="badge bg-success"><i class="las la-award"></i> مميز</span>
            <?php endif; ?>
            <?php if(!empty($reward) && $reward === 'on'): ?>
                <span class="badge bg-info text-dark"><i class="las la-gift"></i> مكافأة</span>
            <?php endif; ?>

            
            <?php if($isDone): ?>
                <span class="badge bg-primary">مكتمل</span>
            <?php elseif($isExpired): ?>
                <span class="badge bg-secondary">منتهي</span>
            <?php elseif($isSoon): ?>
                <span class="badge bg-warning text-dark">قريب ينتهي</span>
            <?php endif; ?>
        </div>
    </div>

    <div class="content p-3 d-flex flex-column">

        
        <h3 class="title mb-2">
            <a href="<?php echo e(route('frontend.donations.single', $slug)); ?>" class="text-decoration-none">
                <?php echo e($title); ?>

            </a>
        </h3>
<?php if(!is_null($marketPriceVal)): ?>
    <div class="price h6 mb-1">
        <?php echo e(__('Market Price')); ?>: <?php echo e(number_format($marketPriceVal, 0, '.', ',')); ?>

    </div>
<?php endif; ?>

        
        <?php if(!is_null($priceVal)): ?>
            <div class="price h6 mb-2"><?php echo e(__('Price')); ?>: <?php echo e(number_format($priceVal, 0, '.', ',')); ?></div>
        <?php endif; ?>

        
        <?php if(!empty($excerpt)): ?>
            <div class="excpert text-muted small mb-3">
                <?php echo e(\Illuminate\Support\Str::limit(strip_tags($excerpt), 120)); ?>

            </div>
        <?php endif; ?>

        
        <div class="progress-content mb-2">
            <div class="single-progressbar">
                <div class="donation-progress"
                     data-percentage="<?php echo e($progress); ?>"
                     style="width: <?php echo e($progress); ?>%;"></div>
            </div>

            <div class="d-flex justify-content-between text-muted small mt-2 goal">
                <span><?php echo e(__('Raised')); ?>: <strong><?php echo e(number_format($raisedAmt, 0, '.', ',')); ?></strong></span>
                <span><?php echo e(__('Goal')); ?>: <strong><?php echo e(number_format($goal, 0, '.', ',')); ?></strong></span>
                <span><?php echo e($progress); ?>%</span>
            </div>
        </div>

        
        <?php if($deadlineD): ?>
            <div class="text-muted small mb-2">
                <?php if($isExpired): ?>
                 <?php echo e(__('Expired at')); ?>: <?php echo e($deadlineD->format('Y-m-d')); ?>

                <?php elseif(!is_null($daysLeft)): ?>
                 <?php echo e(__('Ends in')); ?>: <?php echo e($daysLeft); ?> <?php echo e(__('days')); ?> (<?php echo e($deadlineD->format('Y-m-d')); ?>)
                <?php endif; ?>
            </div>
        <?php endif; ?>

        
        <div class="btn-wrapper mt-auto">
            <a href="<?php echo e(route('frontend.donations.single', $slug)); ?>" class="boxed-btn w-100">
                <?php echo e($buttontext ?? __(' التفاصيل')); ?>

            </a>
        </div>
    </div>
</div>


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
<?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/components/frontend/donation/grid.blade.php ENDPATH**/ ?>