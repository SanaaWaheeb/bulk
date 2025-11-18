<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url" content="<?php echo e(route('frontend.donations.single',$donation->slug)); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?php echo e($donation->title); ?>"/>
    <?php echo render_og_meta_image_by_attachment_id($donation->image); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e($donation->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e($donation->title_ar); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($donation->meta_tags); ?>">
    <meta name="tags" content="<?php echo e($donation->meta_description); ?>">
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
    <style>
        #termsAndConditions, #privacyPolicy {
            margin-top: 20px;
            border-radius: 5px;
        }

        #termsAndConditions label, #privacyPolicy label {
            display: block;
            margin-bottom: 20px;
        }

        #termsAndConditions input[type="checkbox"], #privacyPolicy input[type="checkbox"] {
            height: auto;
            margin-right: 5px;
        }

        #termsAndConditions a, #privacyPolicy a {
            color: var(--main-color-one);
            cursor: pointer;
        }

        .donation_wrapper a {
            all: unset;
            display: unset;
            color: unset;
            font-size: unset;
            font-weight: unset;
            text-decoration: unset;
            border-radius: unset;
            background: unset;
        }

        .donation_wrapper a:hover {
            background: unset;
        }
        
        .goback-btn {
    color: #333 !important;
    background-color: transparent !important;
    border: 1px solid #333; /* add border to keep visible shape */
    padding: 6px 12px;
    display: inline-block;
    transition: color 0.3s ease, background-color 0.3s ease;
}

.goback-btn:hover {
    color: #fff !important;
    background-color: #000 !important; /* black hover bg */
    border-color: #000 !important;
    text-decoration: none;
}


    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $selected_quantity = request()->get('number') ?? 1;
?>
<?php
    $max_available = max(1, $donation->amount - $donation->raised);
?>

<section class="blog-content-area padding-top-120 padding-bottom-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="donation_wrapper">
                    <div class="btn-wrapper">
                        <a href="<?php echo e(route('frontend.donations.single',$donation->slug)); ?>" class="goback-btn pull-right"><?php echo e(__('Go Back')); ?></a>
                    </div>

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

                    <form action="<?php echo e(route('frontend.donations.log.store')); ?>" method="post" enctype="multipart/form-data" class="donation-form-wrapper">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="cause_id" value="<?php echo e($donation->id); ?>">
                        <input type="hidden" name="price" value="<?php echo e($donation->price); ?>">
                        <input type="hidden" name="selected_payment_gateway" value="manual_payment">
                        <!--<input type="hidden" name="phone" placeholder="<?php echo e(__('Phone')); ?>" value="<?php echo e(auth()->user()->phone); ?>">-->
                                
                        <div class="tab_section mb-4">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="one_time_donation_tab" role="tabpanel">
                                    <div class="single_amount_wrapper">
                                        <?php
                                            $custom_amounts_once = 1;
                                            $custom_amounts_once = !empty($custom_amounts_once) ? explode(',', $custom_amounts_once) : [1];
                                        ?>
                                    </div>

<div style="display: flex; align-items: center; gap: 10px;">
    <label for="donation_amount_user_input" style="margin: 0;"><?php echo e(__('الكمية: ')); ?></label>
<input type="number" name="amount"
       value="<?php echo e(min($selected_quantity, $max_available)); ?>" step="1"
       min="1" max="<?php echo e($max_available); ?>"
       id="donation_amount_user_input" class="form-control" style="width: 80px; border: 1px solid #ced4da;">

</div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <input type="text" name="name" placeholder="<?php echo e(__('Name')); ?>"
                                   <?php if(auth()->check()): ?> value="<?php echo e(auth()->user()->name); ?>" <?php endif; ?> class="form-control">
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
        <input type="text" name="phone" class="form-control"
       value="<?php echo e(auth()->user()->phone ?? ''); ?>" required style="height: 38px;">
    </div>
</div>

                        
                        
                        <!--<div class="form-group">-->
                        <!--    <input type="email" name="email" placeholder="<?php echo e(__('Email')); ?>"-->
                        <!--           <?php if(auth()->check()): ?> value="<?php echo e(auth()->user()->email); ?>" <?php endif; ?> class="form-control">-->
                        <!--</div>-->
                        <!-- <div class="form-group">-->
                        <!--    <input type="text" name="phone" placeholder="<?php echo e(__('Phone')); ?>"-->
                        <!--           <?php if(auth()->check()): ?> value="<?php echo e(auth()->user()->phone); ?>" <?php endif; ?> class="form-control">-->
                        <!--</div>-->
                        <div class="form-group">
                            <input type="text" name="city" placeholder="<?php echo e(__('City')); ?>"
                                   <?php if(auth()->check()): ?> value="<?php echo e(auth()->user()->city); ?>" <?php endif; ?> class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="district" placeholder="<?php echo e(__('الحي')); ?>"
                                   <?php if(auth()->check()): ?> value="<?php echo e(auth()->user()->district); ?>" <?php endif; ?> class="form-control">
                        </div>
                         <div class="form-group">
                            <input type="text" name="address" placeholder="<?php echo e(__('Address')); ?>"
                                   <?php if(auth()->check()): ?> value="<?php echo e(auth()->user()->address); ?>" <?php endif; ?> class="form-control">
                        </div>


                        <!--<?php echo render_payment_gateway_for_form(); ?>-->

                        <!--<?php if(!empty(get_static_option('manual_payment_gateway'))): ?>-->
                        <!--    <div class="form-group manual_payment_transaction_field">-->
                        <!--        <div class="label"><?php echo e(__('Attach Your Bank Document')); ?></div>-->
                        <!--        <input class="form-control btn btn-warning btn-sm" type="hidden" name="manual_payment_attachment">-->
                        <!--        <span class="help-info"><?php echo get_manual_payment_description(); ?></span>-->
                        <!--    </div>-->
                        <!--<?php endif; ?>-->

                        <?php if(get_static_option('donation_terms_and_conditions') && get_static_option('donation_privacy_policy')): ?>
                        <div id="termsAndConditions">
                            <label>
                                <input type="checkbox" name="agreeTerms" required>
                                <?php echo e(__('أوافق على')); ?>

                                <a href="<?php echo e(route('frontend.dynamic.page',[getSlugByPageId(get_static_option('donation_terms_and_conditions')), get_static_option('donation_terms_and_conditions')])); ?>" target="_blank"><?php echo e(__('الشروط والأحكام')); ?></a>
                                <?php echo e(__('و')); ?>

                                <a href="<?php echo e(route('frontend.dynamic.page',[getSlugByPageId(get_static_option('donation_privacy_policy')), get_static_option('donation_privacy_policy')])); ?>" target="_blank"><?php echo e(__('وسياسة الخصوصية')); ?></a>
                            </label>
                        </div>
                        <?php endif; ?>

                        <div class="donate-seperate-page-button">
                            <div class="btn-wrapper">
                                <button class="boxed-btn reverse-color btn-sm" type="submit">
                                    <?php echo e(__('اكمال الطلب')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="donation-amount-details-wrapper">
                    <h3 class="title"><?php echo e(__('تفاصيل الطلب')); ?></h3>
                    <div class="your-area-donation-wrap">
                        <div class="thumb">
                            <?php echo render_image_markup_by_attachment_id($donation->image,'','thumb'); ?>

                        </div>

                    </div>
                    <ul>
                        <li>
                            <span><?php echo e(__('سعر المنتج')); ?></span>
                            <span class="price"><?php echo e(amount_with_currency_symbol($donation->price ?? 0)); ?></span>
                        </li>
                        <li>
                            <span><?php echo e(__('Quantity')); ?></span>
                            <span class="price donation_amount"><?php echo e($selected_quantity); ?></span>
                        </li>
                        <li class="total">
                            <span><?php echo e(__('الاجمالي')); ?></span>
                            <span class="price total_amount">
                                <?php echo e(amount_with_currency_symbol(($donation->price ?? 0) * $selected_quantity)); ?>

                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (isset($component)) { $__componentOriginal0a0c44ec0e77c6e781a03c2fda86fc75 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0a0c44ec0e77c6e781a03c2fda86fc75 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.markup','data' => ['userUpload' => true,'imageUploadRoute' => route('user.upload.media.file')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['userUpload' => true,'imageUploadRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file'))]); ?>
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

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/frontend/js/jQuery.rProgressbar.min.js')); ?>"></script>
<script>
    (function ($) {
        'use strict';

        $(document).ready(function () {
function updateTotal() {
    let quantityInput = $('#donation_amount_user_input');
    let quantity = parseInt(quantityInput.val()) || 1;
    let max = <?php echo e($max_available); ?>;
    
    if (quantity > max) {
        quantity = max;
        quantityInput.val(max);
    }

    let unitPrice = <?php echo e($donation->price ?? 0); ?>;
    let total = unitPrice * quantity;

    $('.donation_amount').text(quantity);
    $('.total_amount').text(total.toLocaleString() + ' ريال');

}


            $(document).on('input', '#donation_amount_user_input', function () {
                updateTotal();
            });

            updateTotal(); // initial calculation
        });
    })(jQuery);
</script>

<?php if (isset($component)) { $__componentOriginal9c9e2f22010721f1a8a11abf87b15b5e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c9e2f22010721f1a8a11abf87b15b5e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.js','data' => ['deleteRoute' => route('user.upload.media.file.delete'),'imgAltChangeRoute' => route('user.upload.media.file.alt.change'),'allImageLoadRoute' => route('user.upload.media.file.all')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['deleteRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.delete')),'imgAltChangeRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.alt.change')),'allImageLoadRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.all'))]); ?>
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

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/frontend/donations/donation-payment-separate-page.blade.php ENDPATH**/ ?>