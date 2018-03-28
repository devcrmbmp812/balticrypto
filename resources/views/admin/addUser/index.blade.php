
@extends('layouts.master')
@section('title') BCT Coin  | Add Users @endsection
@section('style')
<style type="text/css">
.badge-warning {
background-color: #ffc107;
color: #fff;
}
</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">
  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title">Add Partners / Advisors</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="#">Users</a>
    </li>
  </ol>
</div>
</div>
<div class="row">
<div class="col-sm-12">


  @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
  <div class="row">
    <div class="col-sm-12 text-right pr-4">
      <a href="{{ url('add_user') }}" class="btn btn-dark btn-sm mb-3">Add Partners / Advisors</a>
    </div>
    </div>
  <div class="card">
    <div class="card-body">

  @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  <form class="" action="{{url('doRegisterAdmin')}}" method="post">
    <div class="row">
      <div class="col-sm-6"><h2>Partners / Advisors</h2></div>
      <div class="col-sm-6"><h2><a class="pull-right btn btn-dark btn-sm mb-3" href="{{ url('list_user') }}">List All</a></h2></div>
      <!-- <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div> -->
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="username">User Name</label>
      <input type="text" name="username" value="{{old('username')}}" class="form-control" id="username" autocomplete="off">
      @if ($errors->has('username'))
      <span class="help-block text-danger">
        <strong>{{ $errors->first('username') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label for="first_name">First Name</label>
      <input type="text" name="first_name" value="{{old('first_name')}}"  class="form-control" id="first_name" autocomplete="off">
      @if ($errors->has('first_name'))
      <span class="help-block text-danger">
        <strong>{{ $errors->first('first_name') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" value="{{old('last_name')}}"class="form-control" id="last_name" autocomplete="off">
        @if ($errors->has('last_name'))
      <span class="help-block text-danger">
        <strong>{{ $errors->first('last_name') }}</strong>
      </span>
      @endif
    </div>
    {{--<div class="form-group">--}}
      {{--<label for="sponser">Sponser</label>--}}
      {{--<input type="text" name="sponser" class="form-control" value="{{old('sponser')}}@if(Session::get('referral')){{ Session::get('referral') }}@endif" id="sponser" autocomplete="off">--}}
        {{--@if ($errors->has('sponser'))--}}
      {{--<span class="help-block text-danger">--}}
        {{--<strong>{{ $errors->first('sponser') }}</strong>--}}
      {{--</span>--}}
      {{--@endif--}}
    {{--</div>--}}
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" autocomplete="off">
        @if ($errors->has('email'))
      <span class="help-block text-danger">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password_register" class="form-control" id="password_register
      ">
       @if ($errors->has('password'))
      <span class="help-block text-danger">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label for="confirm_password">Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control" id="confirm_password">
         @if ($errors->has('confirm_password'))
      <span class="help-block text-danger">
        <strong>{{ $errors->first('confirm_password') }}</strong>
      </span>
      @endif
    </div>
    <ul class="nav " role="tablist">
      <li role="presentation" class="mr-2">
        <input type="submit" class="btn-sign-in btn btn-sm mb-3  @if(!session('validator')) active @endif" value="Add Partners / Advisors">
      </li>
  </form>


    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection
@section('script')

@endsection