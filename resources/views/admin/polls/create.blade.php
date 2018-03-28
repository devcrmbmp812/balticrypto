@extends('layouts.master')
@section('title') BCT Coin  | Add Polls @endsection
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
      <h4 class="page-title">Polls</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="{{ url('admin/polls')}}">Polls</a>
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
  <form class="" action="{{route('polls.store')}}" method="post">
    <div class="row">
      <div class="col-sm-6"><h2>Polls</h2></div>
      <div class="col-sm-6"><h2><a class="pull-right btn btn-dark btn-sm mb-3" href="{{route('polls.index')}}">List All</a></h2></div>
      <!-- <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div> -->
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="current_user_id" value="">

    <div class="form-group">
    	<div  class="row">
    		<div class="col-sm-2">
    			<label for="question">Question</label>
    		</div>
    		<div class="col-sm-2">
    			<input type="text" name="question"  class="form-control"  autocomplete="off">
    		</div>
    	</div>
    </div>
    <div class="form-group">
    <h3>(Add all options and check correct answer from option.)</h3>
      <div  class="row">
        <div class="col-sm-2">
          <label for="username">Options</label>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-info" onclick="addperiod();">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Period
          </button>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div  class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
          <input type="radio" name="answer" value="1" />
          <input type="text" name="options[1][type]" class="form-control" required placeholder="Enter option">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div  class="row">
       <div class="col-sm-2"></div>
        <div class="col-sm-2">
          <input type="radio" name="answer" value="2" />
          <input type="text" name="options[2][type]" class="form-control" required placeholder="Enter option">
        </div>
      </div>
    </div>
    <div id="new-options">

    </div>
   <!--  <div class="form-group"> 
        <button type="button" class="btn btn-info" onclick="addperiod();">
          <i class="fa fa-plus" aria-hidden="true"></i> Add Period
        </button>
    </div> -->
   
    <data></data><div class="form-group">
      <div class="row">
        <div class="col-sm-2 ">
        </div>
        <div class="col-sm-4 ">
          <span style="color: red;" id="total-usd" name="total-usd"></span>
            <!-- <input type="text" placeholder="USD Amount" name="total-usd" value="" class="form-control" id="total-usd" autocomplete="off" readonly=""> -->
        </div>
      </div>
    </div>
    <div class="form-group">
    	<div  class="row">
    		<div class="col-sm-2">
				  <input type="submit" class="btn-sign-in btn btn-sm mb-3  @if(!session('validator')) active @endif" value="Add Poll">
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
@endsection
@section('script')
 <script type="text/javascript">
      var i = 3;
      function addperiod(){
        if(i>8){ alert("You can add max 8 options only." ); }
        else{
          var add ='<div id="removeThis'+i+'"><div class="form-group"> <i class="fa fa-times" aria-hidden="true" style="color:red; cursor: pointer;" onclick="remove('+i+');"> Remove This Period</i>  <div class="form-group"><div  class="row"> <div class="col-sm-2"></div><div class="col-sm-2"><input type="radio" name="answer" value="'+i+'" /> <input type="text" name="options['+i+'][type]" class="form-control" required placeholder="Enter option"> </div></div></div></div></div>';
          $('#new-options').append(add);
          i = i+1;
        }
      }

      function remove($id){
        $('#removeThis'+$id).remove();  
      }

    </script> 
@endsection