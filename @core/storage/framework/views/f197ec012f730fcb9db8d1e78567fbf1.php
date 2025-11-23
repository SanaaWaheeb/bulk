
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('User Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="login-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">



                    <div class="user-dashboard-wrapper">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="mobile_nav">
                                <i class="fas fa-cogs"></i>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"><i class="fa fa-user mr-1"></i><?php echo e(optional(Auth::guard('web')->user())->name); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(request()->routeIs('user.home.edit.profile')): ?> active <?php endif; ?> " href="<?php echo e(route('user.home.edit.profile')); ?>"><?php echo e(__('Edit Profile')); ?></a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link <?php if(request()->routeIs('user.home')): ?> active <?php endif; ?>" href="<?php echo e(route('user.home')); ?>"><?php echo e(__('Dashboard')); ?></a>-->
                            <!--</li>-->

                            <!--<?php if(!empty(get_static_option('events_module_status'))): ?>-->
                            <!--    <li class="nav-item">-->
                            <!--        <a class="nav-link <?php if(request()->routeIs('user.home.event.booking')): ?> active <?php endif; ?>" href="<?php echo e(route('user.home.event.booking')); ?>"><?php echo e(get_static_option('events_page_name')); ?> <?php echo e(__('Booking')); ?></a>-->
                            <!--    </li>-->
                            <!--<?php endif; ?>-->
                            <!--<?php if(!empty(get_static_option('donations_module_status'))): ?>-->
                                <li class="nav-item">
                                    <a class="nav-link <?php if(request()->routeIs('user.home.donations')): ?> active <?php endif; ?>" href="<?php echo e(route('user.home.donations')); ?>" ><?php echo e(__('All')); ?> <?php echo e(get_static_option('donation_page_name')); ?></a>
                                </li>
                            <?php endif; ?>

                          <?php if(Auth::guard('web')->user()->campaign_permission == 'on'): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if( request()->routeIs('user.campaign.all') || request()->routeIs('user.campaign.new') ||request()->routeIs('user.campaign.edit') || request()->routeIs('user.all.update.cause.page') || request()->routeIs('user.add.new.update.cause.page') ): ?> active <?php endif; ?> " href="<?php echo e(route('user.campaign.all')); ?>"><?php echo e(__('Campaign List')); ?></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php if( request()->routeIs('user.campaign.gift.all') || request()->routeIs('user.campaign.gift.new') ||request()->routeIs('user.campaign.gift.edit')): ?> active <?php endif; ?> " href="<?php echo e(route('user.campaign.gift.all')); ?>"><?php echo e(__('Campaign Gifts')); ?></a>
                            </li>

                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link  <?php if( request()->routeIs('user.campaign.log.withdraw')): ?> active <?php endif; ?>"  href="<?php echo e(route('user.campaign.log.withdraw')); ?>"><?php echo e(__('Withdraw Logs')); ?></a>-->
                            <!--</li>-->
                          <?php endif; ?>


                            <li class="nav-item">
                                <a class="nav-link <?php if(request()->routeIs('user.home.support.tickets')): ?> active <?php endif; ?>" href="<?php echo e(route('user.home.support.tickets')); ?>" > اقتراح منتج</a>
                            </li>

                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link <?php if(request()->routeIs('user.home.edit.profile')): ?> active <?php endif; ?> " href="<?php echo e(route('user.home.edit.profile')); ?>"><?php echo e(__('Edit Profile')); ?></a>-->
                            <!--</li>-->
                            
                           
                            <li class="nav-item">
                                <a class="nav-link"  href="<?php echo e(route('user.logout')); ?>"
                                   onclick="event.preventDefault();document.getElementById('logout_submit_btn').dispatchEvent(new MouseEvent('click'));">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                    <button id="logout_submit_btn" type="submit"></button>
                                </form>
                            </li>
                        </ul>
                        <div class="tab-content">
                          
                            <div class="tab-pane active" role="tabpanel">
                                
                                <div class="message-show margin-top-10">
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
                                <?php echo $__env->yieldContent('section'); ?>
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
        $(document).ready(function (){
           $('select[name="country"] option[value="<?php echo e(optional(auth()->guard('web')->user())->country); ?>"]').attr('selected',true);
           $(document).on('click','.mobile_nav',function(e){
              e.preventDefault(); 
               $(this).parent().toggleClass('show');
           });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/user/dashboard/user-master.blade.php ENDPATH**/ ?>