@if(\Illuminate\Support\Facades\Auth::guard('web')->check())
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Your Cart</span>
        <div class="qty">{{ \Illuminate\Support\Facades\Auth::guard('web')->user()->Carts->sum('quality') }}</div>
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
            @php
                $totalCart = 0;
            @endphp

            @foreach(\Illuminate\Support\Facades\Auth::guard('web')->user()->Carts as $cart)
                @php
                    $totalCart += $cart->quality * $cart->Product->price;
                @endphp

                <div class="product-widget">
                    <div class="product-img">
                        <img src="{{ $cart->Product->getImage() }}" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-name"><a href="#">{{ $cart->Product->name }}</a></h3>
                        <h4 class="product-price"><span class="qty">{{ $cart->quality }}x</span>{{ $cart->Product->getPriceWithFormat() }}</h4>
                    </div>
                    <button class="delete delete-item-cart" data-id="{{ $cart->id }}"><i class="fa fa-close"></i></button>
                </div>
            @endforeach

        </div>
        <div class="cart-summary">
            <small>{{ \Illuminate\Support\Facades\Auth::guard('web')->user()->Carts->count() }} Item(s) selected</small>
            <h5>SUBTOTAL: {{ formartPriceVnd($totalCart) }}</h5>
        </div>
        <div class="cart-btns">
            <a href="{{ route('cart.detail') }}">View Cart</a>
            <a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
@endif
