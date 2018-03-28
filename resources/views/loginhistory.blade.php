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
      <h4 class="page-title">Login History</h4>
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
         </li>
         <li class="breadcrumb-item"><a href="{{ URL('user-wallet')}}">Login History</a>
   <!--       <li class="breadcrumb-item"><a href="#!">Deposits & Withdrawals</a> -->
         </li>
       </ol>
    </div>
     <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Login History</h4>
       <!--    <code> Estimated value of holdings 236.57 USD Deposit or withdraw anytime you want</code> -->
        </div>
        <div class="card-body table-responsive">
         <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
           <thead class="thead-dark">
              <tr>
               <th scope="col">Sr.No.</th>
               <th scope="col">Timestamp</th>
               <th scope="col">Ip Address</th>
             </tr>
           </thead>
           <tbody>
                @foreach($data as $list)
                        <tr> <td> {{ $loop->iteration }}</td>
                        <td>{{ $list->created_at }}</td>
                        <td>{{ $list->ip_address }}</td>
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
    // /* _____________________________________

    //      Count down
    //      _____________________________________ */

    //      var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();
    // // Update the count down every 1 second
    // var countdownfunction = setInterval(function() {

    //     // Get todays date and time
    //     var now = new Date().getTime();

    //     // Find the distance between now an the count down date
    //     var distance = countDownDate - now;

    //     // Time calculations for days, hours, minutes and seconds
    //     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //     var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //     // Output the result in an element with id="timer"
    //     document.getElementById("timer").innerHTML = "<span>" + days + "<span class='timer-cal'>d</span></span> :" + "<span>" + hours + "<span class='timer-cal'>h</span></span> :"
    //     + "<span>" + minutes + "<span class='timer-cal'>m</span></span> :" + "<span>" + seconds + "<span class='timer-cal'>s</span></span> ";
    //     document.getElementById("timer-modal").innerHTML = "<span>" + days + "<span class='timer-cal'>d</span></span> :" + "<span>" + hours + "<span class='timer-cal'>h</span></span> :"
    //     + "<span>" + minutes + "<span class='timer-cal'>m</span></span> :" + "<span>" + seconds + "<span class='timer-cal'>s</span></span> ";

    //     // If the count down is over, write some text
    //     if (distance < 0) {
    //       clearInterval(countdownfunction);
    //       document.getElementById("timer").innerHTML = "EXPIRED";
    //     }
    //   }, 1000);

    // function openNav() {
    //   document.getElementById("mySidenav").style.width = "250px";
    //   document.getElementById("main").style.display = "none";
    //   document.getElementById("close-sidebar").style.display = "inline-block";
    //   document.getElementById("dashboard-body").style.marginLeft = "250px";
    // }

    // function closeNav() {
    //   document.getElementById("mySidenav").style.width = "0";
    //   document.getElementById("main").style.display= "inline-block";
    //   document.getElementById("close-sidebar").style.display = "none";
    //   document.getElementById("dashboard-body").style.marginLeft= "0";
    // }

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