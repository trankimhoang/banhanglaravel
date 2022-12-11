<div class="product"
     style="cursor: pointer;"
     onclick="window.location.replace('{{ route('product.detail', ['id'=>$product->id]) }}')">
    <div class="product-img">
        <img src="{{ $product->getImage() }}" alt="">
        <div class="product-label">
            <span class="sale">-30%</span>
            <span class="new">NEW</span>
        </div>
    </div>
    <div class="product-body">
        <p class="product-category">Category</p>
        <h3 class="product-name"><a href="{{ route('product.detail', ['id'=>$product->id]) }}">{{ $product->name }}</a></h3>
        <h4 class="product-price">{{ $product->getPriceWithFormat() }}</h4>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div class="product-btns">
            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
        </div>
    </div>
    <div class="add-to-cart">
        <button class="add-to-cart-btn">
            <a href="{{ route('cart.add', ['product_id'=>$product->id]) }}">
                <i class="fa fa-shopping-cart"></i>
                add to cart
            </a>
        </button>
    </div>
</div>
