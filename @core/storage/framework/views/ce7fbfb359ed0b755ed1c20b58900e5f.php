<?php
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
?>

<div class="blog-classic-item-01 margin-bottom-60">
    <div class="thumbnail">
        <a href="<?php echo e(route('frontend.blog.single', $slug)); ?>">
            <?php echo render_image_markup_by_attachment_id($image); ?>

        </a>
    </div>

    <div class="content-wrapper">
        <div class="news-date">
            <h5 class="title"><?php echo e(date('d', strtotime($date))); ?></h5>
            <span><?php echo e(date('M', strtotime($date))); ?></span>
        </div>

        <div class="content">
            <ul class="post-meta">
                <li>
                    <a href="<?php echo e(route('frontend.blog.single', $slug)); ?>">
                        <?php echo e(__('By')); ?>

                        <span><?php echo e($author ?? __('Anonymous')); ?></span>
                    </a>
                </li>
                <li class="cats">
                    <i class="fas fa-microchip"></i>
                    <?php if(isset($catid)): ?>
                        <?php
                            $locale    = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
                            $isEnglish = (strpos(strtolower($locale), 'en') === 0);
                            $catObj    = \App\BlogCategory::find($catid);
                        ?>
                        <?php if($catObj): ?>
                            <?php
                                $catName = $isEnglish && !empty($catObj->name_en) ? $catObj->name_en : $catObj->name;
                                $catSlug = Str::slug($catName);
                            ?>
                            <a href="<?php echo e(route('frontend.blog.category', ['id' => $catObj->id, 'any' => $catSlug])); ?>"><?php echo e(purify_html($catName)); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </li>
            </ul>

            <h4 class="title">
                <a href="<?php echo e(route('frontend.blog.single', $slug)); ?>">
                    <?php echo e($title ?? ''); ?>

                </a>
            </h4>
        </div>
    </div>

    <div class="blog-bottom">
        <p><?php echo Str::words(purify_html_raw(strip_tags($content)), 80); ?></p>
        <div class="btn-wrapper">
            <a href="<?php echo e(route('frontend.blog.single', $slug)); ?>" class="boxed-btn reverse-color">
                <?php echo e($readMoreText); ?>

            </a>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/components/frontend/blog/list01.blade.php ENDPATH**/ ?>