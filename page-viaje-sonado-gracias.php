<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es_ES">
<head>
<?php wp_head();
session_start();


?>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '233237930178537',                        // App ID from the app dashboard
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });

    // Additional initialization code such as adding Event Listeners goes here
  };

  // Load the SDK asynchronously
  (function(){
     // If we've already installed the SDK, we're done
     if (document.getElementById('facebook-jssdk')) {return;}

     // Get the first script element, which we'll use to find the parent node
     var firstScriptElement = document.getElementsByTagName('script')[0];

     // Create a new script element and set its id
     var facebookJS = document.createElement('script'); 
     facebookJS.id = 'facebook-jssdk';

     // Set the new script's source to the source of the Facebook JS SDK
     facebookJS.src = '//connect.facebook.net/es_LA/all.js';

     // Insert the Facebook JS SDK into the DOM
     firstScriptElement.parentNode.insertBefore(facebookJS, firstScriptElement);
   }());


function newInvite(){
     FB.ui({ method: 'apprequests',
          message: 'Regístrate y gana con Salcobrand'});
}
</script>
<link href="<?php echo URL_THEME;?>/campana-registro/css/estilos.css" rel="stylesheet" type="text/css">

<!--[if lt IE 9]>
	<script type="text/javascript" src="js/ie.html5.js"></script>
<![endif]-->
<script>
	$(window).load(function(){
		$('#load-screen').delay(1000).fadeOut(function(){$(this).remove()});
	});
</script>
</head>
<body>


<div id="contenedorgracias">
  <div class="logosalcobrand"><a href="http://www.salcobrand.cl/cl/viaje-sonado/"><img src="<?php echo URL_THEME;?>/campana-registro/images/logo-salcobrand.png" /></a></div>
<!-- loading -->
<!--<div id="load-screen"></div>-->
	<div class="redessociales">
    	<a href="http://www.facebook.com/salcobrand" target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/ico-facebook.png" width="30" height="31"></a><a href="https://twitter.com/salcobrand" target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/ico-twitter.png" width="30" height="31"></a>
  </div>
<div class="contenido-gracias">
	
	<div class="gracias">
    	<div id="participante">
    		<img src="<?php echo URL_THEME;?>/campana-registro/images/ico-<?php echo $_SESSION['modo']; ?>.png" class="paddingtop24">
            <!-- <img src="images/ico-amigos.png" width="235" height="202" class="paddingtop21"> -->
            <!-- <img src="images/ico-familia.png" width="210" height="222"> -->
    	</div>
    	<p>¡Invita a tus amigos y aumenta tus posibilidades de ganar!</p>
        <a href="javascript:void(0);" onclick="newInvite();"><img src="<?php echo URL_THEME;?>/campana-registro/images/btn-invitar.png" width="233" height="30" class="btn-invitar"></a>
    </div>
</div>
<div class="bases-tres"><a href="http://www.salcobrand.cl/cl/wp-content/uploads/2013/11/bases-promocion-actualiza-tus-datos-y-gana.pdf"  target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/btn_baseslegales.png" /></a></div>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-9463726-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
