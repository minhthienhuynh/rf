/**
 * Main JS : ACTIONs
 * 
 * 1. slick init
 * 2. Handle click scroll to service homepage mobile
 */

(function( $ ) {
  // OnLoad Page
  $(document).ready(function($){
    
    // Search Input
    $('.search-input').focus(function() {
      $('body').addClass('searching');
    });
    $(document).on('mousedown touchstart', function(e) {
      if ($(e.target).closest(".input-text-wrapper").length === 0) {
        if($('.search-input').val() != "" && $('body').hasClass('searching') && $('.search-input').val() != $('.search-input').attr('value')) {
          $('.input-text-wrapper .close-btn').trigger('click');
        }
        $('body').removeClass('searching');
      }
    });

    // Hamburger Toggle
    $('#menu-toggle').click(function() {
      $(this).toggleClass('open');
      $('body').toggleClass('open-nav');
    });

    // Toggle sidebar
    $('.siderbar-block-category .sidebar-ttl').click(function() {
      if($(window).width() < 768) {
        $(this).toggleClass('open');
        $(this).next().stop().slideToggle(300);
      }
    });
  });
  
  // ANCHOR LINK
  function anchorLink(el) {
    const p = $(el).offset();
    const offsetPC = 0;
    const offsetSP = 80;

    if ($(window).width() > 750) {
        $('html,body').animate({ scrollTop: p.top - offsetPC }, 800);
    } else {
        $('html,body').animate({ scrollTop: p.top - offsetSP }, 0);
        $('#menu-toggle').removeClass('open');
        $('body').removeClass('open-nav');
    }
  }

  /**
   *  2. Handle click scroll to service homepage mobile
   */
  function handleScrollServiceMB() {
    if(!$('.section-services').length
    || $(window).width() > 767) { return; }

    $('.section-services .nav-tabs .nav-link').each(function() {
      $(this).on('click', function(e) {
        e.preventDefault();
        const tabId = $(this).data('bs-target');

        setTimeout(() => {
          $('html, body').animate({
            scrollTop: $(tabId).offset().top - 80
          },{
              queue: false,
              duration: 1000
          });
        }, 500);
      })
    });
  }

  /* OnLoad Window */
  var init = function () {
    // ANCHOR FROM OTHER PAGE
    var hash = location.hash;
    if (hash && $(hash).length > 0) {
        anchorLink(hash);
    }

    // ANCHOR IN PAGE
    $('a[href^="#"]').click(function() {
        var getID = $(this).attr('href');
        if ($(getID).length) {
            anchorLink(getID);
            return false;
        }
    });

    // SET SLIDER CARDS
    function basicSlider() {
      if(!$('.basic-slider ').length > 0 ) { return; }
      
      $('.basic-slider ').slick({
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
        responsive: [
          {
             breakpoint: 768,
             settings: "unslick"
          }
        ]
      });
    }

    // SET GALLERY
    if($('.block-gallery').length) {
      $('.block-gallery .gallery-main').slick({
        dots: false,
        infinite: true,
        speed: 400,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        arrows: false,
        centerMode: false,
        centerPadding: 0,
        pauseOnHover: false,
        fade: false,
        variableWidth: false,
        asNavFor: '.block-gallery .gallery-thumbnail'
      });
      $('.block-gallery .gallery-thumbnail').slick({
        dots: false,
        infinite: true,
        speed: 400,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        arrows: true,
        centerMode: false,
        centerPadding: 0,
        pauseOnHover: false,
        fade: false,
        variableWidth: false,
        asNavFor: '.block-gallery .gallery-main',
        focusOnSelect: true
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

    handleScrollServiceMB();
    basicSlider();
    $( window ).resize(
      $.debounce(100, function(e){
        basicSlider();
        if($(window).width() <= 767) {
          handleScrollServiceMB();
        }
      })
  );
  };

  window.onload = init;

})(jQuery);