<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="coin">
  <meta name="keywords" content="coin">
  <meta name="author" content="coin">
    <link rel="icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon"/>
  <title>BCT Coin Login Page</title>

  <?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
              <a href="/"><img src="<?php echo e(asset('assets/images/BCT.png')); ?>"></a>
            </div>
            <div class="tab signin-up" role="tabpanel">
              <!-- Nav tabs -->

              <!-- Tab panes -->
              <div class="tab-content tabs">


                <div role="tabpanel" class="tab-pane fade   active show" id="signup">
                
                  <?php if(session('error')): ?><br><div class="alert alert-danger"><?php echo e(session('error')); ?></div><br><?php endif; ?>
                  <?php if(session('success')): ?><br><div class="alert alert-success"><?php echo e(session('success')); ?></div><br><?php endif; ?>
                  <form class="form-horizontal access-form" action="<?php echo e(url('support/doRegister')); ?>" name="register-form" id="register-form" method="post" >
                     <div class="row">
                      <div class="col-sm-12 text-center"><h2 class="mb-0 login-top-section">Support Sign Up</h2></div>
                     <!--  <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div> -->
                    </div>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="form-group username">
                      <input type="text" name="username" value="<?php echo e(old('username')); ?>" class="form-control" id="username" autocomplete="off" placeholder="Enter User Name">
                      <?php if($errors->has('username')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('username')); ?></strong>
                      </span>
                      <?php endif; ?>
                    </div>
                    <div class="form-group first_name">
                      <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>"  class="form-control" id="first_name" autocomplete="off" placeholder="Enter First Name">
                      <?php if($errors->has('first_name')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                      </span>
                      <?php endif; ?>
                    </div>
                    <div class="form-group last_name">
                      
                      <input type="text" name="last_name" value="<?php echo e(old('last_name')); ?>"class="form-control" id="last_name" autocomplete="off" placeholder="Enter Last Name">
                        <?php if($errors->has('last_name')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                      </span>
                      <?php endif; ?>
                    </div>
                  
                      <input type="hidden" name="sponser" class="form-control" value="<?php echo e(old('sponser')); ?><?php if(Session::get('referral')): ?><?php echo e(Session::get('referral')); ?><?php endif; ?>" id="sponser" autocomplete="off">
                        <?php if($errors->has('sponser')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('sponser')); ?></strong>
                      </span>
                      <?php endif; ?>
                   
                    <div class="form-group email">
                      <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" id="email" autocomplete="off" placeholder="Enter Email address">
                        <?php if($errors->has('email')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                      </span>
                      <?php endif; ?>
                    </div>
                    <div class="form-group password_register">
                      <input type="password" name="password_register" class="form-control" id="password_register
                      " placeholder="Enter Password">
                       <?php if($errors->has('password')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                      </span>
                      <?php endif; ?>
                    </div>
                    <div class="form-group password_register">
                      
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                         <?php if($errors->has('confirm_password')): ?>
                      <span class="help-block text-danger">
                        <strong><?php echo e($errors->first('confirm_password')); ?></strong>
                      </span>
                      <?php endif; ?>
                    </div>
                    <div class="form-group form-row erc_20_address">
                       <input type="text" name="erc_20_address" value="<?php echo e(old('erc_20_address')); ?>" onchange="checkaddress(this.value)" class="form-control" id="erc_20_address" autocomplete="off" placeholder="Enter ERC 20 Address">
                              <?php if($errors->has('erc_20_address')): ?>
                            <span class="help-block text-danger">
                              <strong><?php echo e($errors->first('erc_20_address')); ?></strong>
                            </span>
                            <?php endif; ?>
                            <span class="help-block text-danger" id="address"></span>
                    </div>

                      <div class="row mt-3">
                          <div class="col-sm-12 text-center">
                              <div class="form-group">
                                  <?php echo app('captcha')->display($attributes); ?>

                              </div>
                          </div>
                          <div class="col-sm-12 text-left">
                              <div class="form-group">

                                  <?php if($errors->has('g-recaptcha-response')): ?>
                                      <span class="help-block text-danger">
                              <strong>Captcha field is required</strong>
                            </span>
                                  <?php endif; ?>
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
                        <a href="<?php echo e(url('support/login')); ?>" ui-link="secondary underlined">Already have an account? Sign in.</a>
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
    <?php echo $__env->make('layouts.footerScript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                     url: '<?php echo e(url("check-referral")); ?>',
                     method: 'post',
                     data: {'_token': "<?php echo e(csrf_token()); ?>", 'sponsor': sponsor},
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