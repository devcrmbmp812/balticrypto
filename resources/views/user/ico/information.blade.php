@extends('layouts.master')
@section('title') BCT Coin | ICO Information @endsection
@section('style')
<style type="text/css">
button.btn.btn-warning {
color: #fff;
}
.badge-warning {
color: #fff !important;
}
</style>
@endsection
@section('content')
<?php
$slug = Sentinel::getUser()->roles()->first()->slug;
?>
<input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="dashboard-body">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title">ICO information</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ URL('user-icoInformation')}}">ICO</a>

              </li>
            </ol>
          </div>
          <div class="col-sm-4">
              <div class="card mb-4">
                 <div class="card-header">
                    <h4 class="text-center">USD Rate</h4>
                  </div>
                <div class="card-body p-5">
                  <h2 class="counter text-center ico-font">{{number_format($setting->rate,1)}}</h2>
                </div>
              </div>
          </div>

          <div class="col-sm-4">
            <div class="card mb-4">
             <div class="card-header">
              <h4 class="text-center">Total BCT Token</h4>
            </div>
            <div class="card-body p-5">
             <h2 class="counter text-center ico-font">{{number_format($setting->total_coins,0)}}</h2>
           </div>
         </div>

     </div>
   <div class="col-sm-4">
      <div class="card mb-4">
           <div class="card-header">
            <h4 class="text-center">BCT Sold</h4>
          </div>
          <div class="card-body p-5">
           <h2 class="counter text-center ico-font">{{number_format($setting->sold_coins)}}</h2>
         </div>
       </div>

     </div>

    <!--  <div class="col-sm-6">
      <div class="card icon-timer">
        <div class="card-header">
          <h4 class="text-center">ICO End at</h4>
        </div>
        <div class="card-body">
          <div class="timer-wrapper">
            <p id="timer"></p>
          </div>
        </div>
      </div>
      <div class="card icon-timer">
        <div class="card-header">
          <h4 class="text-center">BUY ICO TIME:</h4>
        </div>
        <div class="card-body">
          <div class="timer-wrapper">
            <p id="timer"></p>
          </div>
        </div>
      </div>
    </div> -->



    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>ICO Calendar</h4>
          {{--<code>ICO time: January 10 2018, 10 am -NewYork time (GMT - 5)</code>--}}
        </div>
        <div class="card-body table-responsive">

         <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
           <thead class="thead-dark">
            <tr>
       <th scope="col">Sr.</th>
          <th scope="col">Sold</th>
          <th scope="col">USD Price</th>
          <th scope="col">BTC Price</th> 
          <th scope="col">BCH Price</th>
          <th scope="col">ETH Price</th>
           </tr>
         </thead>
         <tbody>
        <?php $i = 1;
$j = 0;?>
        @foreach($rates as $key)
        <tr>
         <?php $j2 = $j + 8;?>
         <td>{{ $i++ }}</td>
         <td>{{ $j }} - {{ $j2 }} M </td>
         <td>{{ number_format($key->usd_price,2) }}</td>
         <td>{{number_format($key->usd_price/$usdofbtc,8)}}</td>
         <td>{{number_format($key->usd_price/$usdofbch,8)}}</td>
         <td>{{number_format($key->usd_price/$usdofeth,8)}}</td>
           <?php $j = $j + 8;?>
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
@section('script')

@endsection

@section('bottom_script')



@endsection