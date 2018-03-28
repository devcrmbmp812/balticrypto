<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BCT Coin">
    <meta name="keywords" content="BCT Coin">
    <meta name="author" content="BCT Coin">
    <title>BCT Coin Home Page|BCT Coin Home Page</title>
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
    <div class="form-bg">
    <div class="Section-Bg-Mask Section-Bg-Mask-Light">
      <div class="Section-Bg-R2 Section-Bg-R2-Light"></div>
      <div class="Section-Bg-R1 Section-Bg-R1-Light"></div>
   </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="tab signin-up" role="tabpanel">
                 @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif


              <!-- Tab panes -->
              {!! Form::model($user, ['method' => 'PATCH','route' => ['forgotPassword.update', $user->id], 'class'=> 'form-horizontal access-form']) !!}

                  
                   <div class="row">
                      <div class="col-sm-12 text-center"><h2 class="mb-0 login-top-section">Reset Pasword</h2></div>
                     <!--  <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div> -->
                    </div>

              <input class="form-control" id="email" type="hidden" name="email" value="{{$user->email}}">
              <input class="form-control" id="code" type="hidden" name="code" value="{{$code}}">

              <div class="form-group password_register">
                
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter newPassword">
                 @if ($errors->has('password'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
              </div>
              <div class="form-group password_register">
                
                <input type="password" name="confirm_password"  class="form-control" id="confirm-pwd" placeholder="Confirm Password">
                  @if ($errors->has('confirm_password'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('confirm_password') }}</strong>
                      </span>
                      @endif
              </div>
              <div class="row mt-3 mb-3 pr-3 pl-3 form-footer">
                      
                      <div class="col-sm-12">
                        
                        <button type="submit" class="btn btn-theme registerbtn">Submit</button>
                      </div>
                      
                    </div>
              
              {!! Form::close(); !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sign in Signup Ends -->
@include('layouts.footerScript')
  </body>
</html>