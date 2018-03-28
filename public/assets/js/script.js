

    /* _____________________________________

     Pre loader
     _____________________________________ */
     $(window).on('load', function() {
      $('.loader-wrapper').fadeOut('slow');
      $('.loader-wrapper').remove('slow');
    });

     /* _____________________________________

      Tap on Top
      _____________________________________ */
      $(window).on('scroll', function() {
        if ($(this).scrollTop() > 600) {
          $('.tap-top').fadeIn();
        } else {
          $('.tap-top').fadeOut();
        }
      });

      $('.tap-top').on('click', function() {
        $("html, body").animate({
          scrollTop: 0
        }, 600);
        return false;
      });

      $(window).on('scroll', function() {
        if ($(this).scrollTop() > 600) {
          $('.bootom-fix').fadeIn();
        } else {
          $('.bootom-fix').fadeOut();
        }
      });
 
    

