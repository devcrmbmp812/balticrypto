<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="coin">
  <meta name="keywords" content="coin">
  <meta name="author" content="coin">
  <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon"/>
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon"/>
  <title>BCT Coin Login Page</title>

  @include('layouts.head')
  </head>
  <body>
  <!-- Loader Start-->
    <div class="spinner-wrapper">
      <div class="spin"></div>
    </div>
    <?php
    $ref = Session::get('ref', 'default');
    Session::forget('ref');
    $attributes = [
            'data-theme' => 'light',
            'data-type' => 'image',
    ];
?>
    <!-- Loader Ends-->
    <!-- Sign in Signup start -->
    <div class="form-bg">
      <div class="Section-Bg-Mask Section-Bg-Mask-Light">
      <div class="Section-Bg-R2 Section-Bg-R2-Light"></div>
      <div class="Section-Bg-R1 Section-Bg-R1-Light"></div>
   </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row auth-logo mb-4">
              <a href="/"><img src="{{asset('assets/images/BCT.png')}}"></a>
            </div>
            <div class="tab signin-up" role="tabpanel">
              <!-- Nav tabs -->

              <!-- Tab panes -->
              <div class="tab-content tabs">

                <div role="tabpanel" class="tab-pane fade in   @if(!session('validator') && $ref == "default" ) active show  @endif " id="signin">
                  @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
                  <form class="form-horizontal access-form"   action="{{ url('support/doLogin') }}" method="post">
                   
                    <div class="row">
                      <div class="col-sm-12 text-center"><h2 class="mb-0 login-top-section">Support Sign In</h2></div>
                     <!--  <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div> -->
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group email">
                      
                      <input type="email" name="email" class="form-control" id="email" autocomplete="off" placeholder="Enter your email">
                       @if ($errors->has('email'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group password_register">
                      
                      <input type="password" name="password" class="form-control" id="password" autocomplete="off" placeholder="Enter password">
                       @if ($errors->has('password'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                    
                    <div class="row mt-3">
                      <div class="col-sm-12 text-center">
                          <div class="form-group">
                            {!! app('captcha')->display($attributes) !!}
                            </div>
                      </div>
                      <div class="col-sm-12 text-left">
                        <div class="form-group">

                          @if ($errors->has('g-recaptcha-response'))
                          <span class="help-block text-danger">
                              <strong>Captcha field is required</strong>
                            </span>
                          @endif
                        </div>
                      </div>
                    </div>
                 
                   

                    <div class="row mb-3 pr-3 pl-3 form-footer">
                      <div class="col-sm-12 mt-3 mb-3">
                        <div class="form-group">
                      <div class="main-checkbox">
                        <input value="None" id="checkbox1" name="check" type="checkbox">
                        <label for="checkbox1" class="text-capitalize"> <span>Remember me</span></label>
                      <!--   <label class="pull-right"> <a href="{{ url('forgotPassword')}}" class="text-capitalize">forgot password</a></label> -->
                      </div>
                    </div>
                      </div>
                      <div class="col-sm-12">
                        <input type="submit" class="btn theme-btn btn-sm registerbtn" value="Sign In" >
                        
                      </div>
                      <div class="col-sm-12 mt-3 mb-3 text-center">
                        <a href="{{ url('support/register') }}" ui-link="secondary underlined" class="pb-2">New to Balticoin? Sign up!</a>
                        
                      </div>

                    </div>
                   

                  </form>
                </div>
                <div role="tabpanel" class="tab-pane fade  @if(session('validator')|| $ref=='1') active show  @endif   " id="signup">

                  @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
                  <form class="form-horizontal access-form" action="{{url('doRegister')}}" method="post">
                    <div class="row">
                      <div class="col-sm-6"><h2>Sign Up</h2></div>
                      <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label for="username">User Name</label>
                      <input type="text" name="username" value="{{old('username')}}" class="form-control" id="username" autocomplete="off">
                      @if ($errors->has('username'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="first_name">First Name</label>
                      <input type="text" name="first_name" value="{{old('first_name')}}"  class="form-control" id="first_name" autocomplete="off">
                      @if ($errors->has('first_name'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="last_name">Last Name</label>
                      <input type="text" name="last_name" value="{{old('last_name')}}"class="form-control" id="last_name" autocomplete="off">
                        @if ($errors->has('last_name'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="sponser">Sponser</label>
                      <input type="text" name="sponser" class="form-control" value="{{old('sponser')}}@if(Session::get('referral')){{ Session::get('referral') }}@endif" id="sponser" autocomplete="off">
                        @if ($errors->has('sponser'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('sponser') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="email_address">Email address</label>
                      <input type="email" name="email_address" value="{{old('email')}}" class="form-control" id="email_address" autocomplete="off">
                        @if ($errors->has('email'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="password_register">Password</label>
                      <input type="password" name="password_register" class="form-control" id="password_register">
                       @if ($errors->has('password'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                         @if ($errors->has('confirm_password'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('confirm_password') }}</strong>
                      </span>
                      @endif
                    </div>
                    <ul class="nav " role="tablist">
                      <li role="presentation" class="mr-2"> <input type="submit" class=" btn theme-btn btn-sm   @if(!session('validator')) active @endif" value="Sign Up" ></li>
                      <li role="presentation"> <a  href="#signin" class=" btn theme-btn btn-sm signup @if(session('validator')) active @endif" aria-controls="profile" role="tab" data-toggle="tab">Sign In</a></li>
                    </ul>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sign in Signup Ends -->
    @include('layouts.footerScript')
  </body>
</html>