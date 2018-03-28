@extends('layouts.master')
@section('title') BCT Coin  | Send BCT Token @endsection
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
      <h4 class="page-title">Partners / Advisors</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="{{ url('admin/users')}}">Users</a>
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
  <form class="" action="{{url('add-token')}}" method="post">
    <div class="row">
      <div class="col-sm-6"><h2>Send BCT Token</h2></div>
      <div class="col-sm-6"><h2><a class="pull-right btn btn-dark btn-sm mb-3" href="{{ url('list_user') }}">List All</a></h2></div>
      <!-- <div class="col-sm-6"><a href="/" class="pull-right"><i class="fa fa-home" aria-hidden="true"></i></a></div> -->
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="current_user_id" value="{{ $current_user_id }}">

    <div class="form-group">
    	<div  class="row">
    		<div class="col-sm-2">
    			<label for="username">Token</label>
    		</div>
    		<div class="col-sm-2">
    			<input type="text" name="user_token"  class="form-control" id="user_token" autocomplete="off">
    		</div>
    	</div>
    </div>
      <div class="form-group">
    	<div  class="row">
    		<div class="col-sm-2">
    			<label for="username">Token Price</label>
    		</div>
    		<div class="col-sm-2">
    			<input type="text" name="token-price" value="{{$setting->rate}}" class="form-control" id="token-price" autocomplete="off" readonly="">
    		</div>
    	</div>

    </div>
    <div class="form-group">
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
				  <input type="submit" class="btn-sign-in btn btn-sm mb-3  @if(!session('validator')) active @endif" value="Send BCT Token">
    		</div>

    	</div>
    </div>
      </form>
       <div class="table-responsive">
        <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sr.</th>
              <th scope="col">Username</th>
              <th scope="col">Token</th>
              <th scope="col">Rate</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($Sendtoken as $token)

            <tr>
              <th>{{ $loop->iteration }}</th>
              <td>{{ $token->user->username }}</td>
              <td>{{ $token->token }}</td>
              <td>{{ $token->rate }}</td>
              <td>{{ $token->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function()
  {

    $(document).ready(function() {
      $('#data-table').DataTable();
    });
    // check total board balance and check avilable token to buy board member .

    var board_people_coins = '{{ $setting->board_people_coins }}';
    var board_sold_coins = '{{ $setting->board_sold_coins }}';
    var available_token = board_people_coins - board_sold_coins;



    var token_price = $('#token-price').val();
      $("#user_token").keyup(function() {
        var user_token = $(this).val();

        if(user_token < available_token)
        {

          var usd_price = token_price*user_token;
          $('#total-usd').html(usd_price.toFixed(2) + ' USD');
          $(':input[type="submit"]').prop('disabled', false);
        }
        else
        {
          $(':input[type="submit"]').prop('disabled', true);
          $('#total-usd').html('Available Token is '+available_token);
        }
       });
  });
</script>
@endsection