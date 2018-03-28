@extends('layouts.master')
@section('title') BCT Coin  | Manage Users @endsection
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
      <h4 class="page-title">Manage {{$lable}}</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="">{{$lable}}</a>
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
              <th scope="col">Sr.</th>
              <th scope="col">Username</th>
              <th scope="col">Ref Username</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">BTC</th>
              <th scope="col">ETH</th>
              <th scope="col">USD</th>
              <th scope="col">BCT</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
              <th scope="col">Disable 2FA</th>
              <!--    <th scope="col">Transaction</th> -->
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;?>
            @foreach($users as $user)
            @if($user->user)
            @if($user->user->is_delete == 1)
            <tr>
              <th>{{ $i++ }}</th>
              <td>{{ $user->user->username }}</td>
              <td>{{ @$user->parent->username }}</td>
              <td>{{ $user->user->first_name }}</td>
              <td>{{ $user->user->last_name }}</td>
              <td>{{ $user->user->email }}</td>
              <td>{{ number_format($user->user->total_btc_bal,8) }}</td>
              <td>{{ number_format($user->user->total_eth_bal,8) }}</td>
              <td>{{ number_format($user->user->total_usd_bal,2) }}</td>
              <td>{{ number_format($user->user->total_wdc_bal,0) }}</td>
              <td>
                @if($user->user->status == 0 )
                <span class="badge badge-danger">Suspended</span>
                @elseif($user->user->status == 1)
                <span class="badge badge-success">Active</span>
                @elseif($user->user->status == 2)
                <span class="badge badge-warning">Pending </span>
                @endif
              </td>
              <td>
                @if($user->user->status == 1)
                <button onclick="userStatus({{$user->user->id}},'0')"  class="btn btn-danger btn-sm">Block</button>
                @elseif($user->user->status == 0)
                <button  onclick="userStatus({{$user->user->id}},'1')" class="btn btn-success btn-sm">Activate</button>
                @elseif($user->user->status == 2)
                <button  onclick="userStatus({{$user->user->id}},'1')" class="btn btn-success btn-sm">Activate</button>
                @endif
                <button class="btn btn-danger btn-sm" onclick="deleteUser({{$user->user->id}},'0')"><i class="fa fa-trash"></i>&nbsp;Delete</button>
              </td>
              <td>
                @if($user->user->google2fa_enable == 1)
                <button class="btn btn-info btn-sm" onclick="disable2fa({{$user->user->id}},'0')">&nbsp;Disable</button>
                @else
                -
                @endif
              </td>
              <!--  <td>
                <a  href="{{ url('admin-transaction',$user->user->id) }}" class="btn btn-success btn-sm">Show Transaction</a>
              </td> -->
            </tr>
            @endif
            @endif
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
// User Active Or Block
function userStatus(arg1, arg2) {
    var url = '{{ url("changeUserStatus") }}';
    var _token = $("#_token").val();
    if (arg2 == '0') { // user status is 0
        swal({
                title: "Are you sure you want ​to Block?",
                text: "You really sure you want to​ block!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Block it!",
                closeOnConfirm: false
            },
            function() {
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        '_token': _token,
                        'user_id': arg1,
                        'status': arg2
                    },
                    success: function(result) {
                        if (result == 0) {
                            swal("Blocked!", "Your User is Block.", "success");
                            window.location.reload();
                        } else // user status is 1
                        {
                            $('#inner_msg').html('<strong>User Status Can not verify.</strong>');
                        }
                    }
                });
            });
    } else {
        swal({
                title: "Are you sure you want ​to Activate?",
                text: "You really sure you want to​ Activate !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Activate it!",
                closeOnConfirm: false
            },
            function() {
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        '_token': _token,
                        'user_id': arg1,
                        'status': arg2
                    },
                    success: function(result) {
                        if (result == 0) {
                            swal("Activated!", "Your User is Activated.", "success");
                            window.location.reload();
                        } else {
                            $('#inner_msg').html('<strong>User Status Can not verify.</strong>');
                        }
                    }
                });
            });
    }
}
// Delete User
function deleteUser(arg1, arg2) {
    var url = '{{ url("deleteUser") }}';
    var _token = $("#_token").val();
    swal({
            title: "Are you sure To Delete?",
            text: "You Really Sure Of Delete !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete it!",
            closeOnConfirm: false
        },
        function() {
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    '_token': _token,
                    'user_id': arg1,
                    'deleteStatus': arg2
                },
                success: function(result) {
                    if (result == 0) {
                        swal("Deleted!", "Your User is Deleted.", "success");
                        window.location.reload();
                    } else {
                        $('#inner_msg').html('<strong>User Status Can not verify.</strong>');
                    }
                }
            });
        });
}
// disable2fa
function disable2fa(arg1, arg2) {
    var url = '{{ url("disable2fa") }}';
    var _token = $("#_token").val();
    swal({
            title: "Are you sure To Disable 2fa?",
            text: "You Really Sure Of Disable 2fa !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Disable it!",
            closeOnConfirm: false
        },
        function() {
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    '_token': _token,
                    'user_id': arg1,
                    'Status': arg2
                },
                success: function(result) {
                    if (result == 0) {
                        swal("Disabled!", "Your User's 2fa is Disabled.", "success");
                        window.location.reload();
                    } else {
                        $('#inner_msg').html('<strong>User Status Can not verify.</strong>');
                    }
                }
            });
        });
}
</script>
@endsection