<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Category:')); ?> <?php echo e(' '.$category_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Category:')); ?> <?php echo e(' '.$category_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="blog-content-area padding-top-100 padding-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                        <?php $__empty_1 = true; $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if (isset($component)) { $__componentOriginal506becbb1b33e53abfcc482b37ddb1e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal506becbb1b33e53abfcc482b37ddb1e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.blog.list01','data' => ['image' => $data->image,'date' => $data->created_at,'title' => $data->title,'slug' => $data->slug,'author' => $data->author,'catid' => $data->blog_categories_id,'content' => $data->blog_content]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.blog.list01'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->image),'date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->created_at),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->title),'slug' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->slug),'author' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->author),'catid' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->blog_categories_id),'content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->blog_content)]); ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="alert alert-danger">
                                <?php echo e(__('No Post Available In ').$category_name.__(' Category')); ?>

                            </div>
                        <?php endif; ?>
                    <div class="pagination-wrapper" aria-label="Page navigation">
                       <?php echo e($all_blogs->links()); ?>

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

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/frontend/pages/blog/blog-category.blade.php ENDPATH**/ ?>