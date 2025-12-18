@extends('backend.admin-master')
@section('site-title')
    {{__('Donations Category')}}
@endsection
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    <x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.error/>
                <x-msg.success/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('All Donations Categories')}}</h4>
                        <div class="bulk-delete-wrapper">
                            @can('donation-category-delete')
                                <x-bulk-action/>
                            @endcan
                            @can('donation-category-create')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-wrapper pull-right mb-3">
                                            <a data-toggle="modal" data-target="#create_category"
                                               class="btn btn-info text-white">{{__('Add New Category')}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </div>


                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                               @php
                        // اللغة الحالية للموقع (لو عندك get_user_lang استخدمها)
                        $locale = get_user_lang();   // أو app()->getLocale()
                    @endphp

                    <tbody>
                    @foreach($all_category as $data)
                        <tr>
                            <td>
                                <x-bulk-delete-checkbox :id="$data->id"/>
                            </td>

                            <td>{{ $data->id }}</td>

                            {{-- العنوان حسب اللغة --}}
                            <td>
                                @if($locale === 'ar')
                                    {{ $data->title }}          {{-- العربي --}}
                                @else
                                    {{ $data->title_en }}       {{-- الإنجليزي --}}
                                @endif
                            </td>

                            <td>{!! render_attachment_preview_for_admin($data->image) !!}</td>

                            {{-- الوصف حسب اللغة --}}
                            <td>
                                @if($locale === 'ar')
                                    {{ $data->description }}        {{-- العربي --}}
                                @else
                                    {{ $data->description_en }}     {{-- الإنجليزي --}}
                                @endif
                            </td>

                            <td>
                                <x-status-span :status="$data->status"/>
                            </td>

                            <td>
                                @can('donation-category-create')
                                    <x-delete-popover :url="route('admin.donations.category.delete',$data->id)"/>
                                @endcan
                                @can('donation-category-edit')
                                    <a href="#"
                                    data-toggle="modal"
                                    data-target="#category_edit_modal"
                                    class="btn btn-primary btn-xs mb-3 mr-1 category_edit_btn"
                                    data-id="{{ $data->id }}"
                                    data-title="{{ $data->title }}"                {{-- AR --}}
                                    data-title_en="{{ $data->title_en }}"          {{-- EN --}}
                                    data-description="{{ $data->description }}"    {{-- AR --}}
                                    data-description_en="{{ $data->description_en }}" {{-- EN --}}
                                    data-status="{{ $data->status }}"
                                    {!! render_img_url_data_attr($data->image,'imageurl') !!}
                                    data-image="{{ $data->image }}">
                                        <i class="ti-pencil"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('donation-category-edit')
    <div class="modal fade" id="category_edit_modal" aria-hidden="true">
       <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Update Category') }}</h5>
            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        </div>
        <form action="{{ route('admin.donations.category.update') }}" method="post">
            <input type="hidden" name="category_id">
            <div class="modal-body">
                @csrf

                {{-- Title AR --}}
                <div class="form-group">
                    <label for="edit_title">{{ __('Title (Arabic)') }}</label>
                    <input type="text"
                           class="form-control"
                           id="edit_title"
                           name="title"
                           placeholder="{{ __('Title (Arabic)') }}">
                </div>

                {{-- Title EN --}}
                <div class="form-group">
                    <label for="edit_title_en">{{ __('Title (English)') }}</label>
                    <input type="text"
                           class="form-control"
                           id="edit_title_en"
                           name="title_en"
                           placeholder="{{ __('Title (English)') }}">
                </div>

                {{-- Description AR --}}
                <div class="form-group">
                    <label for="edit_description">{{ __('Description (Arabic)') }}</label>
                    <textarea name="description"
                              id="edit_description"
                              class="form-control"
                              cols="30"
                              rows="5"
                              placeholder="{{ __('Description (Arabic)') }}"></textarea>
                </div>

                {{-- Description EN --}}
                <div class="form-group">
                    <label for="edit_description_en">{{ __('Description (English)') }}</label>
                    <textarea name="description_en"
                              id="edit_description_en"
                              class="form-control"
                              cols="30"
                              rows="5"
                              placeholder="{{ __('Description (English)') }}"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">{{ __('Image') }}</label>
                    <div class="media-upload-btn-wrapper">
                        <div class="img-wrap"></div>
                        <input type="hidden" name="image">
                        <button type="button" class="btn btn-info media_upload_form_btn"
                                data-btntitle="{{ __('Select Image') }}"
                                data-modaltitle="{{ __('Upload Image') }}"
                                data-toggle="modal"
                                data-target="#media_upload_modal">
                            {{ __('Upload Image') }}
                        </button>
                    </div>
                    <small>{{ __('Recommended image size 1920x1280') }}</small>
                </div>

                <div class="form-group">
                    <label for="edit_status">{{ __('Status') }}</label>
                    <select name="status" class="form-control" id="edit_status">
                        <option value="draft">{{ __('Draft') }}</option>
                        <option value="publish">{{ __('Publish') }}</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">{{ __('Close') }}</button>
                <button id="update"
                        type="submit"
                        class="btn btn-primary">{{ __('Save Change') }}</button>
            </div>
        </form>
    </div>
</div>

    </div>
    @endcan
    @can('donation-category-create')
  <div class="modal fade" id="create_category" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add new category') }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form action="{{ route('admin.donations.category.new') }}" method="post">
                <div class="modal-body">
                    @csrf

                    {{-- Arabic title --}}
                    <div class="form-group">
                        <label for="title_ar">{{ __('Title (Arabic)') }}</label>
                        <input type="text"
                               id="title_ar"
                               class="form-control"
                               name="title"
                               placeholder="{{ __('Title (Arabic)') }}">
                    </div>

                    {{-- English title --}}
                    <div class="form-group">
                        <label for="title_en">{{ __('Title (English)') }}</label>
                        <input type="text"
                               id="title_en"
                               class="form-control"
                               name="title_en"
                               placeholder="{{ __('Title (English)') }}">
                    </div>

                    {{-- Arabic description --}}
                    <div class="form-group">
                        <label for="description_ar">{{ __('Description (Arabic)') }}</label>
                        <textarea id="description_ar"
                                  name="description"
                                  class="form-control"
                                  cols="30"
                                  rows="5"
                                  placeholder="{{ __('Description (Arabic)') }}"></textarea>
                    </div>

                    {{-- English description --}}
                    <div class="form-group">
                        <label for="description_en">{{ __('Description (English)') }}</label>
                        <textarea id="description_en"
                                  name="description_en"
                                  class="form-control"
                                  cols="30"
                                  rows="5"
                                  placeholder="{{ __('Description (English)') }}"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">{{ __('Image') }}</label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="image">
                            <button type="button" class="btn btn-info media_upload_form_btn"
                                    data-btntitle="{{ __('Select Image') }}"
                                    data-modaltitle="{{ __('Upload Image') }}"
                                    data-toggle="modal"
                                    data-target="#media_upload_modal">
                                {{ __('Upload Image') }}
                            </button>
                        </div>
                        <small>{{ __('Recommended image size 1920x1280') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <select name="status" class="form-control" id="status">
                            <option value="publish">{{ __('Publish') }}</option>
                            <option value="draft">{{ __('Draft') }}</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Close') }}</button>
                    <button id="submit"
                            type="submit"
                            class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

    @endcan
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
  @section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script>
        <x-btn.submit/>
        <x-btn.update/>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.donations.category.bulk.action')"/>

                $(document).on('click', '.category_edit_btn', function () {
                    var el      = $(this);
                    var modal   = $('#category_edit_modal');

                    var id          = el.data('id');
                    var titleAr     = el.data('title') || '';
                    var titleEn     = el.data('title_en') || '';
                    var descAr      = el.data('description') || '';
                    var descEn      = el.data('description_en') || '';
                    var status      = el.data('status');
                    var image       = el.data('image');
                    var imageUrl    = el.data('imageurl');

                    // hidden id
                    modal.find('input[name="category_id"]').val(id);

                    // status
                    modal.find('#edit_status').val(status);

                    // Arabic fields
                    modal.find('input[name="title"]').val(titleAr);
                    modal.find('textarea[name="description"]').val(descAr);

                    // English fields
                    modal.find('input[name="title_en"]').val(titleEn);
                    modal.find('textarea[name="description_en"]').val(descEn);

                    // image preview
                    if (image) {
                        modal.find('.media-upload-btn-wrapper .img-wrap').html(
                            '<div class="attachment-preview">' +
                                '<div class="thumbnail">' +
                                    '<div class="centered">' +
                                        '<img class="avatar user-thumb" src="' + imageUrl + '">' +
                                    '</div>' +
                                '</div>' +
                            '</div>'
                        );
                        modal.find('.media-upload-btn-wrapper input[name="image"]').val(image);
                        modal.find('.media_upload_form_btn').text('{{ __("Change Image") }}');
                    } else {
                        modal.find('.media-upload-btn-wrapper .img-wrap').html('');
                        modal.find('.media-upload-btn-wrapper input[name="image"]').val('');
                        modal.find('.media_upload_form_btn').text('{{ __("Upload Image") }}');
                    }
                });
            });
        })(jQuery)
    </script>
    @include('backend.partials.datatable.script-enqueue')
    @include('backend.partials.media-upload.media-js')
@endsection

    @include('backend.partials.datatable.script-enqueue')
    @include('backend.partials.media-upload.media-js')
@endsection
