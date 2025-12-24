<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('blog_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title',     __('Blogs')); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('blog_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('blog_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // detect current language (ar / en ...)
        $locale   = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
        $isArabic = (strpos($locale, 'ar') === 0);
    ?>

    <section class="blog-content-area our-attoryney padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
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
                        ?>

                        <?php if (isset($component)) { $__componentOriginal506becbb1b33e53abfcc482b37ddb1e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal506becbb1b33e53abfcc482b37ddb1e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.blog.list01','data' => ['image' => $data->image,'date' => $data->created_at,'title' => $title,'slug' => $data->slug,'author' => $author,'catid' => $data->blog_categories_id,'content' => $content]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.blog.list01'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->image),'date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->created_at),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title),'slug' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->slug),'author' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($author),'catid' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->blog_categories_id),'content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($content)]); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal506becbb1b33e53abfcc482b37ddb1e9)): ?>
<?php $attributes = $__attributesOriginal506becbb1b33e53abfcc482b37ddb1e9; ?>
<?php unset($__attributesOriginal506becbb1b33e53abfcc482b37ddb1e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal506becbb1b33e53abfcc482b37ddb1e9)): ?>
<?php $component = $__componentOriginal506becbb1b33e53abfcc482b37ddb1e9; ?>
<?php unset($__componentOriginal506becbb1b33e53abfcc482b37ddb1e9); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <nav class="pagination-wrapper" aria-label="Page navigation ">
                        <?php echo e($all_blogs->links()); ?>

                    </nav>
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

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/pages/blog/blog.blade.php ENDPATH**/ ?>