@extends('layouts.master')
@section('title') BCT Coin  | Negotiations @endsection
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
      <h4 class="page-title">Negotiations</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="">Negotiations</a>
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
              <a href="{{route('negotiation.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New</a>
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
              <th scope="col">Link</th>
              <th scope="col">Image</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;?>
            @foreach($negotiation as $key)

            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $key->link }}</td>
              <td><img src="{{asset('assets/images/user/negotiation').'/'. $key->image }}"></td>
                <td>{{ date_format($key->updated_at,'Y-m-d H:i') }}</td>
              <td>
                  <a class="btn btn-info btn-sm mb-1" href="{{route('negotiation.edit',$key->id)}}"><i class="fa fa-edit"></i>Edit</a>
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
@endsection
@section('script')

<script>
$(document).ready(function() {
    $('#data-table').DataTable();
});
// User Active Or Block

// Delete User
function deleteUser(arg1) {
    var url = '{{ url("admin/negotiation")}}';
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