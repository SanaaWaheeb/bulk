@extends('frontend.frontend-page-master')

@section('site-title')
    {{ get_static_option('donation_page_name') }}
@endsection

@section('page-title')
    {{ get_static_option('donation_page_name') }}
@endsection

@section('page-meta-data')
    <meta name="description" content="{{ get_static_option('donation_page_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('donation_page_meta_tags') }}">
@endsection

@section('content')
    @php $dividerShown = false; @endphp

    <section class="donation-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">

                @forelse($all_donations as $data)
                    @php
                        $deadline  = !empty($data->deadline) ? \Carbon\Carbon::parse($data->deadline) : null;
                        $isExpired = $deadline && $deadline->isPast();
                    @endphp

                    {{-- فاصل واضح قبل أول عنصر منتهي --}}
                    @if($isExpired && !$dividerShown)
                        @php $dividerShown = true; @endphp
                        <div class="col-12">
                            <hr class="my-4">
                            <h5 class="mb-1 text-muted">الطلبات المنتهية</h5>
                            <p class="text-muted small mb-3">
                                العناصر التالية انتهت مدّتها وقد لا تكون متاحة للطلب.
                            </p>
                        </div>
                    @endif

                    <div class="col-lg-4 col-md-6">
                        <x-frontend.donation.grid
                            :featured="$data->featured"
                            :image="$data->image"
                            :amount="$data->amount"
                            :price="$data->price"
                            :raised="$data->raised"
                            :slug="$data->slug"
                            :title="$data->title_ar"
                            :excerpt="$data->excerpt"
                            :deadline="$data->deadline"
                            :reward="$data->reward"
                            :buttontext="get_static_option('donation_button_text')"
                        />
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h5 class="mb-3">لا توجد عناصر متاحة حالياً</h5>
                        <a href="{{ url()->current() }}" class="btn btn-outline-primary">تحديث الصفحة</a>
                    </div>
                @endforelse

                <div class="col-12 text-center">
                    <nav class="pagination-wrapper" aria-label="Page navigation">
                        {{ $all_donations->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
