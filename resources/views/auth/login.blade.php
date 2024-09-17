<!DOCTYPE html>
<html>

<head>

  @include('home.css')
  
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->






  </div>


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Dashboard</h1>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
                
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">

                  <form method="post" action="{{route('login')}}" class="form-validate">
                    @csrf
                    <div class="form-group">
                      <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" required data-msg="Please enter your email" class="input-material" placeholder="Email">
                    </div>

                    <div class="form-group">
                      <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material" required autocomplete="current-password" placeholder="Password">
                    </div>

                    <button class="btn btn-primary">
                   {{ __('Log in') }}
                  </button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                  
                  <a href="{{url('forgot-password')}}" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="{{url('register')}}" class="signup">Signup</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- <div class="copyrights text-center">
         <p style="color: black;">2018 &copy; Royalette. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
      </div> -->
    </div>





</body>

</html>