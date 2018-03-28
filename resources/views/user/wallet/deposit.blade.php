@extends('layouts.master')
@section('title') BCT Coin Home Page @endsection
@section('style')
<style type="text/css">
button.btn.btn-danger.btn-sm , button.btn.btn-success.btn-sm {
  width: 25%;
}
.badge-warning {
  color: #fff !important;
}
h3 {
  margin-bottom: 16px;
}
.dataTables_wrapper .table th, .dataTables_wrapper .table td {
  font-size: 15px;
}
</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">
  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title"> {{ $coinType }} Deposit</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="{{ URL('user-wallet')}}">wallet</a>
            <li class="breadcrumb-item"><a href="{{ URL('user-deposit',$coinType)}}">Deposits</a>
            </li>
          </ol>
        </div>


<div class="col-sm-12">
  <p class="notificationcus">Please do not refresh or leave this page after making payment. Wait for confimation popup.</p>
  <p class="notificationcus"> {{ $coinType }} Will Be Deposited After 2 Confirmation.</p>
</div>

<div class="col-sm-4">
  <div class="card">
  <div class="card-header">
    <h4>Deposit Amount</h4>
  </div>
   <div class="card-body">

<div class="address" id="address">
  <div class='col-md-12'>
    <center>
      <div id="qrcode" style="margin-top:15px;"> </div>
      <h3>Address</h3><b>{{$coinadd->address}}</b>
    </center> 
  </div>
  <div class='mb-5'></div>
</div>
  <!--   <form class="form-horizontal theme-form mt-3 row" id="clear">
      <div class="col-md-12">
        <div class="form-group ">
          <input type="number" class="form-control" placeholder="Enter USD Amount" name="amount" id="amount" autocomplete="off" onkeyup="convertBTC()">
              <span class="help-block text-danger" id="error">
            </span>
            <br>
            <input type="text" class="form-control" placeholder=" Amount in {{$coinType}}" autocomplete="off" readonly="" id="total_usd">
        </div>
         </div>
        <div class="form-group col-md-12">
           <button name="type" type="button" onclick='get_address("{{ $coinType }}")' value="{{ $coinType }}" class="submit default-btn btn-sm" id="submit">  Generate Address </button>
        </div>
    </form> -->
  </div>
</div>
</div>

<div class="col-sm-8">
  <div class="card">
    <div class="card-header">
      <h4>{{ $coinType }} Deposit Transaction <span style="float:right"></span></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
      <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Sr.</th>
            <th scope="col">Address</th>
            <th scope="col">Txid</th>
            <th scope="col">Amount ({{ $coinType }})</th>
            <th scope="col">Amount (USD)</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;?>
          @foreach($address as $key)
          @if($key->coin_type == $coinType)
          @if($key->status != 0)
          <tr>
            <th>{{ @$i++ }}</th>

            <td>{{ @$key->address }}</td>
            <td>{{ @$key->txid }}</td>
            <td>{{ number_format(@$key->amount,8)}}</td>
            <td>{{ number_format(@$key->amount1,2)}}</td>
            <td>
           @if($key->status == 1) <span class="badge badge-danger">  Pending Confirmation  </span>
           @elseif($key->status == 100) <span class="badge badge-success"> Confirm  </span>
           @elseif($key->status == -1) <span class="badge badge-danger"> Cancelled  </span>
           @endif
           </td>
          </tr>
          @endif
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




@endsection
@section('script')
 <script src="{{asset('assets/js/qrcode.js')}}"></script>


<script>
$(document).ready(function() {
  $('#data-table').DataTable();
    makeCode();
});

var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : 200,
    height : 200
});

function makeCode () {      
    var elText = "{{$coinadd->address}}";
    
    if (!elText) {
        alert("Input a text");
       // elText.focus();
        return;
    }
    qrcode.makeCode(elText);
}

// coinPayment

           function get_address(type){
            $('.submit').prop('disabled', true);

            if($("#amount").val() > 0){
               $('#submit').html('<i class="fa fa-spinner fa-spin fa-3x fa-fw" style="font-size: 18px;"></i><span class="sr-only">Loading...</span> Generate Address');
                $.post("{{url('/getDepositAddress')}}",
                {
                    amount : $("#amount").val(),
                    type: type,
                    _token: "{{ csrf_token() }}"
                },
                function(data, status){
                    $("#token_error").removeClass('has-error');
                    $("#error").html();
                    if(data == 0){
                        $("#token_error").addClass('has-error');
                        $("#error").html('<div class="text-danger">Please enter Amount.</div>');

                    }else if(data.error=="success"){
                      //console.log(data.address);
                      var html ="<div class='col-md-12'><center><img src='"+data.qrcode_url+"' class='img-fluid'><h3>Address</h3><b>"+data.address+"</b></center> </div><div class='mb-5'></div>"
                        $('#address').html(html);
                        $('#clear').html("");
                        refreshId =  setInterval("fetchdata('"+data.txn_id+"')",4000);

                    }else{
                        $("#token_error").addClass('has-error');
                        $("#error").html('<div class="text-danger">'+data+' !!</div>');
                    }
                    $('.submit').prop('disabled', false);

                }
                );
            }
            else{
                $('.submit').prop('disabled', false);
               // $('#submit').html('<i class="fa fa-refresh fa-spin fa-3x fa-fw" style="font-size: 18px;"></i><span class="sr-only">Loading...</span>');
                $("#token_error").addClass('has-error');
                $("#error").append('<div class="col-md-12" id="errorBtc"><div class="text-danger"><b>Please enter Amount. !!</b></div></div>');
            }
        }

        function fetchdata(txid){
            $.ajax({
                  url: '/checkstatus',
                  type: 'post',
                  data:{txid:txid,_token:"{{csrf_token()}}"},
                  success: function(response){
                   // Perform operation on the return value
                    console.log(response);
                    if(response==txid){
                        clearInterval(refreshId);
                        swal({
                          type: 'success',
                          title: 'Your transaction made successfully.!',
                          html: 'Waiting for final confirmation.'
                        })
                    }
                  }
                 });
          }
        function convertBTC()
        {
          var usd_price=<?php echo $usd_price ?>;

          var coin_val=$("#amount").val();
          if(coin_val>0)
          {
             var converted_usd = (coin_val / usd_price).toFixed(8) ;
          }
          $("#total_usd").val(converted_usd);

        }
</script>
@endsection




