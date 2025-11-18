<?php $__env->startSection('site-title'); ?>
<?php echo e(__('User Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>



        <?php if(get_static_option('donations_module_status')): ?>
            <div class="col-lg-6">
                <div class="user-dashboard-card style-01">
                    <div class="icon"><i class="fas fa-donate"></i></div>
                    <div class="content">
                        <h4 class="title"><?php echo e(__('Total')); ?> <?php echo e(get_static_option('donation_page_name')); ?></h4>
                        <span class="number"><?php echo e($donation); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/frontend/user/dashboard/user-home.blade.php ENDPATH**/ ?>