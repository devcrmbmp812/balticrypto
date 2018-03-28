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
         </li>
         <li class="breadcrumb-item"><a href="">User's Bounty </a>
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

    <?php
    // check admin or user
    $slug = Sentinel::getUser()->roles()->first()->slug;
    ?>

   <div class="card">
      <div class="card-body table-responsive">
         <!-- <table class="table table-striped data-table"> -->
         <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
            <thead class="thead-dark">
               <tr>
                  <th scope="col">Sr.</th>
                  <th scope="col">User Detail</th>
                  <th scope="col">Bounty Screenshots</th>
                  <th scope="col">Status</th>
               </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @foreach($bounty_data as $key)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td><b>UserName : </b>{{ $key->user->username }}<br>
                      <b>Email : </b>{{ $key->user->email }}<br></td>
                    <td> 
                           @if($slug == 4)
                         <a href="{{ url('support/bounty_show',$key->id) }}"><button class="btn btn-success"><i class="fa fa-eye"></i>&nbsp;View</button></a>
                           @else
                         <a href="{{ url('bounty_show',$key->id) }}"><button class="btn btn-success"><i class="fa fa-eye"></i>&nbsp;View</button></a>
                          @endif
                     
                      </td>
                    <td>
                        @if($key->status == 0)
                        <i class="fa fa-spinner" aria-hidden="true"></i>&nbsp;pending
                        @elseif($key->status == 1)
                        <i class="fa fa-check" aria-hidden="true"></i>&nbsp; Approve
                        @elseif($key->status == 2)
                         <i class="fa fa-times" aria-hidden="true"></i>&nbsp;Reject
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
</div>


@endsection
