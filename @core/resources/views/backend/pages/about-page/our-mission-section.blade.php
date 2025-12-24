@extends('backend.admin-master')
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('site-title')
    {{__('Our Mission Section')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @include('backend/partials/error')
            </div>
            <div class="col-lg-12 mt-t">
               <div class="card">
    <div class="card-body">
        <h4 class="header-title">{{ __('Our Mission Section Settings') }}</h4>

        <form action="{{ route('admin.about.our.mission') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- ===== العنوان الرئيسي (عربي / إنجليزي) ===== --}}
            <div class="form-group">
                <label for="about_page_our_mission_title">{{ __('Title (Arabic)') }}</label>
                <input type="text"
                       name="about_page_our_mission_title"
                       value="{{ get_static_option('about_page_our_mission_title') }}"
                       class="form-control"/>
            </div>

            <div class="form-group">
                <label for="about_page_our_mission_title_en">{{ __('Title (English)') }}</label>
                <input type="text"
                       name="about_page_our_mission_title_en"
                       value="{{ get_static_option('about_page_our_mission_title_en') }}"
                       class="form-control"/>
            </div>

            {{-- ===== الوصف (عربي / إنجليزي) ===== --}}
            <div class="form-group">
                <label for="about_page_our_mission_description">{{ __('Description (Arabic)') }}</label>
                <input type="hidden"
                       name="about_page_our_mission_description">
                <div class="summernote"
                     data-content='{{ get_static_option('about_page_our_mission_description') }}'></div>
            </div>

            <div class="form-group">
                <label for="about_page_our_mission_description_en">{{ __('Description (English)') }}</label>
                <input type="hidden"
                       name="about_page_our_mission_description_en">
                <div class="summernote"
                     data-content='{{ get_static_option('about_page_our_mission_description_en') }}'></div>
            </div>

            {{-- ===== صورة اليسار ===== --}}
            <div class="form-group">
                <label for="about_page_image_one">{{ __('Left Image') }}</label>
                @php $signature_image_upload_btn_label = 'Upload Image'; @endphp
                <div class="media-upload-btn-wrapper">
                    <div class="img-wrap">
                        @php
                            $signature_img = get_attachment_image_by_id(
                                get_static_option('about_page_our_mission_left_image_image'),
                                null,
                                false
                            );
                        @endphp
                        @if (!empty($signature_img))
                            <div class="attachment-preview">
                                <div class="thumbnail">
                                    <div class="centered">
                                        <img class="avatar user-thumb"
                                             src="{{ $signature_img['img_url'] }}">
                                    </div>
                                </div>
                            </div>
                            @php $signature_image_upload_btn_label = 'Change Image'; @endphp
                        @endif
                    </div>
                    <input type="hidden"
                           name="about_page_our_mission_left_image_image"
                           value="{{ get_static_option('about_page_our_mission_left_image_image') }}">
                    <button type="button" class="btn btn-info media_upload_form_btn"
                            data-btntitle="{{ __('Select Image') }}"
                            data-modaltitle="{{ __('Upload Image') }}"
                            data-imgid="{{ get_static_option('about_page_our_mission_left_image_image') }}"
                            data-toggle="modal" data-target="#media_upload_modal">
                        {{ __($signature_image_upload_btn_label) }}
                    </button>
                </div>
                <small>{{ __('recommended image size is 650x380 pixel') }}</small>
            </div>

            {{-- ===== لستة النقاط (عربي / إنجليزي) ===== --}}
            @php
                $all_icon_fields = get_static_option('about_page_our_mission_list_section_icon');
                $all_icon_fields = !empty($all_icon_fields)
                    ? unserialize($all_icon_fields)
                    : ['fas fa-check'];

                $all_title_fields = get_static_option('about_page_our_mission_list_section_title');
                $all_title_fields = !empty($all_title_fields)
                    ? unserialize($all_title_fields)
                    : ['If you want to change the world'];

                $all_title_fields_en = get_static_option('about_page_our_mission_list_section_title_en');
                $all_title_fields_en = !empty($all_title_fields_en)
                    ? unserialize($all_title_fields_en)
                    : ['If you want to change the world'];
            @endphp

            @foreach($all_icon_fields as $index => $icon_field)
                <div class="iconbox-repeater-wrapper">
                    <div class="all-field-wrap">

                        {{-- عنوان العنصر بالعربي --}}
                        <div class="form-group">
                            <label for="about_page_our_mission_list_section_title">
                                {{ __('Item Title (Arabic)') }}
                            </label>
                            <input type="text"
                                   name="about_page_our_mission_list_section_title[]"
                                   class="form-control"
                                   value="{{ $all_title_fields[$index] ?? '' }}">
                        </div>

                        {{-- عنوان العنصر بالإنجليزي --}}
                        <div class="form-group">
                            <label for="about_page_our_mission_list_section_title_en">
                                {{ __('Item Title (English)') }}
                            </label>
                            <input type="text"
                                   name="about_page_our_mission_list_section_title_en[]"
                                   class="form-control"
                                   value="{{ $all_title_fields_en[$index] ?? '' }}">
                        </div>

                        {{-- الأيقونة --}}
                        <div class="form-group">
                            <label for="about_page_our_mission_list_section_icon" class="d-block">
                                {{ __('Icon') }}
                            </label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="{{ $icon_field }}"></i>
                                </button>
                                <button type="button"
                                        class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="{{ $icon_field }}"
                                        data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden"
                                   class="form-control"
                                   value="{{ $icon_field }}"
                                   name="about_page_our_mission_list_section_icon[]">
                        </div>

                        <div class="action-wrap">
                            <span class="add"><i class="ti-plus"></i></span>
                            <span class="remove"><i class="ti-trash"></i></span>
                        </div>
                    </div>
                </div>
            @endforeach

            <button id="update" type="submit"
                    class="btn btn-primary mt-4 pr-4 pl-4">
                {{ __('Update Settings') }}
            </button>
        </form>
    </div>
</div>

            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
    <x-repeater/>
    <x-icon-picker-activate-js/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                <x-btn.update/>

                $('.summernote').summernote({
                    height: 200,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function (contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });

                if ($('.summernote').length > 0) {
                    $('.summernote').each(function (index, value) {
                        $(this).summernote('code', $(this).data('content'));
                    });
                }

            });
        })(jQuery)
    </script>
@endsection
