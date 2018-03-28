@extends('layouts.master')
@section('title') BCT Coin  | Edit ICO Setting @endsection
@section('style')
<link href="{{ URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">
   <div class="row">
      <div class="col-sm-12">
         <h4 class="page-title">Edit ICO Setting</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('#') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
        <li class="breadcrumb-item"><a href="{{url('admin-setting')}}">ICO Setting</a>
        <li class="breadcrumb-item"><a href="{{url('#')}}">Edit API Setting</a>
      </li>
   </ol>
</div>
</div>
<div class="row">
<div class="col-sm-12">
   @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
   @if(session('success'))<br><div class="alert alert-success">{{ session(BCT) }}</div><br>@endif
   <div class="card">
      <div class="card-body">

      <form class="form-horizontal" action="{{ url('admin-storeSetting',$key->id) }}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">

      <div class="input-group date-time col-md-12" id="datetimepicker">
        <label for="exampleInputEmail1">Ico Start Date :</label>
          <input class="form-control"  type="text" name="sdate" value="{{ $key->ico_start_date }}" data-date-format="YYYY-MM-DD HH:mm:ss" />
          <span class="input-group-addon">
            <span class="fa fa-calendar"></span>
          </span>
        </div>

        <div class="input-group date-time col-md-12" id="datetimepicker1">
          <label for="exampleInputEmail1">Ico End Date :</label>
          <input class="form-control" type="text" name="edate" value="{{ $key->ico_end_date }}"  data-date-format="YYYY-MM-DD HH:mm:ss" /><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>




      <!-- <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Ico Start Date :</label>
                <input  type="text" name="sdate" class="form-control" value="{{ $key->ico_start_date }}" id="exampleInputEmail1" autocomplete="off" >
      </div>
      <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Ico End Date :</label>
                <input  type="text" name="edate" class="form-control" value="{{ $key->ico_end_date }}" id="exampleInputEmail1" autocomplete="off" >
      </div> -->

     <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Admin Email :</label>
                <input type="text" name="email" class="form-control" value="{{ $key->email }}" id="exampleInputEmail1" autocomplete="off" >
      </div>
      <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Total Coins :</label>
                <input type="text" name="tcoin" class="form-control" value="{{ $key->total_coins }}" id="tcoin" autocomplete="off" >
      </div>
       <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Rate (In USD) :</label>
                <input type="text" name="rate" class="form-control" value="{{ $key->rate }}" id="rate" autocomplete="off" >
      </div>
      <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Referral Commission (%):</label>
                <input type="text" name="ref_percentage" class="form-control" value="{{ $key->ref_percentage }}" id="ref_percentage" autocomplete="off" >
      </div>

       <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Public Key (Coinpayment API) :</label>
                <input type="text" name="pbkey" class="form-control" value="{{ $key->public_key }}" id="pbkey" autocomplete="off" >
      </div>
      <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Private Key (Coinpayment API) :</label>
                <input type="text" name="prkey" class="form-control" value="{{ $key->private_key }}" id="prkey" autocomplete="off" >
      </div>
       <div class="form-group col-md-12">

<label class="switch">
  <input type="checkbox" value="0" name="transfer" @if($key->transfer == 1) checked @endif>
  <span class="slider round"></span>
</label>
<br>
<span>If Enable This feature User can transfer token to each other.</span>
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
<script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/index.js') }}" type="text/javascript"></script> 
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'editor1' );
CKEDITOR.dtd.a.div = 1;
CKEDITOR.dtd.a.i = 1;
CKEDITOR.dtd.$removeEmpty.i = 0;
CKEDITOR.config.allowedContent = true;
</script>

 <script type="text/javascript">
        $(function () {
            $('.exampleInputEmail1').datetimepicker({
                daysOfWeekDisabled: [0, 6]
            });
        });
    </script>


@endsection