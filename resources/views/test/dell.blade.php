@extends('shop.master')
@section('content')

<div class="row px-xl-5">
    @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img style="width:200px ; height: 165px ; border-radius:0%"
                                src="{{ asset('admin/uploads/product/' . $product->image) }}" alt="">
                            <div class="product-action">
                                @if ($product->quantity > 0)
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ route('add.to.cart', $product->id) }}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                @else
                                    <a class="btn btn-outline-dark btn-square disabled"
                                        href="{{ route('add.to.cart', $product->id) }}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                @endif
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square"
                                    href="{{ route('detail', ['id' => $product->id]) }}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                @if ($product->quantity > 0)
                                    <a class="h6 text-decoration-none text-truncate" href="">
                                        Số lượng: <span
                                            class="{{ $product->quantity <= 0 ? 'text-danger' : '' }}">{{ $product->quantity }}</span>
                                    </a>
                                @else
                                    <a class="h6 text-decoration-none text-truncate" href="">
                                        <span class="text-danger">Hết hàng</span>
                                    </a>
                                @endif
                            </div>
                            <h5>{{ number_format($product->price) }}</h5>
                            <h6 class="text-muted"><del>{{ number_format($product->price) }}</del></h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
