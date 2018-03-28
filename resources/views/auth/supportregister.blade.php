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
                'data-type' => 'image',];
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


                <div role="tabpanel" class="tab-pane fade   active show" id="signup">
                {{--@if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif--}}
                  @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
                  <form class="form-horizontal access-form" action="{{url('support/doRegister')}}" name="register-form" id="register-form" method="post" >
                     <div class="row">
                      <div class="col-sm-12 text-center"><h2 class="mb-0 login-top-section">Support Sign Up</h2></div>
                     <!--  <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div> -->
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group username">
                      <input type="text" name="username" value="{{old('username')}}" class="form-control" id="username" autocomplete="off" placeholder="Enter User Name">
                      @if ($errors->has('username'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group first_name">
                      <input type="text" name="first_name" value="{{old('first_name')}}"  class="form-control" id="first_name" autocomplete="off" placeholder="Enter First Name">
                      @if ($errors->has('first_name'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group last_name">
                      
                      <input type="text" name="last_name" value="{{old('last_name')}}"class="form-control" id="last_name" autocomplete="off" placeholder="Enter Last Name">
                        @if ($errors->has('last_name'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                      @endif
                    </div>
                  
                      <input type="hidden" name="sponser" class="form-control" value="{{old('sponser')}}@if(Session::get('referral')){{ Session::get('referral') }}@endif" id="sponser" autocomplete="off">
                        @if ($errors->has('sponser'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('sponser') }}</strong>
                      </span>
                      @endif
                   
                    <div class="form-group email">
                      <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" autocomplete="off" placeholder="Enter Email address">
                        @if ($errors->has('email'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group password_register">
                      <input type="password" name="password_register" class="form-control" id="password_register
                      " placeholder="Enter Password">
                       @if ($errors->has('password'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group password_register">
                      
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                         @if ($errors->has('confirm_password'))
                      <span class="help-block text-danger">
                        <strong>{{ $errors->first('confirm_password') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group form-row erc_20_address">
                       <input type="text" name="erc_20_address" value="{{old('erc_20_address')}}" onchange="checkaddress(this.value)" class="form-control" id="erc_20_address" autocomplete="off" placeholder="Enter ERC 20 Address">
                              @if ($errors->has('erc_20_address'))
                            <span class="help-block text-danger">
                              <strong>{{ $errors->first('erc_20_address') }}</strong>
                            </span>
                            @endif
                            <span class="help-block text-danger" id="address"></span>
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

                      

                      <div class="row mt-3 mb-3 pr-3 pl-3 form-footer">
                      <div class="col-sm-12 mb-3 text-center">
                        <div class="login-screen__form__notice">By clicking the button below, you accept Balticoin's <a href="#" ui-link="underlined" target="_blank">Terms of Service</a> and <a href="#" ui-link="underlined" target="_blank">Privacy Policy</a>.</div>
                      </div>
                      <div class="col-sm-12">
                        <input type="button" class="btn theme-btn btn-sm registerbtn" value="Sign Up" id="register" onclick="checkReferral()">
                      </div>
                      <div class="col-sm-12 mt-3 mb-3 text-center">
                        <a href="{{ url('support/login') }}" ui-link="secondary underlined">Already have an account? Sign in.</a>
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
    <script>
         function checkaddress(address)
        {
            $('#address').empty();
             $.get("check-address/"+address, function(data, status){
               if(data == 0)
               { 
                  $('#address').removeClass();
                  $('#address').addClass('help-block text-danger');
                  $('#address').append('<strong> Please Enter Valid Address </strong>');
                  $('#register').addClass('disabled');
                  $('#register').attr('disabled',true);
               }else{
                  $('#address').removeClass();
                  $('#address').addClass('help-block text-success');
                  $('#address').append('<strong> ERC20 Address Valid !! </strong>');
                  $('#register').removeClass('disabled');
                  $('#register').attr('disabled',false);
               }
            });  
        }

        function checkReferral()
        {

           var sponsor = $("#sponser").val();
           if(sponsor!=""){
                $.ajax({
                     url: '{{ url("check-referral") }}',
                     method: 'post',
                     data: {'_token': "{{csrf_token()}}", 'sponsor': sponsor},
                     success: function (data) {
                      //alert(data);
                        
                         if(data.trim()==0)
                         {
                            $( "#register-form" ).submit();
                         }
                         else
                         {
                          
                              swal({
                                  title: "Oops! Your referral not match.",
                                  text: "Do you want to continue as simple registration?",
                                  type: "warning",
                                  showCancelButton: true,
                                  confirmButtonClass: "btn-danger",
                                  confirmButtonText: "Yes, Continue!",
                                  cancelButtonText: "No, cancel Please!",
                                  closeOnConfirm: false,
                                  closeOnCancel: false
                                },
                                function(isConfirm) {
                                  if (isConfirm) {
                                      $( "#register-form" ).submit();
                                  } else {
                                    swal("Cancelled", "Ok Try again");
                                  }
                                });
                         }
                     }
                 });
           }
           else
           {
               $( "#register-form" ).submit();
           }
        }
    </script>
  </body>
</html>