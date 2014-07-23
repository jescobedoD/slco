<?php
session_start();

if(isset($_GET['source']) && $_GET['source'] == 'fb') $_SESSION['source'] = 'Facebook';


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es_ES">
<head>
<?php wp_head(); ?>

<link href="<?php echo URL_THEME;?>/campana-registro/css/estilos.css" rel="stylesheet" type="text/css">


<script>
	/*$(window).load(function(){
		$('#load-screen').delay(1000).fadeOut(function(){$(this).remove()});
	});*/
</script>

</head>
<body>
<div>
<div id="contenedorinicio">
    <div class="logosalcobrand"><a href="http://www.salcobrand.cl/cl/viaje-sonado/"><img src="<?php echo URL_THEME;?>/campana-registro/images/logo-salcobrand.png" /></a></div>
<!-- loading -->
<!--<div id="load-screen"></div>-->
	   <div class="redessociales">
        <a href="http://www.facebook.com/salcobrand" target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/ico-facebook.png" width="30" height="31"></a><a href="https://twitter.com/salcobrand" target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/ico-twitter.png" width="30" height="31"></a>
       </div>
<div class="contenido">
	
	<div class="familia">
    	<p>Gana un viaje para 4 personas con tu familia a Buenos Aires</p>
        <a href="http://www.salcobrand.cl/cl/viaje-sonado-consulta/?modo=familia" onclick="_gaq.push(['_trackPageview', 'CampanaRegistro', 'ParticipaAqui']);"><img src="<?php echo URL_THEME;?>/campana-registro/images/btn-participar.png" width="166" height="32"></a>
    </div>
    <div class="amigos">
    	<p>Gana un viaje para ti y tu amiga o amigo a Miami</p>
        <a href="http://www.salcobrand.cl/cl/viaje-sonado-consulta/?modo=amigos" onclick="_gaq.push(['_trackPageview', 'CampanaRegistro', 'ParticipaAqui']);"><img src="<?php echo URL_THEME;?>/campana-registro/images/btn-participar.png" width="166" height="32"></a>
    </div>
	<div class="pareja">
    	<p>Gana un viaje para ti y tu pareja a Punta Cana</p>
        <a href="http://www.salcobrand.cl/cl/viaje-sonado-consulta/?modo=pareja" onclick="_gaq.push(['_trackPageview', 'CampanaRegistro', 'ParticipaAqui']);"><img src="<?php echo URL_THEME;?>/campana-registro/images/btn-participar.png" width="166" height="32"></a>
    </div><br class="limpiar">
</div>
<div class="bases-uno"><a href="http://www.salcobrand.cl/cl/wp-content/uploads/2013/11/bases-promocion-actualiza-tus-datos-y-gana.pdf"  target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/btn_baseslegales.png" /></a></div>
</div>
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
