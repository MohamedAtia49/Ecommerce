@extends('frontend.layout')
@section('title', 'Shop')

@section('content')
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="{{ route('frontend.add.cart', $product->id) }}">
                            <img src='{{ Storage::url($product->image) }}' class="img-fluid product-thumbnail" style="height: 100px">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <strong class="product-price">${{ $product->price }}</strong>

                            <span class="icon-cross">
                                <img src="images/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>
                @endforeach
                <!-- End Column 1 -->
            </div>
        </div>
    </div>
@endsection
