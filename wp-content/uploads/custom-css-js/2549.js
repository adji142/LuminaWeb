<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
/* Default comment here */ 
$(function () {
  var pathArray = window.location.pathname.split('/');
  console.log(pathArray[pathArray.length -2]);
  if(pathArray[pathArray.length -2] = "our-resources"){
    var textData = 'Test Dong'; // insert html breadcum hire
    $('.page_tittle.activebreadcrumbColor').html(textData);
  }
});
jQuery(document).ready(function( $ ){
	  
  //$('.page_tittle.activebreadcrumbColor').html('');
});</script>
<!-- end Simple Custom CSS and JS -->
