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

                  <form class="text-left form-validate" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group-material">
                      <input id="name" type="text" name="name" :value="{{ old('name') }}" required autofocus autocomplete="name" class="input-material" placeholder="Name">
                    </div>

                    <div class="form-group-material">
                      <input id="email" type="email" name="email" :value="{{ old('email') }}" required autocomplete="username" class="input-material" placeholder="Email">
                    </div>

                    <!-- phone -->
                    <div class="form-group-material">
                        <input id="phone" class="input-material" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" placeholder="phone"/>
                    </div>
                    <!-- address -->
                    <div class="form-group-material">
                        <input id="address" class="input-material" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" placeholder="address"/>
                    </div>

                    

                    <div class="form-group-material">

                      <input id="password" class="input-material"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password"
                                      placeholder="Password"
                                      />
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group-material">

                        <input id="password_confirmation" 
                                        class="input-material"
                                        type="password"
                                        name="password_confirmation" 
                                        required autocomplete="new-password"
                                        placeholder="Confirm Password"
                                        />
                    </div>

                    

                    <div class="form-group terms-conditions text-center">
                      <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="checkbox-template">
                      <label for="register-agree">I agree with the terms and policy</label>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary">
                          {{ __('Register') }}
                        </button>             
                   </div>
                  </form>
                  
                  <small>Already have an account? </small><a href="login.html" class="signup">Login</a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
         <p style="color: black;">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a></p>
      </div>
    </div>
  








   

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