@extends('layouts.master')
@section('title') BCT Coin  | User Referral List @endsection
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
      <h4 class="page-title">User Referral List</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="">{{'User Referral List'}}</a>
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
              <th scope="col">Name</th>
              <th scope="col">Ref Username</th>
              <th scope="col">Ref Email</th>

              <!--    <th scope="col">Transaction</th> -->
            </tr>
          </thead>
          <tbody>
          <?php $i=1;?>
            @foreach($parent as $user)
            @if(count($user->parent)> 0)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $user->first_name.' '.$user->last_name }}</td>
                <td>
                    @foreach($user->parent as $key)
                        <p class="text-dark">{{$key->first_name.' '.$user->last_name}}</p>
                    @endforeach
                </td>
                <td>
                    @foreach($user->parent as $key)
                        <p class="text-dark">{{$key->email}}</p>
                    @endforeach
                </td>

            </tr>
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


@endsection