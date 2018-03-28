
<?php $__env->startSection('title'); ?> BCT Coin Home Page <?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<style type="text/css">
   button.btn.btn-warning {
   color: #fff;
   }
   .badge-warning {
   color: #fff !important;
   }
   .btndashboard {
   width: 120px;
   }
   @media  only screen and (max-width: 768px) {
   .width50 {
   width: 50%;
   }
   }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php
$slug = Sentinel::getUser()->roles()->first()->slug;
?>
<input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
<div class="dashboard-body">
   <div class="row">
      <div class="col-sm-12">
         <h4 class="page-title">Dashboard</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a <?php if($slug == "2"): ?> href="<?php echo e(url('user/dashboard')); ?>" <?php else: ?> href="<?php echo e(url('admin/dashboard')); ?>" <?php endif; ?>><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>
            <li class="breadcrumb-item"><a <?php if($slug == "2"): ?> href="<?php echo e(url('admin/dashboard')); ?>" <?php else: ?> href="<?php echo e(url('admin/dashboard')); ?>" <?php endif; ?>>Dashboard</a>
            </li>
         </ol>
      </div>
      <div class="col-lg-6 offset-lg-6">
         <!--<p class="notification">Notification! The next GNT sale will start on November 26th at 10:00 AM (UTC) and end at 10:15 AM on the same day. e will sell WIS to those who pre-order because of limited quantities.</p>-->
      </div>
      <div class="col-lg-6 ">
      <?php if(Sentinel::getUser()->show_referral==1): ?>
         <form class="form-copy theme-form">
             <h3 class="text-dark">User Referral</h3>
            <div class="form-group">
               <div class="input-group">
                  <input type="text" class="form-control" id="post-shortlink" readonly
                     placeholder="https://test" value="<?php echo e(url('/ref')); ?>/<?php echo e(Sentinel::getUser()->referral_code); ?>"
                     aria-label="Search for...">
                  <span class="input-group-btn">
                  <button class="btn btn-secondary btn-copy" id="copy-button" data-clipboard-target="#post-shortlink"
                     type="button" onclick="copytext()" >copy</button>
                  </span>
               </div>
            </div>
            <!-- p class="bouns-note">Get bonus by referring new members learn <a href="#">more</a></p -->
            &nbsp;
         </form>
      <?php else: ?>
      <div class="form-copy theme-form">
        <h3 class="text-dark">User Referral</h3>
        <span class="text-dark"> To get referral link you need to buy at least 1000 BCT. </span>
      </div>
      <?php endif; ?>
      </div>
<?php
// check admin or user
$slug = Sentinel::getUser()->roles()->first()->slug;
?>

      <?php if($slug == '2'): ?>
      <div class="col-lg-6 ">
                <form class="form-copy theme-form">
                        <h3 class="text-dark">Token Address</h3>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="post-shortlink-UserAddress" readonly
                                   placeholder="" value="<?php echo e(Sentinel::getUser()->user_address); ?>"
                                   aria-label="Search for...">
                            <span class="input-group-btn">
          <button class="btn btn-secondary btn-copy" id="copy-button" data-clipboard-target="#post-shortlink-UserAddress"
                  type="button" onclick="copytextUserAddress()" >copy</button>
        </span>
                        </div>
                    </div>
                    &nbsp;
                </form>

        </div>
      <?php endif; ?>

      <div class="col-lg-12">
         <div class="card coin-value">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="media">
                        <img class="mr-3" src="<?php echo e(url('/')); ?>/btc.png" alt="bitcoin" />
                        <div class="media-body">
                           <h5 class="mt-2">BTC Balance</h5>
                              <h4 class="blue-font mt-0 ">
                              <?php if($slug == "2"): ?> <?php echo e(number_format(Sentinel::getUser()->total_btc_bal,8)); ?> <?php elseif($slug == 1): ?> <?php echo e($btcwal); ?> <?php endif; ?>
                           </h4>
                        </div>
                     </div>
                  </div> 
                  <div class="col-lg-4">
                     <div class="media">
                        <img class="mr-3" src="<?php echo e(url('/')); ?>/bch.png" alt="bitcoin" />
                        <div class="media-body">
                           <h5 class="mt-2">BCH Balance</h5>
                              <h4 class="blue-font mt-0 ">
                              <?php if($slug == "2"): ?> <?php echo e(number_format(Sentinel::getUser()->total_bch_bal,8)); ?> <?php elseif($slug == 1): ?> <?php echo e($bchwal); ?> <?php endif; ?>
                           </h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="media">
                        <img class="mr-3" src="<?php echo e(url('/')); ?>/eth.png" alt="ETH">
                        <div class="media-body">
                           <h5 class="mt-2">ETH Balance</h5>
                              <h4 class="blue-font mt-0 ">
                              <?php if($slug == "2"): ?> <?php echo e(number_format(Sentinel::getUser()->total_eth_bal,8)); ?> <?php elseif($slug == 1): ?> <?php echo e($ethwal); ?> <?php endif; ?>
                           </h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 mt-3">
                     <div class="media">
                        <img class="mr-3" src="<?php echo e(URL::asset('assets/images/slider/BCT.png')); ?>" alt="ETH">
                        <div class="media-body">
                           <h5 class="mt-2">BCT Balance</h5>
                              <h4 class="blue-font mt-0">
                              <?php echo e(number_format(Sentinel::getUser()->total_wdc_bal)); ?>

                           </h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 mt-3">
                     <div class="media">
                        <img class="mr-3" src="<?php echo e(url('/')); ?>/dollar.png" alt="dollar">
                        <div class="media-body">
                           <h5 class="mt-2">USD Rate</h5>
                              <h4 class="blue-font mt-0">
                                  <?php echo e($setting_data); ?>

                           </h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-12 pt-4">
         <div class="card coin-value">
            <div class="card-body">
               <div class="row">

          <div class="col-sm-3">
              <div class="card mb-4">
                 <div class="card-header">
                    <h4 class="text-center">Total ICO Tokens</h4>
                  </div>
                <div class="card-body p-5">
                  <h2 class="counter text-center ico-font">

                    <?php echo e(number_format($setting->total_coins, 2)); ?></h2>
                </div>
              </div>
          </div>
          <div class="col-sm-3">
              <div class="card mb-4">
                 <div class="card-header">
                    <h4 class="text-center">Total Tokens Sold</h4>
                  </div>
                <div class="card-body p-5">
                  <h2 class="counter text-center ico-font">
                    <?php echo e(number_format($setting->sold_coins, 2)); ?></h2>
                </div>
              </div>
          </div>
          <div class="col-sm-3">
              <div class="card mb-4">
                 <div class="card-header">
                    <h4 class="text-center">ICO Launch Date & Time</h4>
                  </div>
                <div class="card-body p-5">
                  <h2 class=" text-center ico-font">
                    <?php
echo date('d-m-Y', strtotime($setting->ico_end_date));

?>
</h2>
                </div>
              </div>
          </div>

          <div class="col-sm-3">
              <div class="card mb-4">
                 <div class="card-header">
                    <h4 class="text-center">Token Rate ($)</h4>
                  </div>
                <div class="card-body p-5">
                  <h2 class=" text-center ico-font">
                       <?php echo e('$ '.$setting->rate); ?>

                  </h2>
                </div>
              </div>
          </div>
               </div>
            </div>
         </div>
      </div>


   </div>
   <!-- <div class="col-sm-12">
      <div class="card">
        <div class="card-body row text-center  use-block">
          <div class="col-md-4">
            <h5>MINERUSD</h5>
            <h4 class="blue-font mt-0">0.0000</h4>
          </div>
          <div class="col-md-4">
            <h5>KEEP INUSD</h5>
            <h4 class="blue-font mt-0">0.0000</h4>
          </div>
          <div class="col-md-4">
            <h5>LENDINGUSD</h5>
            <h4 class="blue-font mt-0">0.0000</h4>
          </div>
        </div>
      </div>
      </div> -->
   <?php if($slug == 2): ?>
   <div class="row pt-4">
      <div class="col-sm-12">
         <?php if(session('error')): ?><br>
         <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
         <br><?php endif; ?>
         <?php if(session('success')): ?><br>
         <div class="alert alert-success"><?php echo e(session('success')); ?></div>
         <br><?php endif; ?>
         <div class="card">
            <div class="card-body table-responsive">
               <div class="col-md-12 ">
                  <h4>ICO Calendar</h4>
               </div>
               <div class="mb-4"></div>
               <!-- <table class="table table-striped data-table"> -->
               <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
                  <thead class="thead-dark">
                     <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Tokens</th>
                        <th scope="col">USD Price</th>
                        <th scope="col">BTC Price</th>
                        <th scope="col">BCH Price</th>
                        <th scope="col">ETH Price</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>

                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($key->sold); ?></td>
                        <td><?php echo e(number_format($key->usd_price,2)); ?></td>
                        <td><?php echo e(number_format($key->usd_price/$usdofbtc,8)); ?></td>
                        <td><?php echo e(number_format($key->usd_price/$usdofbch,8)); ?></td>
                        <td><?php echo e(number_format($key->usd_price/$usdofeth,8)); ?></td>

                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>




   <?php else: ?>
   <?php endif; ?>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- <script src="<?php echo e(url('assets/js/clipboard.min.js')); ?>"></script> -->
<script>
   // (function () {
   //     new Clipboard('#copy-button');
   // })();


   $(document).ready(function () {

       $('#data-table').DataTable();
   });


   var refreshId = "";
    var onebtc = <?php echo e($usdofbtc); ?>;
    var onebch = <?php echo e($usdofbch); ?>;
    var oneeth = <?php echo e($usdofeth); ?>;
   var rate = <?php echo e($usd_rate); ?>;
   $("#token").on('keyup', function () {
       if ($("#token").val() > 0) {
           var amount = $("#token").val() * rate;
            $("#converted_btc").val((amount / onebtc).toFixed(8));
             $("#converted_bch").val((amount / onebch).toFixed(8));
           $("#converted_eth").val((amount / oneeth).toFixed(8));

           $("#total_alt").html(($("#token").val() * 1).toFixed(2));
           // $("#bonus_alt").html(bonus);
       }
       else
           $("#total_alt").html('');
   })


   function convertUsd(amount) {
       var url = '<?php echo e(url("convertUsd")); ?>';
       var _token = $("#_token").val();

       swal({
                   title: "Are you sure To Convert ?",
                   text: "You Really Sure Of Convert !",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "Yes, Convert it!",
                   closeOnConfirm: false
               },
               function () {
                   $.ajax({
                       url: url,
                       method: 'post',
                       data: {'_token': _token, 'amount': amount},
                       success: function (data) {
                           if (data == 1) {
                               swal("success!", "Your USD Balance is Converted.", "success");
                               window.location.reload();
                           }
                           else if (data == 0) {
                               $("#error").html('<div class="alert alert-danger" ><b>Insuficient balance.</b></div>');
                           }
                       }
                   });
               });
   }


   //  function convertUsd(amount){

   //    swal({
   // title: "Are you sure To Convert USD?",
   // text: "You Really Sure Of Convert !",
   // type: "warning",
   // showCancelButton: true,
   // confirmButtonColor: "#DD6B55",
   // confirmButtonText: "Yes, Convert it!",
   // closeOnConfirm: false
   // },


   //             $('.submit').prop('disabled', true);

   //             if(amount > 0){

   //                $('#submit').html('<i class="fa fa-spinner fa-spin fa-3x fa-fw" style="font-size: 18px;"></i><span class="sr-only">Loading...</span> Generate Address');


   //                 $.post("<?php echo e(url('/convertUsd')); ?>",
   //                 {
   //                     amount: amount,
   //                     _token: "<?php echo e(csrf_token()); ?>"
   //                 },
   //                 function(data, status){
   //                     $("#error").html();
   //                     if(data == 0){
   //                         $("#token_error").addClass('has-error');
   //                         $("#error").html('<div class="alert alert-danger" ><b>Insuficient balance.</b></div>');

   //                     }else if(data == 1){

   //                        swal("success!", "Your USD Balance is Converted.", "success");
   //                        window.location.reload();

   //                     }else{
   //                         $("#error").html('<div class="text-danger">'+data+' !!</div>');
   //                     }
   //                     $('.submit').prop('disabled', false);

   //                 });
   //             }
   //             else{
   //                 $('.submit').prop('disabled', false);
   //                 $("#error").append('<div class="alert alert-danger" ><b>Insuficient balance. </div>');
   //             }
   //         }


</script>
<script type="text/javascript">
   $(document).ready(function () {
       var $window = $(window);
       var widthwindow = $window.width();
       if (widthwindow < 786) {
           $(".nice-nav").addClass("open");
       }
   });

   $(window).resize(function () {
       var $window = $(window);
       var widthwindow = $window.width();
       if (widthwindow < 786) {
           $(".nice-nav").addClass("open");
       }
   });
   function copytext() {
       var copyText = document.getElementById("post-shortlink");
       copyText.select();
       document.execCommand("Copy");
      }

       function copytextUserAddress() {
            var copyTextUserAddress = document.getElementById("post-shortlink-UserAddress");
            copyTextUserAddress.select();
            document.execCommand("Copy");
           }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>