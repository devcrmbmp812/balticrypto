@extends('layouts.master')
@section('title') BCT Coin Bounty @endsection

@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<?php
// check admin or user
$slug = Sentinel::getUser()->roles()->first()->slug;
?>
<div class="dashboard-body">
   <div class="row">
      <div class="col-sm-12">
         <h4 class="page-title">Users Bounty</h4>
         <ol class="breadcrumb">
             @if($slug == 4)
            <li class="breadcrumb-item"><a href="{{ url('support/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                 @else
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
             @endif
            <li class="breadcrumb-item"><a href="#">User's Bounty Screenshots</a>
      </li>
   </ol>
</div>
</div>

   @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
   @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif


<div class="mb-3"></div>

<div class="mb-4"></div>
<div class="row">
<div class="col-sm-12">



    @if($slug == 4)
        <a href="{{ url('support/bounty') }}"><button class="btn btn-success"> << Back</button></a>
        <?php $url= url('support/give_to_user') ; ?>
    @else
        <a href="{{ url('admin-bounty') }}"><button class="btn btn-success"> << Back</button></a>
        <?php $url= url('give_to_user') ; ?>
    @endif
   <div class="card">
      <div class="card-body">

          <h4>Bounty For {{ $bounty_full->service  }} Service</h4>
          <div id="msg">
          </div>
           <table class="table">
               <tr>
                   <td><b>Screenshot Details</b></td>
                   <td>
                       <img src="{{ url('/') }}/upload/bounty/{{ $bounty_full->document }}" height="200px;" />
                   </td>
               </tr>
                    <tr>
                   <td><b>User Details</b></td>
                   <td>
                     <b>UserName : </b> {{ $bounty_full->user->username }}<br>
                     <b>Email : </b> {{ $bounty_full->user->email }}<br>
                   </td>
               </tr>
           </table>

                    @if($bounty_full->status == 0)

                         <span id="fill_here"><button class="btn btn-success" onclick="show_input()">Accept</button></span>
                      @if($slug == 4)
                  <a href="{{ url('support/bounty_reject',$bounty_full->id) }}"><button class="btn btn-danger">Reject</button></a>
                      @else
                  <a href="{{ url('bounty_reject',$bounty_full->id) }}"><button class="btn btn-danger">Reject</button></a>
                      @endif


                        @elseif($bounty_full->status == 1)
                        <i class="fa fa-check" aria-hidden="true"></i>&nbsp; Approve
                        @elseif($bounty_full->status == 2)
                         <i class="fa fa-times" aria-hidden="true"></i>&nbsp;Reject
                        @else
                        @endif

      </div>
   </div>
</div>
</div>
</div>
</div>

<input type="hidden"  name="main_id" id="main_id" value="{{ $bounty_full->id }}">
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

<script type="text/javascript">
  function show_input()
  {
    $('#fill_here').empty();
    $('#fill_here').append("<label>Enter Token To Give User</label><input type='text' placeholder='Enter Token To Give User' class='form-control' id='give_token'><button class='btn btn-success' onclick='give_coin()'> Give</button><button type='reset' class='btn btn-danger' > Cancel</button><hr>");
  }

  function give_coin()
  {
      var _token = $('#_token').val();
      var give_coin=$('#give_token').val();
      var main_id=$('#main_id').val();

      if(isNaN(give_coin)){
          alert('is not a number ');

      }else{
          alert('is not a number 1');
      }

       $.ajax({

        url: "{{$url}}",
        method : "post",
        data : { '_token' : _token, 'give_coin':give_coin, 'main_id':main_id },
        success: function(result)
        {
          if(result==1)
          {
               $('#msg').append("<div class='alert alert-success'><strong>Success!</strong> Approve Bounty Document And Give Token To User Successfully.</div>");
               setTimeout(function(){window.location.reload(1);},3000);

          }
          else
          {

          }
        }
    });
  }
</script>


@endsection
