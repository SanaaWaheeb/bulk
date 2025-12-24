<?php
    use Illuminate\Support\Str;

    // اللغة الحالية
    $locale   = app()->getLocale();
    $isArabic = Str::startsWith($locale, 'ar');

    // قيم الإعدادات (عربي / إنجليزي) مع Fallback
    $faqNameAr   = get_static_option('faq_page_name');
    $faqNameEn   = get_static_option('faq_page_name_en');

    $metaDescAr  = get_static_option('faq_page_meta_description');
    $metaDescEn  = get_static_option('faq_page_meta_description_en');

    $metaTagsAr  = get_static_option('faq_page_meta_tags');
    $metaTagsEn  = get_static_option('faq_page_meta_tags_en');

    $pageTitle = $isArabic
        ? ($faqNameAr ?: $faqNameEn)
        : ($faqNameEn ?: $faqNameAr);

    $pageMetaDesc = $isArabic
        ? ($metaDescAr ?: $metaDescEn)
        : ($metaDescEn ?: $metaDescAr);

    $pageMetaTags = $isArabic
        ? ($metaTagsAr ?: $metaTagsEn)
        : ($metaTagsEn ?: $metaTagsAr);
?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e($pageTitle); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title',     __('FAQ')); ?>

<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($pageMetaDesc); ?>">
    <meta name="tags" content="<?php echo e($pageMetaTags); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="faq-page-content-area padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion-wrapper">
                        <?php $rand_number = rand(9999,99999999); ?>
                        <div id="accordion_<?php echo e($rand_number); ?>">
                            <?php $__currentLoopData = $all_faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $aria_expanded = $data->is_open === 'on' ? 'true' : 'false';

                                    // سؤال وجواب حسب اللغة مع Fallback
                                    $questionAr = $data->title ?? '';
                                    $questionEn = $data->title_en ?? '';

                                    $answerAr   = $data->description ?? '';
                                    $answerEn   = $data->description_en ?? '';

                                    $question = $isArabic
                                        ? ($questionAr ?: $questionEn)
                                        : ($questionEn ?: $questionAr);

                                    $answer = $isArabic
                                        ? ($answerAr ?: $answerEn)
                                        : ($answerEn ?: $answerAr);
                                ?>

                                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingOne_<?php echo e($key); ?>" itemprop="name">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse"
                                               data-target="#collapseOne_<?php echo e($key); ?>"
                                               role="button"
                                               aria-expanded="<?php echo e($aria_expanded); ?>"
                                               aria-controls="collapseOne_<?php echo e($key); ?>">
                                                <?php echo e($question); ?>

                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne_<?php echo e($key); ?>"
                                         class="collapse <?php if($data->is_open == 'on'): ?> show <?php endif; ?>"
                                         aria-labelledby="headingOne_<?php echo e($key); ?>"
                                         data-parent="#accordion_<?php echo e($rand_number); ?>"
                                         itemscope
                                         itemprop="acceptedAnswer"
                                         itemtype="https://schema.org/Answer">
                                        <div class="card-body" itemprop="text">
                                            <?php echo $answer; ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> <!-- /#accordion -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/pages/faq-page.blade.php ENDPATH**/ ?>