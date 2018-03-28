@extends('layouts.master')
@section('title') BCT Coin  | Withdrawal Request  @endsection
@section('style')
<style type="text/css">
span.badge.badge-warning {
    color: #fff;
}
</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">
   <div class="row">
      <div class="col-sm-12">
         <h4 class="page-title">Withdrawal Request</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="{{ url('admin-withdrawal') }}">Withdrawal Request</a>
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
         <!-- <table class="table table-striped data-table"> -->
         <div class="table-responsive">
         <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
            <thead class="thead-dark">
               <tr>
             <tr>
                 <th scope="col">Id</th>
                 <th scope="col">Username</th>
                 <th scope="col">Address</th>
                 <th scope="col">Status</th>
                 <th scope="col">Amount</th>
                 <th scope="col">Coin Type</th>
                 <th scope="col">Create Date</th>
                 <th scope="col">Action</th>

              </tr>
               </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
            @foreach($withdraws as $withdraw)

           <tr>
               <th scope="row">{{$i++}}</th>
                 <td>{{ @$withdraw->user->username }}</td>
               <td>{{$withdraw->address}}</td>

               <td>@if($withdraw->admin_status == 0)
               <span class="badge badge-warning"> Pending </span>
               @elseif($withdraw->admin_status == 1)
                <span class="badge badge-success"> Approved </span>
               @elseif($withdraw->admin_status == 2)
               <span class="badge badge-danger"> Rejected </span>
               @endif </td>
               <td>{{number_format($withdraw->amount,8)}}</td>
               <td>
                  <?php  echo strtoupper($withdraw->coin); ?>
               </td> 
               <td>{{$withdraw->created_at}}</td>
               <td>
                    @if($withdraw->admin_status == 0)
                     <button onclick="confirmStatus('{{$withdraw->id}}','1')"  class="btn btn-success btn-sm"> Confirm </button>
                       <button onclick="rejectStatus('{{$withdraw->id}}','2')"  class="btn btn-danger btn-sm"> Reject </button>
                      @else
                      -
                       @endif

               </td>
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
<script>
$(document).ready(function() {
$('#data-table').DataTable();
});

// User confirmStatus Withdraw

function confirmStatus(arg1,arg2)
    {
         var url = '{{ url("confirmStatus") }}';
         var _token=$("#_token").val();

              swal({
              title: "Are you sure you want ​to Confirm?",
              text: "You really sure you want to​ confirm!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, Confirm it!",
              closeOnConfirm: false
            },
            function(){
                $.ajax({
                url: url,
                method:'post',
                data: { '_token' : _token,  'wid':arg1,'status':arg2 },
                success:function(result)
                {
                   if(result==0)
                    {
                         swal("Confirmed", "User Withdrawal Request is Confirmed.", "success");
                         window.location.reload();
                    }
                    else if(result == 1)
                    {

                        swal("Failed", "Insuficient balance.", "danger");


                           }
                }
              });
            });
    }


    //reject

    function rejectStatus(arg1,arg2)
    {
         var url = '{{ url("rejectStatus") }}';
         var _token = $("#_token").val();

              swal({
              title: "Are you sure To Reject?",
              text: "You Really Sure Of Reject !",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, Reject it!",
              closeOnConfirm: false
            },
            function(){
                $.ajax({
                url: url,
                method:'post',
                data: { '_token' : _token,  'wid':arg1, 'status':arg2},
                success:function(result)
                {
                   if(result==0)
                    {
                         swal("Rejected", "User Withdrawal Request is Rejected.", "success");
                         window.location.reload();
                    }
                    else
                    {    $('#inner_msg').html('<strong>User Status Can not verify.</strong>');    }
                }
              });
            });
    }
</script>
@endsection