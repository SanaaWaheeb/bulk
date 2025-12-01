

<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('donation_page_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('donation_page_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('donation_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('donation_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // نعرض سكشن "الطلبات المنتهية" مرة واحدة فقط
        $dividerShown = false;
    ?>

    <section class="donation-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">

                <?php $__empty_1 = true; $__currentLoopData = $all_donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $deadline  = !empty($data->deadline) ? \Carbon\Carbon::parse($data->deadline) : null;
                        $isExpired = $deadline && $deadline->isPast();
                    ?>

                    
                    <?php if($isExpired && !$dividerShown): ?>
                        <?php $dividerShown = true; ?>
                        <div class="col-12">
                            <hr class="my-4">
                            <h5 class="mb-1 text-muted"><?php echo e(__('Completed Orders')); ?></h5>
                            <p class="text-muted small mb-3">
                            <?php echo e(__('.The following items have expired and may not be available for order')); ?>

                            </p>
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-4">
                        <?php if (isset($component)) { $__componentOriginal0dbeab5a0eab7b709f7636644976f458 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0dbeab5a0eab7b709f7636644976f458 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.donation.grid','data' => ['featured' => $data->featured,'image' => $data->image,'amount' => $data->amount,'price' => $data->price,'raised' => $data->raised,'slug' => $data->slug,'title' => $data->title_ar,'excerpt' => $data->excerpt,'deadline' => $data->deadline,'reward' => $data->reward,'buttontext' => get_static_option('donation_button_text')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.donation.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['featured' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->featured),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->image),'amount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->amount),'price' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->price),'raised' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->raised),'slug' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->slug),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->title_ar),'excerpt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->excerpt),'deadline' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->deadline),'reward' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->reward),'buttontext' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_static_option('donation_button_text'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0dbeab5a0eab7b709f7636644976f458)): ?>
<?php $attributes = $__attributesOriginal0dbeab5a0eab7b709f7636644976f458; ?>
<?php unset($__attributesOriginal0dbeab5a0eab7b709f7636644976f458); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0dbeab5a0eab7b709f7636644976f458)): ?>
<?php $component = $__componentOriginal0dbeab5a0eab7b709f7636644976f458; ?>
<?php unset($__componentOriginal0dbeab5a0eab7b709f7636644976f458); ?>
<?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center py-5">
                        <h5 class="mb-3">لا توجد عناصر متاحة حالياً</h5>
                        <a href="<?php echo e(url()->current()); ?>" class="btn btn-outline-primary">تحديث الصفحة</a>
                    </div>
                <?php endif; ?>

                <div class="col-lg-12 text-center">
                    <nav class="pagination-wrapper" aria-label="Page navigation">
                        <?php echo e($all_donations->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/donations/donation.blade.php ENDPATH**/ ?>