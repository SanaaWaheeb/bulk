<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('All Flags')); ?>

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
    <?php if (isset($component)) { $__componentOriginaldfdc73ee107e48d175ea9d298bebd7fa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldfdc73ee107e48d175ea9d298bebd7fa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldfdc73ee107e48d175ea9d298bebd7fa)): ?>
<?php $attributes = $__attributesOriginaldfdc73ee107e48d175ea9d298bebd7fa; ?>
<?php unset($__attributesOriginaldfdc73ee107e48d175ea9d298bebd7fa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldfdc73ee107e48d175ea9d298bebd7fa)): ?>
<?php $component = $__componentOriginaldfdc73ee107e48d175ea9d298bebd7fa; ?>
<?php unset($__componentOriginaldfdc73ee107e48d175ea9d298bebd7fa); ?>
<?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
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
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title"><?php echo e(__('All Flags')); ?>  </h4>
                        </div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donations-flag-report-delete')): ?>
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
                        <?php endif; ?>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th><?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('Cause Title')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Subject')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $all_flag_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php echo e($data['id']); ?>">
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
                                        <td><?php echo e($data->cause->title ?? ''); ?></td>
                                        <td>
                                            <?php if (isset($component)) { $__componentOriginal439bbb984835c787af382f4832e48744 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal439bbb984835c787af382f4832e48744 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-span','data' => ['status' => optional($data->cause)->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(optional($data->cause)->status)]); ?>
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
                                        <td><?php echo e($data->name); ?></td>
                                        <td><?php echo e($data->email); ?></td>
                                        <td><?php echo e($data->subject); ?></td>
                                        <td><?php echo e($data->created_at->diffForHumans()); ?></td>

                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donations-flag-report-delete')): ?>
                                                <?php if (isset($component)) { $__componentOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3f85107cf99b1c6be1e1a6dd6bdb2be5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-popover','data' => ['url' => route('admin.donations.flag.reports.delete',$data->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.donations.flag.reports.delete',$data->id))]); ?>
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

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donations-flag-report-view')): ?>
                                                    <?php if (isset($component)) { $__componentOriginal5b579c207da22f8e1eafac43c8a858c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b579c207da22f8e1eafac43c8a858c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.view-icon','data' => ['url' => route('admin.donations.flag.reports.view',$data->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('view-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.donations.flag.reports.view',$data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b579c207da22f8e1eafac43c8a858c1)): ?>
<?php $attributes = $__attributesOriginal5b579c207da22f8e1eafac43c8a858c1; ?>
<?php unset($__attributesOriginal5b579c207da22f8e1eafac43c8a858c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b579c207da22f8e1eafac43c8a858c1)): ?>
<?php $component = $__componentOriginal5b579c207da22f8e1eafac43c8a858c1; ?>
<?php unset($__componentOriginal5b579c207da22f8e1eafac43c8a858c1); ?>
<?php endif; ?>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donations-flag-report-status-update')): ?>
                                                <a href="#"
                                                   data-id="<?php echo e($data->id); ?>"
                                                   data-causeid="<?php echo e($data->cause_id); ?>"
                                                   data-status="<?php echo e(optional($data->cause)->status); ?>"
                                                   data-toggle="modal"
                                                   data-target="#cause_status_change_modal"
                                                   class="btn btn-lg btn-warning btn-sm mb-3 mr-1 cause_status_change_btn"
                                                >
                                                    <?php echo e(__("Update Status")); ?>

                                                </a>

                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donations-flag-report-mail-send')): ?>
                                                    <a class="btn btn-lg btn-primary btn-sm mb-3 mr-1 send_mail_modal_btn"
                                                       href="#"
                                                       data-toggle="modal"
                                                       data-target="#send_mail_to_subscriber_modal"
                                                       data-email="<?php echo e($data->email); ?>"
                                                    >
                                                        <i class="ti-email"></i>
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
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donations-flag-report-mail-send')): ?>
        <div class="modal fade" id="send_mail_to_subscriber_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Send Mail To Flag Sender')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="<?php echo e(route('admin.donations.flag.report.mail.send')); ?>" id="send_mail_to_subscriber_edit_modal_form"  method="post">
                        <div class="modal-body">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="email"><?php echo e(__('Email')); ?></label>
                                <input type="text" readonly class="form-control"  id="email" name="email" placeholder="<?php echo e(__('Email')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_icon"><?php echo e(__('Subject')); ?></label>
                                <input type="text" class="form-control"  id="subject" name="subject" placeholder="<?php echo e(__('Subject')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="message"><?php echo e(__('Message')); ?></label>
                                <input type="hidden" name="message" >
                                <div class="summernote"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button id="submit" type="submit" class="btn btn-primary"><?php echo e(__('Send Mail')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donations-flag-report-status-update')): ?>
    <div class="modal fade" id="cause_status_change_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Cause Status Change')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>

                <form action="<?php echo e(route('admin.donations.flag.reports.cause.status.change')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="cause_id" id="cause_id">
                        <div class="form-group">
                            <label for="cause_status"><?php echo e(__('Cause Status')); ?></label>
                                <select name="status" id="cause_status"  class="form-control">
                                    <option value="publish"><?php echo e(__('Publish')); ?></option>
                                    <option value="draft"><?php echo e(__('Draft')); ?></option>
                                    <option value="archive"><?php echo e(__('Archive')); ?></option>
                                    <option value="banned"><?php echo e(__('Banned')); ?></option>
                                </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Change Status')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('backend.partials.datatable.script-enqueue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <?php if (isset($component)) { $__componentOriginal072e1d65807e15afb767e18aecd4a7e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal072e1d65807e15afb767e18aecd4a7e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-action-js','data' => ['url' => route('admin.donations.flag.reports.bulk.action')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-action-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.donations.flag.reports.bulk.action'))]); ?>
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

                $(document).on('click','.send_mail_modal_btn',function(){
                    var el = $(this);
                    var email = el.data('email');
                    var form = $('#send_mail_to_subscriber_edit_modal_form');
                    form.find('#email').val(email);

                    $('.summernote').summernote({
                        height: 300,   //set editable area's height
                        codemirror: { // codemirror options
                            theme: 'monokai'
                        },
                        callbacks: {
                            onChange: function(contents, $editable) {
                                $(this).prev('input').val(contents);
                            }
                        }
                    });

                });

                $(document).on('click','.cause_status_change_btn',function(e){
                    e.preventDefault();
                    var el = $(this);
                    console.log(el.data('causeid'));
                    var form = $('#cause_status_change_modal');
                    form.find('#cause_id').val(el.data('causeid'));
                    form.find('#cause_status option[value="'+el.data('status')+'"]').attr('selected',true);
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/backend/donations/flag-report/index.blade.php ENDPATH**/ ?>