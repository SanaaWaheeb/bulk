<?php
    $home_page_variant = $home_page ?? get_static_option('home_page_variant');
?>
<div class="header-style-01 home-page-variant-<?php echo e($home_page_variant); ?>">
    <div class="topbar-area style-02 home-page-four">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="topbar-inner style-01">
                        <div class="left-contnet">
                            <ul class="info-items">
                                <?php
                                    $all_icon_fields =  filter_static_option_value('home_page_01_topbar_info_list_icon_icon',$global_static_field_data);
                                    $all_icon_fields =  !empty($all_icon_fields) ? unserialize($all_icon_fields,['class' => false]) : [];
                                    $all_title_fields = filter_static_option_value('home_page_01_topbar_info_list_text',$global_static_field_data);
                                    $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields,['class' => false]) : [];
                                ?>
                                <?php $__currentLoopData = $all_icon_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><i class="<?php echo e($icon); ?> "></i> <?php echo e(isset($all_title_fields[$index]) ? $all_title_fields[$index] : ''); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="right-contnet">
                            <div class="social-link">
                                <ul>
                                    <?php $__currentLoopData = $all_social_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($data->url); ?>"><i class="<?php echo e($data->icon); ?>"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                     
          <?php
    // جلب لغة المستخدم الحالية
    $currentLocale = function_exists('get_user_lang')
        ? get_user_lang()
        : (session('lang') ?? app()->getLocale());

    $labels = [
        'en' => 'English',
        'ar' => 'العربية',
    ];

    $currentLabel = $labels[$currentLocale] ?? 'English';
?>

<?php if(!empty(filter_static_option_value('home_page_navbar_button_status',$global_static_field_data))): ?>
    <li class="dropdown" style="list-style: none; margin-left: 5px;">
        <button class="btn btn-outline-dark dropdown-toggle"
                type="button"
                id="languageDropdown"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                style="  padding: 6px 18px;
                    font-size: 13px;
                    border-radius: 999px;
                    background-color:#0e244c;
                    color: #fff;
                    border-color: transparent;"
                onmouseover="this.style.backgroundColor='#495057'; this.style.color='white'; this.style.borderColor='#495057';"
                onmouseout="this.style.backgroundColor='white'; this.style.color='#000'; this.style.borderColor='#000000';">
            
            <?php echo e($currentLabel); ?>

        </button>
    
        <div class="dropdown-menu" aria-labelledby="languageDropdown">
            <a href="<?php echo e(route('home.language.switch', 'en')); ?>"
               class="dropdown-item <?php if($currentLocale === 'en'): ?> active <?php endif; ?>"
               style="color: #000 !important;">
                English
            </a>
            <a href="<?php echo e(route('home.language.switch', 'ar')); ?>"
               class="dropdown-item <?php if($currentLocale === 'ar'): ?> active <?php endif; ?>"
               style="color: #000 !important;">
                العربية
            </a>
        </div>
    </li>
<?php endif; ?>


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
    <!-- support bar area end -->
    <nav class="navbar navbar-area navbar-expand-lg charity-nav-05 has-topbar has-topbar-04 nav-style-02">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="<?php echo e(url('/')); ?>" class="logo">
                        <?php if(!empty(filter_static_option_value('site_white_logo',$global_static_field_data))): ?>
                            <?php echo render_image_markup_by_attachment_id(filter_static_option_value('site_white_logo',$global_static_field_data)); ?>

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

                </ul>
            </div>
            <div class="nav-right-content">
                <ul>
                    <li>
                        <?php if(!empty(get_static_option('home_page_navbar_search_show_hide'))): ?>
                        <?php if (isset($component)) { $__componentOriginal0990e4da8ff7298cff48ffdcadccb6fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0990e4da8ff7298cff48ffdcadccb6fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.search-popup','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.search-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0990e4da8ff7298cff48ffdcadccb6fd)): ?>
<?php $attributes = $__attributesOriginal0990e4da8ff7298cff48ffdcadccb6fd; ?>
<?php unset($__attributesOriginal0990e4da8ff7298cff48ffdcadccb6fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0990e4da8ff7298cff48ffdcadccb6fd)): ?>
<?php $component = $__componentOriginal0990e4da8ff7298cff48ffdcadccb6fd; ?>
<?php unset($__componentOriginal0990e4da8ff7298cff48ffdcadccb6fd); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </li>
                    <?php if (isset($component)) { $__componentOriginal81546a7bcb78f000a1f4a2df729e7ae5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81546a7bcb78f000a1f4a2df729e7ae5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front-donate-btn-last-three-home','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front-donate-btn-last-three-home'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81546a7bcb78f000a1f4a2df729e7ae5)): ?>
<?php $attributes = $__attributesOriginal81546a7bcb78f000a1f4a2df729e7ae5; ?>
<?php unset($__attributesOriginal81546a7bcb78f000a1f4a2df729e7ae5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81546a7bcb78f000a1f4a2df729e7ae5)): ?>
<?php $component = $__componentOriginal81546a7bcb78f000a1f4a2df729e7ae5; ?>
<?php unset($__componentOriginal81546a7bcb78f000a1f4a2df729e7ae5); ?>
<?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- navbar area end -->
</div>

<?php if(get_static_option('home_page_header_slider_area_05_section_status')): ?>
<div class="header-slider-one">
<?php $__currentLoopData = $all_header_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="header-area style-02 header-bg-04 banner-padiing-02" <?php echo render_background_image_markup_by_attachment_id($data->image); ?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-7 col-sm-9">
                    <div class="header-inner-05 desktop-center">
    <?php
       

        $locale   = app()->getLocale();
        $isArabic = $locale === 'ar' || Str::startsWith($locale, 'ar');

        // العنوان على حسب اللغة مع fallback
        $title = $isArabic
            ? ($data->title ?? $data->title_en)          // عربي أولاً، لو فاضي استخدم الإنجليزي
            : ($data->title_en ?: $data->title);         // إنجليزي أولاً، لو فاضي استخدم العربي

        // الساب تايتل على حسب اللغة مع fallback
        $subtitle = $isArabic
            ? ($data->subtitle ?? $data->subtitle_en)
            : ($data->subtitle_en ?: $data->subtitle);

        $title = trim($title ?? '');

        if ($title !== '') {
            // تقسيم العنوان لأول كلمة والباقي
            $title_arr = preg_split('/\s+/', $title);
            $firstWord = $title_arr[0] ?? '';
            array_shift($title_arr);
        } else {
            $firstWord = '';
            $title_arr = [];
        }
    ?>

    <?php if(!empty($subtitle)): ?>
        <p class="animate-style-02"><?php echo e($subtitle); ?></p>
    <?php endif; ?>

    <h1 class="title animate-style">
        <?php if($firstWord): ?>
            <span><?php echo e($firstWord); ?></span> <?php echo e(implode(' ', $title_arr)); ?>

        <?php else: ?>
            <?php echo e($title); ?>

        <?php endif; ?>
    </h1>
</div>


                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

<?php if(get_static_option('home_page_rise_area_05_section_status')): ?>
<section class="rise-area">
    <div class="top-shapes">
        <img src="<?php echo e(asset('assets/frontend/img/category/top-shapes.png')); ?>" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="rise-flex-contents">
                <div class="single-donate margin-bottom-30">
                    <h2 class="title"> <?php echo filter_static_option_value('home_page_05_rise_area_heading_title',$static_field_data); ?> </h2>
                </div>
                <div class="single-donate margin-bottom-30">
                    <div class="nice-selects">
                        <select id="donation_select">
                            <?php $__currentLoopData = $all_donation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($donation->id); ?>" data-url="<?php echo e(route('frontend.donation.in.separate.page',$donation->id)); ?>"> <?php echo e(\Illuminate\Support\Str::words($donation->title,4)); ?> </option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                </div>

<div class="single-donate margin-bottom-30">
    <a href="https://bulk.com.sa/bulk/support-ticket" class="btn btn-info margin-bottom-30">
        <?php echo filter_static_option_value('home_page_05_rise_area_button_text', $static_field_data); ?>

    </a>
</div>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php
    $classes = ['reverse-color','btn-color-three','btn-dander','btn-color-three'];
?>
<?php if(get_static_option('home_page_feature_area_05_section_status')): ?>

    <?php
     

        // اللغة الحالية
        $locale   = app()->getLocale();
        $isArabic = ($locale === 'ar') || Str::startsWith($locale, 'ar');

        // ⬅️ نقرأ القيم مباشرة من الـ DB
        // العناوين العربية
        $title_ar     = get_static_option('home_page_05_feature_area_title');
        $subtitle_ar  = get_static_option('home_page_05_feature_area_subtitle');
        $btn_text_ar  = get_static_option('home_page_05_feature_area_donation_button_text');

        // العناوين الإنجليزية
        $title_en     = get_static_option('home_page_05_feature_area_title_en');
        $subtitle_en  = get_static_option('home_page_05_feature_area_subtitle_en');
        $btn_text_en  = get_static_option('home_page_05_feature_area_donation_button_text_en');

        // اختيار النص حسب اللغة مع Fallback
        $featureTitle = $isArabic
            ? ($title_ar ?: $title_en)
            : ($title_en ?: $title_ar);

        $featureSubtitle = $isArabic
            ? ($subtitle_ar ?: $subtitle_en)
            : ($subtitle_en ?: $subtitle_ar);

        $featureBtnText = $isArabic
            ? ($btn_text_ar ?: $btn_text_en)
            : ($btn_text_en ?: $btn_text_ar);
    ?>

    <section class="featured-area-three padding-top-90 padding-bottom-140">
        <div class="container">

            
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-11 col-11">
                    <div class="section-title section-title-four b-top desktop-center padding-top-25 margin-bottom-55">
                        <span><?php echo e($featureTitle); ?></span>
                        <h2 class="title">
                            <?php echo e($featureSubtitle); ?>

                            <img src="<?php echo e(asset('assets/frontend/img/section-line-shape.png')); ?>" alt="">
                        </h2>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured-slider">
                        <?php $__currentLoopData = $feature_cause; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                // عناوين الكيس نفسها حسب اللغة
                                $caseTitleAr = $data->title_ar ?? $data->title;
                                $caseTitleEn = $data->title_en ?? $data->title;

                                $caseTitle = $isArabic
                                    ? ($caseTitleAr ?: $caseTitleEn)
                                    : ($caseTitleEn ?: $caseTitleAr);
                            ?>

                            <div class="single-featured-items">
                                <div class="single-featured-02 single-featured">
                                    <div class="featured-image">
                                        <a href="<?php echo e(route('frontend.donations.single', $data->slug)); ?>">
                                            <?php echo render_image_markup_by_attachment_id($data->image, '', 'grid'); ?>

                                        </a>

                                        <div class="award-flex-position">
                                            <?php if($data->featured === 'on'): ?>
                                                <div class="award-new-icon">
                                                    <i class="las la-award"></i>
                                                </div>
                                            <?php endif; ?>

                                            <?php if($data->reward === 'on'): ?>
                                                <div class="award-new-icon">
                                                    <i class="las la-gift"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="progress-item">
                                        <div class="single-progressbar">
                                            <div class="donation-progress"
                                                 data-percentage="<?php echo e(get_percentage($data->amount, $data->raised)); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="featured-contents">
                                        
                                        <h3 class="title">
                                            <a href="<?php echo e(route('frontend.donations.single', $data->slug)); ?>">
                                                <?php echo e($caseTitle); ?>

                                            </a>
                                        </h3>

                                        <div class="feature-flex">
                                            <div class="goal">
                                                <h4 class="raised">
                                                    <?php echo e(__('Raised')); ?>:
                                                    <span class="main-color-three">
                                                        <?php echo e($data->raised ?? 0); ?>

                                                    </span>
                                                </h4>
                                            </div>

                                            <div class="goal">
                                                <h4 class="raised">
                                                    <?php echo e(__('Goal')); ?>:
                                                    <span class="danger-color">
                                                        <?php echo e($data->amount); ?>

                                                    </span>
                                                </h4>
                                            </div>

                                            <div class="goal">
                                                <h4 class="raised">
                                                    <?php echo e(__('Price')); ?>:
                                                    <span class="main-color-three">
                                                        <?php echo e(amount_with_currency_symbol($data->price ?? 0)); ?>

                                                    </span>
                                                </h4>
                                            </div>

                                            <div class="btn-wrapper">
                                                <a href="<?php echo e(route('frontend.donations.single', $data->slug)); ?>"
                                                   class="boxed-btn btn-rounded <?php echo e($classes[$key % count($classes)] ?? ''); ?>">
                                                    <?php echo e($featureBtnText); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> 
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if(get_static_option('home_page_category_area_05_section_status')): ?>

    <?php
        // تحديد اللغة الحالية (ar, ar_SA, en, en_US, ...)
        $locale   = app()->getLocale();
        $isArabic = (strpos($locale, 'ar') === 0); // true لو اللغة بتبدأ بـ ar

        // 🟢 عناوين السيكشن من الإعدادات
        // عربي من الـ static_field_data (زي ما الثيم عامل أصلاً)
        $title_ar    = filter_static_option_value('home_page_05_category_area_title', $static_field_data);
        $subtitle_ar = filter_static_option_value('home_page_05_category_area_subtitle', $static_field_data);

        // إنجليزي من DB مباشرة (عشان المفاتيح الجديدة *_en مش موجودة في $static_field_data)
        $title_en    = get_static_option('home_page_05_category_area_title_en');
        $subtitle_en = get_static_option('home_page_05_category_area_subtitle_en');

        // اختيار النص حسب اللغة مع Fallback
        $sectionTitle = $isArabic
            ? ($title_ar ?: $title_en)
            : ($title_en ?: $title_ar);

        $sectionSubtitle = $isArabic
            ? ($subtitle_ar ?: $subtitle_en)
            : ($subtitle_en ?: $subtitle_ar);
    ?>

    <section class="category-area section-bg-3 padding-top-90 padding-bottom-80">
        <div class="section-shapes">
            <img src="<?php echo e(asset('assets/frontend/img/bg/top-shapes2.png')); ?>" alt="">
            <img src="<?php echo e(asset('assets/frontend/img/bg/bottom-shapes2.png')); ?>" alt="">
        </div>
        <div class="container">

            
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-11 col-11">
                    <div class="section-title section-title-four b-top desktop-center padding-top-25 margin-bottom-55">
                        <span><?php echo e($sectionTitle); ?></span>
                        <h2 class="title">
                            <?php echo e($sectionSubtitle); ?>

                            <img src="<?php echo e(asset('assets/frontend/img/section-line-shape.png')); ?>" alt="">
                        </h2>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-slider">
                        <?php $__currentLoopData = $all_donation_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                // 🟢 عناوين الكاتيجوري من جدول cause_categories
                                $catTitleAr = $data->title ?? '';
                                $catTitleEn = $data->title_en ?? '';

                                $catTitle = $isArabic
                                    ? ($catTitleAr ?: $catTitleEn)
                                    : ($catTitleEn ?: $catTitleAr);

                                // السلاج مبني على العنوان اللي ظاهر للمستخدم
                                $slugSource = $catTitle ?: ($data->title ?? $data->title_en ?? 'category');
                                $slugPart   = \Illuminate\Support\Str::slug($slugSource);
                            ?>

                            <div class="single-category-items">
                                <div class="single-category">
                                    <div class="category-image">
                                        <?php echo render_image_markup_by_attachment_id($data->image,'thumb'); ?>

                                        <div class="category-shape">
                                            <img src="<?php echo e(asset('assets/frontend/img/category/shape1.png')); ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="category-content">
                                        <h4 class="category-para">
                                            <a href="<?php echo e(route('frontend.donations.category', ['id' => $data->id, 'any' => $slugPart])); ?>">
                                                <?php echo e($catTitle); ?>

                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> 
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if(get_static_option('home_page_success_story_area_05_section_status')): ?>
<section class="success-area-two padding-top-140 padding-bottom-140">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-11 col-11">
                <div class="section-title section-title-four b-top desktop-center padding-top-25 margin-bottom-55">
                    <span><?php echo filter_static_option_value('home_page_05_success_story_area_title',$static_field_data); ?> </span>
                    <h2 class="title"> <?php echo filter_static_option_value('home_page_05_success_story_area_subtitle',$static_field_data); ?>  <img src="<?php echo e(asset('assets/frontend/img/section-line-shape.png')); ?>" alt=""> </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="success-slider">
                    <?php $__currentLoopData = $all_success_stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-success-items">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-2 order-lg-1">
                                <div class="success-contents margin-bottom-30">
                                    <div class="section-title section-title-four padding-top-25 margin-bottom-40">
                                        <span><?php echo e($data->category->name ?? ''); ?></span>
                                        <h4 class="success-titles"> <a href="<?php echo e(route('frontend.success.story.single',$data->slug)); ?>"><?php echo e($data->title ?? ''); ?></a> </h4>
                                    </div>
                                    <p><?php echo e(purify_html($data->excerpt)); ?></p>

                                    <div class="btn-wrapper">
                                        <a href="<?php echo e(route('frontend.success.story.single',$data->slug)); ?>" class="boxed-btn <?php echo e($classes[$key % count($classes)]); ?> btn-rounded"> <?php echo filter_static_option_value('home_page_05_success_story_area_button_text',$static_field_data); ?> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 offset-lg-1 order-1 order-lg-2">
                                <div class="success-mask margin-bottom-30">
                                    <?php echo render_image_markup_by_attachment_id($data->image); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(get_static_option('home_page_counterup_area_05_section_status')): ?>
<div class="counterup-area section-bg-3 position-relative padding-bottom-90 padding-top-120">
    <div class="section-shapes">
        <img src="<?php echo e(asset('assets/frontend/img/bg/top-shapes2.png')); ?>" alt="">
        <img src="<?php echo e(asset('assets/frontend/img/bg/bottom-shapes2.png')); ?>" alt="">
    </div>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $all_counterup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6 counter-child">
                <div class="single-counterup-02 margin-bottom-30">
                    <div class="counter-contents">
                        <div class="icon">
                            <div class="icon-shapes">
                                <img src="<?php echo e(asset('assets/frontend/img/about/about-counter-s.png')); ?>" alt="">
                                <img src="<?php echo e(asset('assets/frontend/img/about/about-counter-s2.png')); ?>" alt="">
                            </div>
                            <i class="<?php echo e($data->icon); ?>"></i>
                        </div>
                        <div class="content">
                            <div class="count-wrap"><span class="count-num"><?php echo e($data->number); ?></span><?php echo e($data->extra_text); ?></div>
                            <p class="title"><?php echo e($data->title); ?></p>
                        </div>
                    </div>
                </div>
            </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(get_static_option('home_page_recent_cause_area_05_section_status')): ?>

    <?php
     
        // اللغة الحالية
        $locale   = app()->getLocale();
        $isArabic = ($locale === 'ar') || Str::startsWith($locale, 'ar');

        // نصوص العناوين من الإعدادات (عربي + إنجليزي)
        $title_ar      = get_static_option('home_page_05_recent_causes_area_title');
        $title_en      = get_static_option('home_page_05_recent_causes_area_title_en');

        $subtitle_ar   = get_static_option('home_page_05_recent_causes_area_subtitle');
        $subtitle_en   = get_static_option('home_page_05_recent_causes_area_subtitle_en');

        $btn_text_ar   = get_static_option('home_page_05_recent_causes_area_see_all_button_text');
        $btn_text_en   = get_static_option('home_page_05_recent_causes_area_see_all_button_text_en');

        // اختيار النص حسب اللغة مع Fallback
        $recentTitle = $isArabic
            ? ($title_ar ?: $title_en)
            : ($title_en ?: $title_ar);

        $recentSubtitle = $isArabic
            ? ($subtitle_ar ?: $subtitle_en)
            : ($subtitle_en ?: $subtitle_ar);

        $recentBtnText = $isArabic
            ? ($btn_text_ar ?: $btn_text_en)
            : ($btn_text_en ?: $btn_text_ar);
    ?>

    <section class="recent-area-two padding-top-140 padding-bottom-170">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-11 col-11">
                    <div class="section-title section-title-four b-top desktop-center padding-top-25 margin-bottom-55">
                        <span><?php echo e($recentTitle); ?></span>
                        <h2 class="title">
                            <?php echo e($recentSubtitle); ?>

                            <img src="<?php echo e(asset('assets/frontend/img/section-line-shape.png')); ?>" alt="">
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php $__currentLoopData = $all_recent_donation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        // عنوان الكيس حسب اللغة مع fallback
                        $caseTitleAr = $data->title_ar ?? $data->title;
                        $caseTitleEn = $data->title_en ?? $data->title;

                        $caseTitle = $isArabic
                            ? ($caseTitleAr ?: $caseTitleEn)
                            : ($caseTitleEn ?: $caseTitleAr);
                    ?>

                    <div class="col-lg-4 col-md-6 recent-childs">
                        <div class="single-recent-02 margin-bottom-30">
                            <div class="recent-image">
                                <a href="<?php echo e(route('frontend.donations.single', $data->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id($data->image,'','grid'); ?>

                                </a>

                                <div class="award-flex-position">
                                    <?php if($data->featured === 'on'): ?>
                                        <div class="award-new-icon">
                                            <i class="las la-award"></i>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($data->reward === 'on'): ?>
                                        <div class="award-new-icon">
                                            <i class="las la-gift"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="recent-contents">
                                
                                <h3 class="title">
                                    <a href="<?php echo e(route('frontend.donations.single', $data->slug)); ?>">
                                        <?php echo e($caseTitle); ?>

                                    </a>
                                </h3>

                                <div class="recent-flex">
                                    <div class="goal">
                                        <h4 class="raised">
                                            <?php echo e(__('Raised')); ?>:
                                            <span class="main-color-three">
                                                <?php echo e($data->raised ?? 0); ?>

                                            </span>
                                        </h4>
                                    </div>

                                    <div class="goal">
                                        <h4 class="raised">
                                            <?php echo e(__('Goal')); ?>:
                                            <span class="danger-color">
                                                <?php echo e($data->amount); ?>

                                            </span>
                                        </h4>
                                    </div>

                                    <div class="goal">
                                        <h4 class="raised">
                                            <?php echo e(__('Price')); ?>:
                                            <span class="main-color-three">
                                                <?php echo e(amount_with_currency_symbol($data->price ?? 0)); ?>

                                            </span>
                                        </h4>
                                    </div>

                                    <div class="progress-item">
                                        <div class="single-progressbar">
                                            <div class="donation-progress"
                                                 data-percentage="<?php echo e(get_percentage($data->amount, $data->raised)); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-12">
                    <div class="btn-wrapper text-center">
                        <a href="<?php echo e(route('frontend.donations')); ?>"
                           class="boxed-btn reverse-color btn-rounded ">
                            <?php echo e($recentBtnText); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(get_static_option('home_page_events_area_05_section_status')): ?>
<section class="events-area-two position-relative section-bg-3 padding-top-90 padding-bottom-120">
    <div class="section-shapes">
        <img src="<?php echo e(asset('assets/frontend/img/bg/top-shapes2.png')); ?>" alt="">
        <img src="<?php echo e(asset('assets/frontend/img/bg/bottom-shapes2.png')); ?>" alt="">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-11 col-11">
                <div class="section-title section-title-four b-top desktop-center padding-top-25 margin-bottom-55">
                    <span><?php echo filter_static_option_value('home_page_05_events_area_title',$static_field_data); ?></span>
                    <h2 class="title"> <?php echo filter_static_option_value('home_page_05_events_area_subtitle',$static_field_data); ?> <img src="<?php echo e(asset('assets/frontend/img/section-line-shape.png')); ?>" alt=""> </h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="events-thumbs-man">
                   <?php echo render_image_markup_by_attachment_id(filter_static_option_value('home_page_05_events_area_left_image',$static_field_data)); ?>

                </div>
            </div>
            <div class="col-xl-6">
                <?php $__currentLoopData = $all_recent_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-events style-02 margin-bottom-50">
                    <div class="events-flex-contents">
                        <div class="events-date">
                            <div class="events-boxe">
                                <span class="events-title"> <?php echo e(date('d', strtotime($data->date))); ?> </span>
                                <p class="event-para"> <?php echo e(date('M', strtotime($data->date))); ?> </p>
                            </div>
                        </div>
                        <div class="events-content">
                            <h3 class="title"><a href="<?php echo e(route('frontend.events.single',$data->slug)); ?>"><?php echo e($data->title); ?></a></h3>
                        
                            <span class="event-place"> <?php echo e($data->venue_location); ?> </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(get_static_option('home_page_blog_area_05_section_status')): ?>
<section class="blog-area-two padding-top-140 padding-bottom-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-11 col-11">
                <div class="section-title section-title-four b-top desktop-center padding-top-25 margin-bottom-55">
                    <span><?php echo filter_static_option_value('home_page_05_recent_blog_area_title',$static_field_data); ?></span>
                    <h2 class="title"> <?php echo filter_static_option_value('home_page_05_recent_blog_area_subtitle',$static_field_data); ?> <img src="<?php echo e(asset('assets/frontend/img/section-line-shape.png')); ?>" alt=""> </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-slider">
                    <?php $__currentLoopData = $all_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-blog-items blog-childs">
                            <div class="single-blog style-02 margin-bottom-30">
                                <div class="blog-thums">
                                    <a href="<?php echo e(route('frontend.blog.single',$data->slug)); ?>">
                                        <?php echo render_image_markup_by_attachment_id($data->image,'','grid'); ?>

                                    </a>
                                </div>
                                <div class="blog-flexs">
                                    <div class="blog-date-content">
                                        <div class="blog-dates">
                                            <h4> <?php echo e(date('d',strtotime($data->created_at))); ?> </h4>
                                            <span><?php echo e(date('M',strtotime($data->created_at))); ?></span>
                                        </div>
                                    </div>
                                    <div class="blog-contents">
                                        <span class="blog-tag"> <?php echo get_blog_category_by_id($data->blog_categories_id,'link'); ?> </span>
                                        <h4 class="blog-title"> <a href="<?php echo e(route('frontend.blog.single',$data->slug)); ?>"> <?php echo e($data->title  ?? __("Anonymous")); ?> </a> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php echo $__env->make('frontend.partials.client-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('scripts'); ?>
        <script>
            $(document).on('click','.donation_redirect_button',function(e){
                e.preventDefault();
                var select = $('#donation_select');
                var donationId = select.val();
                var paymentPageUrl = $('#donation_select option[value="'+donationId+'"]').data('url');
                var amount = $('.user_input_number').val();
                window.location = paymentPageUrl+'?number='+amount;
            });

        </script>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/home-pages/home-05.blade.php ENDPATH**/ ?>