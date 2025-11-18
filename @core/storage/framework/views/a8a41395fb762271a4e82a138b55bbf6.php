<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('donation_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Search For:')); ?> <?php echo e($search_term); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('donation_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('donation_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="donation-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $all_donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4">
                        <?php if (isset($component)) { $__componentOriginal0dbeab5a0eab7b709f7636644976f458 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0dbeab5a0eab7b709f7636644976f458 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.donation.grid','data' => ['featured' => $data->featured,'image' => $data->image,'amount' => $data->amount,'raised' => $data->raised,'slug' => $data->slug,'title' => $data->title,'excerpt' => $data->excerpt,'buttontext' => get_static_option('donation_button_text')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.donation.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['featured' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->featured),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->image),'amount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->amount),'raised' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->raised),'slug' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->slug),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->title),'excerpt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->excerpt),'buttontext' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_static_option('donation_button_text'))]); ?>
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
                    <div class="col-lg-12">
                        <div class="alert alert-warning d-block"><?php echo e(__('No Causes Associated with this')); ?> <?php echo e($search_term); ?></div>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <?php echo e($all_donations->links()); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/frontend/donations/donation-search.blade.php ENDPATH**/ ?>