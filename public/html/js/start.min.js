/**
 * Main JS : ACTIONs
 * 
 * 1. slick init
 */

(function( $ ) {
  
  // OnLoad Page
  $(document).ready(function($){
    $('.search-input').focus(function() {
      $('body').addClass('searching');
    });
    $(document).on('mousedown touchstart', function(e) {
      if ($(e.target).closest(".input-text-wrapper").length === 0) {
        $('body').removeClass('searching');
        if($('.search-input').val() != "") {
          $('.search-input').val("");
        }
      }
  });
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

    // TOGGLE BUTTON CLEAR SEARCH INPUT
    function clearInputSearch(searchInput) {
      if(searchInput.val() != "") {
        searchInput.addClass('inputed');
      } else {
        searchInput.removeClass('inputed');
      }
    }
    $('.search-input').each(function() {
      clearInputSearch($(this));
    });
    $('.search-input').on('input', function() {
      clearInputSearch($(this));
    });
    $('.input-text-wrapper .close-btn').click(function() {
      $(this).parent().find('.search-input').val("").removeClass('inputed');
      $('body').removeClass('searching');
    });
  };

  window.onload = init;

})(jQuery);