@extends('backend.admin-master')
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    <x-media.css/>
@endsection
@section('site-title')
    {{__('Blogs')}}
@endsection
@section('content')
    @php
        // detect current admin language (ar / en ...)
        $currentLocale = function_exists('get_user_lang')
            ? get_user_lang()
            : (session('lang') ?? app()->getLocale());

        $isArabic = strpos($currentLocale,'ar') === 0;
    @endphp

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
                        <h4 class="header-title">{{__('All Blog Items')}}</h4>
                        <div class="bulk-delete-wrapper">
                           @can('blog-delete')
                                <x-bulk-action/>
                            @endcan
                           @can('blog-create')
                               <div class="btn-wrapper">
                                   <a href="{{route('admin.blog.new')}}" class="btn btn-info pull-right mb-3">{{__("Add New")}}</a>
                               </div>
                           @endcan
                        </div>

                        <div class="table-wrap table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Author')}}</th>
                                <th>{{__('Category')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_blog as $data)
                                    @php
                                        // title AR/EN with fallback
                                        $titleAr   = $data->title ?? '';
                                        $titleEn   = $data->title_en ?? '';
                                        $showTitle = $isArabic
                                            ? ($titleAr ?: $titleEn)
                                            : ($titleEn ?: $titleAr);

                                        // author AR/EN with fallback
                                        $authorAr   = $data->author ?? '';
                                        $authorEn   = $data->author_en ?? '';
                                        $showAuthor = $isArabic
                                            ? ($authorAr ?: $authorEn)
                                            : ($authorEn ?: $authorAr);

                                        // category name AR/EN with fallback
                                        $showCategory = '';
                                        if (!empty($data->blog_categories_id)) {
                                            // if relation "category" exists, use it; otherwise find by id
                                            $cat = $data->category ?? \App\BlogCategory::find($data->blog_categories_id);
                                            if ($cat) {
                                                $catAr = $cat->name ?? '';
                                                $catEn = $cat->name_en ?? '';
                                                $showCategory = $isArabic
                                                    ? ($catAr ?: $catEn)
                                                    : ($catEn ?: $catAr);
                                            }
                                        }
                                    @endphp

                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{ $data->id }}</td>

                                        {{-- title --}}
                                        <td>{{ $showTitle ?: __('Untitled') }}</td>

                                        {{-- image --}}
                                        <td>{!! render_attachment_preview_for_admin($data->image) !!}</td>

                                        {{-- author --}}
                                        <td>{{ $showAuthor }}</td>

                                        {{-- category --}}
                                        <td>{{ $showCategory }}</td>

                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>{{ date_format($data->created_at,'d M Y') }}</td>
                                        <td>
                                            @can('blog-delete')
                                                <x-delete-popover :url="route('admin.blog.delete',$data->id)"/>
                                            @endcan
                                            @can('blog-edit')
                                                <x-edit-icon :url="route('admin.blog.edit',$data->id)"/>
                                                <x-clone-icon :action="route('admin.blog.clone')" :id="$data->id"/>
                                            @endcan
                                            <x-view-icon :url="route('frontend.blog.single', $data->slug)"/>
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
@endsection

@section('script')
    <script>
        <x-bulk-action-js :url="route('admin.blog.bulk.action')"/>
    </script>
    @include('backend.partials.datatable.script-enqueue')
@endsection
