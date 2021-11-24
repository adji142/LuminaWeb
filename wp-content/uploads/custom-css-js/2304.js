<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
/* Default comment here */ 

jQuery(document).ready(function( $ ){
    $(document).on('scroll', function() {
      const $elem = $(".h3-navigation-area");
      const $elemlogo = $(".h3-main-logo");
      
      if ($(document).scrollTop() >= 320) {
//         $('.h3-main-logo').css('max-width', '60%');
        $elemlogo[0].style.setProperty('max-width', '60%', 'important');
        $elem[0].style.setProperty('padding', '10px', 'important');
//         $('.h3-navigation-area').css('padding', '15px');
      } else {
//         $('.h3-main-logo').css('max-width', '100%');
//         $('.h3-navigation-area').css('padding', '30px');
        $elemlogo[0].style.setProperty('max-width', '100%', 'important');
        $elem[0].style.setProperty('padding', '20px', 'important');
      }
    });
});</script>
<!-- end Simple Custom CSS and JS -->
