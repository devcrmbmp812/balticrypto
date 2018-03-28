@extends('layouts.master')
@section('title') BCT Coin | Deposit History @endsection
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
         <h4 class="page-title">Deposit History</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="{{ URL('deposittransaction')}}">Deposit History</a>
      </li>
   </ol>
</div>
</div>
<div class="row">
<div class="col-sm-12">
   @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
   @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
   <div class="card">
      <div class="card-body table-responsive">
         <!-- <table class="table table-striped data-table"> -->
         <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
            <thead class="thead-dark">
               <tr>
                  <th scope="col">Sr.</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Amount (USD)</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Type</th>
                  <th scope="col">Txid</th>
                  <th scope="col">Status</th>
                  <th scope="col">Created On </th>
                  <th scope="col">Description</th>
               </tr>
            </thead>
            <tbody>
             <?php $i = 1; //print_r($transactions); ?>

              @foreach($deposit as $key)
               @if($key->status != 0)
                 <tr>

                   <td>{{$i++}}</td>
                   <td>{{@$key->user->username}}</td>
                   <td>{{ number_format($key->amount1,2) }} </td>
                   <td>{{ number_format($key->amount,8) }} </td>
                   <td>@if($key->coin_type== 'BTC') <span class="badge badge-warning">BTC</span>  @elseif($key->coin_type== 'ETH') <span class="badge badge-info">ETH</span> @elseif($key->coin_type== 'BCH') <span class="badge badge-info">BCH</span>  @endif </td>
                   <td>{{$key->txid}}</td>
                   <td>@if($key->status== -1)<span class="badge badge-danger">Cancelled</span> @elseif($key->status== 100) <span class="badge default default-badge">Confirm</span> @endif </td>
                   <td>{{$key->created_at}}</td>
                   <td>User Deposited {{ number_format($key->amount,8) }} {{ $key->coin_type }} Amount.</td>

                 </tr>
              @endif
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
});
</script>
@endsection