<?php
    $home_page_variant = isset($home_page) ? $home_page : get_static_option('home_page_variant');
?>

<div class="header-style-01  header-variant-<?php echo e($home_page_variant); ?> <?php if(request()->path() !== '/'): ?> inner-page <?php endif; ?>">
    <div class="header-style-01">
        <div class="topbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="topbar-inner">
                            <div class="left-contnet">
                                <ul class="info-items">
                                    <?php
                                        $all_icon_fields =  filter_static_option_value('home_page_01_topbar_info_list_icon_icon',$global_static_field_data);
                                        $all_icon_fields =  !empty($all_icon_fields) ? unserialize($all_icon_fields) : [];
                                        $all_title_fields = filter_static_option_value('home_page_01_topbar_info_list_text',$global_static_field_data);
                                        $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [];
                                    ?>
                                    <?php $__currentLoopData = $all_icon_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><i class="<?php echo e($icon); ?>"></i> <?php echo e(isset($all_title_fields[$index]) ? $all_title_fields[$index] : ''); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="right-contnet">
                                <div class="social-link">
                                    <ul>
                                        <?php $__currentLoopData = $all_social_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="<?php echo e($data->url); ?>"><i class="<?php echo e($data->icon); ?>"></i></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="volunteer-right">
                                    <ul class="info-items-02">
                                        <?php if (isset($component)) { $__componentOriginala02c5612010dcb7b66efe3676cfc560d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala02c5612010dcb7b66efe3676cfc560d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front-user-login-li','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front-user-login-li'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala02c5612010dcb7b66efe3676cfc560d)): ?>
<?php $attributes = $__attributesOriginala02c5612010dcb7b66efe3676cfc560d; ?>
<?php unset($__attributesOriginala02c5612010dcb7b66efe3676cfc560d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala02c5612010dcb7b66efe3676cfc560d)): ?>
<?php $component = $__componentOriginala02c5612010dcb7b66efe3676cfc560d; ?>
<?php unset($__componentOriginala02c5612010dcb7b66efe3676cfc560d); ?>
<?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-area navbar-expand-lg has-topbar nav-style-02">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
    <a href="<?php echo e(url('/')); ?>" class="logo logo-limit">
        <?php if(!empty(filter_static_option_value('site_logo',$global_static_field_data))): ?>
            <?php echo render_image_markup_by_attachment_id(filter_static_option_value('site_logo',$global_static_field_data)); ?>

        <?php else: ?>
            <h2 class="site-title"><?php echo e(filter_static_option_value('site_title',$global_static_field_data)); ?></h2>
        <?php endif; ?>
    </a>
</div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                    <ul class="navbar-nav">
                         <?php echo render_frontend_menu($primary_menu); ?>

                        <li class="search-lists">
                          <?php if(!empty(get_static_option('home_page_navbar_search_show_hide'))): ?>
                            <div class="search navbar-search position-relative">
                                <div class="search-open">
                                    <i class="las la-search icon"></i>
                                </div>
                                <div class="search-bar">
                                    <form class="menu-search-form" action="<?php echo e(route('frontend.donation.search')); ?>">
                                        <div class="search-close"> <i class="las la-times"></i> </div>
                                        <input class="item-search" name="search" id="search" type="text" placeholder="<?php echo e(__('Search Here.....')); ?>">
                                        <button type="submit"> <?php echo e(__('Search')); ?></button>
                                    </form>
                                </div>
                            </div>
                          <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <?php
    // جلب لغة المستخدم الحالية من نظام السكربت
    // لو عندك helper اسمه get_user_lang() استخدمه:
    $currentLocale = function_exists('get_user_lang')
        ? get_user_lang()
        : (session('lang') ?? app()->getLocale());

    // نخلي القيم ثابتة حسب الـ slug اللي تستخدمه في الروت
    $labels = [
        'en' => 'English',
        'ar' => 'العربية',
    ];

    $currentLabel = $labels[$currentLocale] ?? 'English';
?>

<?php if(!empty(filter_static_option_value('home_page_navbar_button_status',$global_static_field_data))): ?>
    <li class="nav-item dropdown" style="list-style: none; margin-left: 15px;">
        <button class="btn btn-sm btn-outline-light dropdown-toggle d-flex align-items-center"
                type="button"
                id="languageDropdown"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                style="
                    padding: 6px 18px;
                    font-size: 13px;
                    border-radius: 999px;
                    background-color: #333;
                    color: #fff;
                    border-color: transparent;
                ">
            <span style="margin-inline-end: 6px;">
                <?php echo e($currentLabel); ?>

            </span>
        </button>

        <div class="dropdown-menu dropdown-menu-right shadow-sm border-0"
             aria-labelledby="languageDropdown"
             style="min-width: 150px; font-size: 13px;">
            <a href="<?php echo e(route('home.language.switch', 'en')); ?>"
               class="dropdown-item <?php if($currentLocale === 'en'): ?> active <?php endif; ?>">
                English
            </a>
            <a href="<?php echo e(route('home.language.switch', 'ar')); ?>"
               class="dropdown-item <?php if($currentLocale === 'ar'): ?> active <?php endif; ?>">
                العربية
            </a>
        </div>
    </li>

    <div class="nav-right-content d-flex align-items-center">
        <ul class="nav mb-0">
            <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginald1925107298da580a065174dff34523e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1925107298da580a065174dff34523e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front-donate-btn','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front-donate-btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1925107298da580a065174dff34523e)): ?>
<?php $attributes = $__attributesOriginald1925107298da580a065174dff34523e; ?>
<?php unset($__attributesOriginald1925107298da580a065174dff34523e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1925107298da580a065174dff34523e)): ?>
<?php $component = $__componentOriginald1925107298da580a065174dff34523e; ?>
<?php unset($__componentOriginald1925107298da580a065174dff34523e); ?>
<?php endif; ?>
            </li>
        </ul>
    </div>
<?php endif; ?>

            </div>
        </nav>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/partials/navbar.blade.php ENDPATH**/ ?>