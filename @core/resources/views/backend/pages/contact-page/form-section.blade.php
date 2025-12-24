@extends('backend.admin-master')
@section('site-title')
    {{__('Form Section')}}
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
            <div class="col-lg-12 mt-t">
              <div class="card">
    <div class="card-body">
        <h4 class="header-title">{{__('Form Section Settings')}}</h4>
        <form action="{{route('admin.contact.page.form.area')}}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- 🔹 العنوان بالعربي --}}
            <div class="form-group">
                <label for="contact_page_form_section_title">{{__('Title (Arabic)')}}</label>
                <input type="text"
                       name="contact_page_form_section_title"
                       id="contact_page_form_section_title"
                       class="form-control"
                       value="{{ get_static_option('contact_page_form_section_title') }}">
            </div>

            {{-- 🔹 العنوان بالإنجليزي --}}
            <div class="form-group">
                <label for="contact_page_form_section_title_en">{{__('Title (English)')}}</label>
                <input type="text"
                       name="contact_page_form_section_title_en"
                       id="contact_page_form_section_title_en"
                       class="form-control"
                       value="{{ get_static_option('contact_page_form_section_title_en') }}">
            </div>

            {{-- 🔹 نص الزر بالعربي --}}
            <div class="form-group">
                <label for="contact_page_form_submit_btn_text">{{__('Button Text (Arabic)')}}</label>
                <input type="text"
                       name="contact_page_form_submit_btn_text"
                       id="contact_page_form_submit_btn_text"
                       class="form-control"
                       value="{{ get_static_option('contact_page_form_submit_btn_text') }}">
            </div>

            {{-- 🔹 نص الزر بالإنجليزي --}}
            <div class="form-group">
                <label for="contact_page_form_submit_btn_text_en">{{__('Button Text (English)')}}</label>
                <input type="text"
                       name="contact_page_form_submit_btn_text_en"
                       id="contact_page_form_submit_btn_text_en"
                       class="form-control"
                       value="{{ get_static_option('contact_page_form_submit_btn_text_en') }}">
            </div>

            {{-- 🔹 إيميل استلام الفورم --}}
            <div class="form-group">
                <label for="contact_page_form_receiving_mail">{{__('Contact Form Mail')}}</label>
                <input type="text"
                       name="contact_page_form_receiving_mail"
                       id="contact_page_form_receiving_mail"
                       class="form-control"
                       value="{{ get_static_option('contact_page_form_receiving_mail') }}">
                <span class="info-text">
                    {{ __('you will get mail to this address. when anyone submit contact form.') }}
                </span>
            </div>

            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">
                {{__('Update Settings')}}
            </button>
        </form>
    </div>
</div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        <x-btn.update/>
    </script>
@endsection
