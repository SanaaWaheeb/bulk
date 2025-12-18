@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('support_ticket_page_name')}}
@endsection
@section('page-title')
{{ __('Suggest Product') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('about_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('about_page_meta_tags')}}">
@endsection
@section('content')
    <section class="support-ticket-page-area padding-top-120 padding-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                   <div class="support-ticket-wrapper">
                       @if(auth()->guard('web')->check())
                           <h3 class="title">{{ __("Suggest New Product") }}</h3>
                          <x-msg.success/>
                          <x-msg.error/>
                           <form action="{{route('frontend.support.ticket.store')}}" method="post" class="support-ticket-form-wrapper" enctype="multipart/form-data">
                               @csrf
                               <input type="hidden" name="via" value="{{__('website')}}">
                                <div class="form-group">
                                    <label>{{ __("Product Name") }}</label>
                                    <input type="text" class="form-control" name="title" placeholder="{{__('Product Name')}}">
                                </div>
                                <div class="form-group">
                                <label>{{__('Departments')}}</label>
                                <select name="department_id" class="form-control">
                                    @foreach($departments as $dep)
                                    <option value="{{$dep->id}}"> {{ __($dep->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                               <div class="form-group">
                                   
                                    <input type="hidden" class="form-control" name="subject" placeholder="{{__('Subject')}}" value="a" >
                                </div>
                               <div class="form-group">
                                   
                                   <input name="priority" class="form-control" value="high" type="hidden">
                               </div>
                               <div class="form-group">
                                   <label>{{__('Description')}}</label>
                                   <textarea name="description"class="form-control" cols="30" rows="10" placeholder="{{__('Description')}}"></textarea>
                               </div>
                               <div class="form-group">
                                   <label>{{ __("Product Link") }}</label>
                                    <input type="text" class="form-control" name="URL" placeholder="{{ __('Product Link') }}">
                                </div>
                              <div class="btn-wrapper text-center">
                                  <button type="submit">{{ __('Send Request') }}</button>
                              </div>
                           </form>
                       @else
                           @include('frontend.user.login')
                       @endif
                   </div>
               </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @include('frontend.partials.ajax-login-js')
@endsection
