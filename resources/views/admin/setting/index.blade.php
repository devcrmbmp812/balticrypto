@extends('layouts.master')
@section('title') BCT Tokens  | ICO Setting @endsection
@section('style')
<style type="text/css">
button.btn.btn-danger.btn-sm , button.btn.btn-success.btn-sm {
    width: 25%;
}
.badge-warning {
color: #fff !important;
}
a.btn.btn-success.btn-sm {
    color: #fff;
}
</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">
   <div class="row">
      <div class="col-sm-12">
         <h4 class="page-title">ICO Setting</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="{{url('admin-setting')}}">ICO Setting</a>
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
                  <th scope="col">ICO End Date</th>
                  <th scope="col">Total Tokens</th>
                  <th scope="col">Sold Tokens</th>
                   <th scope="col">Rate</th>
                   <th scope="col">Referral Commission (%)</th>
                   <th scope="col">Transfer Token</th>

                  <th scope="col">Action </th>

               </tr>
            </thead>
            <tbody>
    <tr>
      <td>1</td>
      <td>{{ $key->ico_end_date }}</td>
      <td>{{ $key->total_coins }}</td>
      <td>{{ $key->sold_coins }}</td>
      <td>{{ $key->rate }}</td>
      <td>{{ $key->ref_percentage }} %</td>
      <td>@if($key->transfer == 1) <span class="badge badge-success">ON</span> @else <span class="badge badge-danger">OFF</span> @endif </td>
      <td><a href="{{url('admin-settingEdit',$key->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
    </tr>


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