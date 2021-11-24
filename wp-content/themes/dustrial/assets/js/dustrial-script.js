// IIFE with jQuery Wrapper
(function ($) {
  "use strict";

    // Script handler
  $(window).on('load', function () {
      bpCounterUphendle();
  });

  // mobile menu
  $("#mobile-menu").meanmenu({
    meanMenuContainer: ".mobile-menu",
    meanScreenWidth: "991",
    meanMenuOpen:"<span></span><span></span><span></span>",
  });

  /* TOP Menu Stick  */
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 160) {
      $('#menufix').addClass("menufix-height");
    }
    else {
      $('#menufix').removeClass("menufix-height");
    }
  });

  $(window).on ('load', function (){ // makes sure the whole site is loaded
    $('#loader').fadeOut(); // will first fade out the loading animation
    $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({'overflow':'visible'});
  });
  
  $(window).on ('load', function (){ // makes sure the whole site is loaded
    $('.slider-loader').fadeOut(); // will first fade out the loading animation
  });

  // counter
  function bpCounterUphendle() {
    $('.counter').counterUp({
      delay: 20,
      time: 3000
    });
  };
  

  // Magnific Popup
  $('#inline-popups').magnificPopup({
    delegate: 'a.header-search',
    removalDelay: 500, //delay removal by X to allow out-animation
    callbacks: {
      beforeOpen: function() {
        this.st.mainClass = this.st.el.attr('data-effect');
      }
    },
    midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  });

  // Magnific Popup
  $('#inline-popups-two').magnificPopup({
    delegate: 'a.header-search',
    removalDelay: 500, //delay removal by X to allow out-animation
    callbacks: {
      beforeOpen: function() {
         this.st.mainClass = this.st.el.attr('data-effect');
      }
    },
    midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  });

  // Inline popups
  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  // Elements Animation
  if($('.wow').length){
    var wow = new WOW(
      {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true       // act on asynchronously loaded content (default is true)
      }
    );
    wow.init();
  }

  /*Woo Cart Item Remove Ajax*/
  if( $('.mini-cart-items').length ){
    $( document ).on('click', '.remove-cart-item', function(){
      var product_id = $(this).attr("data-product_id");
      var loader_url = $(this).attr("data-url");
      var main_parent = $(this).parents('li.menu-item.dropdown');
      var parent_li = $(this).parents('li.cart-item');
      parent_li.find('.product-thumbnail > .remove-item-overlay').css({'display':'block'});
      $.ajax({
        type: 'post',
        dataType: 'json',
        url: dustrial_ajax_var.admin_ajax_url,
        data: { action: "dustrial_product_remove", 
            product_id: product_id
        },success: function(data){
          main_parent.html( data["mini_cart"] );
          $( document.body ).trigger( 'wc_fragment_refresh' );
        },error: function(xhr, status, error) {
          $('.mini-cart-items').children('ul.cart-dropdown-menu').html('<li class="cart-item"><p class="cart-update-pbm text-center">'+ dustrial_ajax_var.cart_update_pbm +'</p></li>');
        }
      });
      return false;
    }); 
  }

}(jQuery));