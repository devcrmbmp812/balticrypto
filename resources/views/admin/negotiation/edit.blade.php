@extends('layouts.master')
@section('title') BCT Coin  | Negotiations Edit @endsection
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
      <h4 class="page-title">Negotiations </h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="#">Negotiations Edit</a>
    </li>
  </ol>
</div>
</div>
<div class="row">
<div class="col-sm-12">

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

    {{ Form::model($negotiation, array('route' => array('negotiation.update',$negotiation->id), 'method' =>'PUT', 'files' => 'true')) }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">link</label>
        </div>
        <div class="col-sm-2">
          <input type="text" name="link"  class="form-control" value="{{$negotiation->link}}"  autocomplete="off">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">Image uplode</label>
        </div>
        <div class="col-sm-2">
          <input type="file" id="imgInp" name="image" class="default-btn" >
        </div>
        <div class="col-sm-2">
          <img src="{{URL::asset('assets/images/user/negotiation').'/'.$negotiation->image}}" width="200px" height="200px">
          </div>
      </div>
    </div>

    <div class="form-group col-md-12">
      <button type="submit" class="btn btn-theme mt-4">Submit</button>
    </div>

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