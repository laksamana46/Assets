$(document).ready(function() {		
    $('span.mask').hover(function () {
          $(this).siblings('a img').addClass('hovering');
          $(this).parent().siblings(".portfolio-title").children("h4").stop().animate({
                top: -20
                }, 350);
          },
          function () {
              $(this).siblings('a img').removeClass('hovering');
              $(this).parent().siblings(".portfolio-title").children("h4").stop().animate({
                  top: 0
                }, 350);
	  }
    );
});

