<section class="shop_section layout_padding">
    <div class="container" style="margin-bottom: 30px;">

    @if(Request::is('/'))
            
    <div class="papan">
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
        </div>
        <div class="row">
            @if ($latestProduct->isEmpty())
                <div class="col-12 text-center">
                    <p>No products found for this category.</p>
                </div>
            @else
                @foreach ($latestProduct as $Lproducts)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="products/{{$Lproducts->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{{$Lproducts->title}}</h6>
                            <h6>Price <span>${{$Lproducts->price}}</span></h6>
                        </div>
                        <div style="padding:15px; display:flex; justify-content:space-between">
                            <a href="{{url('product_details',$Lproducts->slug)}}" class="custon">Details</a>
                            <a href="{{ $Lproducts->quantity == 0 ? '#' : url('add_cart',$Lproducts->id) }}" class="custon">
                            @if($Lproducts->quantity == 0)
                               Out of stock
                            @else
                             + <i class="fa fa-shopping-cart"></i> 
                            @endif
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    @endif

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
                    <div style="padding:15px; display:flex; justify-content:space-between">
                        <a href="{{url('product_details',$products->slug)}}" class="custon">Details</a>
                        <a href="{{ $products->quantity == 0 ? '#' : url('add_cart',$products->id) }}" class="custon">
                        @if($products->quantity == 0)
                               Out of stock
                        @else
                        + <i class="fa fa-shopping-cart"></i> 
                        @endif                        
                       </a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        
    </div>

    

    </div>

    

</section>

@if(Request::is('shop'))
        @include('home.footer')
    @endif
    