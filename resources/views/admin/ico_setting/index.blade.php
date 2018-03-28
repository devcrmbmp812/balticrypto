@extends('layouts.master')
@section('title') BCT Coin User @endsection

@section('content')

<div class="dashboard-body">

  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title">ICO-Setting</h4>
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ URL('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="#">Setting</a>
         </li>
       </ol>
    </div>
     <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>ICO-Setting</h4>
        </div>

         <br>
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <br>
        <div class="card-body">
        </div>
      </div>
    </div>
  </div>

</div>
@endsection




