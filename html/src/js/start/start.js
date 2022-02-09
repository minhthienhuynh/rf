/**
 * Main JS : ACTIONs
 * 
 * 1. slick init
 */

(function( $ ) {
  
  // OnLoad Page
  $(document).ready(function($){
    
  });
  /* OnLoad Window */
  var init = function () {
    if( $('.services-block-slider ').length > 0 ) {
      $('.services-block-slider ').slick({
        dots: false,
        infinite: true,
        speed: 400,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        centerMode: false,
        centerPadding: 0,
        pauseOnHover: false,
        fade: false,
        variableWidth: true,
      });
    }
  };

  window.onload = init;

})(jQuery);