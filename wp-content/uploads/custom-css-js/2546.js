<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
/* Default comment here */ 
jQuery(document).ready(function( $ ){
  var pathArray = window.location.pathname.split('/');
  console.log(pathArray[pathArray.length -2]);
  if(pathArray[pathArray.length -2] = "solution"){
    var textData = 'We bring differentiated "minerals plus" solutions <br>customized for our partners unique challenges and needs.'; // insert html breadcum hire
    $('.page_tittle.activebreadcrumbColor').html(textData);
  }
  //$('.page_tittle.activebreadcrumbColor').html('');
});</script>
<!-- end Simple Custom CSS and JS -->
