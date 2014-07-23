<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es_ES">
<head>
<?php wp_head();

session_start();

if(isset($_GET['modo'])){
    $_SESSION['modo'] = $_GET['modo'];
}

if(!empty($current_user->data->ID)){
    echo '<script>location.href="http://www.salcobrand.cl/cl/viaje-sonado-formulario-actualiza/";</script>';
}


 ?>
<link href="<?php echo URL_THEME;?>/campana-registro/css/estilos.css" rel="stylesheet" type="text/css">



<script src="<?php echo URL_THEME;?>/campana-registro/js/functions.js"></script>
<script src="<?php echo URL_THEME;?>/campana-registro/js/jquery.Rut.min.js"></script>
<script src="<?php echo URL_THEME;?>/campana-registro/js/jquery.alphanumeric.js"></script>
<script>
	jQuery(document).ready(function(){
        jQuery('#rutactualiza').Rut().rut();

		//$('#load-screen').delay(1000).fadeOut(function(){$(this).remove()});

        jQuery('#btn_enviar').click(function(){
            if(jQuery.Rut.validar(jQuery('#rutactualiza').val())){
                jQuery('#load-screen').show();
                jQuery.ajax({
                    type: "POST",
                    url: "http://www.salcobrand.cl/cl/",
                    data: "cms_salco=consultacli&rut="+jQuery('#rutactualiza').val(),
                    success: function(datos){
                        if(datos == '1'){
                            location.href="http://www.salcobrand.cl/cl/viaje-sonado-login/";
                        }else{
                            location.href="http://www.salcobrand.cl/cl/viaje-sonado-formulario-registro/";
                        }
                    }
                });
                _gaq.push(['_trackPageview', 'CampanaRegistro', 'EnviarRut']);
            }else{
                jQuery('#rutactualiza').css('border','1px solid #FF0026');
                jQuery('.a-error').css('display','block');
            }
        });

        jQuery('input').focus(function(){
            jQuery(this).css('border','medium none');
            jQuery('.a-error').css('display','none');
        });

	});

    
function validar(evt) {
   evt = (evt) ? evt : window.event;
   var charCode = (evt.which) ? evt.which : evt.keyCode;

   if (charCode == 13){

    jQuery('#rutactualiza').focus();
    setTimeout(function(){jQuery('.verificador').trigger('click');},800)
        
      return false;
   }
   return true;
}



</script>


</head>

<body>

<div id="contenedorform-familia">
    <div class="logosalcobrand"><a href="http://www.salcobrand.cl/cl/viaje-sonado/"><img src="<?php echo URL_THEME;?>/campana-registro/images/logo-salcobrand.png" /></a></div>
    <div class="redessociales">
        <a href="http://www.facebook.com/salcobrand" target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/ico-facebook.png" width="30" height="31"></a><a href="https://twitter.com/salcobrand" target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/ico-twitter.png" width="30" height="31"></a>
    </div>
    <div style="padding: 90px 0 0 318px; position: absolute;"><img src="<?php echo URL_THEME;?>/campana-registro/images/txt1.png" /></div>
<!-- loading -->
<div id="load-screen" style="display:none"></div>

<div class="contenidoform-familia">
	<div class="columna-uno">
    	<img src="<?php echo URL_THEME;?>/campana-registro/images/<?php echo $_SESSION['modo']; ?>.png" class="margintop24">
        <!-- <img src="images/amigos.png" width="235" height="250" class="margintop21"> -->
        <!-- <img src="images/familia.png" width="210" height="270"> -->
    </div>
    <div class="columna-formulario">
        <ul>
        	<li><label class="span200">Rut (ej. 12346567-8)</label><input name="rut" type="text" id="rutactualiza" maxlength="10"><span class="a-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span><!--<img src="<?php echo URL_THEME;?>/campana-registro/images/rut-valido.png" width="27" height="27" class="verificador">--></li><br class="limpiar">
        </ul>
        <input type="hidden" name="cms_salco" id="cms_salco" value="registro_campanas" />
        <li class="boton-enviar hidden">
            <input id="btn_enviar" type="button">
        </li>
    </div><br class="limpiar">
</div>

<div class="bases-dos"><a href="http://www.salcobrand.cl/cl/wp-content/uploads/2013/11/bases-promocion-actualiza-tus-datos-y-gana.pdf"  target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/btn_baseslegales.png" /></a></div>

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
