
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="login-page-wrapper py-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php if(!empty(get_static_option('site_google_captcha_enable'))): ?>
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                    <?php endif; ?>

                    <div class="login-form-wrapper">
                        <h2 class="text-center"><?php echo e(__('Register New Account')); ?></h2><br>
                        <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if(!session('otp_register_sent')): ?>
                            
                            <form action="<?php echo e(route('register.send.otp')); ?>" method="post" class="account-form">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="captcha_token" id="gcaptcha_token">

                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="<?php echo e(__('Name')); ?>" required>
                                </div>
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
        <input type="text" name="username"  id="phone_input" class="form-control" placeholder="<?php echo e(__('5XXXXXXXX')); ?>" required style="height: 38px;"
        maxlength="9">
    </div>
</div>

                                <!--<div class="form-group">-->
                                <!--    <input type="email" name="email" class="form-control" placeholder="<?php echo e(__('Email')); ?>" required>-->
                                <!--</div>-->
                                <div class="form-group">
                                    <select id="country" class="form-control" name="country_id" value="196">
                                        <option value="196">السعودية</option>
                                        <?php $__currentLoopData = $all_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="city" class="form-control" placeholder="<?php echo e(__('City')); ?>">
                               </div>
                               <div class="form-group">
                                    <input type="text" name="district" class="form-control" placeholder="<?php echo e(__('district')); ?>" required>
                                </div>
                                <!--<?php if(!empty(get_static_option('site_google_captcha_enable'))): ?>-->
                                <!--    <div class="form-group">-->
                                <!--        <div class="g-recaptcha" data-sitekey="<?php echo e(get_static_option('recaptcha_2_site_key')); ?>"></div>-->
                                <!--        <?php if($errors->has('g-recaptcha-response')): ?>-->
                                <!--            <span class="text-danger"><?php echo e($errors->first('g-recaptcha-response')); ?></span>-->
                                <!--        <?php endif; ?>-->
                                <!--    </div>-->
                                <!--<?php endif; ?>-->

                                <div class="form-group form-check col-12">
                                    <input type="checkbox" class="form-check-input" name="agree_terms" id="Check11" required>
                                    <label class="form-check-label" for="Check11" style="margin-right: 16px;">
                                        <?php echo e(__('By creating an account, you agree to')); ?>

                                        <a href="<?php echo e(route('frontend.dynamic.page',[getSlugByPageId(get_static_option('register_page_terms_of_service_url')), get_static_option('register_page_terms_of_service_url')])); ?>"><?php echo e(__('Terms of Service and Conditions ')); ?>,</a>
                                        <?php echo e(__('and ')); ?>

                                        <a href="<?php echo e(route('frontend.dynamic.page',[getSlugByPageId(get_static_option('register_page_privacy_policy_url')), get_static_option('register_page_privacy_policy_url')])); ?>"><?php echo e(__('privacy policy')); ?></a>
                                    </label>
                                </div>

                                <div class="form-group btn-wrapper">
                                    <button type="submit" class="submit-btn boxed-btn reverse-color"><?php echo e(__('Send verification code')); ?></button>
                                </div>
                            </form>
                        <?php else: ?>
                            
                            <form action="<?php echo e(route('register.verify.otp')); ?>" method="POST" class="account-form">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="text" name="otp_code" class="form-control" placeholder="<?php echo e(__('Enter OTP Code')); ?>" required>
                                </div>
                                <div class="form-group btn-wrapper">
                                    <button type="submit" class="submit-btn boxed-btn reverse-color"><?php echo e(__('Verify & Register')); ?></button>
                                </div>
                            </form>
                        <?php endif; ?>

                        <div class="row mb-4 rmber-area">
                            <div class="col-12 text-center">
                                <a href="<?php echo e(route('user.login')); ?>" style="color:#000; text-decoration: none;
                                transition: color 0.3s ease;"; onmouseover="this.style.color='#007bff'" 
                                onmouseout="this.style.color='#000'"> <?php echo e(__('Already have account?')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>"></script>
<script>
    grecaptcha.ready(function () {
        grecaptcha.execute("<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>", {action: 'homepage'}).then(function (token) {
            document.getElementById('gcaptcha_token').value = token;
        });
    });

    (function($){
        "use strict";

        $(document).ready(function() {
            
            $('#phone_input').on('input', function() {
                this.value = this.value.replace(/\D/g,'');
                if(this.value.length > 9){
                    this.value = this.value.slice(0,9); 
                }
            });
        });
    })(jQuery);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/user/register.blade.php ENDPATH**/ ?>