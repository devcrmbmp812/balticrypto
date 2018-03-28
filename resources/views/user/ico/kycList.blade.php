@extends('layouts.master')
@section('title') BCT Coin Home Page  @endsection
@section('style')
<style type="text/css">

</style>
@endsection
@section('content')
<?php
// check admin or user
$slug = Sentinel::getUser()->roles()->first()->slug;
?>
<div class="dashboard-body">
<div class="row">
<div class="col-sm-12">
<h4 class="page-title">Kyc Form</h4>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a @if($slug == "2") href="{{ url('user/dashboard')}}" @else href="{{ url('admin/dashboard')}}" @endif><i class="fa fa-home" aria-hidden="true"></i></a>
</li>
<li class="breadcrumb-item"><a @if($slug == "2") href="{{ url('user/profile')}}" @else href="{{ url('admin/profile')}}" @endif>Kyc Form</a>
</li>
</ol>
</div>

<div class="col-md-12">
<div class="card">
<div class="card-body">

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade @if(!session('validator'))  show active @endif" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="col-md-12">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      @if(session('error'))<br><br><div class="alert alert-danger">{{ session('error') }}</div>@endif
      @if(session('success'))<br><br><div class="alert alert-success">{{ session('success') }}</div>@endif

      
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="user_id" value="{{Sentinel::getUser()->id}}">
			<div class="container-fluid">
				<div class="col">
				    <h4>Upload User Identification Document</h4>
				    
				        @if($user->kyc_status == 0)
				            <h5>Kyc status <span class="badge badge-info">Pending.</span></h5>

				        @elseif($user->kyc_status == 2)
				            <h6>Kyc document <span class="badge badge-danger">Rejected.</span></h6>
				        @endif
				    
				    <div class="form-group">
				        <label>First Document</label>
				        <div class="input-group">
				            <img style="height:250px;" src="{{url('assets/images/user/kyc')}}/{{ $user->kyc_image_one }}">
				        </div>
				    </div>
				</div>
				<div class="col">
				    <div class="form-group">
				        <label>Second Document</label>
				        <div class="input-group">
				            <img style="height:250px;" src="{{url('assets/images/user/kyc')}}/{{ $user->kyc_image_two }}">
				        </div>
				    </div>
				</div>
			</div>
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
			



          @endsection