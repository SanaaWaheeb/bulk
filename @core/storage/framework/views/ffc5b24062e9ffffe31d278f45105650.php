<style>
    .collapsed-content {
        max-height: 200px;
        overflow: hidden;
        position: relative;
    }

    .collapsed-content::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 60px;
        background: linear-gradient(transparent, white);
    }

    .collapsed-content.expanded {
        max-height: none;
        overflow: visible;
    }

    .collapsed-content.expanded::after {
        display: none;
    }
</style>

<div class="tab-area-new">
    <div class="author-data-tab">
        <ul class="tabs">
            <?php if(get_static_option('donation_descriptions_show_hide')): ?>
                 <li class="active" data-tab="tab-one"> <?php echo e(__('Description')); ?> </li>
            <?php endif; ?>
           <?php if(get_static_option('donation_faq_show_hide')): ?>
            <li data-tab="tab-two"> <?php echo e(__('FAQ')); ?> </li>
           <?php endif; ?>
         <?php if(get_static_option('donation_updates_show_hide')): ?>
            <li data-tab="tab-three"> <?php echo e(__('Updates')); ?> </li>
         <?php endif; ?>
            <li data-tab="tab-four"> <?php echo e(__('Comments')); ?> </li>
        </ul>
    </div>

    <div id="tab-one" class="tab-content active">
        <div class="single-tabs">
            <?php if(get_static_option('donation_descriptions_show_hide')): ?>
             <div class="shotcontent-wrapper">
                <div id="main-data" class="collapsed-content">
                  <?php echo $displayContent ?? $donation->cause_content; ?>

                  <!-- ======== جدول المواصفات هنا ======== -->
              <?php
                  $specDataRaw = isset($displaySpecs) && !empty($displaySpecs) ? $displaySpecs : ($donation->specifications ?? []);
                  // Normalize to array: handle array/object/JSON/serialized strings
                  if (is_string($specDataRaw)) {
                      $decoded = json_decode($specDataRaw, true);
                      if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                          $specData = $decoded;
                      } else {
                          $unserialized = @unserialize($specDataRaw);
                          $specData = is_array($unserialized) ? $unserialized : [];
                      }
                  } elseif (is_object($specDataRaw)) {
                      $specData = (array)$specDataRaw;
                  } else {
                      $specData = $specDataRaw;
                  }
              ?>
              <?php if(!empty($specData) && is_array($specData)): ?>
              <div class="specifications-section margin-top-40">
                  <div class="section-title">
                      <h4 class="title" style="font-size: 25px;"><?php echo e(__('Product information')); ?></h4>
                  </div>
                  <div class="table-responsive">
      <table class="table table-bordered table-striped">
    <tbody>
        <?php $__currentLoopData = $specData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $name = is_array($spec) ? ($spec['name'] ?? '') : ($spec->name ?? '');
                $value = is_array($spec) ? ($spec['value'] ?? '') : ($spec->value ?? '');
            ?>
            <?php if(!empty(trim($name)) && !empty(trim($value))): ?>
            <tr>
               <!-- القيمة (value) -->
<td width="60%" style="padding: 10px; font-size: 16px; background-color: #fdfdfd; text-align: left; direction: ltr;">

    <div style="
        display: flex;
        align-items: center;
        min-height: 50px;
        line-height: 1.6;
        text-align: left;

    ">
        <?php echo e($value); ?>

    </div>
</td>

                <!-- الاسم (key) -->
                <td width="30%" class="fw-bold bg-light" style="padding: 10px; vertical-align: middle; font-size: 16px; text-align: left;">
                    <?php echo e($name); ?>

                </td>
            </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>



                  </div>
              </div>
              <?php endif; ?>
              <!-- ======== نهاية الجدول ======== -->
              
                </div>
                <div class="btn-wrapper">
                    <a id="ReadMoreButton" class="text-primary" href=""><?php echo e(__('Read more')); ?></a>
                    <a id="ReadLessButton" class="text-primary" href="" style="display: none;"><?php echo e(__('Read less')); ?></a>
                </div>
           </div>
             <?php endif; ?>
        </div>
    </div>

    <!-- إزالة القسم المكرر هنا -->

    <div id="tab-two" class="tab-content">
        <div class="single-tabs">
    <?php if(get_static_option('donation_faq_show_hide')): ?>
            <?php
                $faq_items = !empty($donation->faq) ? unserialize($donation->faq,['class' => false]) : ['title' => []];
                 $rand_number = rand(9999,99999999);
            ?>
            <?php if(!empty(current($faq_items['title'])) ): ?>
                <div class="accordion-wrapper">
                    <h2 class="title"><?php echo e(get_static_option('donation_single_faq_title')); ?></h2>
                    <div id="accordion_<?php echo e($rand_number); ?>">
                        <?php $__currentLoopData = $faq_items['title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $aria_expanded = 'false';
                            ?>
                            <div class="card" itemscope itemprop="mainEntity"
                                 itemtype="https://schema.org/Question">
                                <div class="card-header" id="headingOne_<?php echo e($loop->index); ?>"
                                     itemprop="name">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse"
                                           data-target="#collapseOne_<?php echo e($loop->index); ?>" role="button"
                                           aria-expanded="<?php echo e($aria_expanded); ?>"
                                           aria-controls="collapseOne_<?php echo e($loop->index); ?>">
                                            <?php echo e(purify_html($faq)); ?>

                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseOne_<?php echo e($loop->index); ?>" class="collapse "
                                     aria-labelledby="headingOne_<?php echo e($loop->index); ?>"
                                     data-parent="#accordion_<?php echo e($rand_number); ?>" itemscope
                                     itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                    <div class="card-body" itemprop="text">
                                        <?php echo e(purify_html($faq_items['description'][$loop->index] ?? '')); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        </div>
    </div>

    <?php if(get_static_option('donation_updates_show_hide')): ?>
    <div id="tab-three" class="tab-content">
        <div class="single-tabs">
            <?php if($donation->cause_update_id && $causeUpCount->count() > 0): ?>
                <div class="cause-update-section">
                    <h3 class="title"><?php echo e(__('Updates')); ?> (<?php echo e($causeUpCount->count()); ?>) </h3>
                    <div id="recent_update_about_cause" data-page="0"></div>
                </div>
                <hr>
            <?php else: ?>
                <p class="alert alert-warning"><?php echo e(__('No Update Found')); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <div id="tab-four" class="tab-content">
        <div class="single-tabs">
        <?php if(get_static_option('donation_comments_show_hide')): ?>
            <div class="cause-comment-section">
                <h3><?php echo e(__('Comments')); ?> (<?php echo e($causeCommentCount->count()); ?>) </h3>
            </div>
            <div class="cause-comment-body">
                
                <div class="box donor-load-box">
                    <div class="panel panel-default">
                        <div class="panel-body" id="comment_content_div">
                            <?php echo e(csrf_field()); ?>

                            <div id="comment_data" data-page="0">
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="error-message"></div>
                <?php if(auth()->guard('web')->check()): ?>
                    <form action="<?php echo e(route('cause.comment.store')); ?>" method="post"
                          id="cause-comment-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="cause_id" id="cause_id"
                               value="<?php echo e($donation->id); ?>">
                        <input type="hidden" name="user_id" id="user_id"
                               value="<?php echo e(auth()->guard('web')->user()->id); ?>">
                        <input type="hidden" name="commented_by" id="commented_by"
                               value="<?php echo e(auth()->guard('web')->user()->name); ?>">
                        <div class="form-group">
                            <textarea name="comment_content" class="form-control" rows="2"
                                      placeholder="<?php echo e(__('Write Comments..')); ?>"
                                      id="comment_content"></textarea>
                        </div>
                        <div class="btn-wrapper">
                            <button id="submitComment" type="submit"
                                    class="boxed-btn reverse-color btn-sm"><?php echo e(__('ارسال')); ?></button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#ReadMoreButton', function (e) {
        e.preventDefault();
        const content = $('#main-data');
        content.removeClass('collapsed-content').addClass('expanded');
        $(this).hide();
        $('#ReadLessButton').show();
    });

    $(document).on('click', '#ReadLessButton', function (e) {
        e.preventDefault();
        const content = $('#main-data');
        content.removeClass('expanded').addClass('collapsed-content');
        $(this).hide();
        $('#ReadMoreButton').show();
        
        // التمرير للأعلى
        $('html, body').animate({
            scrollTop: content.offset().top - 100
        }, 300);
    });
</script><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/frontend/partials/donation-single/tab-view.blade.php ENDPATH**/ ?>