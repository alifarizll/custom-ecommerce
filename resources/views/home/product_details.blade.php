<!DOCTYPE html>
<html>

<head>

  @include('home.css')

  <style>
    .div_center
    {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }

    .detail-box 
    {
        padding: 15px;
    }
  </style>
  
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    @include('home.loader')

    <!-- end header section -->

  </div>

  <!-- Product Details Start -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="row">


        <div class="col-md-12">
          <div class="box">

              <div class="div_center">
                <img width="400"src="/products/{{$data->image}}" alt="">
              </div>

              <div class="detail-box">
                <h6>{{$data->title}}</h6>
                <h6>Price
                  <span>${{$data->price}}</span>
                </h6>
              </div>
              <div class="detail-box">
                <h6>Category : {{$data->category}}</h6>
                <h6>Available  Quantity 
                  <span>{{$data->quantity}}</span>
                </h6>
              </div>
              <div class="detail-box">
                  <p>{{$data->description}}</p>
                  
              </div>

              <div class="detail-box">
              <a href="{{ $data->quantity == 0 ? '#' : url('add_cart',$data->id) }}" class="btn {{ $data->quantity == 0 ? 'btn-danger' : 'btn-primary' }}">
                {{ $data->quantity == 0 ? 'Out of stock' : 'Add to cart' }}
              </a>              
            </div>
            

              
              
          </div>
        </div>
        

      </div>
    </div>
  </section>

  <!-- Product Details End -->


   

  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>