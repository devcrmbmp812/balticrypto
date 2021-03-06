@extends('layouts.master')
@section('title') BCT Coin  | Team Member Create @endsection
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
      <h4 class="page-title">Team Member </h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="#">Team Member Create</a>
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
  <form class="" action="{{route('team-member.store')}}" method="post" enctype= "multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">Name</label>
        </div>
        <div class="col-sm-2">
          <input type="text" name="name"  class="form-control" value="{{old('name')}}"  autocomplete="off">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">Designation</label>
        </div>
        <div class="col-sm-2">
          <input type="text" name="designation"  class="form-control" value="{{old('designation')}}"  autocomplete="off">
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
      </div>
    </div>
    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">Email</label>
        </div>
        <div class="col-sm-2">
          <input type="email" name="email"  class="form-control" value="{{old('email')}}"  autocomplete="off">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">FaceBook link</label>
        </div>
        <div class="col-sm-2">
          <input type="text" name="fblink"  class="form-control" value="{{old('fblink')}}"  autocomplete="off">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">Telegram</label>
        </div>
        <div class="col-sm-2">
          <input type="text" name="telegram"  class="form-control" value="{{old('telegram')}}"  autocomplete="off">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">Sorting</label>
        </div>
        <div class="col-sm-2">
          <input type="number" name="sorting"  class="form-control" value="{{old('sorting')}}"  autocomplete="off">
        </div>
      </div>
    </div>

    <div class="form-group">
        <div  class="row">
          <div class="col-sm-2">
            <label for="question">Type</label>
          </div>
          <div class="col-sm-2">
          <div class="form-group">
            <label for="sel1"></label>
            <select name="type" class="form-control" id="sel1">
              <option value="">Select</option>
              <option value="0">Founders</option>
              <option value="1">Support </option>
              <option value="2">Technical Team  </option>
              <option value="3">Creative Team </option>
              <option value="4">Advisors</option>

            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group ">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">Description</label>
        </div>
      <textarea name="editor"></textarea>
        </div>
    </div>

    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2">
          <label for="question">Status</label>
        </div>
        <div class="col-sm-2">
          <label class="switch">
            <input type="radio" value="0" name="status" >
            <span class="slider round">YES</span>
          </label>
          <label class="switch pl-5">
            <input type="radio" value="1" name="status" checked >
            <span class="slider round">NO</span>
          </label>
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
  <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'editor' );
    CKEDITOR.dtd.a.div = 1;
    CKEDITOR.dtd.a.i = 1;
    CKEDITOR.dtd.$removeEmpty.i = 0;
    CKEDITOR.config.allowedContent = true;
    CKEDITOR.replace( 'editor' );
    CKEDITOR.dtd.a.div = 1;
    CKEDITOR.dtd.a.i = 1;
    CKEDITOR.dtd.$removeEmpty.i = 0;
    CKEDITOR.config.allowedContent = true;
  </script>
@endsection