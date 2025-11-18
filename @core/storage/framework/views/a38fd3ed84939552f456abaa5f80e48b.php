<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Team Member Item')); ?>

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
    <?php if (isset($component)) { $__componentOriginale3fe6bb2f0f61d925063cbbce78cba4d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3fe6bb2f0f61d925063cbbce78cba4d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3fe6bb2f0f61d925063cbbce78cba4d)): ?>
<?php $attributes = $__attributesOriginale3fe6bb2f0f61d925063cbbce78cba4d; ?>
<?php unset($__attributesOriginale3fe6bb2f0f61d925063cbbce78cba4d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3fe6bb2f0f61d925063cbbce78cba4d)): ?>
<?php $component = $__componentOriginale3fe6bb2f0f61d925063cbbce78cba4d; ?>
<?php unset($__componentOriginale3fe6bb2f0f61d925063cbbce78cba4d); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php if (isset($component)) { $__componentOriginalae73592a9186217aa45553528a0de34b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae73592a9186217aa45553528a0de34b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.msg.error','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae73592a9186217aa45553528a0de34b)): ?>
<?php $attributes = $__attributesOriginalae73592a9186217aa45553528a0de34b; ?>
<?php unset($__attributesOriginalae73592a9186217aa45553528a0de34b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae73592a9186217aa45553528a0de34b)): ?>
<?php $component = $__componentOriginalae73592a9186217aa45553528a0de34b; ?>
<?php unset($__componentOriginalae73592a9186217aa45553528a0de34b); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5836ea34a6758bf192c104f6f2992c55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5836ea34a6758bf192c104f6f2992c55 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.msg.success','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('msg.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5836ea34a6758bf192c104f6f2992c55)): ?>
<?php $attributes = $__attributesOriginal5836ea34a6758bf192c104f6f2992c55; ?>
<?php unset($__attributesOriginal5836ea34a6758bf192c104f6f2992c55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5836ea34a6758bf192c104f6f2992c55)): ?>
<?php $component = $__componentOriginal5836ea34a6758bf192c104f6f2992c55; ?>
<?php unset($__componentOriginal5836ea34a6758bf192c104f6f2992c55); ?>
<?php endif; ?>
            </div>

            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Team Member Items')); ?></h4>
                        <div class="bulk-delete-wrapper">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team-member-delete')): ?>
                                <div class="select-box-wrap">
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
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team-member-create')): ?>
                                <div class="btn-wrapper">
                                    <a href="" class="btn btn-info pull-right mb-4" data-toggle="modal"
                                       data-target="#new_team_member"><?php echo e(__('Add New')); ?></a>
                                </div>
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
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Designation')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $all_team_member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php
                                                $brand_img = get_attachment_image_by_id($data->image,null,true);
                                            ?>
                                            <?php if(!empty($brand_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                 src="<?php echo e($brand_img['img_url']); ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php  $img_url = $brand_img['img_url']; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($data->name); ?></td>
                                        <td><?php echo e($data->designation); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team-member-delete')): ?>
                                            <?php if (isset($component)) { $__componentOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-popover','data' => ['url' => route('admin.team.member.delete',$data->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.team.member.delete',$data->id))]); ?>
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
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team-member-edit')): ?>
                                            <a href="#"
                                               data-toggle="modal"
                                               data-target="#team_member_item_edit_modal"
                                               class="btn btn-primary btn-xs mb-3 mr-1 team_member_edit_btn"
                                               data-id="<?php echo e($data->id); ?>"
                                               data-action="<?php echo e(route('admin.team.member.update')); ?>"
                                               data-name="<?php echo e($data->name); ?>"
                                               data-imageid="<?php echo e($data->image); ?>"
                                               data-image="<?php echo e($img_url); ?>"
                                               data-designation="<?php echo e($data->designation); ?>"
                                               data-iconOne="<?php echo e($data->icon_one); ?>"
                                               data-iconTwo="<?php echo e($data->icon_two); ?>"
                                               data-iconThree="<?php echo e($data->icon_three); ?>"
                                               data-iconOneUrl="<?php echo e($data->icon_one_url); ?>"
                                               data-iconTwoUrl="<?php echo e($data->icon_two_url); ?>"
                                               data-iconThreeUrl="<?php echo e($data->icon_three_url); ?>"
                                            >
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <?php if (isset($component)) { $__componentOriginalb2c1dd794879015d9606d5936970d3cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb2c1dd794879015d9606d5936970d3cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.clone-icon','data' => ['action' => route('admin.team.member.clone'),'id' => $data->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('clone-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.team.member.clone')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb2c1dd794879015d9606d5936970d3cc)): ?>
<?php $attributes = $__attributesOriginalb2c1dd794879015d9606d5936970d3cc; ?>
<?php unset($__attributesOriginalb2c1dd794879015d9606d5936970d3cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb2c1dd794879015d9606d5936970d3cc)): ?>
<?php $component = $__componentOriginalb2c1dd794879015d9606d5936970d3cc; ?>
<?php unset($__componentOriginalb2c1dd794879015d9606d5936970d3cc); ?>
<?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team-member-create')): ?>
    <div class="modal fade" id="new_team_member" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('New Team Member')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.team.member')); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name"><?php echo e(__('Name')); ?></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('Name')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="designation"><?php echo e(__('Designation')); ?></label>
                            <input type="text" class="form-control" id="designation" name="designation"
                                   placeholder="<?php echo e(__('Designation')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="icon_one" class="d-block"><?php echo e(__('Social Profile One')); ?></label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fab fa-instagram"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fab fa-instagram" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon_one" value="fab fa-instagram"
                                   name="icon_one">
                        </div>
                        <div class="form-group">
                            <label for="icon_one_url"><?php echo e(__('Social Profile One URL')); ?></label>
                            <input type="text" class="form-control" id="icon_one_url" name="icon_one_url"
                                   placeholder="<?php echo e(__('Social Profile One URL')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="icon_two" class="d-block"><?php echo e(__('Social Profile Two')); ?></label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fab fa-twitter" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon_two" value="fab fa-twitter"
                                   name="icon_two">
                        </div>
                        <div class="form-group">
                            <label for="icon_two_url"><?php echo e(__('Social Profile Two URL')); ?></label>
                            <input type="text" class="form-control" id="icon_two_url" name="icon_two_url"
                                   placeholder="<?php echo e(__('Social Profile Two URL')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="icon_three" class="d-block"><?php echo e(__('Social Profile Three')); ?></label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fab fa-facebook-f" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon_three" value="fab fa-facebook-f"
                                   name="icon_three">
                        </div>
                        <div class="form-group">
                            <label for="icon_three_url"><?php echo e(__('Social Profile Three URL')); ?></label>
                            <input type="text" class="form-control" id="icon_three_url" name="icon_three_url"
                                   placeholder="<?php echo e(__('Social Profile Three URL')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="image"><?php echo e(__('Image')); ?></label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" name="image">
                                <button type="button" class="btn btn-info media_upload_form_btn"
                                        data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                        data-toggle="modal" data-target="#media_upload_modal">
                                    <?php echo e(__('Upload Image')); ?>

                                </button>
                            </div>
                            <small><?php echo e(__('Recommended image size 270x280')); ?></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="submit" type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team-member-edit')): ?>
    <div class="modal fade" id="team_member_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Team Member Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="#" id="team_member_edit_modal_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="team_member_id" value="">

                        <div class="form-group">
                            <label for="edit_name"><?php echo e(__('Name')); ?></label>
                            <input type="text" class="form-control" id="edit_name" name="name"
                                   placeholder="<?php echo e(__('Name')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_designation"><?php echo e(__('Designation')); ?></label>
                            <input type="text" class="form-control" id="edit_designation" name="designation"
                                   placeholder="<?php echo e(__('Designation')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_one" class="d-block"><?php echo e(__('Social Profile One')); ?></label>
                            <div class="btn-group edit_icon_one">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="edit_icon_one"
                                   value="fas fa-exclamation-triangle" name="icon_one">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_one_url"><?php echo e(__('Social Profile One URL')); ?></label>
                            <input type="text" class="form-control" id="edit_icon_one_url" name="icon_one_url"
                                   placeholder="<?php echo e(__('Social Profile One URL')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_two" class="d-block"><?php echo e(__('Social Profile Two')); ?></label>
                            <div class="btn-group edit_icon_two">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="edit_icon_two"
                                   value="fas fa-exclamation-triangle" name="icon_two">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_two_url"><?php echo e(__('Social Profile Two URL')); ?></label>
                            <input type="text" class="form-control" id="edit_icon_two_url" name="icon_two_url"
                                   placeholder="<?php echo e(__('Social Profile Two URL')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_three" class="d-block"><?php echo e(__('Social Profile Three')); ?></label>
                            <div class="btn-group edit_icon_three">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="edit_icon_three"
                                   value="fas fa-exclamation-triangle" name="icon_three">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_three_url"><?php echo e(__('Social Profile Three URL')); ?></label>
                            <input type="text" class="form-control" id="edit_icon_three_url" name="icon_three_url"
                                   placeholder="<?php echo e(__('Social Profile Three URL')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="image"><?php echo e(__('Image')); ?></label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" id="edit_image" name="image" value="">
                                <button type="button" class="btn btn-info media_upload_form_btn"
                                        data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                        data-toggle="modal" data-target="#media_upload_modal">
                                    <?php echo e(__('Upload Image')); ?>

                                </button>
                            </div>
                            <small><?php echo e(__('Recommended image size 270x280')); ?></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="update" type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal0a0c44ec0e77c6e781a03c2fda86fc75 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0a0c44ec0e77c6e781a03c2fda86fc75 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.markup','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0a0c44ec0e77c6e781a03c2fda86fc75)): ?>
<?php $attributes = $__attributesOriginal0a0c44ec0e77c6e781a03c2fda86fc75; ?>
<?php unset($__attributesOriginal0a0c44ec0e77c6e781a03c2fda86fc75); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0a0c44ec0e77c6e781a03c2fda86fc75)): ?>
<?php $component = $__componentOriginal0a0c44ec0e77c6e781a03c2fda86fc75; ?>
<?php unset($__componentOriginal0a0c44ec0e77c6e781a03c2fda86fc75); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <?php if (isset($component)) { $__componentOriginal072e1d65807e15afb767e18aecd4a7e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal072e1d65807e15afb767e18aecd4a7e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-action-js','data' => ['url' => route('admin.team.member.bulk.action')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-action-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.team.member.bulk.action'))]); ?>
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

                $(document).on('click', '.team_member_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var name = el.data('name');
                    var designation = el.data('designation');
                    var action = el.data('action');
                    var image = el.data('image');
                    var imageid = el.data('imageid');
                    var form = $('#team_member_edit_modal_form');

                    form.attr('action', action);
                    form.find('#team_member_id').val(id);
                    form.find('#edit_name').val(name);
                    form.find('#edit_designation').val(designation);
                    form.find('#edit_description').val(el.data('description'));
                    form.find('#edit_icon_one').val(el.data('iconone'));
                    form.find('#edit_icon_two').val(el.data('icontwo'));
                    form.find('#edit_icon_three').val(el.data('iconthree'));
                    form.find('#edit_icon_one_url').val(el.data('icononeurl'));
                    form.find('#edit_icon_two_url').val(el.data('icontwourl'));
                    form.find('#edit_icon_three_url').val(el.data('iconthreeurl'));
                    form.find('#preview_image').attr('src', image);

                    form.find('.edit_icon_three .icp-dd').attr('data-selected', el.data('iconthree'));
                    form.find('.edit_icon_three .iconpicker-component i').attr('class', el.data('iconthree'));
                    form.find('.edit_icon_two .icp-dd').attr('data-selected', el.data('icontwo'));
                    form.find('.edit_icon_two .iconpicker-component i').attr('class', el.data('icontwo'));
                    form.find('.edit_icon_one .icp-dd').attr('data-selected', el.data('iconone'));
                    form.find('.edit_icon_one .iconpicker-component i').attr('class', el.data('iconone'));

                    if (imageid != '') {
                        form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                        form.find('.media-upload-btn-wrapper input').val(imageid);
                        form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                    }

                });

                $('.icp-dd').iconpicker();
                $('.icp-dd').on('iconpickerSelected', function (e) {
                    var selectedIcon = e.iconpickerValue;
                    $(this).parent().parent().children('input').val(selectedIcon);
                });

            });
        })(jQuery)
    </script>
    <!-- Start datatable js -->
    <?php if (isset($component)) { $__componentOriginal579359c93efc143f4744524389ba1039 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal579359c93efc143f4744524389ba1039 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal579359c93efc143f4744524389ba1039)): ?>
<?php $attributes = $__attributesOriginal579359c93efc143f4744524389ba1039; ?>
<?php unset($__attributesOriginal579359c93efc143f4744524389ba1039); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal579359c93efc143f4744524389ba1039)): ?>
<?php $component = $__componentOriginal579359c93efc143f4744524389ba1039; ?>
<?php unset($__componentOriginal579359c93efc143f4744524389ba1039); ?>
<?php endif; ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php if (isset($component)) { $__componentOriginal9c9e2f22010721f1a8a11abf87b15b5e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c9e2f22010721f1a8a11abf87b15b5e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c9e2f22010721f1a8a11abf87b15b5e)): ?>
<?php $attributes = $__attributesOriginal9c9e2f22010721f1a8a11abf87b15b5e; ?>
<?php unset($__attributesOriginal9c9e2f22010721f1a8a11abf87b15b5e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c9e2f22010721f1a8a11abf87b15b5e)): ?>
<?php $component = $__componentOriginal9c9e2f22010721f1a8a11abf87b15b5e; ?>
<?php unset($__componentOriginal9c9e2f22010721f1a8a11abf87b15b5e); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/backend/pages/team-member.blade.php ENDPATH**/ ?>