@extends('layouts.master')
@section('title') BCT Coin  | Buy BCT Token @endsection
@section('style')
<style type="text/css">
button.btn.btn-warning {
color: #fff;
}
.badge-warning {
color: #fff !important;
}
.cardheight{
  min-height: 197px;
}
.cardheight394{
  min-height: 394px;
}
.default.default-badge{
    background: #f7941e;
    color: #ffffff;
}
</style>
@endsection
@section('content')
<?php
$slug = Sentinel::getUser()->roles()->first()->slug;
?>
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="dashboard-body">
  <div class="row">
      <div class="col-sm-12">
          <h4 class="page-title">Buy BCT</h4>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
              </li>
              <li class="breadcrumb-item"><a href="{{ URL('user-ico')}}">Buy BCT</a>
              </li>
          </ol>
      </div>


</div>
@if($slug == 2)
<!---  start buy token -->
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-6">
                <div class="card-header">
                    <h4 class="text-center">Total BCTToken</h4>
                </div>
                <div class="card-body p-5">
                    <h2 class="counter text-center ico-font">{{number_format($setting->total_coins,0)}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-6">
                <div class="card-header">
                    <h4 class="text-center">USD Rate</h4>
                </div>
                <div class="card-body p-5">
                    <h2 class="counter text-center ico-font">{{number_format($setting->rate,2)}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="card mb-6">
                <div class="card-header">
                    <h4 class="text-center">Sold BCT</h4>
                </div>
                <div class="card-body p-5">
                    <h2 class="counter text-center ico-font">{{number_format($setting->sold_coins,0)}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="card mb-6">
                <div class="card-header">
                    <h4 class="text-center">ICO Begins in</h4>
                </div>
                <div class="card-body">
                    <div class="timer-wrapper text-center">
                        <p id="timer"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@if(session('successCoin'))<div class="alert alert-success">{{ session('successCoin') }}</div>@endif
@if(session('errorCoin'))<div class="alert alert-danger">{{ session('errorCoin') }}</div>@endif

<div class="row">
<!-- Buy coin -->
<div class="col-md-4  pt-4">
  <form action="{{url('storeIco')}}" id="form0" method="get">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="card cardheight394">
      <div class="card-header">
                <div class="row">
          <div class="col-md-8">
            <img class="mr-3" src="{{ URL::asset('assets/images/bitcoin.png') }}" alt="bitcoin" style="width: 40px;">
            <span>Balance : </span> {{number_format(Sentinel::getUser()->total_btc_bal,8)}} BTC
          </div>
          <div class="col-md-4 text-right">
            <button class="default-btn btn-sm" type="button" id="btnBuyAllBTC" @if(Sentinel::getUser()->total_btc_bal <= 0) disabled="" @endif>Buy All</button>
            <input type="hidden" name="buyall" value="0" id="buyallbtc">
          </div>
        </div>
      </div>
      <div class="card-body theme-form">
        <div class="row">
          <div class="col-md-12 form-group">
             <label for="">Token</label>
            <div class=" input-group mb-2 mr-sm-2 mb-sm-0 token_error ">
              <input type="text" class="form-control" autocomplete="off" name="tokenbtc" required="" id="NumberCoinBTC" onkeyup="return buywithBTC(this)" placeholder="0.00000000">
              <input type="hidden" class="form-control" name="BCTtoken" id="BCTtoken">
               <div class="btn-theme lbl-info" disabled="">Tokens</div>
            </div>
            <span id="errorBtc"></span>
          </div>
          <!--  <div class="col-md-12" id="errorBtc"></div> -->
        </div>

        <div class="row">
           <div class="col-md-12 form-group">
            <label for="">Price</label>
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">

          <input type="text" class="form-control" autocomplete="off" placeholder="0.00000000" id="AmountBTC" type="text" value="0.00" disabled readonly>
                 <div class="btn-theme lbl-info" disabled="">BTC</div>
            </div>
          </div>

        </div>
        <div class="mb-3"></div>
        <div class="row">
          <div class="col-md-6">Bonus Tokens :-</div>
          <div class="col-md-6 text-right"><span id="bonus_BCT">00.00</span></div>
        </div>
        <div class="row">
          <div class="col-md-6">Total Tokens :-</div>
          <div class="col-md-6 text-right"><span id="total_BCT">00.00</span></div>
        </div>
        <div class="mb-4"></div>
        <!--  <button name="type" type="button" onclick='get_address("ETH")' value="ETH" class="submit btn btn-info"> Buy With ETH Wallet </button> -->
        <button name="type" type="submit" id="btnBuyCoinBtcBeh"  value="BTC" class="submit default-btn btn-sm"> Buy Coin <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
        <div class="mb-2"></div>
      </div>
    </div>
  </form>
</div>
<!-- eth -->
<div class="col-md-4 pt-4">
  <form action="{{url('storeIco')}}" id="form0" method="get">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="card cardheight394">
      <div class="card-header">
                <div class="row">
          <div class="col-md-8">
            <img class="mr-3" src="{{ URL::asset('assets/images/icon-eth.png') }}" alt="bitcoin" style="width: 40px;">
            <span>Balance : </span> {{number_format(Sentinel::getUser()->total_eth_bal,8)}} ETH
          </div>
          <div class="col-md-4 text-right">
            <button class="default-btn btn-sm btn-theme" type="button" id="btnBuyAllETH" @if(Sentinel::getUser()->total_eth_bal <= 0) disabled="" @endif>Buy All</button>
            <input type="hidden" name="buyall" value="0" id="buyalleth">
          </div>
        </div>
      </div>
      <div class="card-body theme-form">

        <div class="row">
          <div class="col-md-12 form-group">
             <label for="">Token</label>
            <div class=" input-group mb-2 mr-sm-2 mb-sm-0 token_error ">
             <input type="text" class="form-control"  autocomplete="off" name="tokeneth" id="NumberCoinETH" required="" onkeyup="return buywithETH(this)" placeholder="0.00000000">
             <input type="hidden" class="form-control" name="BCTtokeneth" id="BCTtokeneth">
             <div class="btn-theme lbl-info" disabled="">Tokens</div>
            </div>
            <span id="errorETH"></span>
          </div>
             <!--  <div class="col-md-12" id="errorETH"></div> -->
        </div>


        <div class="row">
          <div class="col-md-12 form-group">
            <label for="">Price</label>
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">

              <input type="text" class="form-control" autocomplete="off" id="AmountEth" placeholder="0.00000000" type="text" value="" disabled readonly>
                 <div class="btn-theme lbl-info" disabled="">ETH</div>
            </div>
          </div>

        </div>
       <div class="mb-3"></div>
        <div class="row">
          <div class="col-md-6">Bonus Tokens :-</div>
          <div class="col-md-6 text-right"><span id="bonus_BCT_eth">00.00</span></div>
        </div>
        <div class="row">
          <div class="col-md-6">Total Tokens :-</div>
          <div class="col-md-6 text-right"><span id="total_BCT_eth">00.00</span></div>
        </div>
        <!-- <div class="row">
          <div class="col-md-6">Total ETH :-</div>
          <div class="col-md-6 text-right"><span id="AmountEth">00.00</span></div>
        </div> -->
        <div class="mb-4"></div>
        <button name="type" id="btnBuyCoinEthBeh" type="submit"  value="ETH" class="submit default-btn btn-sm btn-theme"> Buy Coin  <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
        <div class="mb-2"></div>
      </div>
    </div>
  </form>
</div>
<div class="col-md-4 pt-4">
  <div class="card cardheight394">
    <div class="card-header">
       <div class="col-md-12 ">
        <h4>Rate Now</h4>
      </div>
    </div>
    <div class="card-body theme-form">
      <table class="table table-responsive">
        <tbody>
          <tr>
            <td><b><i class="fa fa-usd" aria-hidden="true"></i></b></td>
            <td>USD</td>
            <td>{{$usd_rate}}</td>
          </tr>
          <tr>
            <td><b><i class="fa fa-btc" aria-hidden="true"></i></b></td>
            <td>BTC</td>
            <td>{{number_format($usd_rate/$usdofbtc,8)}}</td>
          </tr>
          <tr>
            <td><b><img class="mr-3" src="{{ url('assets/images/icon-eth.png') }}" alt="ETH" style="
              height: 18px;
              margin-left: -5px;
            "></b></td>
            <td>ETH</td>
            <td>{{number_format($usd_rate/$usdofeth,8)}}</td>
          </tr>
          <tr>
            <td>1 ETH </td>
            <td>=</td>
            <td>{{$usdofeth}} USD </td>
          </tr>
          <tr>
            <td>1 BTC </td>
            <td>=</td>
            <td>{{$usdofbtc}} USD </td>
          </tr>
        </tbody>
        <tfoot>
        <!-- <tr>
          <td colspan="2"><div class="mb-2" style="margin-top: 10px;"></div>
           Note : 1M = 1,000,000 <br> 
           ETH and BTC price will be refresh every 2 mins <br>
          Minimum purchase 50 TOKEN. <br> 
          <b style="color: #f7941e;">Maximum 200 per account every 4 hours.</b>
        </td> --> 
      </tr>
      </tfoot>
    </table>

  </div>
</div>
</div>
</div>
<!-- End Buy coin -->
<div class="row pt-4">
<div class="col-sm-12">
@if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
@if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
<div class="card">
  <div class="card-body">
    <div class="col-md-12 ">
      <h4>Transaction</h4>
    </div>
    <div class="mb-4"></div>
    <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Sr.</th>
          <th scope="col">User Name</th>
          <th scope="col">Amount</th>
          <th scope="col">Token</th>
          <th scope="col">Type</th>
          <th scope="col">Txid</th>
         <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;?>
        @foreach($wallets as $wallet)
        <tr>
          <td> {{$i++}} </td>
          <td> {{$wallet->user->username}} </td>
          <td> @if($wallet->amount){{ number_format($wallet->amount,8)}} @elseif($wallet->amount1) {{ number_format($wallet->amount1,2) }} @endif </td>
          <td> {{$wallet->tokens}} </td>
          <td>
            @if($wallet->type == 1) <span class="badge badge-warning"> BTC </span>
            @elseif($wallet->type == 2) <span class="badge badge-info"> ETH </span>
            @elseif($wallet->type == 3) <span class="badge badge-info"> USD </span>
            @endif
          </td>
          <td> {{$wallet->txid}} </td>
          <td> <span class="badge default default-badge"> Confirm </span> </td>
        </tr>
        @endforeach

      </tbody>
    </table>

  </div>
</div>
</div>
</div>
@else
@endif
</div>
@endsection
@section('script')
<script type="text/javascript">
       var btc = 0;
       var eth = 0;
       var rate = 0;
       var buyALLBTC = 1;
       var buyALLETH = 1;
         btc = {{$btc}};
         eth = {{$eth}};
         rate = {{$usd_rate}};

      //setInterval("check_reserveprice()", 5000);
      function check_reserveprice() {
          $.ajax({
            type:"GET",
            url:"{{url('getPrice')}}",
                 success:function(res){
            if(res){
               btc = res['BTC'];
               eth = res['ETH'];
               rate = res['rate'];
               (buyALLBTC) ? $("#NumberCoinBTC").trigger('keyup') : $("#btnBuyAllBTC").trigger('click') ;
               (buyALLETH) ? $("#NumberCoinETH").trigger('keyup') : $("#btnBuyAllETH").trigger('click') ;
            } else {
               console.log('error');
           }
         }
       });
      }

    var btc_amount = {{Sentinel::getUser()->total_btc_bal}};
    var eth_amount = {{Sentinel::getUser()->total_eth_bal}};
    
    function buywithBTC(elem){
      $("#buyallbtc").val(0);
      buyALLBTC= 1;
      $(".token_error").removeClass('has-error');
            $("#errorBtc").html('');
      var val = $(elem).val();
      var bonus = $("#NumberCoinBTC").val()*{{$setting->bonus}}/100;
      $("#total_BCT").html( ($("#NumberCoinBTC").val()*1 + bonus).toFixed(2) );
      $("#BCTtoken").val( ($("#NumberCoinBTC").val()*1 + bonus).toFixed(0) );
      $("#bonus_BCT").html(bonus);
      $("#btnBuyCoinBtcBeh").prop('disabled',true);
      //console.log(val);
            if(isNaN(val)){
                 val = val.replace(/[^0-9\.]/g,'');
                 if(val.split('.').length>2)
                     val = val.replace(/\.+$/,"");
                 $(elem).val(val);
            }
            else{
              if($("#NumberCoinBTC").val() > 0){
                //console.log(btc_amount);
                if(btc_amount==0 ){
                  //console.log("0")
                  $(".token_error").addClass('has-error');
                      $("#errorBtc").html('<div class="text-danger"><b>You dont have sufficient BTC balance to buy !!</b></div>');
                  return false;
                }
                if($("#NumberCoinBTC").val() > 0){

                  var NumberCoinBTC = $("#NumberCoinBTC").val();
                 // console.log(NumberCoinBTC)
                  NumberCoinBTC = NumberCoinBTC * rate;
                 // console.log(rate)
                  var btc_total = (NumberCoinBTC/btc).toFixed(8);
                  $("#priceBTCToBEH").val((1/btc).toFixed(8));
                  $("#AmountBTC").val(btc_total);
                  if(btc_total>btc_amount){
                      $(".token_error").addClass('has-error');
                        $("#errorBtc").html('<div class="text-danger"><b>You dont have sufficient BTC balance to buy !!</b></div>');
                         $("#btnBuyCoinBtcBeh").prop('disabled',true);
                        return false;
                  }else{
                      $("#btnBuyCoinBtcBeh").prop('disabled',false);
                      //$("errorBtc").html('');
                  }
                }
                else{
                  $("#btnBuyCoinBtcBeh").prop('disabled',true);
                    $("#AmountBTC").val('0.00000000');
                    //$("errorBtc").html('');
                }
            }
            else{
                
            }
          }
        }

    function buywithETH(elem){
      $("#buyalleth").val(0);
      buyALLETH= 1;
      var val = $(elem).val();
      var bonus = $("#NumberCoinETH").val()*{{$setting->bonus}}/100;
      $("#total_BCT_eth").html( ($("#NumberCoinETH").val()*1 + bonus).toFixed(2) );
      $("#BCTtokeneth").val( ($("#NumberCoinETH").val()*1 + bonus).toFixed(0) );
      $("#bonus_BCT_eth").html(bonus);
      $("#btnBuyCoinBtcBeh").prop('disabled',true);

      $(".token_errorETH").removeClass('has-error');
            $("#errorETH").html('');
      $("#btnBuyCoinEthBeh").prop('disabled',true);
            if(isNaN(val)){
                 val = val.replace(/[^0-9\.]/g,'');
                 if(val.split('.').length>2)
                     val = val.replace(/\.+$/,"");
                 $(elem).val(val);
            }
            else{
              if($("#NumberCoinETH").val() > 0){
                if(eth_amount==0){
                  console.log("1")
                  $(".token_errorETH").addClass('has-error');
                      $("#errorETH").html('<div class="text-danger"><b>You dont have sufficient ETH balance to buy !!</b></div>');
                  return false;
                }
                if($("#NumberCoinETH").val() > 0){
                  var NumberCoinETH = $("#NumberCoinETH").val();
                  NumberCoinETH = NumberCoinETH * rate;
                  var eth_total = (NumberCoinETH/eth).toFixed(8);
                  $("#priceEHToBEH").val((1/eth).toFixed(8));
                  $("#AmountEth").val(eth_total);
                  if(eth_total>eth_amount){
                      $(".token_errorETH").addClass('has-error');
                        $("#errorETH").html('<div class="text-danger"><b>You dont have sufficient ETH balance to buy !!</b></div>');
                        return false;
                  }else{
                      $("#btnBuyCoinEthBeh").prop('disabled',false);
                  }
                }
                else{
                  $("#btnBuyCoinEthBeh").prop('disabled',true);
                    $("#AmountEth").val('0.00000000');
                }
            }
          }
        }

        $("#btnBuyCoinBtcBeh").prop('disabled',true);
        $("#btnBuyCoinEthBeh").prop('disabled',true);

        $("#btnBuyAllBTC").click(function(){
          buyALLBTC = 0;
          var total_usd = btc * btc_amount;
          var tokens = (total_usd/rate);
          $("#priceBTCToBEH").val((1/btc).toFixed(8));
        $("#AmountBTC").val((btc_amount).toFixed(8));
        $("#NumberCoinBTC").val((tokens).toFixed(2));
        $("#buyallbtc").val(1);
        $("#btnBuyCoinBtcBeh").prop('disabled',false);

        });

        $("#btnBuyAllETH").click(function(){
          buyALLETH = 0;
          var total_usd = eth * eth_amount;
          var tokens = (total_usd/rate);
        $("#priceETHToBEH").val((1/eth).toFixed(8));
        $("#AmountEth").val((eth_amount).toFixed(8));
        $("#NumberCoinETH").val((tokens).toFixed(2));
        $("#buyalleth").val(1);
        $("#btnBuyCoinEthBeh").prop('disabled',false);
        });
    </script>
<script>
$(document).ready(function() {
$('#data-table').DataTable();
});
</script>
@endsection

@section('bottom_script')
<script>

         /* _____________________________________

              Count down
              _____________________________________ */

              var countDownDate = new Date("{{ $setting->ico_end_date  }}").getTime();
         // Update the count down every 1 second
         var countdownfunction = setInterval(function() {

             // Get todays date and time
             var now = new Date().getTime();

             // Find the distance between now an the count down date
             var distance = countDownDate - now;

             // Time calculations for days, hours, minutes and seconds
             var days = Math.floor(distance / (1000 * 60 * 60 * 24));
             var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
             var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
             var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Output the result in an element with id="timer"
             document.getElementById("timer").innerHTML = "<span>" + days + "<span class='timer-cal'>D</span></span> :" + "<span>" + hours + "<span class='timer-cal'>H</span></span> :"
             + "<span>" + minutes + "<span class='timer-cal'>M</span></span> :" + "<span>" + seconds + "<span class='timer-cal'>S</span></span> ";


             // If the count down is over, write some text
             if (distance < 0) {
               clearInterval(countdownfunction);
               document.getElementById("timer").innerHTML = "EXPIRED";
            }
         }, 1000);




</script>


@endsection