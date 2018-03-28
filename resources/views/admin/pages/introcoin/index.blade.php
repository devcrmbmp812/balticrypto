@extends('layouts.master')
@section('title') BCT Coin  | Pages @endsection
@section('style')
<style type="text/css">
</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">
   <div class="row">
      <div class="col-sm-12">
         <h4 class="page-title">What Is BCT Coin ?</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('#') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="{{url('admin-pages')}}">Pages</a>
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

      <form class="form-horizontal" action="{{ url('admin-storePages',$introCoin->id) }}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Title :</label>
                <input type="text" name="title" class="form-control" value="{{ $introCoin->title }}" id="exampleInputEmail1" autocomplete="off" readonly="readonly">
                                      </div>
      <div class="mb-4"></div>
      <div class="form-group col-md-12">
         <textarea name="editor1">{{ $introCoin->content }}</textarea>
           </div>
   <div class="form-group col-md-12">
           <button type="submit" class="btn btn-theme mt-4">Update</button>
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
CKEDITOR.replace( 'editor1' );
CKEDITOR.dtd.a.div = 1;
CKEDITOR.dtd.a.i = 1;
CKEDITOR.dtd.$removeEmpty.i = 0;
CKEDITOR.config.allowedContent = true;
</script>

@endsection