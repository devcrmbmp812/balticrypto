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
         <h4 class="page-title">Exchange Under Negotiation</h4>
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
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
              <?php $i = 1;?>
              @foreach($logo as $key)
    <tr>
      <td>{{$i++}}</td>
      <td><img src="{{url('assets/images/frontend',$key->images)}}" style="width: 75px;"></td>
      <td><a  data-toggle="modal" data-target="#images{{$key->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
    </tr>
      <!-- Modal -->
  <div class="modal fade" id="images{{$key->id}}" role="dialog">
    <div class="modal-dialog">
<!-- Modal content-->

              <form class="form-horizontal" action="{{ url('admin-storePages',$key->id) }}" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-body">
          <div class="mb-3"></div>
          <h3> Change Image </h3>
           <div class="mb-5"></div>

                 <div class="form-group col-md-12">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <label for="exampleInputEmail1">Upload Image</label>
                <input type="file" class="form-control" name="images"  id="exampleInputEmail1" autocomplete="off" >
                 <div class="form-group col-md-12">

            </div>
             </div>
               </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-theme mt-4">Update</button>
        </div>
                      </form>
      </div>
    </div>
    </div>

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