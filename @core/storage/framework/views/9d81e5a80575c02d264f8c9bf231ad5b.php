<!--import 'package:pdf/widgets.dart' as pw;-->
<!--import 'dart:typed_data';-->

<!--Future<Uint8List> generateInvoicePdf(-->
<!--    List<Map<String, dynamic>> products, double total) async {-->
<!--  final pdf = pw.Document();-->
<!--  final dateTime = DateTime.now();-->

<!--  pdf.addPage(-->
<!--    pw.Page(-->
<!--      build: (pw.Context context) {-->
<!--        return pw.Column(-->
<!--          crossAxisAlignment: pw.CrossAxisAlignment.start,-->
<!--          children: [-->
<!--            pw.Text('Purchase Invoice ', style: pw.TextStyle(fontSize: 24)),-->
<!--            pw.SizedBox(height: 10),-->

<!--            // ✅ التاريخ والوقت-->
<!--            pw.Text(-->
<!--              'Date: ${dateTime.year}/${dateTime.month.toString().padLeft(2, '0')}/${dateTime.day.toString().padLeft(2, '0')}  '-->
<!--              'Time: ${dateTime.hour.toString().padLeft(2, '0')}:${dateTime.minute.toString().padLeft(2, '0')}',-->
<!--              style: pw.TextStyle(fontSize: 14),-->
<!--            ),-->

<!--            pw.SizedBox(height: 20),-->
<!--            pw.Table.fromTextArray(-->
<!--              headers: ['Product', 'Quantity', 'Price', 'Total'],-->
<!--              data: products.map((p) {-->
<!--                return [-->
<!--                  p['name'],-->
<!--                  p['quantity'].toString(),-->
<!--                  p['price'].toString(),-->
<!--                  (p['quantity'] * p['price']).toStringAsFixed(2),-->
<!--                ];-->
<!--              }).toList(),-->
<!--            ),-->
<!--            pw.SizedBox(height: 20),-->
<!--            pw.Align(-->
<!--              alignment: pw.Alignment.centerRight,-->
<!--              child: pw.Text('Total: ${total.toStringAsFixed(2)} SAR',-->
<!--                  style: pw.TextStyle(-->
<!--                      fontSize: 18, fontWeight: pw.FontWeight.bold)),-->
<!--            ),-->
<!--          ],-->
<!--        );-->
<!--      },-->
<!--    ),-->
<!--  );-->

<!--  return pdf.save();-->
<!--}-->


<!------------------------------------------------------------------  -->

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Donation Post')); ?>

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
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><?php echo e(__('Edit Donation Cause')); ?></h4>
                                <div class="headerbtn-wrap pull-right mb-3">
                                    <div class="btn-wrapper">
                                        <a href="<?php echo e(route('admin.donations.all')); ?>" class="btn btn-info"><?php echo e(__('All Donation Cause')); ?></a>
                                        <a href="<?php echo e(route('admin.donations.new')); ?>" class="btn btn-secondary ml-1"><?php echo e(__('Add New Cause')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo e(route('admin.donations.update')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="donation_id" value="<?php echo e($donation->id); ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" class="form-control"  id="title" name="title" value="<?php echo e($donation->title); ?>" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="title_en"><?php echo e(__('Title AR')); ?></label>
                                        <input type="text" class="form-control"  id="title_ar" name="title_ar" value="<?php echo e($donation->title_ar); ?>" >
                                    </div>

                                    <div class="form-group permalink_label">
                                        <label class="text-dark"><?php echo e(__('Permalink / Slug * : ')); ?>

                                            <span id="slug_show" class="display-inline"></span>
                                            <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button px-2 py-1 ml-1"> <i class="fas fa-edit"></i> </button>
                                          <input type="text" name="slug" value="<?php echo e($donation->slug); ?>" class="form-control blog_slug mt-2" style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2 px-2 py-1" style="display: none"><?php echo e(__('Update')); ?></button>
                                    </span>
                                     </label>
                                    </div>


                                    <div class="form-group">
                                        <label><?php echo e(__('Content')); ?></label>
                                        <input type="hidden" name="cause_content" value="<?php echo e($donation->cause_content); ?>">
                                        <div class="summernote" data-content='<?php echo e($donation->cause_content); ?>'></div>
                                    </div>
                                    
                                   <div class="form-group">
    <label for="specifications"><strong><?php echo e(__('Product Specifications')); ?></strong></label>
    
    <!-- حقل مخفي لتخزين البيانات كـ JSON -->
    <input type="hidden" name="specifications" id="specifications_input" 
           value="<?php echo e(is_array($donation->specifications) ? json_encode($donation->specifications) : '[]'); ?>">
    
    <!-- واجهة بناء الجدول الديناميكي -->
    <div class="specifications-table-container">
         <table class="table table-bordered" id="specifications_table" style="direction: ltr; text-align: left;">
            <thead>
                <tr>
                    <th width="40%"><?php echo e(__('Specification Name')); ?></th>
                    <th width="55%"><?php echo e(__('Value')); ?></th>
                    <th width="5%"><?php echo e(__('Action')); ?></th>
                </tr>
            </thead>
            <tbody id="specifications_tbody">
                <?php
                    $specs = is_array($donation->specifications) ? $donation->specifications : [];
                    if(empty($specs)) {
                        $specs = [['name' => '', 'value' => '']];
                    }
                ?>
                
                <?php $__currentLoopData = $specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="specification-row">
                    <td>
                        <input type="text" class="form-control spec-name" 
                               placeholder="<?php echo e(__('e.g., Brand Name, Capacity, etc.')); ?>" 
                               value="<?php echo e($spec['name'] ?? ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control spec-value" 
                               placeholder="<?php echo e(__('e.g., BOSCH, 682 Liters, etc.')); ?>" 
                               value="<?php echo e($spec['value'] ?? ''); ?>">
                    </td>
                    <td>
                        <?php if($index === 0): ?>
                        <button type="button" class="btn btn-success btn-sm add-spec-row" title="<?php echo e(__('Add Row')); ?>">
                            <i class="ti-plus"></i>
                        </button>
                        <?php else: ?>
                        <button type="button" class="btn btn-danger btn-sm remove-spec-row" title="<?php echo e(__('Remove Row')); ?>">
                            <i class="ti-trash"></i>
                        </button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    
    <small class="form-text text-muted"><?php echo e(__('Add product specifications in key-value format')); ?></small>
</div>

                                    <div class="form-group">
                                        <label for="amount"><?php echo e(__('Amount')); ?></label>
                                        <input type="number" class="form-control"  id="amount" name="amount" value="<?php echo e($donation->amount); ?>">
                                        
                                                                            <div class="form-group">
                                <label for="price"><?php echo e(__('Price Per Order')); ?></label>
                                      <input type="number" step="0.01" class="form-control" name="price" placeholder="<?php echo e(__('price')); ?>"  value="<?php echo e($donation->price); ?>">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="excerpt"><?php echo e(__('Excerpt')); ?></label>
                                        <textarea class="form-control" name="excerpt" rows="5" placeholder="<?php echo e(__('expert')); ?>"><?php echo e($donation->excerpt); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="categories_id"><strong><?php echo e(__('Category')); ?></strong></label>
                                        <select name="categories_id" class="form-control">
                                            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cat->id); ?>" <?php if($cat->id == $donation->categories_id): ?> selected <?php endif; ?>><?php echo e($cat->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date"><?php echo e(__('Deadline')); ?></label>
                                        <input type="date" class="form-control" value="<?php echo e($donation->deadline); ?>" name="deadline" >
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title"><?php echo e(__('Meta Title')); ?></label>
                                        <input type="text" name="meta_title" value="<?php echo e($donation->meta_title); ?>"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" value="<?php echo e($donation->meta_tags); ?>" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"><?php echo e($donation->meta_description); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title"><?php echo e(__('Og Meta Title')); ?></label>
                                        <input type="text" name="meta_title" value="<?php echo e($donation->meta_title); ?>"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description"><?php echo e(__('Og Meta Description')); ?></label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"><?php echo e($donation->meta_description); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image"><?php echo e(__('Og Meta Image')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                <?php echo render_attachment_preview_for_admin($donation->og_meta_image); ?>

                                            </div>
                                            <input type="hidden" name="og_meta_image" value="<?php echo e($donation->og_meta_image); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Donation Image')); ?>" data-modaltitle="<?php echo e(__('Upload Donation Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e('Change Image'); ?>

                                            </button>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="image"><?php echo e(__('Image')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                           <div class="img-wrap">
                                               <?php echo render_attachment_preview_for_admin($donation->image); ?>

                                           </div>
                                            <input type="hidden" name="image" value="<?php echo e($donation->image); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Donation Image')); ?>" data-modaltitle="<?php echo e(__('Upload Donation Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e('Change Image'); ?>

                                            </button>
                                        </div>
                                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="status"><?php echo e(__('Status')); ?></label>
                                        <select name="status" id="status"  class="form-control">
                                            <option <?php if($donation->status === 'publish'): ?> selected <?php endif; ?> value="publish"><?php echo e(__('Publish')); ?></option>
                                            <option <?php if($donation->status === 'draft'): ?> selected <?php endif; ?> value="draft"><?php echo e(__('Draft')); ?></option>
                                            <option <?php if($donation->status === 'archive'): ?> selected <?php endif; ?> value="archive"><?php echo e(__('Archive')); ?></option>
                                            <option <?php if($donation->status === 'banned'): ?> selected <?php endif; ?> value="banned"><?php echo e(__('Banned')); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image"><?php echo e(__('Image Gallery')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                <?php echo render_gallery_image_attachment_preview($donation->image_gallery); ?>

                                            </div>
                                            <input type="hidden" name="image_gallery" value="<?php echo e($donation->image_gallery); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e(__('Upload Images')); ?>

                                            </button>
                                        </div>
                                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="image"><?php echo e(__('Medical Documents')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                <?php echo render_gallery_image_attachment_preview($donation->medical_document); ?>

                                            </div>
                                            <input type="hidden" name="medical_document" value="<?php echo e($donation->medical_document); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="<?php echo e(__('Select Document')); ?>" data-modaltitle="<?php echo e(__('Upload Document')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e(__('Upload Images')); ?>

                                            </button>
                                        </div>
                                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong><?php echo e(__('Monthly Donation')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="monthly_donation_status"  <?php if(!empty($donation->monthly_donation_status)): ?> checked <?php endif; ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong><?php echo e(__('Featured')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="featured"  <?php if(!empty($donation->featured)): ?> checked <?php endif; ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong><?php echo e(__('Emmergency')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="emmergency"  <?php if(!empty($donation->emmergency)): ?> checked <?php endif; ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong><?php echo e(__('Reward')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="reward"  <?php if(!empty($donation->reward)): ?> checked <?php endif; ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="featured"><strong><?php echo e(__('Gift')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="gift_status" class="add_gift_status" <?php if(!empty($donation->gift_status)): ?> checked <?php endif; ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>


                                    <div class="gift_select_wrapper">
                                        <div class="form-group">
                                            <label><strong><?php echo e(__('Select Gift')); ?></strong></label>
                                            <select name="gifts[]" class="form-control gifts" multiple>
                                                <?php $__currentLoopData = $all_gifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($gift->id); ?>"
                                                    <?php $__currentLoopData = $donation->gift ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gift_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($gift_item->id == $gift->id ? 'selected' : ''); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    ><?php echo e($gift->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="iconbox-repeater-wrapper">
                                        <?php
                                             $faq_items = !empty($donation->faq) ? unserialize($donation->faq,['class' => false]) : ['title' => ['']];
                                        ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $faq_items['title'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="all-field-wrap">
                                            <div class="form-group">
                                                <label for="faq"><?php echo e(__('Faq Title')); ?></label>
                                                <input type="text" name="faq[title][]" class="form-control" value="<?php echo e($faq); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="faq_desc"><?php echo e(__('Faq Description')); ?></label>
                                                <textarea name="faq[description][]" class="form-control"><?php echo e($faq_items['description'][$loop->index] ?? ''); ?></textarea>
                                            </div>
                                            <div class="action-wrap">
                                                <span class="add"><i class="ti-plus"></i></span>
                                                <span class="remove"><i class="ti-trash"></i></span>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="all-field-wrap">
                                                <div class="form-group">
                                                    <label for="faq"><?php echo e(__('Faq Title')); ?></label>
                                                    <input type="text" name="faq[title][]" class="form-control" placeholder="<?php echo e(__('faq title')); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="faq_desc"><?php echo e(__('Faq Description')); ?></label>
                                                    <textarea name="faq[description][]" class="form-control" placeholder="<?php echo e(__('faq description')); ?>"></textarea>
                                                </div>
                                                <div class="action-wrap">
                                                    <span class="add"><i class="ti-plus"></i></span>
                                                    <span class="remove"><i class="ti-trash"></i></span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Cause')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/select2.min.js')); ?>"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                <?php if (isset($component)) { $__componentOriginal26b641e1adcfef4e774221a3ed7c52ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26b641e1adcfef4e774221a3ed7c52ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn.update','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('btn.update'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26b641e1adcfef4e774221a3ed7c52ce)): ?>
<?php $attributes = $__attributesOriginal26b641e1adcfef4e774221a3ed7c52ce; ?>
<?php unset($__attributesOriginal26b641e1adcfef4e774221a3ed7c52ce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26b641e1adcfef4e774221a3ed7c52ce)): ?>
<?php $component = $__componentOriginal26b641e1adcfef4e774221a3ed7c52ce; ?>
<?php unset($__componentOriginal26b641e1adcfef4e774221a3ed7c52ce); ?>
<?php endif; ?>

                // ==== الكود الحالي الموجود ====
                $('.gifts').select2();

                let gift_status = '<?php echo e($donation->gift_status); ?>';

                if(gift_status != 'on'){
                      $('.gifts').prop('disabled',true);
                }
                $(document).on('change','.add_gift_status',function(){
                    $('.gifts').prop('disabled',false);
                    if(this.checked){
                        $('.gift_select_wrapper').removeClass('d-none')
                    }else{
                        $('.gift_select_wrapper').addClass('d-none')
                    }
                });

                function converToSlug(slug){
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    finalSlug = slug.replace(/  +/g, ' ');
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                //Permalink Code
                var sl =  $('.blog_slug').val();
                var url = `<?php echo e(url('/donation/')); ?>/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');
                var form = $('#blog_new_form');

                //Slug Edit Code
                $(document).on('click', '.slug_edit_button', function (e) {
                    e.preventDefault();
                    $('.blog_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.blog_slug').val();
                    var slug = converToSlug(update_input);
                    var url = `<?php echo e(url('/donation/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });

                $('.summernote').summernote({
                    height: 500,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });

                if($('.summernote').length > 0){
                    $('.summernote').each(function(index,value){
                        $(this).summernote('code', $(this).data('content'));
                    });
                }

                $(document).on('change','#language',function(e){
                    e.preventDefault();
                    var selectedLang = $(this).val();
                    $('select[name="categories_id"]').html('<option value=""><?php echo e(__('Select Category')); ?></option>');
                    $.ajax({
                        url: "<?php echo e(route('admin.donations.category.by.lang')); ?>",
                        type: "POST",
                        data: {
                            _token : "<?php echo e(csrf_token()); ?>",
                            lang : selectedLang
                        },
                        success:function (data) {
                            $.each(data,function(index,value){
                                $('select[name="categories_id"]').append('<option value="'+value.id+'">'+value.title+'</option>')
                            });
                        }
                    });
                });

                // ====== Specifications Table Management ======
                function updateSpecificationsInput() {
                    var specifications = [];
                    $('.specification-row').each(function() {
                        var name = $(this).find('.spec-name').val().trim();
                        var value = $(this).find('.spec-value').val().trim();
                        
                        if (name !== '' || value !== '') {
                            specifications.push({
                                name: name,
                                value: value
                            });
                        }
                    });
                    $('#specifications_input').val(JSON.stringify(specifications));
                }

                // إضافة صف جديد
                $(document).on('click', '.add-spec-row', function() {
                    var newRow = `
                        <tr class="specification-row">
                            <td>
                                <input type="text" class="form-control spec-name" 
                                       placeholder="<?php echo e(__('e.g., Brand Name, Capacity, etc.')); ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control spec-value" 
                                       placeholder="<?php echo e(__('e.g., BOSCH, 682 Liters, etc.')); ?>">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-spec-row" title="<?php echo e(__('Remove Row')); ?>">
                                    <i class="ti-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                    
                    $('#specifications_tbody').append(newRow);
                    updateSpecificationsInput();
                });

                // حذف صف
                $(document).on('click', '.remove-spec-row', function() {
                    if ($('.specification-row').length > 1) {
                        $(this).closest('.specification-row').remove();
                        updateSpecificationsInput();
                    }
                });

                // تحديث عند الكتابة
                $(document).on('keyup', '.spec-name, .spec-value', function() {
                    updateSpecificationsInput();
                });

                // التهيئة الأولية للمواصفات
                var specsInput = $('#specifications_input').val();
                if (specsInput && specsInput !== '[]') {
                    try {
                        var specs = JSON.parse(specsInput);
                        if (Array.isArray(specs) && specs.length > 0) {
                            updateSpecificationsInput();
                        }
                    } catch(e) {
                        console.log('Error parsing specifications:', e);
                    }
                }
                // ====== نهاية Specifications Table Management ======

            });
        })(jQuery)
    </script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <?php if (isset($component)) { $__componentOriginal9c9e2f22010721f1a8a11abf87b15b5e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c9e2f22010721f1a8a11abf87b15b5e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
    <?php if (isset($component)) { $__componentOriginal30010316c0a1e9c75a215f3e4afb9aad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30010316c0a1e9c75a215f3e4afb9aad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.repeater','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal30010316c0a1e9c75a215f3e4afb9aad)): ?>
<?php $attributes = $__attributesOriginal30010316c0a1e9c75a215f3e4afb9aad; ?>
<?php unset($__attributesOriginal30010316c0a1e9c75a215f3e4afb9aad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30010316c0a1e9c75a215f3e4afb9aad)): ?>
<?php $component = $__componentOriginal30010316c0a1e9c75a215f3e4afb9aad; ?>
<?php unset($__componentOriginal30010316c0a1e9c75a215f3e4afb9aad); ?>
<?php endif; ?>
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
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.min.css')); ?>">
    <style>
        .specifications-table-container {
            border: 1px solid #e3ebf6;
            border-radius: 5px;
            padding: 15px;
            background: #f8f9fa;
        }

        #specifications_table {
            margin-bottom: 0;
            background: white;
        }

        #specifications_table th {
            background: #2c7be5;
            color: white;
            border: none;
            font-weight: 600;
        }

        .specification-row td {
            vertical-align: middle;
            padding: 8px;
        }

        .spec-name, .spec-value {
            border: 1px solid #d8e2ef;
            border-radius: 4px;
        }

        .spec-name:focus, .spec-value:focus {
            border-color: #2c7be5;
            box-shadow: 0 0 0 0.2rem rgba(44, 123, 229, 0.25);
        }

        .btn-success, .btn-danger {
            border-radius: 4px;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/backend/donations/edit-donations.blade.php ENDPATH**/ ?>