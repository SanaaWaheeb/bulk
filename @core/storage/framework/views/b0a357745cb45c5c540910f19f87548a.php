
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Form Section')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Form Section Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.contact.page.form.area')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="contact_page_form_section_title"><?php echo e(__('Title')); ?></label>
                                <input type="text" name="contact_page_form_section_title" value="<?php echo e(get_static_option('contact_page_form_section_title')); ?>" class="form-control" id="contact_page_form_section_title">
                            </div>
                            <div class="form-group">
                                <label for="contact_page_form_submit_btn_text"><?php echo e(__('Button Text')); ?></label>
                                <input type="text" name="contact_page_form_submit_btn_text" value="<?php echo e(get_static_option('contact_page_form_submit_btn_text')); ?>" class="form-control" id="contact_page_form_submit_btn_text">
                            </div>

                            <div class="form-group">
                                <label for="contact_page_form_receiving_mail"><?php echo e(__('Contact Form Mail')); ?></label>
                                <input type="text" name="contact_page_form_receiving_mail" value="<?php echo e(get_static_option('contact_page_form_receiving_mail')); ?>" class="form-control" id="contact_page_form_receiving_mail">
                                <span class="info-text"><?php echo e(__('you will get mail to this address. when anyone submit contact form.')); ?></span>
                            </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        <?php if (isset($component)) { $__componentOriginal26b641e1adcfef4e774221a3ed7c52ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26b641e1adcfef4e774221a3ed7c52ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn.update','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('btn.update'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26b641e1adcfef4e774221a3ed7c52ce)): ?>
<?php $attributes = $__attributesOriginal26b641e1adcfef4e774221a3ed7c52ce; ?>
<?php unset($__attributesOriginal26b641e1adcfef4e774221a3ed7c52ce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26b641e1adcfef4e774221a3ed7c52ce)): ?>
<?php $component = $__componentOriginal26b641e1adcfef4e774221a3ed7c52ce; ?>
<?php unset($__componentOriginal26b641e1adcfef4e774221a3ed7c52ce); ?>
<?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/backend/pages/contact-page/form-section.blade.php ENDPATH**/ ?>