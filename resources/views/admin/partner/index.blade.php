@extends('layouts.master')
@section('title') BCT Coin  | Partner @endsection
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
      <h4 class="page-title">Partner</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="">Partner</a>
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
              <th scope="col">Link</th>
              <th scope="col">Image</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;?>
            @foreach($partner as $key)

            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $key->link }}</td>
              <td><img src="{{asset('assets/images/user/partner').'/'. $key->image }}"></td>
              <td>{{ date_format($key->updated_at,'Y-m-d H:i') }}</td>
              <td>
                  <a class="btn btn-info btn-sm mb-1" href="{{route('partner.edit',$key->id)}}"><i class="fa fa-edit"></i>Edit</a>
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

// disable2fa
</script>
@endsection