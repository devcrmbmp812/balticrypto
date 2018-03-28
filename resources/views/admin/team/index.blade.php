@extends('layouts.master')
@section('title') BCT Coin  | Team Member @endsection
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
      <h4 class="page-title">Manage Team Member</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="">Manage Team Member</a>
    </li>
  </ol>
</div>
</div>

<div class="row">
<div class="col-sm-12">
  @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
  @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
      <div class="row">
          <div class="col-sm-12 pb-2 pr-2">
              <a href="{{route('team-member.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New</a>
          </div>
      </div>
  <div class="card">
    <div class="card-body">
      <!-- <table class="table table-striped data-table"> -->
      <div class="table-responsive">
        <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sr.</th>
              <th scope="col">Name</th>
              <th scope="col">Image</th>
              <th scope="col">Designation</th>
              <th scope="col">Email</th>
              <th scope="col">FB link</th>
              <th scope="col">Telegram link</th>
              <th scope="col">Sorting</th>
              <th scope="col">Type</th>
              <th scope="col">Status</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;?>
            @foreach($user_data as $key)

            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $key->name }}</td>
              <td><img src="{{asset('assets/images/user/team_member').'/'. $key->image }}"></td>
              <td>{{ strip_tags($key->designation) }}</td>
              <td>{{ $key->email }}</td>
              <td>{{ $key->fblink }}</td>
              <td>{{ $key->telegram }}</td>
              <td>{{ $key->sorting }}</td>
              <td>
                      @if($key->type==0){{'Founders' }}
                      @elseif($key->type == 1){{'Support '}}
                      @elseif($key->type == 2){{'Technical Team'}}
                      @elseif($key->type == 3){{'Creative Team'}}
                      @elseif($key->type == 4){{'Advisors'}}
                      @endif
              </td>
              <td>{{ $key->status==0?"Show":"" }}</td>
              <td>{{date_format($key->created_at,'Y-m-d H:i') }}</td>
              <td>
                  <button type="button" class="btn btn-primary  btn-sm mb-1" data-toggle="modal" data-target="#exampleModal{{$key->id}}">
                      <i class="fa fa-eye">Show</i>
                  </button>
                  <a class="btn btn-info btn-sm mb-1" href="{{route('team-member.edit',$key->id)}}"><i class="fa fa-edit"></i>Edit</a>
                  <button class="btn btn-danger btn-sm" onclick="deleteUser({{$key->id}})"><i class="fa fa-trash"></i>Delete</button>
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

@foreach($user_data as $key)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$key->name}}({{$key->designation}})</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <hr>


                <div class="row">

                   <div class="col-md-3"></div>
                   <div class="col-md-7">
                       <img src="{{asset('assets/images/user/team_member').'/'. $key->image }}"><hr>
                       <label><b>Name : </b>{{$key->name}}</label><p></p>
                       <label><b>Designation : </b>{!! $key->designation !!}</label><p></p>
                       <label><b>Description : </b><p class="text-dark">{!! $key->description !!}</p></label><p></p>
                       <label><b>Email : </b>{{$key->email}}</label><p></p>
                       <label><b>Fblink : </b>{{$key->fblink}}</label><p></p>
                       <label><b>Telegram : </b>{{$key->telegram}}</label><p></p>
                       <label><b>Sorting : </b>{{$key->sorting}}</label><p></p>
                       <label><b>Type : </b>
                           @if($key->type==0){{'Founders' }}
                           @elseif($key->type == 1){{'Support'}}
                           @elseif($key->type == 2){{'Technical Team'}}
                           @elseif($key->type == 3){{'Creative Team'}}
                           @elseif($key->type == 4){{'Advisors'}}
                           @endif</label><p></p>
                       <label><b>status : </b>{{$key->status==0?'Show':''}}</label><p></p>
                   </div>
                   <div class="col-md-2"></div>

               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    @endforeach


@endsection
@section('script')

<script>
$(document).ready(function() {
    $('#data-table').DataTable();
});
// User Active Or Block

// Delete User
function deleteUser(arg1) {
    var url = '{{ url("admin/team-member")}}';
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
                url: url+"/"+arg1,
                method: 'DELETE',
                data: {
                    '_token': _token,
                    'user_id': arg1,
                    'deleteStatus': arg1
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
</script>
@endsection