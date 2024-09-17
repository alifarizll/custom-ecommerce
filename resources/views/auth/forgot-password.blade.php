<head>
    <title>Forgot Password</title>
    @include('home.css')
</head>



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
                  <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                  </p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
                
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">

                  <form method="post" action="{{route('password.email')}}" class="form-validate">
                    @csrf
                    <div class="form-group">
                      <input id="email" type="email" name="email" :value="old('email')" required data-msg="Please enter your email" class="input-material" placeholder="Email" required autofocus />
                    </div>

                    <button class="btn btn-primary">
                   {{ __('Email Password Reset Link') }}
                  </button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="copyrights text-center">
         <p style="color: black;">2018 &copy; Royalette. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
      </div>
    </div>


<!-- -->



