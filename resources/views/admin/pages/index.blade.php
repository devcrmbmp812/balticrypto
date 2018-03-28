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
         <h4 class="page-title">Pages</h4>
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
                  <th scope="col">Page Name</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Home Main Title</td>
                <td><a href="{{ url('admin-home')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            <tr>
              <td>2</td>
              <td>What Is BCT Coin ?</td>
              <td><a href="{{ url('admin-coinIntro')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            <tr>
              <td>3</td>
              <td>About Us </td>
              <td><a href="{{ url('admin-about')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            <tr>
              <td>4</td>
              <td>Why BCT Coin? </td>
              <td><a href="{{ url('admin-whycoin')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
             <tr>
              <td>5</td>
              <td>Frequently Asked Questions?</td>
              <td><a href="{{ url('admin-faq')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Frequently Asked Questions Image </td>
                <td><a class="btn btn-success btn-sm"  data-toggle="modal" data-target="#faqimage"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
                 <tr>
              <td>7</td>
              <td>Road Map </td>
              <td><a class="btn btn-success btn-sm"  data-toggle="modal" data-target="#faq"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
                  <tr>
              <td>8</td>
              <td>Mobile Platforms? </td>
              <td><a href="{{ url('admin-mobile')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>

                 <tr>
              <td>9</td>
              <td>Member Card? </td>
              <td><a href="{{ url('admin-card')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>

              <tr>
              <td>10</td>
              <td>BCT Coin Ecosystem </td>
              <td><a href="{{ url('admin-ecosystem')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>

              <tr>
              <td>11</td>
              <td>BCT Coin Investment Opportunity</td>
              <td><a href="{{ url('admin-investment')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>


              <tr>
              <td>12</td>
              <td>I/O Digital - BCT Wallet</td>
              <td><a href="{{ url('admin-walletPage')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
             <tr>
              <td>13</td>
              <td>Exchange Under Negotiation</td>
              <td><a href="{{ url('admin-exchangePage')}}"  class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            <tr>
            <td>14</td>
            <td>Latest News Post</td>
            <td><a href="{{ url('admin-Blog')}}"  class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>

       </tbody>
         </table>
      </div>
   </div>
</div>
</div>
</div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="faq" role="dialog">
    <div class="modal-dialog">
<!-- Modal content-->

      <form class="form-horizontal" action="{{ url('admin-storeRoadmap') }}" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
              <div class="mb-3"></div>
              <h3>Road Map Image </h3>
               <div class="mb-5"></div>
                <div class="form-group col-md-12">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <label for="exampleInputEmail1">Upload Image</label>
                    <input type="file" class="form-control" name="images"  id="exampleInputEmail1" autocomplete="off" >
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
    </div>

<div class="modal fade" id="faqimage" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->

        <form class="form-horizontal" action="{{ url('admin-storeFAQimage') }}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3"></div>
                    <h3>Frequently Asked Questions Image </h3>
                    <div class="mb-5"></div>
                    <div class="form-group col-md-12">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for="exampleInputEmail1">Upload Image</label>
                        <input type="file" class="form-control" name="images"  id="exampleInputEmail1" autocomplete="off" >
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
</div>


@endsection
@section('script')
<script>
$(document).ready(function() {
$('#data-table').DataTable();
});
</script>
@endsection