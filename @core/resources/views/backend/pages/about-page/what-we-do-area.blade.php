@extends('backend.admin-master')
@section('site-title')
    {{__('What We Do Area')}}
@endsection
@section('style')
   <x-media.css/>
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
        <h4 class="header-title">{{ __('What We Do Area Settings') }}</h4>
        <form action="{{ route('admin.about.what.we.do') }}" method="post"
              enctype="multipart/form-data">
            @csrf

            {{-- ===== العنوان الفرعي (عربي / إنجليزي) للقسم بالكامل ===== --}}
            <div class="form-group">
                <label for="about_page_what_we_do_area_subtitle">
                    {{ __('Subtitle (Arabic)') }}
                </label>
                <input type="text"
                       name="about_page_what_we_do_area_subtitle"
                       class="form-control"
                       value="{{ get_static_option('about_page_what_we_do_area_subtitle') }}">
            </div>

            <div class="form-group">
                <label for="about_page_what_we_do_area_subtitle_en">
                    {{ __('Subtitle (English)') }}
                </label>
                <input type="text"
                       name="about_page_what_we_do_area_subtitle_en"
                       class="form-control"
                       value="{{ get_static_option('about_page_what_we_do_area_subtitle_en') }}">
            </div>

            {{-- ===== العنوان الرئيسي (عربي / إنجليزي) للقسم بالكامل ===== --}}
            <div class="form-group">
                <label for="about_page_what_we_do_area_title">
                    {{ __('Title (Arabic)') }}
                </label>
                <input type="text"
                       name="about_page_what_we_do_area_title"
                       class="form-control"
                       value="{{ get_static_option('about_page_what_we_do_area_title') }}">
                <x-title-info-text/>
            </div>

            <div class="form-group">
                <label for="about_page_what_we_do_area_title_en">
                    {{ __('Title (English)') }}
                </label>
                <input type="text"
                       name="about_page_what_we_do_area_title_en"
                       class="form-control"
                       value="{{ get_static_option('about_page_what_we_do_area_title_en') }}">
            </div>

            @php
                // الأيقونات
                $all_icon_fields = get_static_option('about_page_what_we_do_section_icon');
                $all_icon_fields = !empty($all_icon_fields)
                    ? unserialize($all_icon_fields)
                    : ['flaticon-transfusion'];

                // العناوين عربي
                $all_title_fields = get_static_option('about_page_what_we_do_section_title');
                $all_title_fields = !empty($all_title_fields)
                    ? unserialize($all_title_fields)
                    : ['Education'];

                // العناوين إنجليزي
                $all_title_fields_en = get_static_option('about_page_what_we_do_section_title_en');
                $all_title_fields_en = !empty($all_title_fields_en)
                    ? unserialize($all_title_fields_en)
                    : ['bulk'];

                // الوصف عربي
                $all_description_fields = get_static_option('about_page_what_we_do_section_description');
                $all_description_fields = !empty($all_description_fields)
                    ? unserialize($all_description_fields)
                    : ['bulk.'];

                // الوصف إنجليزي
                $all_description_fields_en = get_static_option('about_page_what_we_do_section_description_en');
                $all_description_fields_en = !empty($all_description_fields_en)
                    ? unserialize($all_description_fields_en)
                    : ['bulk.'];

                // الروابط
                $all_url_fields = get_static_option('about_page_what_we_do_section_url');
                $all_url_fields = !empty($all_url_fields)
                    ? unserialize($all_url_fields)
                    : ['#'];
            @endphp

            @foreach($all_icon_fields as $index => $icon_field)
                <div class="iconbox-repeater-wrapper">
                    <div class="all-field-wrap">
                        <div class="tab-content margin-top-30" id="myTabContent">

                            {{-- عنوان العنصر بالعربي --}}
                            <div class="form-group">
                                <label for="about_page_what_we_do_section_title">
                                    {{ __('Item Title (Arabic)') }}
                                </label>
                                <input type="text"
                                       name="about_page_what_we_do_section_title[]"
                                       class="form-control"
                                       value="{{ $all_title_fields[$index] ?? '' }}">
                            </div>

                            {{-- عنوان العنصر بالإنجليزي --}}
                            <div class="form-group">
                                <label for="about_page_what_we_do_section_title_en">
                                    {{ __('Item Title (English)') }}
                                </label>
                                <input type="text"
                                       name="about_page_what_we_do_section_title_en[]"
                                       class="form-control"
                                       value="{{ $all_title_fields_en[$index] ?? '' }}">
                            </div>

                            {{-- الوصف بالعربي --}}
                            <div class="form-group">
                                <label for="about_page_what_we_do_section_description">
                                    {{ __('Description (Arabic)') }}
                                </label>
                                <textarea name="about_page_what_we_do_section_description[]"
                                          class="form-control">{{ $all_description_fields[$index] ?? '' }}</textarea>
                            </div>

                            {{-- الوصف بالإنجليزي --}}
                            <div class="form-group">
                                <label for="about_page_what_we_do_section_description_en">
                                    {{ __('Description (English)') }}
                                </label>
                                <textarea name="about_page_what_we_do_section_description_en[]"
                                          class="form-control">{{ $all_description_fields_en[$index] ?? '' }}</textarea>
                            </div>

                            {{-- الرابط --}}
                            <div class="form-group">
                                <label for="about_page_what_we_do_section_url">
                                    {{ __('URL') }}
                                </label>
                                <input type="text"
                                       name="about_page_what_we_do_section_url[]"
                                       class="form-control"
                                       value="{{ $all_url_fields[$index] ?? '' }}">
                            </div>

                            {{-- الأيقونة --}}
                            <div class="form-group">
                                <label for="about_page_what_we_do_section_icon" class="d-block">
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
                                       name="about_page_what_we_do_section_icon[]">
                            </div>
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
    <x-repeater/>
    <x-icon-picker-activate-js/>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
    <script>
        <x-btn.update/>
    </script>
@endsection
