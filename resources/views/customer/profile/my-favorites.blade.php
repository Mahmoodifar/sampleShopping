@extends('customer.layouts.master-two-col')

@section('head-tag')
    <title>لیست علاقه مندی های شما</title>
@endsection


@section('content')
    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <section class="row">
                @include('customer.layouts.partials.profile-sidebar')

                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">
                        <!-- start vontent header -->
                        <section class="content-header mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>لیست علاقه های من</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->

                        @forelse (auth()->user()->products as $product)
                            <section class="cart-item d-flex py-3">
                                <section class="cart-img align-self-start flex-shrink-1"><a href="{{route('customer.market.product',$product)}}"><img
                                        src="{{ asset($product->image['indexArray']['medium']) }}" alt=""></a></section>
                                <section class="align-self-end w-100">
                                    <p class="fw-bold">{{ $product->name }}</p>
                                    <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i>
                                        <span>{{ $product->marketable_number > 0
                                            ? 'کالا موجود در
                                                                                    انبار'
                                            : 'کالا در انبار موجود نیست' }}</span>
                                    </p>
                                    <section>
                                        <a class="text-decoration-none cart-delete" href="{{route('customer.profile.my-favorites-delete',$product)}}"><i
                                                class="fa fa-trash-alt"></i> حذف از لیست علاقه ها</a>
                                    </section>
                                </section>
                                <section class="align-self-end flex-shrink-1">
                                    <section class="text-nowrap fw-bold">{{ priceFormat($product->price) }} تومان</section>
                                </section>
                            </section>
                        @empty
                            <section class="order-item">
                                <section class="d-flex justify-content-between">
                                    <p>محصولی یافت نشد</p>
                                </section>
                            </section>
                        @endforelse

                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->
@endsection
