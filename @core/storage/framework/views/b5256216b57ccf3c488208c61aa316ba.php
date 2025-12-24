<?php
    $locale   = app()->getLocale();
    $isArabic = (strpos($locale, 'ar') === 0);

    // العنوان
    $titleAr = $page_post->title ?? '';
    $titleEn = $page_post->title_en ?? '';

    $pageTitle = $isArabic
        ? ($titleAr ?: $titleEn)
        : ($titleEn ?: $titleAr);

    // المحتوى
    $contentAr = $page_post->page_content ?? '';
    $contentEn = $page_post->page_content_en ?? '';

    $pageContent = $isArabic
        ? ($contentAr ?: $contentEn)
        : ($contentEn ?: $contentAr);

    // الميتا ديسكربشن (لو عملت أعمدة *_en هتشتغل، لو لأ هتستخدم نفس القيمة)
    $metaDescAr = $page_post->meta_description ?? '';
    $metaDescEn = $page_post->meta_description_en ?? null;
    $metaDescription = $isArabic
        ? ($metaDescAr ?: $metaDescEn)
        : ($metaDescEn ?: $metaDescAr);

    // الميتا تاجز
    $metaTagsAr = $page_post->meta_tags ?? '';
    $metaTagsEn = $page_post->meta_tags_en ?? null;
    $metaTags = $isArabic
        ? ($metaTagsAr ?: $metaTagsEn)
        : ($metaTagsEn ?: $metaTagsAr);

    // OG Meta Title
    $ogTitleAr = $page_post->og_meta_title ?? '';
    $ogTitleEn = $page_post->og_meta_title_en ?? null;
    $ogTitle = $isArabic
        ? ($ogTitleAr ?: $ogTitleEn)
        : ($ogTitleEn ?: $ogTitleAr);

    // OG Meta Description
    $ogDescAr = $page_post->og_meta_description ?? '';
    $ogDescEn = $page_post->og_meta_description_en ?? null;
    $ogDesc = $isArabic
        ? ($ogDescAr ?: $ogDescEn)
        : ($ogDescEn ?: $ogDescAr);
?>

<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($metaDescription); ?>">
    <meta name="tags" content="<?php echo e($metaTags); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e($pageTitle); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e($pageTitle); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('og-meta'); ?>
    <meta name="og:title" content="<?php echo e($ogTitle); ?>">
    <meta name="og:description" content="<?php echo e($ogDesc); ?>">
    <?php echo render_og_meta_image_by_attachment_id($page_post->og_meta_image); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="dynamic-page-content-area padding-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if(!auth()->guard('web')->check() && $page_post->visibility === 'everyone'): ?>
                        <div class="dynamic-page-content-wrap">
                            <?php echo $pageContent; ?>

                        </div>
                    <?php elseif(auth()->guard('web')->check()): ?>
                        <div class="dynamic-page-content-wrap">
                            <?php echo $pageContent; ?>

                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <p>
                                <a class="text-primary" href="<?php echo e(route('user.login')); ?>"><?php echo e(__('login')); ?></a>
                                <?php echo e(__(' to see this page')); ?>

                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/pages/dynamic-single.blade.php ENDPATH**/ ?>