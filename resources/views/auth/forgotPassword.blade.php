<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BCT Coin">
    <meta name="keywords" content="BCT Coin">
    <meta name="author" content="BCT Coin">
    <title>BCT Coin Forgot Password</title>
    @include('layouts.head')
  </head>
  <body>
    <style>
    span.help-block {
    color: #fff;
    font-weight: bold;
   }
    </style>
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
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row auth-logo mb-4">
              <a href="/"><img src="assets/images/BCT.png"></a>
            </div>
            <div class="tab signin-up" role="tabpanel">

              </ul>
                 <div class="tab-content tabs">
                <div role="tabpanel" class="tab-pane fade in active show" id="signin">
                  @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
                  <!-- <span class="help-block text-center">Enter your email to reset your password:</span> -->
              <div class="mb-3"></div>
                  <form class="form-horizontal access-form" action="{{route('forgotPassword.store')}}" method="post">
                    <div class="row">
                      <div class="col-sm-12 text-center"><h2 class="mb-0 login-top-section">Reset your Balticoin Password</h2></div>
                     <!--  <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div> -->
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group email">
                      
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1"  autocomplete="off" placeholder="Enter your Email">
                       @if ($errors->has('email'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif

                    </div>
                    <div class="row mt-3 mb-3 pr-3 pl-3 form-footer">
                      
                      <div class="col-sm-12">
                        <button type="submit" class="btn theme-btn btn-sm registerbtn text-capitalize">Request</button>
                      </div>
                      <div class="col-sm-12 mt-3 mb-3 text-center">
                        <a href="/login" ui-link="secondary underlined">Sign in.</a><br>
                        <a href="/register" ui-link="secondary underlined">Sign UP.</a>
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