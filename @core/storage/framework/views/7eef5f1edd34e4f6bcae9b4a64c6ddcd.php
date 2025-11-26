
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('What We Do Area')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
   <?php if (isset($component)) { $__componentOriginalbc1bcd20222d67be5eb46ea1d22a74fa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc1bcd20222d67be5eb46ea1d22a74fa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc1bcd20222d67be5eb46ea1d22a74fa)): ?>
<?php $attributes = $__attributesOriginalbc1bcd20222d67be5eb46ea1d22a74fa; ?>
<?php unset($__attributesOriginalbc1bcd20222d67be5eb46ea1d22a74fa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc1bcd20222d67be5eb46ea1d22a74fa)): ?>
<?php $component = $__componentOriginalbc1bcd20222d67be5eb46ea1d22a74fa; ?>
<?php unset($__componentOriginalbc1bcd20222d67be5eb46ea1d22a74fa); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('What We Do Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.about.what.we.do')); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="form-group">
                                <label for="about_page_what_we_do_area_subtitle"><?php echo e(__('Subtitle')); ?></label>
                                <input type="text" name="about_page_what_we_do_area_subtitle" class="form-control" value="<?php echo e(get_static_option('about_page_what_we_do_area_subtitle')); ?>" >
                            </div>
                            <div class="form-group">
                                <label for="about_page_what_we_do_area_title"><?php echo e(__('Title')); ?></label>
                                <input type="text" name="about_page_what_we_do_area_title" class="form-control" value="<?php echo e(get_static_option('about_page_what_we_do_area_title')); ?>" >
                                <?php if (isset($component)) { $__componentOriginala016af0f73efec29b611c0af18e9f8e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala016af0f73efec29b611c0af18e9f8e3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.title-info-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('title-info-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala016af0f73efec29b611c0af18e9f8e3)): ?>
<?php $attributes = $__attributesOriginala016af0f73efec29b611c0af18e9f8e3; ?>
<?php unset($__attributesOriginala016af0f73efec29b611c0af18e9f8e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala016af0f73efec29b611c0af18e9f8e3)): ?>
<?php $component = $__componentOriginala016af0f73efec29b611c0af18e9f8e3; ?>
<?php unset($__componentOriginala016af0f73efec29b611c0af18e9f8e3); ?>
<?php endif; ?>
                            </div>

                            <?php
                                $all_icon_fields =  get_static_option('about_page_what_we_do_section_icon');
                                $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : ['flaticon-transfusion'];
                            ?>
                            <?php $__currentLoopData = $all_icon_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $icon_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="iconbox-repeater-wrapper">
                                    <div class="all-field-wrap">
                                        <div class="tab-content margin-top-30" id="myTabContent">

                                                <?php
                                                    $all_title_fields = get_static_option('about_page_what_we_do_section_title');
                                                    $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : ['Education'];
                                                    $all_description_fields = get_static_option('about_page_what_we_do_section_description');
                                                    $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields) : ['We are a non-profit organisation in USA that works towards supporting underprivileged children.'];
                                                    $all_url_fields =  get_static_option('about_page_what_we_do_section_url');
                                                    $all_url_fields = !empty($all_url_fields) ? unserialize($all_url_fields) : ['#'];
                                                ?>


                                                <div class="form-group">
                                                    <label for="about_page_what_we_do_section_title"><?php echo e(__('Title')); ?></label>
                                                    <input type="text" name="about_page_what_we_do_section_title[]" class="form-control" value="<?php echo e($all_title_fields[$index] ?? ''); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="about_page_what_we_do_section_description"><?php echo e(__('Description')); ?></label>
                                                    <textarea name="about_page_what_we_do_section_description[]" class="form-control"><?php echo e($all_description_fields[$index] ?? ''); ?></textarea>
                                                </div>


                                            <div class="form-group">
                                                <label for="about_page_what_we_do_section_url"><?php echo e(__('Description')); ?></label>
                                                <input type="text" name="about_page_what_we_do_section_url[]" class="form-control" value="<?php echo e($all_url_fields[$index] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="about_page_what_we_do_section_icon" class="d-block"><?php echo e(__('Icon')); ?></label>
                                                <div class="btn-group ">
                                                    <button type="button" class="btn btn-primary iconpicker-component">
                                                        <i class="<?php echo e($icon_field); ?>"></i>
                                                    </button>
                                                    <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                                            data-selected="<?php echo e($icon_field); ?>" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu"></div>
                                                </div>
                                                <input type="hidden" class="form-control" value="<?php echo e($icon_field); ?>" name="about_page_what_we_do_section_icon[]">
                                            </div>
                                        </div>
                                        <div class="action-wrap">
                                            <span class="add"><i class="ti-plus"></i></span>
                                            <span class="remove"><i class="ti-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php if (isset($component)) { $__componentOriginal30010316c0a1e9c75a215f3e4afb9aad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30010316c0a1e9c75a215f3e4afb9aad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.repeater','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal30010316c0a1e9c75a215f3e4afb9aad)): ?>
<?php $attributes = $__attributesOriginal30010316c0a1e9c75a215f3e4afb9aad; ?>
<?php unset($__attributesOriginal30010316c0a1e9c75a215f3e4afb9aad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30010316c0a1e9c75a215f3e4afb9aad)): ?>
<?php $component = $__componentOriginal30010316c0a1e9c75a215f3e4afb9aad; ?>
<?php unset($__componentOriginal30010316c0a1e9c75a215f3e4afb9aad); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala0e26e14dccb4c6f47b348299e1d64c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala0e26e14dccb4c6f47b348299e1d64c6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon-picker-activate-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon-picker-activate-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala0e26e14dccb4c6f47b348299e1d64c6)): ?>
<?php $attributes = $__attributesOriginala0e26e14dccb4c6f47b348299e1d64c6; ?>
<?php unset($__attributesOriginala0e26e14dccb4c6f47b348299e1d64c6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0e26e14dccb4c6f47b348299e1d64c6)): ?>
<?php $component = $__componentOriginala0e26e14dccb4c6f47b348299e1d64c6; ?>
<?php unset($__componentOriginala0e26e14dccb4c6f47b348299e1d64c6); ?>
<?php endif; ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/backend/pages/about-page/what-we-do-area.blade.php ENDPATH**/ ?>