<?php
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
        ? ($titleAr ?: ($titleEn ?: $baseTitle))
        : ($titleEn ?: ($titleAr ?: $baseTitle));

    // ✅ المحتوى حسب اللغة مع Fallback
    $contentAr   = $blog_post->blog_content_ar ?? null;
    $contentEn   = $blog_post->blog_content_en ?? null;
    $baseContent = $blog_post->blog_content;

    $displayContent = $isArabic
        ? ($contentAr ?: ($contentEn ?: $baseContent))
        : ($contentEn ?: ($contentAr ?: $baseContent));

    // ✅ المؤلف حسب اللغة مع Fallback
    $authorAr   = $blog_post->author_ar ?? null;
    $authorEn   = $blog_post->author_en ?? null;
    $baseAuthor = $blog_post->author;

    $displayAuthor = $isArabic
        ? ($authorAr ?: ($authorEn ?: $baseAuthor))
        : ($authorEn ?: ($authorAr ?: $baseAuthor));

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
?>

<?php $__env->startSection('style'); ?>
    <?php if(!empty(get_static_option('site_disqus_key'))): ?>
        <script id="dsq-count-scr" src="//<?php echo e(get_static_option('site_disqus_key')); ?>.disqus.com/count.js" async></script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('og-meta'); ?>
    <meta name="og:title" content="<?php echo e(purify_html($blog_post->og_meta_title)); ?>">
    <meta name="og:description" content="<?php echo e(purify_html($blog_post->og_meta_description)); ?>">
    <?php echo render_og_meta_image_by_attachment_id($blog_post->og_meta_image); ?>

    <meta name="og:tags" content="<?php echo e(purify_html($blog_post->meta_tags)); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(purify_html($blog_post->meta_description)); ?>">
    <meta name="tags" content="<?php echo e(purify_html($blog_post->meta_tags)); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e(purify_html($displayTitle)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(purify_html($displayTitle)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="blog-details-content-area padding-top-100 padding-bottom-60">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8">
                    <div class="blog-details-item">
                        <div class="thumb">
                            <?php if(!empty($blog_image)): ?>
                                <img src="<?php echo e($blog_image['img_url']); ?>" alt="<?php echo e(purify_html($displayTitle)); ?>">
                            <?php endif; ?>
                        </div>

                        <div class="entry-content">
                            <ul class="post-meta">
                                <li>
                                    <i class="fas fa-calendar-alt"></i>
                                    <?php echo e(date_format($blog_post->created_at,'d M Y')); ?>

                                </li>
                                <li>
                                    <i class="fas fa-user"></i>
                                    <?php echo e(purify_html($displayAuthor)); ?>

                                </li>
                                <li>
                                    <div class="cats">
                                        <i class="fas fa-folder"></i>
                                        <?php
                                            $locale    = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
                                            $isEnglish = (strpos(strtolower($locale), 'en') === 0);
                                            $catObj    = \App\BlogCategory::find($blog_post->blog_categories_id);
                                        ?>
                                        <?php if($catObj): ?>
                                            <?php
                                                $catName = $isEnglish && !empty($catObj->name_en) ? $catObj->name_en : $catObj->name;
                                                $catSlug = Str::slug($catName);
                                            ?>
                                            <a href="<?php echo e(route('frontend.blog.category', ['id' => $catObj->id, 'any' => $catSlug])); ?>"><?php echo e(purify_html($catName)); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            </ul>

                            <div class="content-area mt-4">
                                <?php echo $displayContent; ?>

                            </div>
                        </div>

                        
                        <div class="blog-details-footer">
                            <?php
                                $all_tags = explode(',', purify_html($blog_post->tags));
                            ?>

                            <?php if(count($all_tags) > 1): ?>
                                <div class="left">
                                    <ul class="tags">
                                        <li class="title">
                                            <?php echo e(get_static_option('blog_single_page_tags_title_' . $locale)
                                                ?? get_static_option('blog_single_page_tags_title')); ?>

                                        </li>
                                        <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $slug = Str::slug($tag); ?>
                                            <?php if(!empty($slug)): ?>
                                                <li>
                                                    <a href="<?php echo e(route('frontend.blog.tags.page',['name' => $slug])); ?>">
                                                        <?php echo e($tag); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="right">
    <ul class="social-share">
        <li class="title">
            <?php echo e($shareTitle); ?>

        </li>
        <?php echo single_post_share(
            route('frontend.blog.single', purify_html($blog_post->slug)),
            purify_html($displayTitle),
            $post_img
        ); ?>

    </ul>
</div>
                        </div>
                    </div>

                    
                    <?php if(count($all_related_blog) > 1): ?>
                        <div class="related-post-area margin-top-40">
                            <div class="section-title ">
    <h4 class="title "><?php echo e($relatedTitle); ?></h4>
</div>

                            <div class="related-news-carousel global-carousel-init"
                                 data-desktopitem="2"
                                 data-mobileitem="1"
                                 data-tabletitem="1"
                                 data-margin="30"
                                 data-dots="true">
                                <?php $__currentLoopData = $all_related_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($data->id === $blog_post->id): ?> <?php continue; ?> <?php endif; ?>

                                    <?php
                                        $relTitleAr = $data->title_ar ?? null;
                                        $relTitleEn = $data->title_en ?? null;
                                        $relBase    = $data->title;

                                        $relDisplayTitle = $isArabic
                                            ? ($relTitleAr ?: ($relTitleEn ?: $relBase))
                                            : ($relTitleEn ?: ($relTitleAr ?: $relBase));
                                    ?>

                                    <?php if (isset($component)) { $__componentOriginal87dfc884a4868c21befea7ea652e455b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal87dfc884a4868c21befea7ea652e455b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.blog.grid01','data' => ['image' => $data->image,'date' => $data->created_at,'author' => $data->author,'catid' => $data->blog_categories_id,'slug' => $data->slug,'title' => $relDisplayTitle]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.blog.grid01'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->image),'date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->created_at),'author' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->author),'catid' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->blog_categories_id),'slug' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->slug),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($relDisplayTitle)]); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal87dfc884a4868c21befea7ea652e455b)): ?>
<?php $attributes = $__attributesOriginal87dfc884a4868c21befea7ea652e455b; ?>
<?php unset($__attributesOriginal87dfc884a4868c21befea7ea652e455b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal87dfc884a4868c21befea7ea652e455b)): ?>
<?php $component = $__componentOriginal87dfc884a4868c21befea7ea652e455b; ?>
<?php unset($__componentOriginal87dfc884a4868c21befea7ea652e455b); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <div class="disqus-comment-area margin-top-40">
                        <div id="disqus_thread"></div>
                    </div>
                </div>

                
                <div class="col-lg-4">
                    <div class="widget-area">
                        <?php echo render_frontend_sidebar('blog',['column' => false]); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if(!empty(get_static_option('site_disqus_key'))): ?>
        <div id="disqus_thread"></div>
        <script>
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://<?php echo e(get_static_option('site_disqus_key')); ?>.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/pages/blog/blog-single.blade.php ENDPATH**/ ?>