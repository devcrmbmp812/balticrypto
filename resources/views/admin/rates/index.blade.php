@extends('layouts.master')
@section('title') BCT Coin  | Rate Setting @endsection
@section('style')


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" crossorigin="anonymous">  
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="../theme/css/tempusdominus-bootstrap-4.css" rel="stylesheet">
    
    
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
         <h4 class="page-title">Rates Setting</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="{{url('admin-rates')}}">Rates Setting</a>
      </li>
   </ol>
</div>
</div>
   @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
   @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
@if (count($errors))
        <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach($errors->all() as $error)

                <li>{{ $error }}</li><br>
                @endforeach
            </ul>
        </div>
         @endif

<div class="mb-3"></div>
<div class="row">
<div class="col-sm-12">
<a data-toggle="modal" data-target="#addrate" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New</a>
</div>
</div>
<div class="mb-4"></div>
<div class="row">
<div class="col-sm-12">

   <div class="card">
      <div class="card-body table-responsive">
         <!-- <table class="table table-striped data-table"> -->
         <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
            <thead class="thead-dark">
               <tr>
                  <th scope="col">Sr.</th>
                  <th scope="col">Tokens</th>
                  <th scope="col">Bonus</th>
                  <th scope="col">Days</th>
                  <th scope="col">Usd price</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action </th>
               </tr>
            </thead>
            <tbody>

            @foreach($rate as $key)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $key->sold }}</td>
                    <td>{{ $key->bonus }}</td>
                    <td>{{ $key->days }}</td>
                    <td>{{ number_format($key->usd_price,2) }}</td>
                    <td>{{ $key->start_date }}</td>
                    <td><a data-toggle="modal" data-target="#raet{{$loop->iteration}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                </tr>

            @endforeach


       </tbody>
         </table>
          @foreach($rate as $key)
          <div class="modal fade" id="raet{{$loop->iteration}}" role="dialog">
              <div class="modal-dialog">
                  <!-- Modal content-->
                  {!! Form::model($rate, ['method' => 'PATCH','url' => ['admin-rates', $key->id],'files' => true, 'class'=> 'm-form m-form--fit m-form--label-align-right']) !!}
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                  <div class="modal-content">
                          <div class="modal-body">
                              <div class="mb-3"></div>
                              <h3>Edit Rate </h3>
                              <div class="mb-5"></div>
                              <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Tokens</label>
                                  <input type="input" class="form-control" name="sold" value="{{$key->sold}}"   >
                                  <div class="form-group col-md-12"></div>
                                  <label for="exampleInputEmail1">Use price </label>
                                  <input type="input" class="form-control" name="usd_price" value="{{$key->usd_price}}">
                                  <label for="exampleInputEmail1">Bonus</label>
                                  <input type="input" class="form-control" name="bonus" value="{{$key->bonus}}"   >
                                  <label for="exampleInputEmail1">Days</label>
                                  <input type="input" class="form-control" name="days" value="{{$key->days}}"   >
                                  <div class="form-group col-md-12"></div>
                                  <input type="input" class="form-control startDate" name="date" value="{{$key->start_date}}" placeholder="yyyy-mm-dd hh:mm:ss"  >
                                  <div class="form-group col-md-12"></div>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-theme mt-4">Update</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
         @endforeach


          <div class="modal fade" id="addrate" role="dialog">
              <div class="modal-dialog">
                  <!-- Modal content-->
                 <form class="m-form m-form--fit m-form--label-align-right" method="post" action="">
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                  <div class="modal-content">
                          <div class="modal-body">
                              <div class="mb-3"></div>
                              <h3>Add Tokens </h3>
                              <div class="mb-5"></div>
                              <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Tokens</label>
                                      <input type="input" class="form-control" name="sold" value="" >
                                      <div class="form-group col-md-12"></div>
                                  <label for="exampleInputEmail1">Use price </label>
                                      <input type="input" class="form-control" name="usd_price" value="" >
                                      <div class="form-group col-md-12"></div>
                                  <label for="exampleInputEmail1">Bonus</label>
                                      <input type="input" class="form-control" name="bonus" value="" >
                                      <div class="form-group col-md-12"></div>
                                  <label for="exampleInputEmail1">Days</label>
                                      <input type="input" class="form-control" name="days" value="" >
                                      <div class="form-group col-md-12"></div>
                                  <label for="exampleInputEmail1">Date</label>
                                      <input type="input" class="form-control startDate" name="date" value="" placeholder="yyyy-mm-dd hh:mm:ss" >
                                      <div class="form-group col-md-12"></div>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-theme mt-4">Submit</button>
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
</div>


@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment-with-locales.min.js"></script>    
    <script src="../theme/js/tempusdominus-bootstrap-4.js"></script> 
<script>
$(document).ready(function() {
$('#data-table').DataTable();
});
</script>

 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>


@endsection