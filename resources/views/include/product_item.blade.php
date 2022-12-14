<div class="product"
     style="cursor: pointer;">
    <div class="product-img" onclick="window.location.replace('{{ route('product.detail', ['id'=>$product->id]) }}')">
        <img src="{{ $product->getImage() }}" alt="">
    </div>
    <div class="product-body" onclick="window.location.replace('{{ route('product.detail', ['id'=>$product->id]) }}')">
        <p class="product-category">Name</p>
        <h3 class="product-name"><a href="{{ route('product.detail', ['id'=>$product->id]) }}">{{ $product->name }}</a></h3>
        <h4 class="product-price">{{ $product->getPriceWithFormat() }}</h4>

    </div>
    <div class="add-to-cart">
        <button class="add-to-cart-btn" data-id="{{ $product->id }}">
            <i class="fa fa-shopping-cart"></i>
            add to cart
        </button>
    </div>
</div>
