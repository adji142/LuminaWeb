// Dustrial with jQuery Wrapper
(function ($) {
  "use strict";

  // Scrollup
  $(document).on("scroll", function () {
    if (jQuery(this).scrollTop() > 500) {
      jQuery('.scroll-to-top').fadeIn();
    } else {
      jQuery('.scroll-to-top').fadeOut();
    }
  });

  jQuery('.scroll-to-top').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 1500);
    return false;
  });

  // Viewer Function
  var console = window.console || { log: function () {} };
  var $images = $('.docs-pictures');
  var $toggles = $('.docs-toggles');
  var $buttons = $('.docs-buttons');
  var options = {
    // inline: true,
    url: 'data-original',
    ready: function (e) {
      console.log(e.type);
    },
    show: function (e) {
      console.log(e.type);
    },
    shown: function (e) {
      console.log(e.type);
    },
    hide: function (e) {
      console.log(e.type);
    },
    hidden: function (e) {
      console.log(e.type);
    },
    view: function (e) {
      console.log(e.type);
    },
    viewed: function (e) {
      console.log(e.type);
    }
  };

  function toggleButtons(mode) {
    if (/modal|inline|none/.test(mode)) {
      $buttons
        .find('button[data-enable]')
          .prop('disabled', true)
        .filter('[data-enable*="' + mode + '"]')
          .prop('disabled', false);
    }
  }

  $images.on({
    ready:  function (e) {
      console.log(e.type);
    },
    show:  function (e) {
      console.log(e.type);
    },
    shown:  function (e) {
      console.log(e.type);
    },
    hide:  function (e) {
      console.log(e.type);
    },
    hidden: function (e) {
      console.log(e.type);
    },
    view:  function (e) {
      console.log(e.type);
    },
    viewed: function (e) {
      console.log(e.type);
    }
  }).viewer(options);

  toggleButtons(options.inline ? 'inline' : 'modal');

  $toggles.on('change', 'input', function () {
    var $input = $(this);
    var name = $input.attr('name');

    options[name] = name === 'inline' ? $input.data('value') : $input.prop('checked');
    $images.viewer('destroy').viewer(options);
    toggleButtons(options.inline ? 'inline' : 'modal');
  });

  $buttons.on('click', 'button', function () {
    var data = $(this).data();
    var args = data.arguments || [];

    if (data.method) {
      if (data.target) {
        $images.viewer(data.method, $(data.target).val());
      } else {
        $images.viewer(data.method, args[0], args[1]);
      }

      switch (data.method) {
        case 'scaleX':
        case 'scaleY':
          args[0] = -args[0];
          break;

        case 'destroy':
          toggleButtons('none');
          break;
      }
    }
  });


  jQuery('.portfolio-area').imagesLoaded( function() {
    // portfolio - active
    var $grid = jQuery('.portfolio-active').isotope({
      itemSelector: '.grid-item',
      layoutMode: 'fitRows',
      percentPosition: true,
      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: 1
      }
    })

    // filter items on button click
    jQuery('.portfolio-menu').on('click', 'button', function () {
      var filterValue = jQuery(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });
    });
    //for menu active class
    jQuery('.portfolio-menu button').on('click', function (event) {
      jQuery(this).siblings('.active').removeClass('active');
      jQuery(this).addClass('active');
      event.preventDefault();
    });

  });

}(jQuery));