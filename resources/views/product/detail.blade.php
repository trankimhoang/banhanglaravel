@extends('layout.master_user')
@section('content')
    <div class="row">
        <!-- Product main img -->
        <div class="col-md-5 col-md-push-2">
            <div id="product-main-img">
                <div class="product-preview">
                    <img src="{{ $product->getImage() }}" alt="">
                </div>
            </div>
        </div>
        <!-- /Product main img -->

        <!-- Product thumb imgs -->
        <div class="col-md-2  col-md-pull-5">
            <div id="product-imgs">
                <div class="product-preview">
                    <img src="{{ $product->getImage() }}" alt="">
                </div>
            </div>
        </div>
        <!-- /Product thumb imgs -->

        <!-- Product details -->
        <div class="col-md-5">
            <div class="product-details">
                <h2 class="product-name">{{ $product->name }}</h2>
                <div>
                    <h3 class="product-price">{{ $product->getPriceWithFormat() }}</h3>
                </div>
                <p>{!! $product->description !!}.</p>

                <div class="add-to-cart">
                    <form action="{{ route('cart.add') }}" method="get">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" min="1" class="form-control" style="width: 100px; margin-bottom: 10px" name="quality" placeholder="so luong" value="1">
                        <button class="add-to-cart-btn">
                            <i class="fa fa-shopping-cart"></i> add to cart
                        </button>
                    </form>


                </div>

            </div>
        </div>
        <!-- /Product details -->
    </div>
@endsection
