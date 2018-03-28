@extends('layouts.master')
@section('title') BCT Coin  | Buy Token History @endsection
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
         <h4 class="page-title">Buy Token History</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="{{ URL('buytokentransaction')}}">Buy Token History</a>
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
                  <th scope="col">Amount</th>
                  <th scope="col">Token</th>
                  <th scope="col">Type</th>
                  <th scope="col">Txid</th>
                  <th scope="col">Status</th>
                  <th scope="col">Created On </th>
                  <th scope="col">Description</th>
               </tr>
            </thead>
            <tbody>
             <?php $i = 1; //print_r($transactions); ?>

              @foreach($wallets as $key)

                 <tr>

                   <td>{{$i++}}</td>
                    <td>{{$key->user->username}}</td>
                   <td>
                    @if($key->amount)
                      {{ number_format($key->amount,8) }}
                    @elseif($key->amount1)
                      {{ number_format($key->amount1,2) }}
                    @endif</td>
                   <td>{{$key->tokens}}</td>
                   <td>@if($key->type==1) <span class="badge badge-warning">BTC</span>  @elseif($key->type == 4) <span class="badge badge-primary">BCH</span>@elseif($key->type == 2) <span class="badge badge-info">ETH</span>   @elseif($key->type == 3) <span class="badge badge-success">USD</span> @endif </td>
                    <td>{{$key->txid}}</td>
                    <td><span class="badge badge-success">Confirm</span></td>
                   <td>{{$key->created_at}}</td>
                   <td>User bought Token With @if($key->type==1) BTC @elseif($key->type == 2) ETH  @elseif($key->type == 3) USD @endif.</td>

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
});
</script>
@endsection