@extends('layouts.master')
@section('title') BCT Coin User @endsection

@section('content')

<div class="dashboard-body">

  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title">Withdraw List</h4>
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ URL('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="#">Withdraw</a>
         </li>
       </ol>
    </div>
     <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Withdraw List</h4>
        </div>
         <br>
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <br>
        <div class="card-body">
         <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
           <thead class="thead-dark">
              <tr>
               <th scope="col">Sr No.</th>
               <th scope="col">User Details</th>
               <th scope="col">Withdrawal Details</th>
               <th scope="col">Withdrawal ID</th>
               <th scope="col">Status</th>
              </tr>
           </thead>
           <tbody>
            <?php $i = 1;?>
            @foreach($withdraw_data as $key)
            <tr>
              <td>{{ $i++ }}</td>
              <td><b>Full Name : </b>{{ $key->user->first_name }}&nbsp;{{ $key->user->last_name }}<br>
                  <b>UserName : </b>{{ $key->user->username }}<br>
                  <b>Email : </b>{{ $key->user->email }}</td>
             <td><b>User Address : </b>{{ $key->address }}<br>
                  <b>Currency Name : </b>{{ $key->coin }}<br>
                  <b>Amount : </b>{{ $key->amount }}</td>
                  <td>{{ $key->withdraw_id  }}</td>
                  <td>
                    @if($key->admin_status==0)  Pending
                    @elseif($key->admin_status==1) Approved
                    @elseif($key->admin_status==2) Cancelled
                    @else
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
@endsection




