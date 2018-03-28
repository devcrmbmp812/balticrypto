@extends('layouts.master')
@section('title') BCT Coin | Referral List @endsection
@section('style')
<style type="text/css">
button.btn.btn-danger.btn-sm , button.btn.btn-success.btn-sm {
    width: 25%;
}
.badge-warning {
color: #fff !important;
}
.heading {
  font-weight: 400;
  text-align: center;
  background: #293538;
  margin: 0;
  color: white;
  padding: 10px 0;
}

.file-browser {
  color: #364346;
  padding: 20px 10px;
}

.file {
  color: #364346;
  display: block;
  list-style: none;
  margin: 10px 0;
}

.folder {
  list-style: none;
  cursor: pointer;
  margin: 4px 0;
}
.folder > ul {
  display: none;
}
.folder:before {
  padding: 5px;
  height: 20px;
  width: 20px;
  text-align: center;
  line-height: 10px;
  border-radius: 1px;
  display: inline-block;
  content: '+';
  color: #fff;
  background: #f7941e;
}
.folder.folder-open > ul {
  display: block;
  padding-left: 15px;
  margin-left: 9px;
  border-left: 2px solid #f7941e;
}
.folder.folder-open:before {
  content: '-';
}
.default.default-badge{
    background: #f7941e;
    color: #ffffff;
}


</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">
  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title">Referral List</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="{{ URL('user-referral')}}">Referral List</a>
    </li>
  </ol>

<div class="row">
<div class="col-sm-12">
  @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
  <div class="card">
    <div class="card-body">
      <div class="box box-setting">

        <div class="file-browser">
            <ul>
                <li class="folder folder-open">
                    {{Sentinel::check()->first_name}} {{Sentinel::check()->last_name}} ( {{ number_format(Sentinel::check()->total_wdc_bal,0) }} )
                    <ul>
                        @foreach($users as $user)
                        <li class="file">(F1) {{$user->first_name}} {{$user->last_name}} <span class="badge default default-badge "> {{number_format($user->referal_bal,0)}} BCT </span> </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
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
<script>
    $(function() {
    $('.folder').on('click', function(e) {
        $(this).toggleClass('folder-open');
        e.stopPropagation();
    });

    $('.file').on('click', function(e) {
       e.stopPropagation();
    });
})
</script>
@endsection