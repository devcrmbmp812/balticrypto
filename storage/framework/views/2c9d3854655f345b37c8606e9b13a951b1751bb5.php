<!-- latest jquery-->
<script src=" <?php echo e(asset('assets/js/jquery-3.2.1.min.js')); ?>" ></script>

<!--Jarallax JS-->
<!-- <script src="assets/js/jarallax.min.js"></script> -->

<!--OWL Carousel JS -->
<script src="<?php echo e(asset('assets/js/owl.carousel.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.carouFredSel-6.0.4-packed.js')); ?>"></script>

<!--Scroll Reveal JS-->
<script src="<?php echo e(asset('assets/js/scrollreveal.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/modernizr-custom.js')); ?>"></script>

<!-- Counter js-->
<script src="<?php echo e(asset('assets/js/jquery.waypoints.min.js')); ?>" ></script>
<script src="<?php echo e(asset('assets/js/jquery.counterup.js')); ?>" ></script>
<?php echo $__env->yieldContent('script'); ?>
<!-- popper js-->
<script src="<?php echo e(URL::asset('assets/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(URL::asset('assets/js/sweetalert.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>" ></script>

<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>" ></script>
<?php echo $__env->yieldContent('bottom_script'); ?>
<!-- Navbar js -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/js/bootstrap-4-navbar.js')); ?>"> -->
<script type="text/javascript">
    $( document ).ready( function () {
    $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
        var $el = $( this );
        var $parent = $( this ).offsetParent( ".dropdown-menu" );
        if ( !$( this ).next().hasClass( 'show' ) ) {
            $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
        }
        var $subMenu = $( this ).next( ".dropdown-menu" );
        $subMenu.toggleClass( 'show' );

        $( this ).parent( "li" ).toggleClass( 'show' );

        $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
            $( '.dropdown-menu .show' ).removeClass( "show" );
        } );

        if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
            $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
        }

        return false;
    } );
} );
</script>

<!-- Theme js-->
<script src="<?php echo e(asset('assets/js/script.js')); ?>" ></script>
<!-- <script src="assets/js/front.js" ></script> -->

<script src="<?php echo e(asset('assets/js/initiate.js')); ?>" ></script>
<script src="<?php echo e(asset('assets/js/earn.js')); ?>" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript">

/* _____________________________________

     Count down
     _____________________________________ */

//    function openNav() {
//        document.getElementById("mySidenav").style.width = "250px";
//        document.getElementById("main").style.display = "none";
//        document.getElementById("close-sidebar").style.display = "inline-block";
//        document.getElementById("dashboard-body").style.marginLeft = "250px";
//    }
//
//    function closeNav() {
//        document.getElementById("mySidenav").style.width = "0";
//        document.getElementById("main").style.display= "inline-block";
//        document.getElementById("close-sidebar").style.display = "none";
//        document.getElementById("dashboard-body").style.marginLeft= "0";
//    }

    $(document).ready(function() {
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
        $('.body-part').click(function() {
            $nav.addClass('open');
        });
        //  $nav.addClass('open');

        //drop down menu
        $submenu = $('.child-menu-ul');
        $('.child-menu .toggle-right').on('click', function(e) {

            $(".toggle-right").removeClass("rotate");

            e.preventDefault();
            $this = $(this);
            $parent = $this.parent().next();
            // $parent.addClass('active');
            $tar = $('.child-menu-ul');
            if (!$parent.hasClass('active')) {
                $tar.removeClass('active').slideUp('fast');
                $parent.addClass('active').slideDown('fast');
                $(this).addClass("rotate");

            } else {
                $parent.removeClass('active').slideUp('fast');
                $(".toggle-right").removeClass("rotate");
            }

        });

    });

 
</script>
<script type="text/javascript">
        $('.main-BCT-nav li').click(function() {
            $('.main-BCT-nav li').removeClass();
            $(this).addClass("active")

        });
</script>
<script type="text/javascript">
    (function($) {
    $('.accordion > li:eq(0) a').addClass('active').next().slideDown();

    $('.accordion a').click(function(j) {
        var dropDown = $(this).closest('li').find('p');

        $(this).closest('.accordion').find('p').not(dropDown).slideUp();

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).closest('.accordion').find('a.active').removeClass('active');
            $(this).addClass('active');
        }

        dropDown.stop(false, true).slideToggle();

        j.preventDefault();
    });
})(jQuery);

</script>
<script>
    $("#partner-slider").owlCarousel({

        autoplay: true,
        margin:30,
        loop: true,
        dots: false,
        items: 6,
        lazyLoad: true,
        autoWidth:true,
        navigation: true,
        responsiveClass: true,
        responsive: {
            550: {
                items: 6,
                nav: false
            },
            800: {
                items: 8,
                nav: false
            },
            1000: {
                items: 12,
                nav: false
            }
        }
    });

</script>
<script type="text/javascript">
    $("document").ready(function() {
  $(".slider").rangeslider();
});
$.fn.rangeslider = function(options) {
  var obj = this;
  var defautValue = obj.attr("value");
  obj.wrap("<span class='range-slider'></span>");
 /* obj.after("<span class='slider-container'><span class='bar'><span></span></span><span class='bar-btn'></span></span>");*/
  obj.after("<span class='slider-container'><span class='bar'><span></span></span><span class='bar-btn'><span>0</span></span></span>");
  obj.attr("oninput", "updateSlider(this)");
  updateSlider(this);
  return obj;
};

function updateSlider(passObj) {
  var obj = $(passObj);
  var value = obj.val();
  var min = obj.attr("min");
  var max = obj.attr("max");
  // console.log(min);
  // console.log(max);
  var range = Math.round(max - min);
  //console.log(range);
  //console.log(min);
  var year1,year2,year3,year4;

  year1 = Math.round(value * 187.9 / 100*10 ); // 24.795
  
  year2 = Math.round(value * 439.1 / 100*10 ); // 57.944
  
  year3 = Math.round(value * 562.4 / 100*10 ); // 74.214
  
  year4 = Math.round(value * 757.8 / 100 *10); // 100
  
  var bonus1,bonus2,bonus3,bonus4;
  bonus1 = Math.round(value * 108.2 / 100); // 24.795
  //console.log(bonus1);

  bonus2 = Math.round(value * 252.8 / 100); // 57.944
  //console.log(bonus2);

  bonus3 = Math.round(value * 323.8 / 100); // 74.214
  //console.log(bonus3);

  bonus4 = Math.round(value * 436.3 / 100); // 100
  //console.log(bonus4);


  var percentage = Math.round((value) * 100 / range);
  //console.log(percentage)

  // alert(percentage);
  //var percentage1 = Math.round((value - min));
  
  var percentage1 = percentage *24.795/100;
  var percentage2 = percentage *57.944/100;
  var percentage3 = percentage *74.214/100;
  var percentage4 = percentage ;
  
  
  
  var nextObj = obj.next();

  nextObj.find("span.bar-btn").css("left", percentage + "%");
  nextObj.find("span.bar > span").css("width", percentage + "%");
  nextObj.find("span.bar-btn > span").text(percentage);
  nextObj.find("span.bar-btn > span").css("display","none");
  $("#rangebudget").text("USD $" + value);
  
  $("#year1").css("height",percentage1 + "%");
  $("#year2").css("height",percentage2 + "%");
  $("#year3").css("height",percentage3 + "%");
  $("#year4").css("height",percentage4 + "%");
  
  $("#year1 .statistic-text strong").html('$'+ year1 );
  $("#year1 .statistic-text p").html('$'+ ( bonus1 ) + " without discount" );
  $("#year2 .statistic-text strong").html('$'+ year2 );
  $("#year2 .statistic-text p").html('$'+ ( bonus2 )  + " without discount" );
  $("#year3 .statistic-text strong").html('$'+ year3 );
  $("#year3 .statistic-text p").html('$'+ ( bonus3 )  + " without discount" );
  $("#year4 .statistic-text strong").html('$'+ year4 );
  $("#year4 .statistic-text p").html('$'+ ( bonus4 ) + " without discount"  );

  $("#year1 b").html('Year 1');
  $("#year2 b").html('Year 2');
  $("#year3 b").html('Year 3');
  $("#year4 b").html('Year 4');
  $("div.user_details_progress_bar i").css('height','20%');
  $("div.user_details_progress_bar i").css('top','-20%');
  $("#final_total").html('$'+ Math.round((year4 +year3+year2+year1) ));



  $(document).ready(function() {
    $('#contribution10x').change(function() {
        if($(this).is(":checked")) {
          $("#year1 .statistic-text strong").html('$'+ Math.round(year1));
          $("#year2 .statistic-text strong").html('$'+ Math.round(year2));
          $("#year3 .statistic-text strong").html('$'+ Math.round(year3));
          $("#year4 .statistic-text strong").html('$'+ Math.round(year4));
          $("#final_total").html('$'+ Math.round((year4 +year3+year2+year1) ));
        }
        else{
          $("#year1 .statistic-text strong").html('$'+ Math.round(year1/10 ));
          $("#year2 .statistic-text strong").html('$'+ Math.round(year2/10 ));
          $("#year3 .statistic-text strong").html('$'+ Math.round(year3/10 ));
          $("#year4 .statistic-text strong").html('$'+ Math.round(year4/10));
          $("#final_total").html('$'+ Math.round((year4 +year3+year2+year1)/10 ));
        }
    });
//     $("#year1 .statistic-text strong").html('$'+ year1 );
//     $("#year2 .statistic-text strong").html('$'+ year2 );
//     $("#year3 .statistic-text strong").html('$'+ year3 );
//     $("#year4 .statistic-text strong").html('$'+ year4 );
//     $("#final_total").html('$'+ Math.round(year4 +year3+year2+year1 ));
     $('#contribution10x').prop('checked', true);



  });

 $(".hide-toggle").click(function(){
    //alert();
    //$(".bonus-chart").toggle();
    $(".statistic-text").toggleClass("statistic-text-hide");
    $(".hide-toggle").toggleClass("active");
    $(".statistic-text").toggleClass("custom_bottom");
    $(".user_details_progress_bar i").toggleClass("transform-bar");

    if($(this).hasClass('active')){
      $("#year1 .statistic-text strong").html('$'+ bonus1 );
      $("#year2 .statistic-text strong").html('$'+ bonus2 );
      $("#year3 .statistic-text strong").html('$'+ bonus3 );
      $("#year4 .statistic-text strong").html('$'+ bonus4 );
    }
    else{
      $("#year1 .statistic-text strong").html('$'+ year1 );
      $("#year2 .statistic-text strong").html('$'+ year2 );
      $("#year3 .statistic-text strong").html('$'+ year3 );
      $("#year4 .statistic-text strong").html('$'+ year4 );
    }
});

};



$(".statistic-text").addClass("custom_bottom");
</script>
<script type="text/javascript">
   var attr_store;
var store_data;
var i;
$(window).load(function() {
  $('div.user_details_progress_bar li > span').each(function() {
    attr_store = $(this).attr('data-value');
    store_data = {
      one: attr_store,
      two: "140",
      three: "150",
      four: "145",
      five: "160",
      six: "100",
      seven:"20"
    }
  });
  $('div.user_details_progress_bar ul li:nth-child(1) span').css('height', store_data.one).find('i').text(store_data.one);
  $('div.user_details_progress_bar ul li:nth-child(2) span').css('height', store_data.two).find('i').text(store_data.two);
  $('div.user_details_progress_bar ul li:nth-child(3) span').css('height', store_data.three).find('i').text(store_data.three);
  $('div.user_details_progress_bar ul li:nth-child(4) span').css('height', store_data.four).find('i').text(store_data.four);
  $('div.user_details_progress_bar ul li:nth-child(5) span').css('height', store_data.five).find('i').text(store_data.five);
  $('div.user_details_progress_bar ul li:nth-child(6) span').css('height', store_data.six).find('i').text(store_data.six);
  $('div.user_details_progress_bar ul li:nth-child(7) span').css('height', store_data.seven).find('i').text(store_data.seven);
});
</script>
<script src="<?php echo e(asset('assets/js/front.js')); ?>" ></script>


<!--About js-->
<script>
    $(".who").click(function() {
        $('html, body').animate({
            scrollTop: $("#who-are-we").offset().top - 100
        }, 2000);
    });
    $(".values").click(function() {
        $('html, body').animate({
            scrollTop: $("#our-values").offset().top - 70
        }, 2000);
    });
    $(".vision").click(function() {
        $('html, body').animate({
            scrollTop: $("#our-vision").offset().top - 100
        }, 2000);
    });


    $(document).ready(function() {
        var showChar = 390;
        var ellipsestext = "...";
        var moretext = "Read more";
        var lesstext = "Read less";
        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });

    $(document).ready(function() {
        var showChar = 1180;
        var ellipsestext = "...";
        var moretext = "Read more";
        var lesstext = "Read less";
        $('.more-2').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink-2">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink-2").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });


    $(document).ready(function() {
        var showChar = 900;
        var ellipsestext = "...";
        var moretext = "Read more";
        var lesstext = "Read less";
        $('.mining-more1').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink-2">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink-2").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });

    $(document).ready(function() {
        var showChar = 520;
        var ellipsestext = "...";
        var moretext = "Read more";
        var lesstext = "Read less";
        $('.more-3').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink-3">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink-3").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });


</script>

<script type="text/javascript">
   function addSubscribe()
  {
       var email = $("#subscribe_email").val();
       var _token="<?php echo e(csrf_token()); ?>";
      if(email!='')
      {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
        {
        $.ajax({
            type:'post',
            data: { 'email': email, '_token':_token},
            url:'<?php echo e(url("subscribe")); ?>',
            success:function(data){
              if(data==0)
              {
                 $("#subscribe_email").val('');
                swal("Warning", "You email address was already subscribed!", "warning");
              }
              else if(data==1)
              {
                $("#subscribe_email").val('');
                swal("Success", "Your subscribption done successfully!", "success");
              }
              else
              {
                 swal("Error", "Oops! Something went wrong, Please try again.", "error");
              }
            }
          });
       }
       else{
          swal("Warning", "Enter valid email address.", "warning");
       }
    }
    else{
      swal("Error", "Please enter email address first.", "warning");
    }
  }

</script>
