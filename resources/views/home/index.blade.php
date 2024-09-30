<!DOCTYPE html>
<html>

<head>

  @include('home.css')

  
</head>

<body>
    @include('home.ads')
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

    @include('home.slider')

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

    @include('home.product')

  <!-- end shop section -->



<div class="mid">
  <div class="see-more">
        <a href="{{url('shop')}}">See More</a>
  </div>
</div>



   

  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->


  @include('home.js')

</body>

</html>