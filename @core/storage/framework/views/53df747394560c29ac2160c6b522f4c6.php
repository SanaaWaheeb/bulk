
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="login-page-wrapper">
    <div class="container">
        <div class="row justify-content-center py-5 my-5">
            <div class="col-lg-6">
                <div class="login-form-wrapper">
                    <h2><?php echo e($title ?? __('Login To Your Account')); ?></h2><br>
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
                    
                    <?php if(!session('otp_sent')): ?>
                        
                        <form action="<?php echo e(route('login.send.otp')); ?>" method="POST" class="account-form" id="login_form_order_page">
                            <?php echo csrf_field(); ?>
                            <div class="error-wrap"></div>
                            <div class="form-group">
<div class="input-group" style="direction: ltr;">
    <div class="input-group-prepend">
        <span class="input-group-text p-0 d-flex align-items-center justify-content-center"
              style="background-color: #eee;
                     width: 50px;
                     font-size: 14px;
                     font-weight: normal;
                     height: 38px;
                     border: 1px solid #ced4da;">
            +966
        </span>
    </div>
    <input type="tel" name="phone" id="phone_input" class="form-control" placeholder="<?php echo e(__('5XXXXXXXX')); ?>" required style="height: 38px"; 
    maxlength="9">
</div>

                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" id="login_btn" class="submit-btn boxed-btn reverse-color "><?php echo e(__('Send verification code')); ?></button>
                            </div>
                        </form>
                    <?php else: ?>
                        
                        <form action="<?php echo e(route('login.verify.otp')); ?>" method="POST" class="account-form" id="verify_otp_form">
                            <?php echo csrf_field(); ?>
                            <div class="error-wrap"></div>
                            <div class="form-group">
                                <label><?php echo e(__('رقم الجوال')); ?></label>
<input type="text" name="phone" class="form-control" 
       value="<?php echo e(session('login_phone') ?? old('phone')); ?>"
       style="background-color: #f5f5f5; color: #666; text-align: left;"
       dir="ltr" readonly required>

                            <div class="form-group">
                                <label><?php echo e(__('Enter verification code')); ?></label>
                                <input type="text" name="otp_code" class="form-control" 
                                       placeholder="<?php echo e(__('Enter verification code')); ?>" required>
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" id="verify_btn" class="submit-btn boxed-btn reverse-color "><?php echo e(__('تحقق من الرمز')); ?></button>
                            </div>
                        </form>
                        
                        
                        <div class="text-center mt-3">
                            <form action="<?php echo e(route('login.send.otp')); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="phone" value="<?php echo e(substr(session('login_phone'), 4)); ?>">
                                <button type="submit" class="btn btn-link"><?php echo e(__('إعادة ارسال رمز التحقق')); ?></button>
                            </form>
                        </div>
                    <?php endif; ?>

                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                <label class="custom-control-label" for="remember"><?php echo e(__('Remind me')); ?></label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a class="d-block" href="<?php echo e(route('user.register')); ?>" style="color:#000; text-decoration: none;
                            transition: color 0.3s ease;"; onmouseover="this.style.color='#007bff'" 
                            onmouseout="this.style.color='#000'"><?php echo e(__('Create New Account?')); ?></a>

                        </div>
                        <div class="col-lg-12">
                            <div class="social-login-wrap">
                                <?php if(get_static_option('enable_facebook_login')): ?>
                                    <a href="<?php echo e(route('login.facebook.redirect')); ?>" class="facebook">
                                        <i class="fab fa-facebook-f"></i> <?php echo e(__('Login With Facebook')); ?>

                                    </a>
                                <?php endif; ?>
                                <?php if(get_static_option('enable_google_login')): ?>
                                    <a href="<?php echo e(route('login.google.redirect')); ?>" class="google">
                                        <i class="fab fa-google"></i> <?php echo e(__('Login With Google')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
(function($){
    "use strict";
    
    $(document).ready(function() {
    
       $('#phone_input').on('input', function() {
    this.value = this.value.replace(/\D/g,''); 
});

        $(document).on('submit', '#login_form_order_page', function () {
            $('#login_btn').text('<?php echo e(__("Please Wait")); ?>');
        });
        
        $(document).on('submit', '#verify_otp_form', function () {
            $('#verify_btn').text('<?php echo e(__("تحقق...")); ?>');
        });
    });
})(jQuery);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/user/login.blade.php ENDPATH**/ ?>