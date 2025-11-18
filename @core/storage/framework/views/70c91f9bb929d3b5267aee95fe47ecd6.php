<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('All Rewards')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
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
                        <h4 class="header-title"> <?php echo e(__('All Rewards')); ?></h4>
                        <div class="bulk-delete-wrapper">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reward-delete')): ?>
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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reward-create')): ?>
                                <div class="btn-wrapper">
                                    <a href="" data-toggle="modal" data-target="#new_reward_modal"
                                       class="btn btn-info pull-right mb-4 .new_reward_btn"><?php echo e(__('Add New')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <small class="text-primary"><?php echo e(__('Please put your rewards like (1-20, 21-50, 51-100 and so on like this sequence)')); ?></small>

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
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('From')); ?></th>
                                <th><?php echo e(__('To')); ?></th>
                                <th><?php echo e(__('Reward Point')); ?></th>
                                <th><?php echo e(__('Reward Amount')); ?></th>
                                <th><?php echo e(__('Reward Expire Date')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $all_reward; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                        <td><?php echo e($data->reward_title); ?></td>
                                        <td><?php echo e(amount_with_currency_symbol($data->reward_goal_from)); ?></td>
                                        <td><?php echo e(amount_with_currency_symbol($data->reward_goal_to)); ?></td>
                                        <td><?php echo e($data->reward_point); ?></td>
                                        <td><?php echo e(amount_with_currency_symbol($data->reward_amount)); ?></td>
                                        <td><?php echo e(date('d-m-Y',strtotime($data->reward_expire_date))); ?></td>
                                        <td>
                                            <?php if (isset($component)) { $__componentOriginal439bbb984835c787af382f4832e48744 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal439bbb984835c787af382f4832e48744 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-span','data' => ['status' => $data->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal439bbb984835c787af382f4832e48744)): ?>
<?php $attributes = $__attributesOriginal439bbb984835c787af382f4832e48744; ?>
<?php unset($__attributesOriginal439bbb984835c787af382f4832e48744); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal439bbb984835c787af382f4832e48744)): ?>
<?php $component = $__componentOriginal439bbb984835c787af382f4832e48744; ?>
<?php unset($__componentOriginal439bbb984835c787af382f4832e48744); ?>
<?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reward-delete')): ?>
                                                <?php if (isset($component)) { $__componentOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-popover','data' => ['url' => route('admin.reward.delete',$data->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.reward.delete',$data->id))]); ?>
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

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reward-edit')): ?>
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#reward_item_edit_modal"
                                                   class="btn btn-primary btn-xs mb-3 mr-1 reward_edit_btn"
                                                   data-id="<?php echo e($data->id); ?>"
                                                   data-reward_title="<?php echo e($data->reward_title); ?>"
                                                   data-reward_goal_from="<?php echo e($data->reward_goal_from); ?>"
                                                   data-reward_goal_to="<?php echo e($data->reward_goal_to); ?>"
                                                   data-reward_amount="<?php echo e($data->reward_amount); ?>"
                                                   data-reward_point="<?php echo e($data->reward_point); ?>"
                                                   data-reward_expire_date="<?php echo e(date('d-m-Y',strtotime($data->reward_expire_date))); ?>"
                                                   data-status="<?php echo e($data->status); ?>">
                                                    <i class="ti-pencil"></i>
                                                </a>

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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reward-create')): ?>
                <div class="modal fade" id="new_reward_modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo e(__('New Reward Item')); ?></h5>
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            </div>
                            <form action="<?php echo e(route('admin.reward')); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="edit_name"><?php echo e(__('Title')); ?></label>
                                        <input type="text" class="form-control" name="reward_title"
                                               placeholder="<?php echo e(__('Title')); ?>">
                                    </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="edit_designation"><?php echo e(__('Reward Goal From')); ?></label>
                                        <input type="number" class="form-control reward_goal_from_add" name="reward_goal_from"
                                               placeholder="<?php echo e(__('Reward Goal From')); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?php echo e(__('Reward Goal To')); ?></label>
                                        <input type="number" class="form-control reward_goal_to_add" name="reward_goal_to"
                                               placeholder="<?php echo e(__('Reward Goal To')); ?>">
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label><?php echo e(__('Reward Point')); ?></label>
                                        <input type="number" class="form-control reward_point_add" name="reward_point"
                                               placeholder="<?php echo e(__('Reward Point')); ?>">
                                    </div>

                                    <input type="hidden" class="form-control reward_amount_add_database"
                                           placeholder="<?php echo e(__('Reward Amount')); ?>" name="reward_amount" >

                                    <div class="form-group">
                                        <label><?php echo e(__('Reward Amount')); ?></label>
                                        <input type="text" class="form-control reward_amount_add_show"
                                               placeholder="<?php echo e(__('Reward Amount')); ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo e(__('Reward Expire Date')); ?></label>
                                        <input type="date" class="form-control date-flat" name="reward_expire_date"
                                               placeholder="<?php echo e(__('Reward Expire Date')); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="edit_status"><?php echo e(__('Status')); ?></label>
                                        <select name="status" class="form-control">
                                            <option value="publish"><?php echo e(__('Publish')); ?></option>
                                            <option value="draft"><?php echo e(__('Draft')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reward-edit')): ?>
                <div class="modal fade" id="reward_item_edit_modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo e(__('Edit Reward Item')); ?></h5>
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            </div>
                            <form action="<?php echo e(route('admin.reward.update')); ?>" id="reward_edit_modal_form" method="post"
                                  enctype="multipart/form-data">
                                <div class="modal-body">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" id="reward_id" value="">
                                    <div class="form-group">
                                        <label for="edit_name"><?php echo e(__('Title')); ?></label>
                                        <input type="text" class="form-control" name="reward_title" id="reward_title"
                                               placeholder="<?php echo e(__('Title')); ?>">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="edit_designation"><?php echo e(__('Reward Goal From')); ?></label>
                                            <input type="number" class="form-control" name="reward_goal_from" id="reward_goal_from"
                                                   placeholder="<?php echo e(__('Reward Goal From')); ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><?php echo e(__('Reward Goal To')); ?></label>
                                            <input type="number" class="form-control" name="reward_goal_to" id="reward_goal_to"
                                                   placeholder="<?php echo e(__('Reward Goal To')); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo e(__('Reward Point')); ?></label>
                                        <input type="text" class="form-control reward_point_edit" name="reward_point" id="reward_point"
                                               placeholder="<?php echo e(__('Reward Point')); ?>">
                                    </div>

                                    <input type="hidden" class="form-control reward_amount_edit_database" name="reward_amount"
                                           placeholder="<?php echo e(__('Reward Amount')); ?>">
                                    <div class="form-group">
                                        <label><?php echo e(__('Reward Amount')); ?></label>
                                        <input type="text" class="form-control reward_amount_edit" id="reward_amount"
                                               placeholder="<?php echo e(__('Reward Amount')); ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo e(__('Reward Expire Date')); ?></label>
                                        <input type="date" class="form-control reward_expire_date date-flat" name="reward_expire_date"
                                               placeholder="<?php echo e(__('Reward Expire Date')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_status"><?php echo e(__('Status')); ?></label>
                                        <select name="status" class="form-control" id="edit_status">
                                            <option value="publish"><?php echo e(__('Publish')); ?></option>
                                            <option value="draft"><?php echo e(__('Draft')); ?></option>
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
<?php $__env->stopSection(); ?>

 <?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('assets/backend/js/flatpickr.js')); ?>"></script>
<script>
    //Date Picker
    flatpickr('.date-flat', {
        enableTime: false,
        dateFormat: "Y-m-d",
    });
</script>
        <script>
            (function ($) {
                "use strict";

                $(document).ready(function () {
                    $('.reward_amount_add_show').prop('disabled', true);
                    <?php if (isset($component)) { $__componentOriginal072e1d65807e15afb767e18aecd4a7e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal072e1d65807e15afb767e18aecd4a7e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-action-js','data' => ['url' => route('admin.reward.bulk.action')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-action-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.reward.bulk.action'))]); ?>
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

                    //Add Point Amount
                    $(document).on('keyup','.reward_point_add',function(e){
                        e.preventDefault();
                        let po = $(this).val();

                        let global_point = "<?php echo e(get_static_option('reward_amount_for_point')); ?>";
                        let amount_calculation = po / global_point;
                         $('.reward_amount_add_show').val('<?php echo e(site_currency_symbol()); ?>' + amount_calculation);
                         $('.reward_amount_add_database').val(amount_calculation);
                    })

                    //Edit Point Amount
                    $(document).on('keyup','.reward_point_edit',function(e){
                        e.preventDefault();
                        let po = $(this).val();
                        let global_point = "<?php echo e(get_static_option('reward_amount_for_point')); ?>";
                        let amount_calculation = po / global_point;

                        $('.reward_amount_edit').val('<?php echo e(site_currency_symbol()); ?>' + amount_calculation);
                        $('.reward_amount_edit_database').val(amount_calculation);
                    })

                    $(document).on('click', '.reward_edit_btn', function () {
                        var el = $(this);
                        var id = el.data('id');

                        var title = el.data('reward_title');
                        var goal_from = el.data('reward_goal_from');
                        var goal_to = el.data('reward_goal_to');
                        var amount = el.data('reward_amount');
                        var point = el.data('reward_point');
                        var date = el.data('reward_expire_date');
                        var status = el.data('status');
                        var action = el.data('action');

                        console.log(action)

                        var form = $('#reward_item_edit_modal');
                        form.attr('action', action);
                        form.find('#reward_id').val(id);

                        form.find('#reward_title').val(title);
                        form.find('#reward_goal_from').val(goal_from);
                        form.find('#reward_goal_to').val(goal_to);
                        form.find('.reward_amount_edit').val('<?php echo e(site_currency_symbol()); ?>' +amount);
                        form.find('#reward_point').val(point);
                        form.find('.reward_expire_date').val(date);
                        form.find('#edit_status option[value="'+status+'"]').attr('selected',true);

                    });
                });
            })(jQuery)



        </script>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/backend/pages/reward/reward.blade.php ENDPATH**/ ?>