<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BCT Coin">
    <meta name="keywords" content="BCT Coin">
    <meta name="author" content="BCT Coin">
    <title>BCT Coin Login Page| Login</title>
    @include('layouts.head')
  </head>
  <body>
    <!-- Loader Start-->
    <div class="spinner-wrapper">
      <div class="spin"></div>
    </div>
    <!-- Loader Ends-->
    <!-- Sign in Signup start -->
    <div class="form-bg">
    <div class="Section-Bg-Mask Section-Bg-Mask-Light">
      <div class="Section-Bg-R2 Section-Bg-R2-Light"></div>
      <div class="Section-Bg-R1 Section-Bg-R1-Light"></div>
   </div>
      <div class="container">
        <div class="row">
          <div class="offset-sm-3 col-sm-6">
            <div class="tab signin-up" role="tabpanel">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
               <!--  <li role="presentation"><a href="#signin" class="active"  aria-selected="true" aria-controls="home" role="tab" data-toggle="tab">sign in</a></li>
                <li role="presentation"><a href="#signup" aria-controls="profile" role="tab" data-toggle="tab">sign up</a></li>
                  <li class="navbar-brand-2">
                <a href="/"><img src="assets/images/logo-white.png"></a>
              </li> -->
              </ul>
              <!-- Tab panes -->
              <div class="tab-content tabs">
                <div role="tabpanel" class="tab-pane fade in active show" id="signin">
                  @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
                   <form  role="form" class="form-horizontal access-form" method="post" action="{{ url('2fa/validate') }}">
                      
                       <div class="row">
                      <div class="col-sm-12 text-center"><h2 class="mb-0 login-top-section">One-Time Password</h2></div>
                     <!--  <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div> -->
                    </div>
                      {{--<h3 class="form-title">One-Time Password  </h3>--}}
                   {{--<li class="navbar-brand-2">--}}
                {{--<a href="{{url('/')}}"><img src="{{asset('assets/images/logo-main.png')}}"></a>--}}
              {{--</li>--}}
                      @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
                      @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
                      <div class="form-group password_register">
                        
                          <div class="input-icon">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                              <input class="form-control placeholder-no-fix" type="number"  name="totp" placeholder="Enter One-Time Password." />
                              @if ($errors->has('totp'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('totp') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="row mt-3 mb-3 pr-3 pl-3 form-footer">
                      
                      <div class="col-sm-12">
                        
                        
                        <button type="submit" class="btn theme-btn btn-sm mr-3 registerbtn text-capitalize"> Validate </button>
                      </div>
                      
                    </div>
                      
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