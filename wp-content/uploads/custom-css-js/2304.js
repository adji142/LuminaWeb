<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
/* Default comment here */ 

jQuery(document).ready(function( $ ){
    $(document).on('scroll', function() {
      const $elem = $(".h3-navigation-area");
      const $elemlogo = $(".h3-main-logo");
      
      if ($(document).scrollTop() >= 320) {
        $elemlogo[0].style.setProperty('max-width', '60%', 'important');
        $elem[0].style.setProperty('padding', '5px', 'important');
      } else {
        $elemlogo[0].style.setProperty('max-width', '100%', 'important');
      }
    });
  	
  	$('div.col-lg-6.d-flex.justify-content-center.mb-4.mt-4').remove();
  	$("div.col-lg-6").attr('class', 'col-lg-12 d-flex justify-content-center mb-4 mt-4');
// custom breadcum Text
//   var pathArray = window.location.pathname.split('/');
//   //console.log(pathArray);
//   if(pathArray[pathArray.length -2] == "solution"){
//     // edit html breadcum for solution hire
//     console.log("1");
//     var textData = 'We bring differentiated "minerals plus" solutions <br>customized for our partners unique challenges and needs.'; 
//     $('.page_tittle.activebreadcrumbColor').html(textData);
//   }
//   else if(pathArray[pathArray.length -2] == "our-resources"){
//     // edit html breadcum for "our-resources" hire
//     console.log("2");
//     var textData = 'We leverage our precious resources <br> —our people,our environment, and our ingenuity— <br> to deliver more with less'; 
//     $('.page_tittle.activebreadcrumbColor').html(textData);
//   }
//   else if(pathArray[pathArray.length -2]=="sustainability"){
//     // edit html breadcum for "our-resources" hire
//     console.log("3");
//     var textData = 'We model the greening of minerals to promote <br> healthier people and a healthier planet across the value chain.'; 
//     $('.page_tittle.activebreadcrumbColor').html(textData);
//   }
});</script>
<!-- end Simple Custom CSS and JS -->
