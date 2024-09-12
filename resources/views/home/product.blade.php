<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
        </div>

        <!-- Filter By -->
        @if(Request::is('shop'))
            @include('home.filter')
        @endif

        <div class="row">
            @if ($product->isEmpty())
                <div class="col-12 text-center">
                    <p>No products found for this category.</p>
                </div>
            @else
                @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="products/{{$products->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{{$products->title}}</h6>
                            <h6>Price <span>${{$products->price}}</span></h6>
                        </div>
                        <div style="padding:15px">
                            <a href="{{url('product_details',$products->slug)}}" class="btn btn-danger">Details</a>
                            <a href="{{ $products->quantity == 0 ? '#' : url('add_cart',$products->id) }}" class="btn {{ $products->quantity == 0 ? 'btn-danger' : 'btn-primary' }}">
                                {{ $products->quantity == 0 ? 'Out of stock' : 'Add to cart' }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>