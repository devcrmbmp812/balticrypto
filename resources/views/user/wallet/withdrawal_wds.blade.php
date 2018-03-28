@extends('layouts.master')
@section('title') BCT Coin  | User Withdrawal @endsection
@section('style')
<style type="text/css">
button.btn.btn-danger.btn-sm , button.btn.btn-success.btn-sm {
    width: 25%;
}
.badge-warning {
color: #fff !important;
}
</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">

  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title">Withdrawal</h4>
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
       </li>
       <li class="breadcrumb-item"><a href="{{ URL('user-wallet')}}">wallet</a>
         <li class="breadcrumb-item"><a href="{{ URL('user-withdraw',$coin)}}">Withdrawal</a>
         </li>
       </ol>
    </div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Balance</h4>
        </div>
         <div class="card-body coin-value">
            <div class="row">
       <!--  <div class="col-lg-4">
          <div class="media">
            <img class="mr-3" src="{{ url('assets/images/bitcoin.png') }}" alt="bitcoin">
            <div class="media-body">
              <h5 class="mt-2">
              BTC</h5>
              <h4 class="blue-font mt-0 ">
                {{number_format(Sentinel::getUser()->total_btc_bal,8)}}

              </h4>
            </div>
          </div>
        </div> -->
        <div class="col-lg-6">
          <div class="media">
            <img class="mr-3" src="{{ url('assets/images/icon-eth.png') }}" alt="ETH">
            <div class="media-body">
              <h5 class="mt-2">
              ETH</h5>
              <h4 class="blue-font mt-0 ">
              {{number_format(Sentinel::getUser()->total_eth_bal,8)}}
              </h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="media">
            <img class="mr-3" src="{{ url('assets/images/slider/BCT.png')}}" alt="BCT">
            <div class="media-body">
              <h5 class="mt-2">
              BCT</h5>
              <h4 class="blue-font mt-0">
             {{number_format(Sentinel::getUser()->total_wdc_bal,0)}}
              </h4>
            </div>
          </div>
        </div>
      </div>
                     </div>
                  </div>
               </div>

    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <h4>Withdrawal</h4>
        </div>
        <div class="card-body table-responsive ">
          <form class="form-horizontal theme-form" action="{{url('user-withdraw-wds')}}" method="post">
             @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
            @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
            <div id="alert-msg"></div>
            <input type="hidden" name="_token" value="{{csrf_token()}}" >
            <input type="hidden" name="coin_name" value="{{$coin}}" >
            <div class="form-group">
              <label for="address">wallet Address</label>
              <p class="form-control">{{Sentinel::getUser()->erc_20_address}}</p>
            </div>
            <div class="form-group">
              <label for="Quantity-wisdom coin">BCT Withdrawal</label>
              <input type="number" class="form-control" id="amount-withdraw" name="amount_withdraw" value="0.00" step="any" onkeyup="checkBalance()" >
            </div>
            <div class="form-group text-right">
             <input type="hidden" class="form-control" value="{{Sentinel::getUser()->erc_20_address}}" id="address" name="address_withdraw">
              <button type="submit" class="default-btn btn-sm" id="Withdraw-btn">Withdraw</button>

            </div>
          </form>
        </div>
      </div>
    </div>
      <br>
      <br>


     <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>List Withdrawal</h4>
        </div>
        <div class="card-body table-responsive">
          <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
            <thead class="thead-dark">
              <tr>
                 <th scope="col">Id</th>
                 <th scope="col">Address</th>
                 <th scope="col">Txid</th>
                 <th scope="col">Status</th>
                 <th scope="col">Amount</th>
                 <th scope="col">Coin Type</th>

              </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
            @foreach($withdraws as $withdraw)
             <tr>
               <th scope="row">{{$i}}</th>
               <td>{{$withdraw->address}}</td>
               <td>{{$withdraw->txid}}</td>
               <td>@if($withdraw->admin_status == 0)
               <span class="badge badge-danger"> Pending </span>
               @elseif($withdraw->admin_status == 1)
                <span class="badge badge-success"> Approved </span>
               @elseif($withdraw->admin_status == 2)
               <span class="badge badge-danger"> Pending </span>
               @endif </td>
               <td>{{number_format($withdraw->amount,8)}}</td>
               <td> <span class="badge badge-warning"> BCT </span>
               </td>
             </tr>
             <?php $i++;?>
             @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
@section('script')
<script>
$(document).ready(function() {
$('#data-table').DataTable();
 $("#Withdraw-btn").prop('disabled', true);
});

function checkBalance()
{
  var coin='<?php echo $coin ?>';
  if(coin=='ETH'){ var balance= <?php echo Sentinel::getUser()->total_eth_bal ?>; }
  else if(coin=='BTC'){ var balance= <?php echo Sentinel::getUser()->total_btc_bal ?>; }
   else if(coin=='BCT'){ var balance= <?php echo Sentinel::getUser()->total_wdc_bal ?>; }
  else{ var balance=0; }
  var amount= $("#amount-withdraw").val();
  if(amount<=balance && amount>0)
  {
     $("#Withdraw-btn").prop('disabled', false);
      $("#alert-msg").html("");
  }
  else
  {
    $("#Withdraw-btn").prop('disabled', true);
    $("#alert-msg").html("<p class='alert alert-danger'>Insuficient balance.</p>")
  }
}
</script>
@endsection