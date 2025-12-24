@extends('backend.admin-master')
@section('site-title')
    {{__('Faq')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <x-media.css/>
    <x-summernote.css/>
    <x-datatable.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.error/>
                <x-msg.success/>
            </div>

            @php
                // تحديد لغة لوحة التحكم
                $locale   = app()->getLocale();
                $isArabic = \Illuminate\Support\Str::startsWith($locale,'ar');
            @endphp

            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Faq Items')}}</h4>
                        @can('faq-delete')
                            <div class="bulk-delete-wrapper">
                                <div class="select-box-wrap">
                                    <select name="bulk_option" id="bulk_option">
                                        <option value="">{{{__('Bulk Action')}}}</option>
                                        <option value="delete">{{{__('Delete')}}}</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                                </div>
                            </div>
                        @endcan

                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_faqs as $data)
                                    @php
                                        $titleAr = $data->title ?? '';
                                        $titleEn = $data->title_en ?? '';
                                        $rowTitle = $isArabic
                                            ? ($titleAr ?: $titleEn)
                                            : ($titleEn ?: $titleAr);
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{ $rowTitle ?: __('Untitled') }}</td>
                                        <td>
                                            @if($data->status == 'publish')
                                                <span class="alert alert-success">{{__('Publish')}}</span>
                                            @else
                                                <span class="alert alert-warning">{{__('Draft')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('faq-delete')
                                                <x-delete-popover :url="route('admin.faq.delete',$data->id)"/>
                                            @endcan
                                            @can('faq-edit')
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#faq_item_edit_modal"
                                                   class="btn btn-primary btn-xs mb-3 mr-1 faq_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-title="{{$data->title}}"
                                                   data-title_en="{{$data->title_en}}"
                                                   data-lang="{{$data->lang}}"
                                                   data-is_open="{{$data->is_open}}"
                                                   data-description="{{$data->description}}"
                                                   data-description_en="{{$data->description_en}}"
                                                   data-status="{{$data->status}}"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>

                                                <form action="{{route('admin.faq.clone')}}" method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    <input type="hidden" name="item_id" value="{{$data->id}}">
                                                    <button type="submit" title="{{__('clone this to new draft')}}"
                                                            class="btn btn-xs btn-secondary btn-sm mb-3 mr-1">
                                                        <i class="far fa-copy"></i>
                                                    </button>
                                                </form>
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

            @can('faq-create')
                <div class="col-lg-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">{{__('New Faq')}}</h4>
                            <form action="{{route('admin.faq')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="title">{{__('Title (AR)')}}</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="{{__('Title (Arabic)')}}">
                                </div>

                                <div class="form-group">
                                    <label for="title_en">{{__('Title (EN)')}}</label>
                                    <input type="text" class="form-control" id="title_en" name="title_en"
                                           placeholder="{{__('Title (English)')}}">
                                </div>

                                <div class="form-group">
                                    <label for="is_open">{{__('Is Open')}}</label>
                                    <label class="switch">
                                        <input type="checkbox" name="is_open" id="is_open">
                                        <span class="slider"></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="description">{{__('Description (AR)')}}</label>
                                    <input type="hidden" name="description">
                                    <div class="summernote"></div>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="description_en">{{__('Description (EN)')}}</label>
                                    <input type="hidden" name="description_en">
                                    <div class="summernote description-en-editor"></div>
                                </div>

                                <div class="form-group">
                                    <label for="status">{{__('Status')}}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="publish">{{__('Publish')}}</option>
                                        <option value="draft">{{__('Draft')}}</option>
                                    </select>
                                </div>

                                <button id="submit" type="submit"
                                        class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Faq')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>

    @can('faq-edit')
        <div class="modal fade" id="faq_item_edit_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Edit Faq Item')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('admin.faq.update')}}" id="faq_edit_modal_form"
                          enctype="multipart/form-data" method="post">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="id" id="faq_id" value="">

                            <div class="form-group">
                                <label for="edit_title">{{__('Title (AR)')}}</label>
                                <input type="text" class="form-control" id="edit_title" name="title"
                                       placeholder="{{__('Title')}}">
                            </div>

                            <div class="form-group">
                                <label for="edit_title_en">{{__('Title (EN)')}}</label>
                                <input type="text" class="form-control" id="edit_title_en" name="title_en"
                                       placeholder="{{__('Title (English)')}}">
                            </div>

                            <div class="form-group">
                                <label for="edit_is_open">{{__('Is Open')}}</label>
                                <label class="switch">
                                    <input type="checkbox" name="is_open" id="edit_is_open">
                                    <span class="slider"></span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="edit_description">{{__('Description (AR)')}}</label>
                                <input type="hidden" id="edit_description" name="description">
                                <div class="summernote description-ar-editor"></div>
                            </div>

                            <div class="form-group">
                                <label for="edit_description_en">{{__('Description (EN)')}}</label>
                                <input type="hidden" id="edit_description_en" name="description_en">
                                <div class="summernote description-en-editor"></div>
                            </div>

                            <div class="form-group">
                                <label for="edit_status">{{__('Status')}}</label>
                                <select name="status" id="edit_status" class="form-control">
                                    <option value="publish">{{__('Publish')}}</option>
                                    <option value="draft">{{__('Draft')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('Close')}}</button>
                            <button id="update" type="submit"
                                    class="btn btn-primary">{{__('Save Changes')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan

    <x-media.markup/>
@endsection

@section('script')
    <x-summernote.js/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {

                <x-bulk-action-js :url="route('admin.faq.bulk.action')" />
                <x-btn.submit/>
                <x-btn.update/>

                // Edit FAQ modal fill
                $(document).on('click', '.faq_edit_btn', function () {
                    var el   = $(this);
                    var form = $('#faq_edit_modal_form');

                    form.find('#faq_id').val(el.data('id'));

                    // Titles
                    form.find('#edit_title').val(el.data('title') || '');
                    form.find('#edit_title_en').val(el.data('title_en') || '');

                    // Is open
                    if (el.data('is_open') !== '') {
                        form.find('#edit_is_open').prop('checked', true);
                    } else {
                        form.find('#edit_is_open').prop('checked', false);
                    }

                    // Status
                    form.find('#edit_status').val(el.data('status'));

                    // Descriptions
                    var descAr = el.data('description') || '';
                    var descEn = el.data('description_en') || '';

                    form.find('#edit_description').val(descAr);
                    form.find('#edit_description_en').val(descEn);

                    form.find('.description-ar-editor').summernote('code', descAr);
                    form.find('.description-en-editor').summernote('code', descEn);
                });

            });
        })(jQuery);
    </script>

    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <x-datatable.js/>
    <x-media.js/>
@endsection
