
<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('donation_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('donation_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('donation_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('donation_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    use Illuminate\Support\Facades\DB;

    $dividerShown = false;
    $categories   = DB::table('cause_categories')->where('status', 'publish')->get();
    $currentCat   = $currentCategory ?? request('category', 'all');

    // ✅ اللغة الحالية (ar, ar_SA, en, en_US, ...)
    $locale   = app()->getLocale();
    $isArabic = (strpos($locale, 'ar') === 0);
?>

<section class="donation-content-area padding-top-120 padding-bottom-90">
    <div class="container">

        <!-- Filter Bar -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="filter-bar bg-white p-4 rounded shadow-sm border text-center">
                    <div class="filter-buttons">
                        
                        <button
                            type="button"
                            class="btn btn-sm mx-1 <?php echo e($currentCat === 'all' ? 'btn-dark' : 'btn-outline-dark'); ?>"
                            onclick="simpleFilter('all')">
                            <?php echo e($isArabic ? 'الكل' : __('All')); ?>

                        </button>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                // 🟢 عنوان الكاتيجوري حسب اللغة مع Fallback
                                $catTitleAr = $category->title ?? '';
                                $catTitleEn = $category->title_en ?? '';

                                $catTitle = $isArabic
                                    ? ($catTitleAr ?: $catTitleEn)
                                    : ($catTitleEn ?: $catTitleAr);
                            ?>

                            <button
                                type="button"
                                class="btn btn-sm mx-1 <?php echo e((string)$currentCat === (string)$category->id ? 'btn-dark' : 'btn-outline-dark'); ?>"
                                onclick="simpleFilter('<?php echo e($category->id); ?>')">
                                <?php echo e($catTitle); ?>

                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>

        
        <div class="row" id="items-container">
            <?php $__empty_1 = true; $__currentLoopData = $all_donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $deadline   = !empty($data->deadline) ? \Carbon\Carbon::parse($data->deadline) : null;
                    $isExpired  = $deadline && $deadline->isPast();
                    $categoryId = $data->categories_id ?? 'none';
                ?>

                <?php if($isExpired && !$dividerShown): ?>
                    <?php $dividerShown = true; ?>
                    <div class="col-12">
                        <hr class="my-4">
                        <h5 class="mb-1 text-muted"><?php echo e(__('Completed Orders')); ?></h5>
                        <p class="text-muted small mb-3">
                            <?php echo e(__('.The following items have expired and may not be available for order')); ?>

                        </p>
                    </div>
                <?php endif; ?>

                <?php
                    // ✅ عنوان التبرع حسب اللغة مع Fallback
                    $itemTitleAr = $data->title_ar ?? $data->title;
                    $itemTitleEn = $data->title_en ?? $data->title;

                    $itemTitle = $isArabic
                        ? ($itemTitleAr ?: $itemTitleEn)
                        : ($itemTitleEn ?: $itemTitleAr);
                ?>

                <div class="col-lg-4 item" data-cat="<?php echo e($categoryId); ?>">
                    <?php if (isset($component)) { $__componentOriginal0dbeab5a0eab7b709f7636644976f458 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0dbeab5a0eab7b709f7636644976f458 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.donation.grid','data' => ['featured' => $data->featured,'image' => $data->image,'amount' => $data->amount,'price' => $data->price,'marketPrice' => $data->market_price,'raised' => $data->raised,'slug' => $data->slug,'title' => $itemTitle,'excerpt' => $data->excerpt,'deadline' => $data->deadline,'reward' => $data->reward,'buttontext' => get_static_option('donation_button_text')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.donation.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['featured' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->featured),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->image),'amount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->amount),'price' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->price),'market_price' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->market_price),'raised' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->raised),'slug' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->slug),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($itemTitle),'excerpt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->excerpt),'deadline' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->deadline),'reward' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->reward),'buttontext' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_static_option('donation_button_text'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0dbeab5a0eab7b709f7636644976f458)): ?>
<?php $attributes = $__attributesOriginal0dbeab5a0eab7b709f7636644976f458; ?>
<?php unset($__attributesOriginal0dbeab5a0eab7b709f7636644976f458); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0dbeab5a0eab7b709f7636644976f458)): ?>
<?php $component = $__componentOriginal0dbeab5a0eab7b709f7636644976f458; ?>
<?php unset($__componentOriginal0dbeab5a0eab7b709f7636644976f458); ?>
<?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center py-5">
                    <h5 class="mb-3"><?php echo e(__('No items are currently available')); ?></h5>
                    <a href="<?php echo e(url()->current()); ?>" class="btn btn-outline-primary"><?php echo e(__('Refresh page')); ?></a>
                </div>
            <?php endif; ?>

            <div class="col-lg-12 text-center">
                <nav class="pagination-wrapper" aria-label="Page navigation">
                    <?php echo e($all_donations->links()); ?>

                </nav>
            </div>
        </div>
    </div>
</section>

<script>
function simpleFilter(category) {
    const url = new URL(window.location.href);

    if (category === 'all') {
        url.searchParams.delete('category');
    } else {
        url.searchParams.set('category', category);
    }

    window.location.href = url.toString();
}
</script>

<style>
.filter-bar {
    margin-bottom: 2rem;
}
.filter-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 8px;
}
.item {
    transition: all 0.3s ease;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/donations/donation.blade.php ENDPATH**/ ?>