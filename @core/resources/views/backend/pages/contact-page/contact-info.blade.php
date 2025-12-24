@extends('backend.admin-master')
@section('site-title')
    {{__('Contact Info')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-7 mt-5">
             <div class="card">
    <div class="card-body">
        <h4 class="header-title">{{ __('Contact Info Items') }}</h4>
        <div class="bulk-delete-wrapper">
            <div class="select-box-wrap">
                <select name="bulk_option" id="bulk_option">
                    <option value="">{{ __('Bulk Action') }}</option>
                    <option value="delete">{{ __('Delete') }}</option>
                </select>
                <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{ __('Apply') }}</button>
            </div>
        </div>

        @php
            $locale   = app()->getLocale();
            $isArabic = \Illuminate\Support\Str::startsWith($locale, 'ar');
        @endphp

        <table class="table table-default">
            <thead>
                <th>
                    <div class="mark-all-checkbox">
                        <input type="checkbox" class="all-checkbox">
                    </div>
                </th>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Icon') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Action') }}</th>
            </thead>
            <tbody>
            @foreach($all_contact_info as $data)
                @php
                    // قيم العناوين حسب اللغة مع Fallback
                    $titleAr = $data->title ?? '';
                    $titleEn = $data->title_en ?? '';

                    $descAr  = $data->description ?? '';
                    $descEn  = $data->description_en ?? '';

                    $displayTitle = $isArabic
                        ? ($titleAr ?: $titleEn)
                        : ($titleEn ?: $titleAr);

                    $displayDesc  = $isArabic
                        ? ($descAr ?: $descEn)
                        : ($descEn ?: $descAr);
                @endphp

                <tr>
                    <td>
                        <div class="bulk-checkbox-wrapper">
                            <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{ $data->id }}">
                        </div>
                    </td>
                    <td>{{ $data->id }}</td>

                    {{-- Icon --}}
                    <td><i class="{{ $data->icon }}"></i></td>

                    {{-- Title based on lang --}}
                    <td>{{ $displayTitle }}</td>

                    {{-- Description based on lang --}}
                    <td>{{ $displayDesc }}</td>

                    <td>
                        <x-delete-popover :url="route('admin.contact.info.delete', $data->id)"/>

                      <a href="#"
   data-toggle="modal"
   data-target="#contact_info_item_edit_modal"
   class="btn btn-lg btn-primary btn-sm mb-3 mr-1 contact_info_edit_btn"
   data-id="{{$data->id}}"
   data-icon="{{$data->icon}}"

   {{-- العناوين --}}
   data-title_ar="{{$data->title}}"
   data-title_en="{{$data->title_en}}"

   {{-- الأوصاف --}}
   data-description_ar="{{$data->description}}"
   data-description_en="{{$data->description_en}}"
>
    <i class="ti-pencil"></i>
</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

            </div>
            <div class="col-lg-5 mt-5">
               <div class="card">
    <div class="card-body">
        <h4 class="header-title">{{__('New Contact Info')}}</h4>
        <form action="{{route('admin.contact.info')}}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- العنوان بالعربي --}}
            <div class="form-group">
                <label for="title">{{__('Title (AR)')}}</label>
                <input type="text" class="form-control" id="title" name="title"
                       placeholder="{{__('Title (AR)')}}">
            </div>

            {{-- العنوان بالإنجليزي --}}
            <div class="form-group">
                <label for="title_en">{{__('Title (EN)')}}</label>
                <input type="text" class="form-control" id="title_en" name="title_en"
                       placeholder="{{__('Title (EN)')}}">
            </div>

            <div class="form-group">
                <label for="icon" class="d-block">{{__('Icon')}}</label>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary iconpicker-component">
                        <i class="fas fa-exclamation-triangle"></i>
                    </button>
                    <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                            data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu"></div>
                </div>
                <input type="hidden" class="form-control" id="icon"
                       value="fas fa-exclamation-triangle" name="icon">
            </div>

            {{-- الوصف بالعربي --}}
            <div class="form-group">
                <label for="description">{{__('Description (AR)')}}</label>
                <textarea id="description" name="description" class="form-control max-height-120"
                          cols="30" rows="10" placeholder="{{__('Description (AR)')}}"></textarea>
                <small class="info-text">{{__('separate by new line.')}}</small>
            </div>

            {{-- الوصف بالإنجليزي --}}
            <div class="form-group">
                <label for="description_en">{{__('Description (EN)')}}</label>
                <textarea id="description_en" name="description_en" class="form-control max-height-120"
                          cols="30" rows="10" placeholder="{{__('Description (EN)')}}"></textarea>
                <small class="info-text">{{__('separate by new line.')}}</small>
            </div>

            <button id="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">
                {{__('Add Contact Info Item')}}
            </button>
        </form>
    </div>
</div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="contact_info_item_edit_modal" aria-hidden="true">
       <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('Edit Contact Info Item')}}</h5>
            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        </div>
        <form action="{{route('admin.contact.info.update')}}" id="contact_info_edit_modal_form" method="post">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="id" id="contact_info_id" value="">

                {{-- العنوان بالعربي --}}
                <div class="form-group">
                    <label for="edit_title">{{__('Title (AR)')}}</label>
                    <input type="text" class="form-control" id="edit_title" name="title"
                           placeholder="{{__('Title (AR)')}}">
                </div>

                {{-- العنوان بالإنجليزي --}}
                <div class="form-group">
                    <label for="edit_title_en">{{__('Title (EN)')}}</label>
                    <input type="text" class="form-control" id="edit_title_en" name="title_en"
                           placeholder="{{__('Title (EN)')}}">
                </div>

                <div class="form-group">
                    <label for="edit_icon" class="d-block">{{__('Icon')}}</label>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary iconpicker-component">
                            <i class="fas fa-exclamation-triangle"></i>
                        </button>
                        <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu"></div>
                    </div>
                    <input type="hidden" class="form-control" id="edit_icon"
                           value="fas fa-exclamation-triangle" name="icon">
                </div>

                {{-- الوصف بالعربي --}}
                <div class="form-group">
                    <label for="edit_description">{{__('Description (AR)')}}</label>
                    <textarea id="edit_description" name="description"
                              class="form-control max-height-120"
                              cols="30" rows="10"
                              placeholder="{{__('Description (AR)')}}"></textarea>
                    <small class="info-text">{{__('separate by new line.')}}</small>
                </div>

                {{-- الوصف بالإنجليزي --}}
                <div class="form-group">
                    <label for="edit_description_en">{{__('Description (EN)')}}</label>
                    <textarea id="edit_description_en" name="description_en"
                              class="form-control max-height-120"
                              cols="30" rows="10"
                              placeholder="{{__('Description (EN)')}}"></textarea>
                    <small class="info-text">{{__('separate by new line.')}}</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{__('Close')}}
                </button>
                <button id="update" type="submit" class="btn btn-primary">
                    {{__('Save Changes')}}
                </button>
            </div>
        </form>
    </div>
</div>

    </div>
@endsection
@section('script')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-btn.submit/>
                <x-btn.update/>
                <x-bulk-action-js :url="route('admin.contact.info.bulk.action')"/>
               $(document).on('click', '.contact_info_edit_btn', function () {
    var el   = $(this);
    var id   = el.data('id');
    var icon = el.data('icon');

    // عناوين بالعربي / إنجليزي
    var titleAr = el.data('title_ar') || '';
    var titleEn = el.data('title_en') || '';

    // أوصاف بالعربي / إنجليزي
    var descAr = el.data('description_ar') || '';
    var descEn = el.data('description_en') || '';

    var form = $('#contact_info_edit_modal_form');

    form.find('#contact_info_id').val(id);

    // تعبئة الحقول
    form.find('#edit_title').val(titleAr);
    form.find('#edit_title_en').val(titleEn);

    form.find('#edit_icon').val(icon);
    form.find('#edit_description').val(descAr);
    form.find('#edit_description_en').val(descEn);

    // تحديث الأيقونة في الـ iconpicker
    form.find('.icp-dd').attr('data-selected', icon);
    form.find('.iconpicker-component i').attr('class', icon);
});


                $('.icp-dd').iconpicker();
                $('.icp-dd').on('iconpickerSelected', function (e) {
                    var selectedIcon = e.iconpickerValue;
                    $(this).parent().parent().children('input').val(selectedIcon);
                });
            });
        })(jQuery);
    </script>
@endsection
