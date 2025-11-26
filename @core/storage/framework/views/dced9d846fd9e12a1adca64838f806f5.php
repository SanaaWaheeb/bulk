
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
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Our Mission Section')); ?>

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
                        <h4 class="header-title"><?php echo e(__('Our Mission Section Settings')); ?></h4>

                        <form action="<?php echo e(route('admin.about.our.mission')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>




                            <div class="form-group">
                                <label for="about_page_our_mission_title"><?php echo e(__('Title')); ?></label>
                                <input type="text" name="about_page_our_mission_title"
                                       value="<?php echo e(get_static_option('about_page_our_mission_title')); ?>"
                                       class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="about_page_our_mission_description"><?php echo e(__('Description')); ?></label>
                                <input type="hidden"
                                       name="about_page_our_mission_description">
                                <div class="summernote"
                                     data-content='<?php echo e(get_static_option('about_page_our_mission_description')); ?>'></div>
                            </div>


                            <div class="form-group">
                                <label for="about_page_image_one"><?php echo e(__('Left Image')); ?></label>
                                <?php $signature_image_upload_btn_label = 'Upload Image'; ?>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $signature_img = get_attachment_image_by_id(get_static_option('about_page_our_mission_left_image_image'),null,false);
                                        ?>
                                        <?php if(!empty($signature_img)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb"
                                                             src="<?php echo e($signature_img['img_url']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $signature_image_upload_btn_label = 'Change Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" name="about_page_our_mission_left_image_image"
                                           value="<?php echo e(get_static_option('about_page_our_mission_left_image_image')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn"
                                            data-btntitle="<?php echo e(__('Select Image')); ?>"
                                            data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                            data-imgid="<?php echo e(get_static_option('about_page_our_mission_left_image_image')); ?>"
                                            data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($signature_image_upload_btn_label)); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('recommended image size is 650x380 pixel')); ?></small>
                            </div>
                            <?php
                                $all_icon_fields =  get_static_option('about_page_our_mission_list_section_icon');
                                $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : ['fas fa-check'];
                            ?>
                            <?php $__currentLoopData = $all_icon_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $icon_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="iconbox-repeater-wrapper">
                                    <div class="all-field-wrap">



                                                <?php
                                                    $all_title_fields = get_static_option('about_page_our_mission_list_section_title');
                                                    $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : ['If you want to change the world'];
                                                ?>


                                                <div class="form-group">
                                                    <label for="about_page_our_mission_list_section_title"><?php echo e(__('Title')); ?></label>
                                                    <input type="text" name="about_page_our_mission_list_section_title[]" class="form-control" value="<?php echo e($all_title_fields[$index] ?? ''); ?>">
                                                </div>


                                            <div class="form-group">
                                                <label for="about_page_our_mission_list_section_icon" class="d-block"><?php echo e(__('Icon')); ?></label>
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
                                                <input type="hidden" class="form-control" value="<?php echo e($icon_field); ?>" name="about_page_our_mission_list_section_icon[]">
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
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
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

                $('.summernote').summernote({
                    height: 200,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function (contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });

                if ($('.summernote').length > 0) {
                    $('.summernote').each(function (index, value) {
                        $(this).summernote('code', $(this).data('content'));
                    });
                }

            });
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/backend/pages/about-page/our-mission-section.blade.php ENDPATH**/ ?>