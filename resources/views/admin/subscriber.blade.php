@extends('layouts.master')
@section('title') BCT Coin  | Subscriber @endsection
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
      <h4 class="page-title">Subscriber</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="">Subscriber</a>
    </li>
  </ol>
</div>
</div>
<div class="row">
<div class="col-sm-12">
  <div class="card">
    <div class="card-body">
      <!-- <table class="table table-striped data-table"> -->
      <div class="table-responsive">
        <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sr.</th>
              <th scope="col">Email</th>
              <th scope="col">Created on</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;?>
            @foreach($subscribers as $subscriber)
            <tr>
              <th>{{ $i++ }}</th>
              <td>{{ $subscriber->email }}</td>
              <td>{{ $subscriber->created_at }}</td>
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
  $(document).ready(function() {
    $('#data-table').DataTable();
});
</script>
@endsection