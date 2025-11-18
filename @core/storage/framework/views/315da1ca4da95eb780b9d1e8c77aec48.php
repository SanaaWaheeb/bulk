<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('support_ticket_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
اضافة منتج
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('about_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('about_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="support-ticket-page-area padding-top-120 padding-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                   <div class="support-ticket-wrapper">
                       <?php if(auth()->guard('web')->check()): ?>
                           <h3 class="title">اقترح منتج جديد</h3>
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
                           <form action="<?php echo e(route('frontend.support.ticket.store')); ?>" method="post" class="support-ticket-form-wrapper" enctype="multipart/form-data">
                               <?php echo csrf_field(); ?>
                               <input type="hidden" name="via" value="<?php echo e(__('website')); ?>">
                                <div class="form-group">
                                    <label>اسم المنتج</label>
                                    <input type="text" class="form-control" name="title" placeholder="اسم المنتج">
                                </div>
                                <div class="form-group">
                                <label><?php echo e(__('Departments')); ?></label>
                                <select name="department_id" class="form-control">
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($dep->id); ?>"><?php echo e($dep->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                               <div class="form-group">
                                   
                                    <input type="hidden" class="form-control" name="subject" placeholder="<?php echo e(__('Subject')); ?>" value="a" >
                                </div>
                               <div class="form-group">
                                   
                                   <input name="priority" class="form-control" value="high" type="hidden">
                               </div>
                               <div class="form-group">
                                   <label><?php echo e(__('Description')); ?></label>
                                   <textarea name="description"class="form-control" cols="30" rows="10" placeholder="<?php echo e(__('Description')); ?>"></textarea>
                               </div>
                               <div class="form-group">
                                   <label>رابط المنتج</label>
                                    <input type="text" class="form-control" name="URL" placeholder="رابط المنتج">
                                </div>
                              <div class="btn-wrapper text-center">
                                  <button type="submit">ارسل الطلب</button>
                              </div>
                           </form>
                       <?php else: ?>
                           <?php echo $__env->make('frontend.user.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php endif; ?>
                   </div>
               </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('frontend.partials.ajax-login-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/frontend/pages/support-ticket/support-ticket.blade.php ENDPATH**/ ?>