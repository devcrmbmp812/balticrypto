@extends('layouts.master')
@section('title') BCT Coin  | User Transfer Token @endsection
@section('style')
<style type="text/css">
button.btn.btn-danger.btn-sm , button.btn.btn-success.btn-sm {
    width: 25%;
}
.badge-warning {
color: #fff !important;
}
.default.default-badge{
    background: #f7941e;
    color: #ffffff;
}
</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">

  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title">Transfer Token</h4>
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
       </li>
       <li class="breadcrumb-item"><a href="{{ URL('user-transferToken')}}">Transfer Token</a>
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
        <div class="col-lg-3">
          <div class="media">
            <img class="mr-3" src="{{ url('assets/images/slider/btc.png') }}" alt="ETH">
            <div class="media-body">
              <h5 class="mt-2">
              BTC Balance</h5>
              <h4 class="blue-font mt-0 ">
              {{number_format(Sentinel::getUser()->total_btc_bal,8)}}
              </h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="media">
            <img class="mr-3" src="{{ url('assets/images/slider/bch.png') }}" alt="ETH">
            <div class="media-body">
              <h5 class="mt-2">
              BCH Balance</h5>
              <h4 class="blue-font mt-0 ">
              {{number_format(Sentinel::getUser()->total_bch_bal,8)}}
              </h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="media">
            <img class="mr-3" src="{{ url('assets/images/slider/eth.png') }}" alt="ETH">
            <div class="media-body">
              <h5 class="mt-2">
              ETH Balance</h5>
              <h4 class="blue-font mt-0 ">
              {{number_format(Sentinel::getUser()->total_eth_bal,8)}}
              </h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="media">
            <img class="mr-3" src="{{ url('assets/images/slider/BCT.png') }}" alt="ETH">
            <div class="media-body">
              <h5 class="mt-2">
              BCT Balance</h5>
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
    <div class="col-sm-4 pt-4">
      <div class="card">
        <div class="card-header">
          <h4>Transfer ({{number_format(Sentinel::getUser()->total_wdc_bal,0)}} BCT)</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal theme-form" action="{{url('transferTokens')}}" method="post">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
             @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
            @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
            <div id="alert-msg"></div>
            <input type="hidden" name="_token" value="{{csrf_token()}}" >
            <div class="form-group">
              <label for="username">Transfer Token Address</label>
              <input type="text" class="form-control" id="username" autocomplete="off" placeholder="Enter Token Address" name="token_address">
            </div>
            <div class="form-group">
              <label for="Quantity-wisdom coin">Quantity Token</label>
              <input type="number" class="form-control" id="tokens" name="tokens" autocomplete="off" value="" step="any" onchange="checkBalance()" >
            </div>
            <div class="form-group text-right">
              <button type="submit" class=" default-btn btn-sm" id="Withdraw-btn">Transfer</button>
            </div>
          </form>
        </div>
      </div>
    </div>


     <div class="col-sm-8 pt-4">
      <div class="card">
        <div class="card-header">
          <h4>Transfer History</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
          <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
            <thead class="thead-dark">
              <tr>
                 <th scope="col">Sr.</th>
                 <th scope="col">From Username</th>
                 <th scope="col">To Username</th>
                 <th scope="col">Tokens</th>
                 <th scope="col">Type</th>
                 <th scope="col">Txid</th>
                 <th scope="col">Status</th>
                 <th scope="col">Description</th>

              </tr>
            </thead>
            <tbody>
                    <?php $i = 1;?>
            @foreach($value as $key)

             <tr>
               <th scope="row">{{ $i++ }}</th>
               <td>{{$key->users->username}}</td>
               <td>{{$key->user->username}}</td>
               <td>{{$key->tokens}}</td>
               <td><span class="badge default default-badge">BCT</span></td>
               <td>{{$key->txid}}</td>
               <td><span class="badge default default-badge ">Confirm</span></td>
               <td>{{ $key->users->username}} Sent {{ $key->tokens }} Tokens to  {{$key->user->username}}.</td>
             </tr>

             @endforeach
            </tbody>
          </table>
          </div>
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
 $("#alert-msg").html("");
});

function checkBalance()
{
  var coin='BCT';
  if(coin=='BCT'){ var balance= <?php echo Sentinel::getUser()->total_wdc_bal ?>; }
  else{ var balance=0; }
  var amount= $("#tokens").val();
  if(amount<=balance && amount>0)
  {
     $("#Withdraw-btn").prop('disabled', false);
      $("#alert-msg").html("");
  }
  else if(amount!='' || amount != 0)
  {
    $("#Withdraw-btn").prop('disabled', true);
    $("#alert-msg").html("<p class='alert alert-danger'>Insuficient balance.</p>")
  }
}

</script>
@endsection