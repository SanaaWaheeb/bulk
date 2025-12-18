<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Header Slider')); ?>

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
    <?php echo $__env->make('backend.partials.datatable.style-enqueue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('All Header Slider')); ?></h4>
                        <div class="bulk-delete-wrapper">
                            <?php if (isset($component)) { $__componentOriginal8180badcd1fddcdf34da522024a988c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8180badcd1fddcdf34da522024a988c6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-action','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8180badcd1fddcdf34da522024a988c6)): ?>
<?php $attributes = $__attributesOriginal8180badcd1fddcdf34da522024a988c6; ?>
<?php unset($__attributesOriginal8180badcd1fddcdf34da522024a988c6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8180badcd1fddcdf34da522024a988c6)): ?>
<?php $component = $__componentOriginal8180badcd1fddcdf34da522024a988c6; ?>
<?php unset($__componentOriginal8180badcd1fddcdf34da522024a988c6); ?>
<?php endif; ?>
                        </div>


                               <div class="table-wrap table-responsive">
                                   <table class="table table-default">
                                       <thead>
                                       <?php if (isset($component)) { $__componentOriginal0a61083e9e3a5b32e89457ccd645fc66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0a61083e9e3a5b32e89457ccd645fc66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-th','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0a61083e9e3a5b32e89457ccd645fc66)): ?>
<?php $attributes = $__attributesOriginal0a61083e9e3a5b32e89457ccd645fc66; ?>
<?php unset($__attributesOriginal0a61083e9e3a5b32e89457ccd645fc66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0a61083e9e3a5b32e89457ccd645fc66)): ?>
<?php $component = $__componentOriginal0a61083e9e3a5b32e89457ccd645fc66; ?>
<?php unset($__componentOriginal0a61083e9e3a5b32e89457ccd645fc66); ?>
<?php endif; ?>
                                       <th><?php echo e(__('ID')); ?></th>
                                       <th><?php echo e(__('Image')); ?></th>
                                       <th><?php echo e(__('Title')); ?></th>
                                       <th><?php echo e(__('Description')); ?></th>
                                       <th><?php echo e(__('Action')); ?></th>
                                       </thead>
                                       <tbody>
                                       <?php $__currentLoopData = $all_header_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <?php $img_url =''; ?>
                                           <tr>
                                               <td>
                                                   <?php if (isset($component)) { $__componentOriginal2308964fa853e916af9b3619236fecd7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2308964fa853e916af9b3619236fecd7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-delete-checkbox','data' => ['id' => $data->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-delete-checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2308964fa853e916af9b3619236fecd7)): ?>
<?php $attributes = $__attributesOriginal2308964fa853e916af9b3619236fecd7; ?>
<?php unset($__attributesOriginal2308964fa853e916af9b3619236fecd7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2308964fa853e916af9b3619236fecd7)): ?>
<?php $component = $__componentOriginal2308964fa853e916af9b3619236fecd7; ?>
<?php unset($__componentOriginal2308964fa853e916af9b3619236fecd7); ?>
<?php endif; ?>
                                               </td>
                                               <td><?php echo e($data->id); ?></td>
                                               <td>
                                                   <?php echo render_attachment_preview_for_admin($data->image); ?>

                                               </td>
                                           <?php
                                                $locale   = app()->getLocale(); 
                                                $isArabic = $locale === 'ar' || \Illuminate\Support\Str::startsWith($locale, 'ar');
                                            ?>>

                                            <td>
                                                <?php if($isArabic): ?>
                                                    <?php echo e($data->title ?? ''); ?>

                                                <?php else: ?>
                                                    <?php echo e($data->title_en ?: $data->title ?? ''); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if($isArabic): ?>
                                                    <?php echo e($data->description ?? ''); ?>

                                                <?php else: ?>
                                                    <?php echo e($data->description_en ?: $data->description ?? ''); ?>

                                                <?php endif; ?>
                                            </td>


                                               <td>
                                                   <?php if (isset($component)) { $__componentOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-popover','data' => ['url' => route('admin.header.delete',$data->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.header.delete',$data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5)): ?>
<?php $attributes = $__attributesOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5; ?>
<?php unset($__attributesOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5)): ?>
<?php $component = $__componentOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5; ?>
<?php unset($__componentOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5); ?>
<?php endif; ?>
                                                <a href="#"
                                                    data-toggle="modal"
                                                    data-target="#header_slider_item_edit_modal"
                                                    class="btn btn-lg btn-primary btn-sm mb-3 mr-1 header_slider_edit_btn"
                                                    data-id="<?php echo e($data->id); ?>"
                                                    data-title="<?php echo e($data->title); ?>"                  
                                                    data-title_en="<?php echo e($data->title_en); ?>"            
                                                    data-subtitle="<?php echo e($data->subtitle); ?>"            
                                                    data-subtitle_en="<?php echo e($data->subtitle_en); ?>"      
                                                    data-imageid="<?php echo e($data->image); ?>"
                                                    <?php echo render_img_url_data_attr($data->image,'image'); ?>

                                                    data-lang="<?php echo e($data->lang); ?>"
                                                    data-description="<?php echo e($data->description); ?>"      
                                                    data-description_en="<?php echo e($data->description_en); ?>"
                                                    data-btn_01_status="<?php echo e($data->btn_01_status); ?>"
                                                    data-btn_01_text="<?php echo e($data->btn_01_text); ?>"
                                                    data-btn_01_url="<?php echo e($data->btn_01_url); ?>"
                                                    >
                                                        <i class="ti-pencil"></i>
                                                    </a>

                                               </td>
                                           </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </tbody>
                                   </table>
                               </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('New Header Slider')); ?></h4>
                        <form action="<?php echo e(route('admin.header')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                                                        <div class="form-group">
                                <label for="subtitle"><?php echo e(__('Subtitle (Arabic)')); ?></label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle"
                                    placeholder="<?php echo e(__('Subtitle (Arabic)')); ?>">
                            </div>

                            <div class="form-group">
                                <label for="subtitle_en"><?php echo e(__('Subtitle (English)')); ?></label>
                                <input type="text" class="form-control" id="subtitle_en" name="subtitle_en"
                                    placeholder="<?php echo e(__('Subtitle (English)')); ?>">
                            </div>

                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title (Arabic)')); ?></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="<?php echo e(__('Title (Arabic)')); ?>">
                            </div>

                            <div class="form-group">
                                <label for="title_en"><?php echo e(__('Title (English)')); ?></label>
                                <input type="text" class="form-control" id="title_en" name="title_en"
                                    placeholder="<?php echo e(__('Title (English)')); ?>">
                            </div>

                            <div class="form-group">
                                <label for="description"><?php echo e(__('Description (Arabic)')); ?></label>
                                <textarea class="form-control max-height-150" id="description" name="description"
                                        placeholder="<?php echo e(__('Description (Arabic)')); ?>" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="description_en"><?php echo e(__('Description (English)')); ?></label>
                                <textarea class="form-control max-height-150" id="description_en" name="description_en"
                                        placeholder="<?php echo e(__('Description (English)')); ?>" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="btn_01_status"><?php echo e(__('Button Show/Hide')); ?></label>
                                <label class="switch">
                                    <input type="checkbox" name="btn_01_status" id="btn_01_status">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="btn_01_text"><?php echo e(__('Button Text')); ?></label>
                                <input type="text" class="form-control"  id="btn_01_text"  name="btn_01_text" placeholder="<?php echo e(__('Button Text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="btn_01_url"><?php echo e(__('Button URL')); ?></label>
                                <input type="text" class="form-control"  id="btn_01_url"  name="btn_01_url" placeholder="<?php echo e(__('Button URL')); ?>">
                            </div>
                            <div class="form-group">
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="image">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Slider Background" data-modaltitle="Upload Slider Background" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__('Upload Image')); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('recommended image size is 1920x900 pixel')); ?></small>
                            </div>
                            <button id="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Add New Slider')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="header_slider_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo e(__('Edit Header Slider Item')); ?></h5>
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
    </div>
    <form action="<?php echo e(route('admin.header.update')); ?>" id="header_slider_edit_modal_form"  method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" id="header_slider_id" value="">

            
            <div class="form-group">
                <label for="edit_subtitle"><?php echo e(__('Subtitle (Arabic)')); ?></label>
                <input type="text"
                       class="form-control"
                       id="edit_subtitle"
                       name="subtitle"
                       placeholder="<?php echo e(__('Subtitle (Arabic)')); ?>">
            </div>

            
            <div class="form-group">
                <label for="edit_subtitle_en"><?php echo e(__('Subtitle (English)')); ?></label>
                <input type="text"
                       class="form-control"
                       id="edit_subtitle_en"
                       name="subtitle_en"
                       placeholder="<?php echo e(__('Subtitle (English)')); ?>">
            </div>

            
            <div class="form-group">
                <label for="edit_title"><?php echo e(__('Title (Arabic)')); ?></label>
                <input type="text"
                       class="form-control"
                       id="edit_title"
                       name="title"
                       placeholder="<?php echo e(__('Title (Arabic)')); ?>">
            </div>

            
            <div class="form-group">
                <label for="edit_title_en"><?php echo e(__('Title (English)')); ?></label>
                <input type="text"
                       class="form-control"
                       id="edit_title_en"
                       name="title_en"
                       placeholder="<?php echo e(__('Title (English)')); ?>">
            </div>

            
            <div class="form-group">
                <label for="edit_description"><?php echo e(__('Description (Arabic)')); ?></label>
                <textarea class="form-control max-height-150"
                          id="edit_description"
                          name="description"
                          placeholder="<?php echo e(__('Description (Arabic)')); ?>"
                          cols="30"
                          rows="10"></textarea>
            </div>

            
            <div class="form-group">
                <label for="edit_description_en"><?php echo e(__('Description (English)')); ?></label>
                <textarea class="form-control max-height-150"
                          id="edit_description_en"
                          name="description_en"
                          placeholder="<?php echo e(__('Description (English)')); ?>"
                          cols="30"
                          rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="edit_btn_01_status"><?php echo e(__('Button Show/Hide')); ?></label>
                <label class="switch">
                    <input type="checkbox" name="btn_01_status" id="edit_btn_01_status">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="form-group">
                <label for="edit_btn_01_text"><?php echo e(__('Button Text')); ?></label>
                <input type="text" class="form-control" id="edit_btn_01_text" name="btn_01_text"
                       placeholder="<?php echo e(__('Button Text')); ?>">
            </div>

            <div class="form-group">
                <label for="edit_btn_01_url"><?php echo e(__('Button URL')); ?></label>
                <input type="text" class="form-control" id="edit_btn_01_url" name="btn_01_url"
                       placeholder="<?php echo e(__('Button URL')); ?>">
            </div>

            <div class="form-group">
                <div class="media-upload-btn-wrapper">
                    <div class="img-wrap"></div>
                    <input type="hidden" id="edit_image" name="image" value="">
                    <button type="button"
                            class="btn btn-info media_upload_form_btn"
                            data-btntitle="Select Slider Background"
                            data-modaltitle="Upload Slider Background"
                            data-imgid="<?php echo e(auth()->user()->image); ?>"
                            data-toggle="modal"
                            data-target="#media_upload_modal">
                        <?php echo e(__('Upload Image')); ?>

                    </button>
                </div>
                <small><?php echo e(__('recommended image size is 1920x900 pixel')); ?></small>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <button id="update"
                    type="submit"
                    class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
        </div>
    </form>
</div>

        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
            <?php if (isset($component)) { $__componentOriginal072e1d65807e15afb767e18aecd4a7e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal072e1d65807e15afb767e18aecd4a7e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-action-js','data' => ['url' => route('admin.header.bulk.action')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-action-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.header.bulk.action'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal072e1d65807e15afb767e18aecd4a7e8)): ?>
<?php $attributes = $__attributesOriginal072e1d65807e15afb767e18aecd4a7e8; ?>
<?php unset($__attributesOriginal072e1d65807e15afb767e18aecd4a7e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal072e1d65807e15afb767e18aecd4a7e8)): ?>
<?php $component = $__componentOriginal072e1d65807e15afb767e18aecd4a7e8; ?>
<?php unset($__componentOriginal072e1d65807e15afb767e18aecd4a7e8); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald51d03ac38950c6ca9fceee323ea1e0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald51d03ac38950c6ca9fceee323ea1e0d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn.submit','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('btn.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald51d03ac38950c6ca9fceee323ea1e0d)): ?>
<?php $attributes = $__attributesOriginald51d03ac38950c6ca9fceee323ea1e0d; ?>
<?php unset($__attributesOriginald51d03ac38950c6ca9fceee323ea1e0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald51d03ac38950c6ca9fceee323ea1e0d)): ?>
<?php $component = $__componentOriginald51d03ac38950c6ca9fceee323ea1e0d; ?>
<?php unset($__componentOriginald51d03ac38950c6ca9fceee323ea1e0d); ?>
<?php endif; ?>
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

            $(document).on('click','.header_slider_edit_btn',function(){
    var el    = $(this);
    var id    = el.data('id');
    var action = el.data('action');
    var image  = el.data('image');
    var imageid = el.data('imageid');
    var form  = $('#header_slider_edit_modal_form');

    form.attr('action', action);
    form.find('#header_slider_id').val(id);

    // Subtitle
    form.find('#edit_subtitle').val(el.data('subtitle'));        // AR
    form.find('#edit_subtitle_en').val(el.data('subtitle_en'));  // EN

    // Title
    form.find('#edit_title').val(el.data('title'));              // AR
    form.find('#edit_title_en').val(el.data('title_en'));        // EN

    // Description
    form.find('#edit_description').val(el.data('description'));      // AR
    form.find('#edit_description_en').val(el.data('description_en'));// EN

    // Button text & URL
    form.find('#edit_btn_01_text').val(el.data('btn_01_text'));
    form.find('#edit_btn_01_url').val(el.data('btn_01_url'));

    // Image
    if (imageid !== '') {
        form.find('.media-upload-btn-wrapper .img-wrap')
            .html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
        form.find('.media-upload-btn-wrapper input').val(imageid);
        form.find('.media-upload-btn-wrapper .media_upload_form_btn').text("<?php echo e(__('Change Image')); ?>");
    }

    // Button status
    if (el.data('btn_01_status') === 'on') {
        $('#edit_btn_01_status').prop('checked', true);
    } else {
        $('#edit_btn_01_status').prop('checked', false);
    }
});

            });
        })(jQuery);
    </script>
<?php echo $__env->make('backend.partials.datatable.script-enqueue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/backend/pages/home/header.blade.php ENDPATH**/ ?>