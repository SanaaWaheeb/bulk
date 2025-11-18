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
@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Donation Post')}}
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/select2.min.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @include('backend/partials/error')
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title">{{__('Edit Donation Cause')}}</h4>
                                <div class="headerbtn-wrap pull-right mb-3">
                                    <div class="btn-wrapper">
                                        <a href="{{route('admin.donations.all')}}" class="btn btn-info">{{__('All Donation Cause')}}</a>
                                        <a href="{{route('admin.donations.new')}}" class="btn btn-secondary ml-1">{{__('Add New Cause')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('admin.donations.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="donation_id" value="{{$donation->id}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="{{$donation->title}}" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="title_en">{{__('Title AR')}}</label>
                                        <input type="text" class="form-control"  id="title_ar" name="title_ar" value="{{$donation->title_ar}}" >
                                    </div>

                                    <div class="form-group permalink_label">
                                        <label class="text-dark">{{__('Permalink / Slug * : ')}}
                                            <span id="slug_show" class="display-inline"></span>
                                            <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button px-2 py-1 ml-1"> <i class="fas fa-edit"></i> </button>
                                          <input type="text" name="slug" value="{{$donation->slug}}" class="form-control blog_slug mt-2" style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2 px-2 py-1" style="display: none">{{__('Update')}}</button>
                                    </span>
                                     </label>
                                    </div>


                                    <div class="form-group">
                                        <label>{{__('Content')}}</label>
                                        <input type="hidden" name="cause_content" value="{{$donation->cause_content}}">
                                        <div class="summernote" data-content='{{$donation->cause_content}}'></div>
                                    </div>
                                    
                                   <div class="form-group">
    <label for="specifications"><strong>{{__('Product Specifications')}}</strong></label>
    
    <!-- حقل مخفي لتخزين البيانات كـ JSON -->
    <input type="hidden" name="specifications" id="specifications_input" 
           value="{{ is_array($donation->specifications) ? json_encode($donation->specifications) : '[]' }}">
    
    <!-- واجهة بناء الجدول الديناميكي -->
    <div class="specifications-table-container">
         <table class="table table-bordered" id="specifications_table" style="direction: ltr; text-align: left;">
            <thead>
                <tr>
                    <th width="40%">{{__('Specification Name')}}</th>
                    <th width="55%">{{__('Value')}}</th>
                    <th width="5%">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody id="specifications_tbody">
                @php
                    $specs = is_array($donation->specifications) ? $donation->specifications : [];
                    if(empty($specs)) {
                        $specs = [['name' => '', 'value' => '']];
                    }
                @endphp
                
                @foreach($specs as $index => $spec)
                <tr class="specification-row">
                    <td>
                        <input type="text" class="form-control spec-name" 
                               placeholder="{{__('e.g., Brand Name, Capacity, etc.')}}" 
                               value="{{ $spec['name'] ?? '' }}">
                    </td>
                    <td>
                        <input type="text" class="form-control spec-value" 
                               placeholder="{{__('e.g., BOSCH, 682 Liters, etc.')}}" 
                               value="{{ $spec['value'] ?? '' }}">
                    </td>
                    <td>
                        @if($index === 0)
                        <button type="button" class="btn btn-success btn-sm add-spec-row" title="{{__('Add Row')}}">
                            <i class="ti-plus"></i>
                        </button>
                        @else
                        <button type="button" class="btn btn-danger btn-sm remove-spec-row" title="{{__('Remove Row')}}">
                            <i class="ti-trash"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <small class="form-text text-muted">{{__('Add product specifications in key-value format')}}</small>
</div>

                                    <div class="form-group">
                                        <label for="amount">{{__('Amount')}}</label>
                                        <input type="number" class="form-control"  id="amount" name="amount" value="{{$donation->amount}}">
                                        
                                                                            <div class="form-group">
                                <label for="price">{{__('Price Per Order')}}</label>
                                      <input type="number" step="0.01" class="form-control" name="price" placeholder="{{__('price')}}"  value="{{$donation->price}}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="excerpt">{{__('Excerpt')}}</label>
                                        <textarea class="form-control" name="excerpt" rows="5" placeholder="{{__('expert')}}">{{$donation->excerpt}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="categories_id"><strong>{{__('Category')}}</strong></label>
                                        <select name="categories_id" class="form-control">
                                            @foreach($all_category as $cat)
                                                <option value="{{$cat->id}}" @if($cat->id == $donation->categories_id) selected @endif>{{$cat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">{{__('Deadline')}}</label>
                                        <input type="date" class="form-control" value="{{$donation->deadline}}" name="deadline" >
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">{{__('Meta Title')}}</label>
                                        <input type="text" name="meta_title" value="{{$donation->meta_title}}"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags">{{__('Meta Tags')}}</label>
                                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" value="{{$donation->meta_tags}}" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">{{__('Meta Description')}}</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description">{{$donation->meta_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">{{__('Og Meta Title')}}</label>
                                        <input type="text" name="meta_title" value="{{$donation->meta_title}}"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">{{__('Og Meta Description')}}</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description">{{$donation->meta_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Og Meta Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                {!! render_attachment_preview_for_admin($donation->og_meta_image) !!}
                                            </div>
                                            <input type="hidden" name="og_meta_image" value="{{$donation->og_meta_image}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Donation Image')}}" data-modaltitle="{{__('Upload Donation Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{'Change Image'}}
                                            </button>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                           <div class="img-wrap">
                                               {!! render_attachment_preview_for_admin($donation->image) !!}
                                           </div>
                                            <input type="hidden" name="image" value="{{$donation->image}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Donation Image')}}" data-modaltitle="{{__('Upload Donation Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{'Change Image'}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status"  class="form-control">
                                            <option @if($donation->status === 'publish') selected @endif value="publish">{{__('Publish')}}</option>
                                            <option @if($donation->status === 'draft') selected @endif value="draft">{{__('Draft')}}</option>
                                            <option @if($donation->status === 'archive') selected @endif value="archive">{{__('Archive')}}</option>
                                            <option @if($donation->status === 'banned') selected @endif value="banned">{{__('Banned')}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image Gallery')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                {!! render_gallery_image_attachment_preview($donation->image_gallery) !!}
                                            </div>
                                            <input type="hidden" name="image_gallery" value="{{$donation->image_gallery}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__('Upload Images')}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Medical Documents')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                {!! render_gallery_image_attachment_preview($donation->medical_document) !!}
                                            </div>
                                            <input type="hidden" name="medical_document" value="{{$donation->medical_document}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Document')}}" data-modaltitle="{{__('Upload Document')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__('Upload Images')}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Monthly Donation')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="monthly_donation_status"  @if(!empty($donation->monthly_donation_status)) checked @endif>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Featured')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="featured"  @if(!empty($donation->featured)) checked @endif>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Emmergency')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="emmergency"  @if(!empty($donation->emmergency)) checked @endif>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Reward')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="reward"  @if(!empty($donation->reward)) checked @endif>
                                            <span class="slider"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Gift')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="gift_status" class="add_gift_status" @if(!empty($donation->gift_status)) checked @endif>
                                            <span class="slider"></span>
                                        </label>
                                    </div>


                                    <div class="gift_select_wrapper">
                                        <div class="form-group">
                                            <label><strong>{{__('Select Gift')}}</strong></label>
                                            <select name="gifts[]" class="form-control gifts" multiple>
                                                @foreach($all_gifts as $gift)
                                                    <option value="{{$gift->id}}"
                                                    @foreach($donation->gift ?? [] as $gift_item)
                                                        {{ $gift_item->id == $gift->id ? 'selected' : '' }}
                                                    @endforeach
                                                    >{{$gift->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="iconbox-repeater-wrapper">
                                        @php
                                             $faq_items = !empty($donation->faq) ? unserialize($donation->faq,['class' => false]) : ['title' => ['']];
                                        @endphp
                                        @forelse($faq_items['title'] ?? [] as $faq)
                                        <div class="all-field-wrap">
                                            <div class="form-group">
                                                <label for="faq">{{__('Faq Title')}}</label>
                                                <input type="text" name="faq[title][]" class="form-control" value="{{$faq}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="faq_desc">{{__('Faq Description')}}</label>
                                                <textarea name="faq[description][]" class="form-control">{{$faq_items['description'][$loop->index] ?? ''}}</textarea>
                                            </div>
                                            <div class="action-wrap">
                                                <span class="add"><i class="ti-plus"></i></span>
                                                <span class="remove"><i class="ti-trash"></i></span>
                                            </div>
                                        </div>
                                        @empty
                                            <div class="all-field-wrap">
                                                <div class="form-group">
                                                    <label for="faq">{{__('Faq Title')}}</label>
                                                    <input type="text" name="faq[title][]" class="form-control" placeholder="{{__('faq title')}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="faq_desc">{{__('Faq Description')}}</label>
                                                    <textarea name="faq[description][]" class="form-control" placeholder="{{__('faq description')}}"></textarea>
                                                </div>
                                                <div class="action-wrap">
                                                    <span class="add"><i class="ti-plus"></i></span>
                                                    <span class="remove"><i class="ti-trash"></i></span>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>

                                    <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Cause')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/select2.min.js')}}"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                <x-btn.update/>

                // ==== الكود الحالي الموجود ====
                $('.gifts').select2();

                let gift_status = '{{$donation->gift_status}}';

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
                var url = `{{url('/donation/')}}/` + sl;
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
                    var url = `{{url('/donation/')}}/` + slug;
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
                    $('select[name="categories_id"]').html('<option value="">{{__('Select Category')}}</option>');
                    $.ajax({
                        url: "{{route('admin.donations.category.by.lang')}}",
                        type: "POST",
                        data: {
                            _token : "{{csrf_token()}}",
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
                                       placeholder="{{__('e.g., Brand Name, Capacity, etc.')}}">
                            </td>
                            <td>
                                <input type="text" class="form-control spec-value" 
                                       placeholder="{{__('e.g., BOSCH, 682 Liters, etc.')}}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-spec-row" title="{{__('Remove Row')}}">
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
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <x-media.js/>
    <x-repeater/>
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/select2.min.css')}}">
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
@endsection

