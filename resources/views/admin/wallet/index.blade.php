@extends('layouts.master')
@section('title') BCT Coin User @endsection

@section('content')

<div class="dashboard-body">

  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title">Transaction List</h4>
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ URL('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="#">Transactions</a>
         </li>
       </ol>
    </div>
     <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Transaction List</h4>
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


             </tr>
           </thead>
           <tbody>
            <?php $i = 1;?>



           </tbody>
          </table>




        </div>
      </div>
    </div>
  </div>

</div>
@endsection




