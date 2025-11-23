
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Payment Success For:')); ?> <?php echo e(optional($donation_logs->cause)->title_ar); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="donation-success-page-content padding-120">
        <div class="container">
            <!-- Success Header -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <div class="success-header">
                        <div class="success-icon mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h1 class="success-title mb-3"><?php echo e(get_static_option('donation_success_page_title')); ?></h1>
                        <p class="success-description text-muted"><?php echo e(get_static_option('donation_success_page_description')); ?></p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <!-- Donation Details Card - Now on the left -->
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-header bg-professional-secondary text-white">
                                    <h5 class="mb-0">
                                        <i class="fas fa-receipt me-2"></i>
                                        <?php echo e(__('Donation Details')); ?>

                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="donation-details">
                                        <div class="detail-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                            <span class="detail-label fw-medium">
                                                <i class="fas fa-user me-2 text-primary"></i>
                                                <?php echo e(__('Name')); ?>

                                            </span>
                                            <span class="detail-value fw-bold text-dark"><?php echo e($donation_logs->name); ?></span>
                                        </div>
                                        
                                        <div class="detail-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                            <span class="detail-label fw-medium">
                                                <i class="fas fa-envelope me-2 text-primary"></i>
                                                <?php echo e(__('Email')); ?>

                                            </span>
                                            <span class="detail-value text-dark"><?php echo e($donation_logs->email); ?></span>
                                        </div>
                                        
                                        <div class="detail-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                            <span class="detail-label fw-medium">
                                                <i class="fas fa-phone me-2 text-primary"></i>
                                                <?php echo e(__('Phone')); ?>

                                            </span>
                                            <span class="detail-value text-dark">0<?php echo e($donation_logs->user->username); ?></span>
                                        </div>
                                        
                                        <div class="detail-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                            <span class="detail-label fw-medium">
                                                <i class="fas fa-coins me-2 text-primary"></i>
                                                <?php echo e(__('Amount')); ?>

                                            </span>
                                            <span class="detail-value fw-bold text-dark"><?php echo e($donation_logs->amount); ?></span>
                                        </div>
                                        
                                        <div class="detail-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                            <span class="detail-label fw-medium">
                                                <i class="fas fa-dollar-sign me-2 text-primary"></i>
                                                <?php echo e(__('Price')); ?>

                                            </span>
                                            <span class="detail-value fw-bold text-dark"><?php echo e(amount_with_currency_symbol($donation_logs->price)); ?></span>
                                        </div>
                                        
                                        <div class="detail-item d-flex justify-content-between align-items-center py-4 bg-light rounded-3 mt-3">
                                            <span class="detail-label fw-bold">
                                                <i class="fas fa-calculator me-2 text-success"></i>
                                                <?php echo e(__('Total Price')); ?>

                                            </span>
                                            <span class="detail-value fw-bold text-success fs-4"><?php echo e(amount_with_currency_symbol($donation_logs->totalPrice)); ?></span>
                                        </div>
                                        
                                        <?php if(!empty($donation_logs->reward_point)): ?>
                                            <div class="detail-item d-flex justify-content-between align-items-center py-3 mt-3">
                                                <span class="detail-label fw-medium">
                                                    <i class="fas fa-star me-2 text-warning"></i>
                                                    <?php echo e(__('Reward Points')); ?>

                                                </span>
                                                <span class="detail-value">
                                                    <span class="badge bg-warning text-dark fs-6 px-3 py-2"><?php echo e($donation_logs->reward_point); ?></span>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- What's Next Section - Now on the right -->
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-header bg-professional-primary text-white">
                                    <h5 class="mb-0">
                                        <i class="fas fa-compass me-2"></i>
                                        <?php echo e(__('What\'s Next?')); ?>

                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="navigation-options">
                                        <div class="button-group d-flex flex-column gap-3">
                                            <!-- Go to Home - Now at the top -->
                                            <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-primary btn-lg shadow-sm">
                                                <i class="fas fa-home me-2"></i>
                                                <?php echo e(__('Go To Home')); ?>

                                            </a>
                                            
                                            <?php if(auth()->guard('web')->check()): ?>
                                                <!-- Go to User Donations instead of Dashboard -->
                                                <a href="<?php echo e(url('user-home/donations')); ?>" class="btn btn-outline-primary btn-lg">
                                                    <i class="fas fa-shopping-bag me-2"></i>
                                                    <?php echo e(__('View My Orders')); ?>

                                                </a>
                                            <?php endif; ?>
                                            
                                            <a href="<?php echo e(route('frontend.donations.single',$donation->slug)); ?>" class="btn btn-outline-primary btn-lg">
                                                <i class="fas fa-arrow-left me-2"></i>
                                                <?php echo e(__('Go back to the Product')); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .donation-success-page-content {
            background: #ffffff;
            min-height: 100vh;
            padding: 2rem 0;
        }
        
        .success-icon {
            animation: bounce 2s infinite;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
        
        .success-title {
            color: #28a745;
            font-weight: 700;
            text-shadow: none;
        }
        
        .success-description {
            color: #6c757d !important;
            font-size: 1.1rem;
        }
        
        .card {
            transition: all 0.3s ease;
            border-radius: 12px !important;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
        }
        
        .card-header {
            border-radius: 12px 12px 0 0 !important;
            border: none !important;
            padding: 1.25rem;
        }
        
        /* Professional color scheme - brighter and more vibrant */
        .bg-professional-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
        }
        
        .bg-professional-secondary {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
        }
        
        .detail-item {
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 -0.5rem;
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
        }
        
        .detail-item:hover {
            background-color: rgba(0,123,255,0.05) !important;
            transform: translateX(5px);
        }
        
        .detail-label {
            color: #495057;
            font-size: 0.95rem;
        }
        
        .detail-value {
            font-size: 0.95rem;
        }
        
        .campaign-image img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .campaign-image:hover img {
            transform: scale(1.05);
        }
        
        .campaign-title a {
            color: #343a40;
            transition: color 0.3s ease;
            font-weight: 600;
        }
        
        .campaign-title a:hover {
            color: #007bff;
        }
        
        .navigation-card {
            background: #ffffff !important;
            border: 1px solid #dee2e6 !important;
        }
        
        .btn {
            transition: all 0.3s ease;
            border-radius: 8px !important;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
            border: none !important;
            color: white !important;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3 0%, #004085 100%) !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        
        .btn-primary:focus, .btn-primary:active, .btn-primary:not(:disabled):not(.disabled):active {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
            color: white !important;
            border: none !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
        }
        
        .btn-primary:not(:hover):not(:focus):not(:active) {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
            color: white !important;
            transform: translateY(0);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .btn-outline-primary {
            border: 2px solid #007bff !important;
            color: #007bff !important;
            background: transparent !important;
        }
        
        .btn-outline-primary:hover {
            background: #007bff !important;
            color: white !important;
        }
        
        .btn-outline-secondary {
            border: 2px solid #6c757d;
            color: #6c757d;
            background: transparent;
        }
        
        .btn-outline-secondary:hover {
            background: #6c757d;
            color: white;
        }
        
        .image-container {
            position: relative;
            overflow: hidden;
        }
        
        .image-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 0%, rgba(0, 123, 255, 0.1) 100%);
            pointer-events: none;
            transition: opacity 0.3s ease;
            opacity: 0;
        }
        
        .image-container:hover::after {
            opacity: 1;
        }
        
        .badge {
            font-size: 0.85rem !important;
            font-weight: 600;
        }
        
        .button-group .btn {
            min-width: 200px;
        }
        
        @media (max-width: 768px) {
            .detail-item {
                flex-direction: column;
                align-items: flex-start !important;
                padding: 1rem 0.5rem !important;
            }
            
            .detail-value {
                margin-top: 0.5rem;
                font-size: 0.9rem;
            }
            
            .success-title {
                font-size: 1.8rem;
            }
            
            .card-body {
                padding: 1.5rem !important;
            }
            
            .button-group .btn {
                min-width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .success-title {
                font-size: 1.5rem;
            }
            
            .success-description {
                font-size: 1rem;
            }
            
            .card-body {
                padding: 1rem !important;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/donations/donation-success.blade.php ENDPATH**/ ?>