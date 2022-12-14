@extends('layout.master_user')

@section('content')
    <div class="row" style="margin-bottom: 50px;">
        <!-- Products tab & slick -->
        <div class="col-md-12">
            <div class="row">
                <div class="products-tabs">
                    <!-- tab -->
                    <div id="tab1" class="tab-pane active">
                        <div class="products-slick" data-nav="#slick-nav-1">
                            <!-- product -->
                            @foreach($listProduct as $productItem)
                                @include('include.product_item', ['product' => $productItem])
                            @endforeach

                            <!-- /product -->
                        </div>
                        <div id="slick-nav-1" class="products-slick-nav"></div>
                    </div>
                    <!-- /tab -->
                </div>
            </div>
        </div>
        <!-- Products tab & slick -->
    </div>
@endsection
