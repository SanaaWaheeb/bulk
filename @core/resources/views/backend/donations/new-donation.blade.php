@extends('backend.admin-master')
@section('site-title')
    {{__('New Donation')}}
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/select2.min.css')}}">
@endsection

@section('content')
  @php
        // لغة لوحة التحكم الحالية
        $locale = get_user_lang();
    @endphp
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
                               <div class="headerbtn-wrap">
                                   <h4 class="header-title">{{__('Add New Donation Cause')}}</h4>
                                   <div class="btn-wrapper pull-right mb-3">
                                       <a href="{{route('admin.donations.all')}}" class="btn btn-info">{{__('All Donation Cause')}}</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                        <form action="{{route('admin.donations.new')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">

                                                            {{-- 🔹 Title (English) --}}
                        <div class="form-group">
                            <label for="title">{{ __('Title (English)') }}</label>
                            <input type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="{{ __('Title (English)') }}">
                        </div>

                        {{-- 🔹 Title (Arabic) --}}
                        <div class="form-group">
                            <label for="title_ar">{{ __('Title (Arabic)') }}</label>
                            <input type="text"
                                class="form-control"
                                id="title_ar"
                                name="title_ar"
                                value="{{ old('title_ar') }}"
                                placeholder="{{ __('Title (Arabic)') }}">
                        </div>


                                    <div class="form-group permalink_label">
                                        <label class="text-dark">{{__('Permalink / Slug * : ')}}
                                            <span id="slug_show" class="display-inline"></span>
                                            <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm ml-1 px-2 py-1 slug_edit_button"> <i class="fas fa-edit"></i> </button>
                                        <input type="text" name="slug" class="form-control blog_slug mt-2" style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2 px-2 py-1" style="display: none">{{__('Update')}}</button>
                                    </span>
                                        </label>
                                    </div>

                            {{-- 🔹 محتوى التبرع (English) --}}
                            <div class="form-group">
                                <label>{{ __('Content (English)') }}</label>
                                <input type="hidden" name="cause_content_en" id="cause_content_en">
                                <div class="summernote summernote-en"></div>
                            </div>

                                                            {{-- 🔹 محتوى التبرع (Arabic) --}}
                            <div class="form-group">
                                <label>{{ __('Content (Arabic)') }}</label>
                                <input type="hidden" name="cause_content" id="cause_content_ar">
                                <div class="summernote summernote-ar"></div>
                            </div>

                          
{{-- 🔹 Product Specifications (English) --}}
<div class="form-group">
    <label for="specifications_en" style="font-size: 16px; font-weight: 600; color: #2d3748; margin-bottom: 15px;">
        <i class="fas fa-list-alt mr-2"></i>{{__('Product Specifications (English)')}}
    </label>

    <input type="hidden" name="specifications_en" id="specifications_en_input" value="[]">

    <div class="specifications-table-container">
        <div class="table-responsive">
            <table class="table table-bordered" id="specifications_en_table">
                <thead>
                    <tr>
                        <th width="40%">{{__('Specification Name (EN)')}}</th>
                        <th width="55%">{{__('Value (EN)')}}</th>
                        <th width="5%">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody id="specifications_en_tbody">
                    <tr class="specification-row-en">
                        <td>
                            <input type="text" class="form-control spec-name-en"
                                   placeholder="{{__('Brand Name, Capacity, etc.')}}">
                        </td>
                        <td>
                            <input type="text" class="form-control spec-value-en"
                                   placeholder="{{__('BOSCH, 682 Liters, etc.')}}">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm add-spec-row-en" title="{{__('Add Row')}}">
                                <i class="fas fa-plus"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
     {{-- 🔹 مواصفات المنتج (Arabic) --}}
<div class="form-group">
    <label for="specifications" style="font-size: 16px; font-weight: 600; color: #2d3748; margin-bottom: 15px;">
        <i class="fas fa-list-alt mr-2"></i>{{__('Product Specifications (Arabic)')}}
    </label>

    <input type="hidden" name="specifications" id="specifications_input" value="[]">

    <div class="specifications-table-container">
        <div class="table-responsive">
            <table class="table table-bordered" id="specifications_table">
                <thead>
                    <tr>
                        <th width="40%">{{__('Specification Name')}}</th>
                        <th width="55%">{{__('Value')}}</th>
                        <th width="5%">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody id="specifications_tbody">
                    <tr class="specification-row">
                        <td>
                            <input type="text" class="form-control spec-name"
                                   placeholder="{{__('Brand Name, Capacity, etc.')}}">
                        </td>
                        <td>
                            <input type="text" class="form-control spec-value"
                                   placeholder="{{__('BOSCH, 682 Liters, etc.')}}">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm add-spec-row" title="{{__('Add Row')}}">
                                <i class="fas fa-plus"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>




                                    <div class="form-group">
                                        <label for="amount">{{__('Number of unit')}}</label>
                                        <input type="number" class="form-control"  name="amount" placeholder="{{__('amount')}}">
                                    </div>

                                 

                                        <div class="form-group">
                                    <label for="market_price">{{ __('Market Price') }}</label>
                                        <input type="number" step="0.01" class="form-control" id="market_price" name="market_price" placeholder="{{__('Market Price')}}">
                                       </div>
                                        
                                        
                                    <div class="form-group">
                                <label for="price">{{__('Price Per Order')}}</label>
                                      <input type="number" step="0.01" class="form-control" name="price" placeholder="{{__('price')}}">
                                        </div>


                                    
                                    
                                                                            {{-- 🔹 Excerpt (English) --}}
                                        <div class="form-group">
                                            <label for="excerpt_en">{{ __('Excerpt (English)') }}</label>
                                            <textarea class="form-control"
                                                    id="excerpt_en"
                                                    name="excerpt_en"
                                                    rows="5"
                                                    placeholder="{{ __('Excerpt (English)') }}"></textarea>
                                        </div>

                                        {{-- 🔹 Excerpt (Arabic) --}}
                                        <div class="form-group">
                                            <label for="excerpt">{{ __('Excerpt (Arabic)') }}</label>
                                            <textarea class="form-control"
                                                    id="excerpt"
                                                    name="excerpt"
                                                    rows="5"
                                                    placeholder="{{ __('Excerpt (Arabic)') }}"></textarea>
                                        </div>

                                     
                                    <div class="form-group">
                                        <label for="categories_id"><strong>{{__('Category')}}</strong></label>
                                        <select name="categories_id" class="form-control">
                                            @foreach($all_category as $cat)
                                                @php
                                                    $catTitle = $locale === 'ar'
                                                        ? ($cat->title ?? $cat->title_en)
                                                        : ($cat->title_en ?? $cat->title);
                                                @endphp
                                                <option value="{{$cat->id}}">{{$catTitle}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="date">{{__('Deadline')}}</label>
                                        <input type="date" class="form-control" placeholder="{{__('Deadline')}}" name="deadline" >
                                        <small class="text-primary">{{__('Deadline is optional, if you set deadline for this cause, than donation will expire according this deadline..!')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">{{__('Meta Title')}}</label>
                                        <input type="text" name="meta_title"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags">{{__('Meta Tags')}}</label>
                                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput"  id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">{{__('Meta Description')}}</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">{{__('Og Meta Title')}}</label>
                                        <input type="text" name="og_meta_title"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">{{__('Og Meta Description')}}</label>
                                        <textarea name="og_meta_description"  class="form-control" rows="5" id="meta_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('OG Meta Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="og_meta_image">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__('Upload Image')}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="image">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__('Upload Image')}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status"  class="form-control">
                                            <option value="publish">{{__('Publish')}}</option>
                                            <option value="draft">{{__('Draft')}}</option>
                                            <option value="archive">{{__('Archive')}}</option>
                                            <option value="banned">{{__('Banned')}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image Gallery')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="image_gallery">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__('Upload Images')}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Medical Documents')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="medical_document">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__('Upload Document')}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Monthly Donation')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="monthly_donation_status" >
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Featured')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="featured" >
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Emmergency')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="emmergency" >
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Reward')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="reward" >
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Gift')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="gift_status" class="add_gift_status">
                                            <span class="slider"></span>
                                        </label>
                                    </div>

                                   <div class="gift_select_wrapper">
                                       <div class="form-group">
                                           <label><strong>{{__('Select Gift')}}</strong></label>
                                           <select name="gifts[]" class="form-control gifts" multiple>
                                               @foreach($all_gifts as $gift)
                                                   <option value="{{$gift->id}}">{{$gift->title}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>

                                    <br>
                                    <div class="iconbox-repeater-wrapper">
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
                                    </div>

                                    <button id="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Publish')}}</button>
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
    <script src="{{asset('assets/backend/js/jquery.nice-select.min.js')}}"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                <x-btn.submit/>

               $('.gifts').select2();
               $('.gifts').prop('disabled',true);
                $(document).on('change','.add_gift_status',function(){

                    if(this.checked){
                        $('.gifts').prop('disabled',false);
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
                $('.permalink_label').hide();
                $(document).on('keyup', '#title', function (e) {
                    var slug = converToSlug($(this).val());
                    var url = `{{url('/donation/')}}/` + slug;
                    $('.permalink_label').show();
                    var data = $('#slug_show').text(url).css('color', 'blue');
                    $('.blog_slug').val(slug);
                });

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

// 🔹 محرر المحتوى العربي
$('.summernote-ar').summernote({
    height: 400,
    codemirror: { theme: 'monokai' },
    callbacks: {
        onChange: function (contents) {
            $('#cause_content_ar').val(contents);
        },
        onInit: function () {
            const initial = $('#cause_content_ar').val();
            if (initial) {
                $(this).summernote('code', initial);
            }
        }
    }
});

// 🔹 محرر المحتوى الإنجليزي
$('.summernote-en').summernote({
    height: 400,
    codemirror: { theme: 'monokai' },
    callbacks: {
        onChange: function (contents) {
            $('#cause_content_en').val(contents);
        },
        onInit: function () {
            const initial = $('#cause_content_en').val();
            if (initial) {
                $(this).summernote('code', initial);
            }
        }
    }
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
                       placeholder="{{__('Brand Name, Capacity, etc.')}}">
            </td>
            <td>
                <input type="text" class="form-control spec-value" 
                       placeholder="{{__('BOSCH, 682 Liters, etc.')}}">
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

// ✅ التهيئة الأولية - بدون $(document).ready داخلي
updateSpecificationsInput();

// ====== نهاية Specifications Table Management ======
// 🔹 English Specifications
function updateSpecificationsEnInput() {
    var specifications = [];
    $('.specification-row-en').each(function() {
        var name = $(this).find('.spec-name-en').val().trim();
        var value = $(this).find('.spec-value-en').val().trim();

        if (name !== '' || value !== '') {
            specifications.push({ name: name, value: value });
        }
    });
    $('#specifications_en_input').val(JSON.stringify(specifications));
}

$(document).on('click', '.add-spec-row-en', function() {
    var newRow = `
        <tr class="specification-row-en">
            <td><input type="text" class="form-control spec-name-en" placeholder="{{__('Brand Name, Capacity, etc.')}}"></td>
            <td><input type="text" class="form-control spec-value-en" placeholder="{{__('BOSCH, 682 Liters, etc.')}}"></td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove-spec-row-en" title="{{__('Remove Row')}}">
                    <i class="ti-trash"></i>
                </button>
            </td>
        </tr>
    `;
    $('#specifications_en_tbody').append(newRow);
    updateSpecificationsEnInput();
});

$(document).on('click', '.remove-spec-row-en', function() {
    if ($('.specification-row-en').length > 1) {
        $(this).closest('.specification-row-en').remove();
        updateSpecificationsEnInput();
    }
});

$(document).on('keyup', '.spec-name-en, .spec-value-en', function() {
    updateSpecificationsEnInput();
});

// init
updateSpecificationsEnInput();

            });
            
        })(jQuery);
        
    </script>
    <style>
    .specifications-table-container {
    border: 1px solid #ced4da;
    border-radius: 4px;
    background: white;
}

#specifications_table {
    margin-bottom: 0;
    background: white;
    direction: ltr;
    border: none;
}

#specifications_table th {
    background: #f8f9fa;
    color: #495057;
    border: none;
    font-weight: 500;
    padding: 10px 12px;
    font-size: 13px;
    border-bottom: 1px solid #dee2e6;
}

.specification-row td {
    padding: 12px;
    border-bottom: 1px solid #f8f9fa;
}

.spec-name, .spec-value {
    border: 1px solid #ced4da;
    border-radius: 4px;
    width: 100%;
    padding: 8px 12px;
    font-size: 14px;
    background: #fff;
}

.spec-name:focus, .spec-value:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* أزرار ثابتة */
.spec-actions {
    display: flex;
    gap: 5px;
    justify-content: center;
}

.btn-spec {
    border: 1px solid #6c757d;
    border-radius: 4px;
    padding: 6px 10px;
    font-size: 12px;
    background: white;
    color: #495057;
    transition: all 0.2s ease;
    min-width: 35px;
}

.btn-spec:hover {
    background: #6c757d;
    color: white;
}

.btn-spec-add {
    border-color: #28a745;
    color: #28a745;
}

.btn-spec-add:hover {
    background: #28a745;
    color: white;
}

.btn-spec-remove {
    border-color: #dc3545;
    color: #dc3545;
}

.btn-spec-remove:hover {
    background: #dc3545;
    color: white;
}
</style>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <x-media.js/>
   <x-repeater/>
@endsection
