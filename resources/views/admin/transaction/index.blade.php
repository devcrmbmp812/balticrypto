@extends('layouts.master')
@section('title') BCT Coin  | User Transaction @endsection
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
         <h4 class="page-title">Transaction</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('#') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="#!">Transaction</a>
      </li>
   </ol>
</div>
</div>
<div class="row">
<div class="col-sm-12">
   @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
   @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
   <div class="card">
      <div class="card-body">
         <!-- <table class="table table-striped data-table"> -->
         <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
            <thead class="thead-dark">
               <tr>
                    <th scope="col">Sr.</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Token</th>
                  <th scope="col">Type</th>
                  <th scope="col">Status</th>
                  <th scope="col">Created On </th>
                  <th scope="col">Description</th>
               </tr>
            </thead>
            <tbody>
             <?php $i = 1; //print_r($transactions); ?>

              @foreach($transactions as $key => $value)

                 <tr>
                 @if($transactions[$key]->wallet_type=='token_buy')
                   <td>{{$i++}}</td>
                    <td>{{$transactions[$key]->user->first_name}}</td>
                   <td>

                    @if($transactions[$key]->amount)
                      {{ number_format($transactions[$key]->amount,8) }}
                    @elseif($transactions[$key]->amount1)
                      {{ number_format($transactions[$key]->amount1,8) }}

                    @endif</td>
                   <td>{{$transactions[$key]->tokens}}</td>
                   <td><span class="badge badge-warning">Buy Token</span></td>
                    <td><span class="badge badge-success">Approved</span></td>
                   <td>{{$transactions[$key]->created_at}}</td>
                   <td>User Buy With @if($transactions[$key]->type==1) BTC @elseif($transactions[$key]->type == 4) BCH @elseif($transactions[$key]->type == 2) ETH  @elseif($transactions[$key]->type == 3) USD @endif Wallet.</td>
                  @else
                    <td>{{$i++}}</td>
                   <td>{{$transactions[$key]->user->first_name}}</td>
                   <td>{{ number_format($transactions[$key]->amount,8) }} </td>
                   <td>-</td>
                   <td><span class="badge badge-info">Withdraw</span></td>
                   <td>@if($transactions[$key]->admin_status==0)<span class="badge badge-danger">Pending</span>@elseif($transactions[$key]->admin_status==1)<span class="badge badge-success">Approved</span> @else <span class="badge badge-success">Rejected</span> @endif</td>
                   <td>{{$transactions[$key]->created_at}}</td>
                   <td>User Withdrawing {{$transactions[$key]->coin}} amount</td>
                  @endif
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