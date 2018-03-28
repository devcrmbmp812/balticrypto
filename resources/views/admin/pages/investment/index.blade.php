@extends('layouts.master')
@section('title') BCT Coin  | Pages @endsection
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
         <h4 class="page-title">BCT Coin Investment Opportunity.</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('#') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="#!">Pages</a>
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
                  <th scope="col">Images</th>
                  <th scope="col">Title</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
              <?php $i = 1;?>
              @foreach($value as $key)
    <tr>
      <td>{{$i++}}</td>
      <td><img src="{{url('assets/images/frontend',$key->images)}}" style="width: 50px;"></td>
      <td>{{ $key->title }}</td>
      <td><a href="{{url('admin-investmentEdit',$key->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
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