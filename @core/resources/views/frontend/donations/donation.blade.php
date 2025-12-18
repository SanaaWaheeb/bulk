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
   @php
    use Illuminate\Support\Facades\DB;

    $dividerShown = false;
    $categories   = DB::table('cause_categories')->where('status', 'publish')->get();
    $currentCat   = $currentCategory ?? request('category', 'all');

    // اللغة الحالية (ar أو en)
    $locale = get_user_lang(); // أو app()->getLocale() لو بتستخدمها في باقي المشروع
@endphp


    <section class="donation-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            
            <!-- Filter Bar -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="filter-bar bg-white p-4 rounded shadow-sm border text-center">
                        <div class="filter-buttons">
                            {{-- ALL --}}
                            <button
                                type="button"
                                class="btn btn-sm mx-1 {{ $currentCat === 'all' ? 'btn-dark' : 'btn-outline-dark' }}"
                                onclick="simpleFilter('all')">
                                الكل
                            </button>

                           @foreach($categories as $category)
                                @php
                                    $catTitle = $locale === 'ar'
                                        ? ($category->title ?? $category->title_en)
                                        : ($category->title_en ?? $category->title);
                                @endphp

                                <button
                                    type="button"
                                    class="btn btn-sm mx-1 {{ (string)$currentCat === (string)$category->id ? 'btn-dark' : 'btn-outline-dark' }}"
                                    onclick="simpleFilter('{{ $category->id }}')">
                                    {{ $catTitle }}
                                </button>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            {{-- Cards --}}
            <div class="row" id="items-container">
                @forelse($all_donations as $data)
                    @php
                        $deadline   = !empty($data->deadline) ? \Carbon\Carbon::parse($data->deadline) : null;
                        $isExpired  = $deadline && $deadline->isPast();
                        $categoryId = $data->categories_id ?? 'none';
                    @endphp

                    @if($isExpired && !$dividerShown)
                        @php $dividerShown = true; @endphp
                        <div class="col-12">
                            <hr class="my-4">
                            <h5 class="mb-1 text-muted">{{__('Completed Orders') }}</h5>
                             <p class="text-muted small mb-3">
                            {{__('.The following items have expired and may not be available for order') }}
                            </p>
                        </div>
                    @endif

                    <div class="col-lg-4 item" data-cat="{{ $categoryId }}">
                        {{-- ⚠️ لا نغيّر أي شيء في الكارت نفسه --}}
                        @php
                            $itemTitle = $locale === 'ar'
                                ? ($data->title_ar ?? $data->title_en)
                                : ($data->title_en ?? $data->title_ar);
                        @endphp

                        <x-frontend.donation.grid 
                            :featured="$data->featured"
                            :image="$data->image"
                            :amount="$data->amount"
                            :price="$data->price"
                            :market_price="$data->market_price"
                            :raised="$data->raised"
                            :slug="$data->slug"
                            :title="$itemTitle"
                            :excerpt="$data->excerpt"
                            :deadline="$data->deadline"
                            :reward="$data->reward"
                            :buttontext="get_static_option('donation_button_text')"
                        />

                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h5 class="mb-3">{{ __('No items are currently available') }}</h5>
                        <a href="{{ url()->current() }}" class="btn btn-outline-primary">{{ __('Refresh page') }}</a>
                    </div>
                @endforelse

                <div class="col-lg-12 text-center">
                    <nav class="pagination-wrapper" aria-label="Page navigation">
                        {{ $all_donations->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <script>
    function simpleFilter(category) {
        // build new URL with ?category=...
        const url = new URL(window.location.href);

        if (category === 'all') {
            url.searchParams.delete('category');
        } else {
            url.searchParams.set('category', category);
        }

        // reload page with filter applied on backend (works with pagination too)
        window.location.href = url.toString();
    }
    </script>

    <style>
    .filter-bar {
        margin-bottom: 2rem;
    }
    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
    }
    .item {
        transition: all 0.3s ease;
    }
    </style>
@endsection
