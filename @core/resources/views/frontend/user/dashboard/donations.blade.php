@extends('frontend.user.dashboard.user-master')
@section('section')
        @if(count($donation) > 0)
        <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">{{__('معلومات الطلب')}}</th>
                        <th scope="col">{{__('تفاصيل السعر')}}</th>
                        <th scope="col">{{__('حالة الدفع')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($donation as $data)
                        <tr>
                            <td scope="row">
                                <div class="user-dahsboard-order-info-wrap">
                                    <h5 class="title">
                                        @if(!empty($data->cause))
                                            <a href="{{route('frontend.donations.single',optional($data->cause)->slug)}}">{{optional($data->cause)->title}}</a>
                                        @else
                                            <div class="text-warning">{{__('This item is not available or removed')}}</div>
                                        @endif
                                    </h5>
                                    <small class="d-block"><strong>{{__('رقم الطلب:')}}</strong> #{{$data->id}}</small>
                                    <small class="d-block"><strong>{{__('Quantity:')}}</strong> {{$data->amount}}</small>
                                    <small class="d-block"><strong>{{__('Addresss') }}: </strong><br> {!! $data->address !!}</small>
                                    @php
                                        $gifts = optional($data->gift)->gifts ;
                                        $colors = ['warning','info','primary','success'];
                                    @endphp
                                    @if(!empty($data->gift))
                                        <strong>{{__('Gifts')}}:</strong>
                                        @foreach (json_decode($gifts) ?? [] as $key=> $item)
                                            <span class="badge badge-{{$colors[$key % count($colors)]}}">{{$item ?? ''}}</span>
                                        @endforeach
                                        <small class="d-block mt-2"><strong>{{__('Gift Title :')}}</strong> {{optional($data->gift)->title ?? ''}}</small>
                                        <small class="d-block"><strong>{{__('Gift Delivery Date :')}}</strong> {{optional($data->gift)->delivery_date}}</small>
                                    @endif

                                    <!--@php-->
                                    <!--    $all_custom_fields = json_decode($data->custom_fields) ?? [];-->
                                    <!--@endphp-->
                                    <!--@if(!empty($all_custom_fields))-->
                                    <!--    @foreach($all_custom_fields ?? [] as $key => $field)-->
                                    <!--        @if($key === 'agreeTerms') @continue @endif-->
                                    <!--        <small class="d-block">-->
                                    <!--            <strong class="text-dark">{{ ucfirst($key) . ' : ' }}</strong>-->
                                    <!--            {{ !is_object($field) ? $field : '' }}-->
                                    <!--        </small>-->
                                    <!--    @endforeach-->
                                    <!--@endif-->

                                    @if(!empty($data->point))
                                        <small class="d-block"><strong>{{__('Reward Point')}}:</strong> {{$data->point}}</small>
                                    @endif
                                    <!--<small class="d-block"><strong>{{__('Payment Gateway:')}}</strong> {{str_replace('_',' ',__($data->payment_gateway))}}</small>-->

                                    <!--@if($data->payment_gateway == 'manual_payment')-->
                                    <!--     <small class="d-block">{{__('Attachment :')}}<a class="btn btn-info btn-sm pull-right" href="{{url('assets/uploads/attachment/'.$data->manual_payment_attachment)}}" target="_blank">{{__('View Attachment')}}</a></small>-->
                                    <!--@endif-->

                                    <small class="d-block"><strong>{{__('Date:')}}</strong> {{date_format($data->created_at,'d M Y')}}</small>
                                    <!--@if($data->status == 'complete')-->
                                    <!--    <form action="{{route('frontend.donation.invoice.generate')}}"  method="post">-->
                                    <!--        @csrf-->
                                    <!--        <input type="hidden" name="id" id="invoice_generate_order_field" value="{{$data->id}}">-->
                                    <!--        <button class="btn btn-secondary btn-small" type="submit">{{__('Invoice')}}</button>-->
                                    <!--    </form>-->
                                    <!--@endif-->
                                </div>
                            </td>
                            
                            <!-- New Pricing Details Column -->
                            <td>
                                <div class="order-pricing-details">
                                    @php
                                        $unit_price = optional($data->cause)->price;
                                        $quantity = $data->amount;
                                        $total_price = $unit_price * $quantity;
                                    @endphp
                                    
                                    <div class="pricing-breakdown">
                                        <small class="d-block"><strong>{{('سعر المنتج:')}}</strong> {{amount_with_currency_symbol($unit_price)}}</small>
                                        <small class="d-block"><strong>{{__('Quantity:')}}</strong> {{$quantity}}</small>
                                        <hr class="my-2">
                                        <strong class="d-block text-primary">{{__('السعر الاجمالي:')}}</strong>
                                        <strong class="d-block text-primary h6">{{amount_with_currency_symbol($total_price)}}</strong>
                                    </div>
                                    
                                    @if(!empty($data->shipping_cost))
                                        <small class="d-block mt-2"><strong>{{__('Shipping:')}}</strong> {{amount_with_currency_symbol($data->shipping_cost)}}</small>
                                        @php $final_total = $total_price + $data->shipping_cost; @endphp
                                        <hr class="my-1">
                                        <strong class="d-block text-success">{{__('Final Total:')}}</strong>
                                        <strong class="d-block text-success h6">{{amount_with_currency_symbol($final_total)}}</strong>
                                    @endif
                                </div>
                            </td>
                            
                            <td>
                                @if($data->status == 'pending')
                                    <span class="alert alert-warning text-capitalize alert-sm alert-small">{{__($data->status)}}</span>
                                    
                                    <!--@if( $data->payment_gateway != 'manual_payment')-->
                                        <!--<form action="{{route('frontend.donations.log.store')}}" method="post" enctype="multipart/form-data">-->
                                        <!--    @csrf-->
                                        <!--    <input type="hidden" name="order_id" value="{{$data->id}}" >-->
                                        <!--    <input type="hidden" name="cause_id" value="{{$data->cause_id}}" >-->
                                        <!--    <input type="hidden" name="amount" value="{{$data->amount}}">-->
                                        <!--    <input type="hidden" name="name" value="{{$data->name}}" >-->
                                        <!--    <input type="hidden" name="price" value="{{$data->price}}" >-->
                                        <!--    <input type="hidden" name="email" value="{{$data->email}}" >-->
                                        <!--    <input type="hidden" name="selected_payment_gateway" value="{{$data->payment_gateway}}">-->
                                        <!--    <button type="submit" class="small-btn btn-success margin-top-20">{{__('Pay Now')}}</button>-->
                                        <!--</form>-->
                                    <!--@endif-->
                                    
                                    <form id="cancelForm" action="{{route('user.dashboard.donation.order.cancel')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$data->id}}">
                                        
                                        <button type="button" class="small-btn btn-danger margin-top-10 cancel-btn">
                                            {{__('Cancel')}}
                                        </button>
                                    </form>
                                    
                                    
                               
                                   
                                    
                                @elseif($data->status == 'cancel')
                                    <span class="alert alert-danger text-capitalize alert-sm alert-small" style="display: inline-block">{{__($data->status)}}</span>
                                @else
                                    <span class="alert alert-success text-capitalize alert-sm alert-small" style="display: inline-block">{{__($data->status)}}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <script>
                        document.querySelector('.cancel-btn').addEventListener('click', function () {
                        
                            Swal.fire({
                                title: 'هل أنت متأكد؟',
                                text: "هل تريد إلغاء هذا الطلب؟",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'نعم، قم بالإلغاء',
                                cancelButtonText: 'لا، رجوع',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('cancelForm').submit();
                                }
                            });
                        
                        });
                        </script>
                        
                    </tbody>
                </table>
            </div>
        <div class="blog-pagination">
            {{ $donation->links() }}
        </div>
        @else
            <div class="alert alert-warning">{{__('No Orders Found')}}</div>
        @endif

@endsection

@push('styles')
<style>
    .pricing-breakdown {
        background: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #dee2e6;
    }
    

    
    @media (max-width: 768px) {
        .table-responsive table {
            font-size: 12px;
        }
        
        .pricing-breakdown {
            padding: 8px;
        }
    }
</style>
@endpush