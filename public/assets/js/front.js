
$(document).ready(function(){
    $(".navbar-toggler").click(function(){
        $(".navbar-collapse").fadeToggle("3000");
    });
});


$(document).ready(function() {

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $('.counter').counterUp({
    delay: 10,
    time: 1000
  });
  // Add smooth scrolling to all links
  $("nav a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
       scrollTop: $(hash).offset().top
     }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});


  /*--------------------------------------------
     Menu Drop
     --------------------------------------------*/
      var window_load = $(window);
         window_load.bind('scroll', function() {
        var windowHeight = window_load.innerHeight();
        var header = document.getElementById("header-bottom");
        if (window_load.scrollTop() > 10) {
            $("#header-bottom").addClass("nav-bar-fixed");

        } else {
          $("#header-bottom").removeClass("nav-bar-fixed");
        }
    });
/*----------------------------------------------------
    Scroll reveal animation
    ----------------------------------------------------*/
    if (Modernizr.csstransforms3d) {
      window.sr = ScrollReveal();
      sr.reveal('.reveal-0', {
        origin: 'left',
        enter: 'right',
        duration: 800,
        delay: 400,
        reset: true,
        easing: 'linear',
        scale: 1,
        

      });

      sr.reveal('.reveal-right', {
        origin: 'right',
        duration: 700,
        delay: 400,
        reset: true,
        easing: 'linear',
        scale: 1,

      });

      sr.reveal('.reveal-left', {
        origin: 'left',
        duration: 800,
        delay: 400,
        reset: true,
        easing: 'linear',
        scale: 1,

      });

      sr.reveal('.reveal-top', {
        origin: 'top',
        duration: 800,
        delay: 400,
        reset: true,
        easing: 'linear',
        scale: 1,

      });

      sr.reveal('.reveal-bottom', {
        origin: 'bottom',
        duration: 800,
        delay: 400,
        reset: true,
        easing: 'linear',
        scale: 1,

      });
    }
 /*----------------------------------------
     Home-owlCarousel
     ----------------------------------------*/
   $("#home-slider").owlCarousel({
        autoplay: true,
        loop: true,
        dots: true,
        nav: false,
        autoplayHoverPause: true,
        items: 1,
        lazyLoad: true,
        navigation: true,
        responsiveClass: true
    });
     /*----------------------------------------
     About-owlCarousel
     ----------------------------------------*/
   $(document).ready(function() {
    $("#news-slider").owlCarousel({
        items : 3,
         margin:30,
        loop : true,      
        pagination:false,
        navigationText:false,
         responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            550: {
                items: 1,
                nav: false
            },
            991: {
                items: 2,
            },
            1000: {
              items:3,
            }
        }
    });
});


/*----------------------------------------
     award-owlCarousel
     ----------------------------------------*/
    $("#partner-slider").owlCarousel({

        autoplay: true,
       margin:0,
        loop: true,
        dots: false,
        items: 12,
        lazyLoad: true,
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

    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

/*----------------------------------------
     Testimonial-owlCarousel
     ----------------------------------------*/

  $(document).ready(function(){
        $("#testimonial-slider").owlCarousel({
             autoplay: true,
            loop: true,
            dots: true,
            nav: false,
             navigationText:["",""],
            autoplayHoverPause: true,
            items: 1,
            lazyLoad: true,
            navigation: true,
            responsiveClass: true
        });
    });
