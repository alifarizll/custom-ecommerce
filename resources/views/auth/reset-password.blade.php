<head>
    <title>Reset Password</title>
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

                  <form method="post" action="{{route('password.store')}}" class="form-validate">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">


                    <div class="form-group">
                      <input id="email" type="email" name="email" :value="old('email', $request->email)" required data-msg="Please enter your email" class="input-material" placeholder="Email" required autofocus autocomplete="username" />
                    </div>

                    <div class="form-group">
                      <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material" placeholder="Password" required autocomplete="new-password"/>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="input-material" placeholder="Confirm Password" required autocomplete="new-password" />
                    </div>
                    <button class="btn btn-primary">
                   {{ __('Reset Password') }}
                  </button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>


<!-- -->








