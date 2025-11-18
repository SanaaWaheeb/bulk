<div class="contribute-single-item">
    <div class="thumb">
        <?php if($featured === 'on'): ?>
            <span class="badge"><i class="fas fa-bookmark"></i></span>
        <?php endif; ?>
        <?php echo render_image_markup_by_attachment_id($image,'','grid'); ?>

    </div>
    <div class="content">
        <div class="progress-content">
            <div class="progress-item">
                <div class="single-progressbar">
                    <div class="donation-progress" data-percentage="<?php echo e(get_percentage($amount,$raised)); ?>"></div>
                </div>
            </div>
<div class="goal">
    <h4 class="raised"><?php echo e(__('الكمية')); ?>: <?php echo e(intval($raised ?? 0)); ?></h4>
    <h4 class="raised"><?php echo e(__('الهدف')); ?>: <?php echo e(intval($amount)); ?></h4>
</div>

        </div>
        <h3 class="title">
            <a href="<?php echo e(route('frontend.donations.single',$slug)); ?>"><?php echo e($titleAr); ?></a>
            
<h3 class="price">
    السعر: <?php echo e($price); ?>SR
</h3>

        <div class="btn-wrapper margin-top-30">
            <a href="<?php echo e(route('frontend.donations.single',$slug)); ?>" class="boxed-btn"><?php echo e($buttontext); ?></a>
        </div>
    </div>
</div><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/components/frontend/donation/related.blade.php ENDPATH**/ ?>