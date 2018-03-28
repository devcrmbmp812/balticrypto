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
	<div class="card-header">
                <div class="row">
          <div class="col-md-12">

            <h4>Upload User Identification Document</h4>
          </div>

        </div>
      </div>
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

      <form class="form-horizontal theme-form mt-4 row"  action="{{ url('kyc-form')}}" method="post" enctype= "multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="user_id" value="{{Sentinel::getUser()->id}}">

			<div class="container-fluid">
				<div class="col-md-6">

				  	<div class="form-group">				        				       				 
				  	<span style="font-weight: 800">Note :- When you buying 10 ethereum you must fill kyc form .</span>
				    </div>
				    <div class="form-group">
				        <label>Upload Image</label>
				        <div class="input-group">
				            <span class="input-group-btn">
				                <span class="btn btn-default btn-file">
				                    Browse Image  <input type="file" id="imgInp" name="imgInp" class="default-btn">
				                </span>
				            </span>
				        </div>
				        <img id='img-upload'/>
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
				        <label>Upload Image</label>
				        <div class="input-group">
				            <span class="input-group-btn">
				                <span class="btn btn-default btn-file">
				                    Browse Image  <input type="file" id="imgInps" name="imgInps" class="default-btn">
				                </span>
				            </span>

				        </div>
				        <img id='img-uploads'/>
				    </div>
				</div>

				<div class="col-md-6">
				    <div class="form-group">
				    	<div class="input-group">
				            <span class="input-group-btn">
				                <span class="btn btn-default btn-file">
									<input type="submit" name="" value="Submit" class="default-btn">
				                </span>
				            </span>

				        </div>

				    </div>
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




          @endsection