@extends('layouts.master')
@section('title') BCT Coin Home Page @endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">


<div class="dashboard-body">

  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title">Deposits & Withdrawals</h4>
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="{{ URL('user-wallet')}}">wallet</a>
   <!--       <li class="breadcrumb-item"><a href="#!">Deposits & Withdrawals</a> -->
         </li>
       </ol>
    </div>
     <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Deposits & Withdrawals</h4>
       <!--    <code> Estimated value of holdings 236.57 USD Deposit or withdraw anytime you want</code> -->
        </div>
        <div class="card-body">
         <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
           <thead class="thead-dark">
              <tr>
               <th scope="col">Coin</th>

               <th scope="col">Name</th>
               <th scope="col">Total Balance</th>

               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
              <tr>
                 <th scope="row" class="sorting_1"><img src="{{ url('assets/images/bitcoin.png') }}" alt="BTC"></th>
                 <td>BTC</td>
                 <td>{{number_format(Sentinel::getUser()->total_btc_bal,8)}} BTC</td>
                 <td>
                     <a href="{{ url('user-deposit/BTC') }}"> <button type="button" class="btn btn-outline-dark  btn-sm">Deposit</button></a>
                  <a href="{{ url('user-withdraw/BTC') }}"><button type="button"  class="btn btn-dark  btn-sm">Withdraw</button></a>
                 </td>
              </tr>
              <tr>
                 <th scope="row" class="sorting_1"><img src="{{ url('assets/images/bitcoin.png') }}" alt="BCH"></th>
                 <td>BCH</td>
                 <td>{{number_format(Sentinel::getUser()->total_bch_bal,8)}} BCH</td>
                 <td>
                     <a href="{{ url('user-deposit/BCH') }}"> <button type="button" class="btn btn-outline-dark  btn-sm">Deposit</button></a>
                  <a href="{{ url('user-withdraw/BCH') }}"><button type="button"  class="btn btn-dark  btn-sm">Withdraw</button></a>
                 </td>
              </tr>

              <tr>
                <th scope="row" class="sorting_1"><img src="{{ url('assets/images/icon-eth.png') }}" alt="ETH"></th>
                <td>ETH</td>
                <td>{{number_format(Sentinel::getUser()->total_eth_bal,8)}} ETH</td>
                <td>
                     <a href="{{ url('user-deposit/ETH') }}"> <button type="button" class="btn btn-outline-dark  btn-sm">Deposit</button></a>
                   <a href="{{ url('user-withdraw/ETH') }}"> <button  type="button" class="btn btn-dark  btn-sm" >Withdraw</button></a>
                 </td>
              </tr>

               <tr>
               <th scope="row" class="sorting_1">
                <img src="{{ url('assets/images/BCT-ICON.png') }} " alt="BCT"></th>

               <td>BCT</td>
               <td>{{number_format(Sentinel::getUser()->total_wdc_bal,8)}} BCT</td>
               <td>
                <a href="{{ url('user-withdraw-wds/BCT') }}"><button type="button"  class="btn btn-dark  btn-sm">Withdraw</button></a>
               </td>
               </tr>


           </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('script')
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<!-- popper js-->
<script src="{{asset('assets/js/popper.min.js')}}" type="text/javascript"></script>
<!-- DataTables jquery-->
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap.js')}}" type="text/javascript"></script>
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function() {
$('#data-table').DataTable();
});
</script>

<script>

    $(document).ready(function() {
        $('#data-table').DataTable();
        $('#data-table-1').DataTable();
        //menu left toggle

        $('.toggle-nav').click(function() {
            // alert('done');
            $this = $(this);
            $nav = $('.nice-nav');
            //$nav.fadeToggle("fast", function() {
            //  $nav.slideLeft('250');
            //  });

            $nav.toggleClass('open');

        });
        $('.body-part').click(function(){
            $nav.addClass('open');
        });
        //  $nav.addClass('open');

//        //drop down menu
//        $submenu = $('.child-menu-ul');
//        $('.child-menu .toggle-right').on('click', function(e) {
//            e.preventDefault();
//            $this = $(this);
//            $parent = $this.parent().next();
//            // $parent.addClass('active');
//            $tar = $('.child-menu-ul');
//            if (!$parent.hasClass('active')) {
//                $tar.removeClass('active').slideUp('fast');
//                $parent.addClass('active').slideDown('fast');
//
//            } else {
//                $parent.removeClass('active').slideUp('fast');
//            }
//
//        });

    });
</script>

@endsection