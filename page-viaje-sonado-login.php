<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es_ES">
<head>
<?php wp_head();

session_start();

if(!empty($current_user->data->ID)){
    echo '<script>location.href="'.get_bloginfo('wpurl').'/viaje-sonado-formulario-actualiza/";</script>';
}


?>
<link href="<?php echo URL_THEME;?>/campana-registro/css/estilos.css" rel="stylesheet" type="text/css">



<script src="<?php echo URL_THEME;?>/campana-registro/js/functions.js"></script>
<script src="<?php echo URL_THEME;?>/campana-registro/js/jquery.Rut.min.js"></script>
<script src="<?php echo URL_THEME;?>/campana-registro/js/jquery.alphanumeric.js"></script>
<script>
	jQuery(document).ready(function(){
        jQuery('#rut, #rut_recupera').Rut().rut();

        jQuery('#btn_enviar').click(function(){
            var error = 0;
            if(jQuery('#rut').val() == '' || !jQuery.Rut.validar(jQuery('#rut').val())){jQuery('#rut').css('border','1px solid #FF0026');jQuery('#uno').css('display','block');error++;}
            if(jQuery('#password').val() == ''){jQuery('#password').css('border','1px solid #FF0026');jQuery('#dos').css('display','block');error++;}
    
            if(error == 0){
                jQuery('#lierror').hide();
                jQuery('#load-screen').show();
                jQuery.ajax({
                    type: "POST",
                    url: "http://www.salcobrand.cl/cl/",
                    data: jQuery('#fm_registro').serialize(),
                    success: function(datos){

                      if(datos == 'Ok'){
                            _gaq.push(['_trackPageview', 'CampanaRegistro', 'Clientecontrasena']);
                           location.href="http://www.salcobrand.cl/cl/viaje-sonado-formulario-actualiza/";
                        }else{
                            jQuery('#load-screen').hide();
                            jQuery('#lierror').show();
                            jQuery('#uno').css('display','block');
                            jQuery('#dos').css('display','block');
                        }
                    }
                });
            }
        });


        jQuery('#arecupera').click(function(){
            jQuery('#load-screen').show();
            var error = 0;
            if(jQuery('#rut').val() == '' || !jQuery.Rut.validar(jQuery('#rut').val())){jQuery('#rut').css('border','1px solid #FF0026');jQuery('#uno').css('display','block');error++;}
            if(error == 0){
                jQuery.ajax({
                    type: "POST",
                    url: "http://www.salcobrand.cl/cl/",
                    data: "cms_salco=recuperar&rut="+jQuery('#rut').val(),
                    success: function(datos){
                        jQuery('#load-screen').hide();
                        jQuery('#txtrecupera').html('¡Te hemos enviado un e-mail con tu contraseña!');
                    }
                });
            }else{
                 jQuery('#load-screen').hide();
            }
        });

        jQuery('input').focus(function(){
            jQuery(this).css('border','medium none');
        });
        jQuery('#rut').focus(function(){
            jQuery('#uno').css('display','none');
        });
        jQuery('#password').focus(function(){
            jQuery('#dos').css('display','none');
        });

	});
</script>


</head>

<body>

<div id="contenedorform-familia">
    <div class="logosalcobrand"><a href="http://www.salcobrand.cl/cl/viaje-sonado/"><img src="<?php echo URL_THEME;?>/campana-registro/images/logo-salcobrand.png" /></a></div>
    <div class="redessociales">
        <a href="http://www.facebook.com/salcobrand" target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/ico-facebook.png" width="30" height="31"></a><a href="https://twitter.com/salcobrand" target="_blank"><img src="<?php echo URL_THEME;?>/campana-registro/images/ico-twitter.png" width="30" height="31"></a>
  </div>
    <div style="padding: 90px 0 0 318px; position: absolute;"><img src="<?php echo URL_THEME;?>/campana-registro/images/txt-cliente.png" /></div>
<!-- loading -->
<div id="load-screen" style="display:none"></div>

<div class="contenidoform-familia">
	<div class="columna-uno">
    	<img src="<?php echo URL_THEME;?>/campana-registro/images/<?php echo $_SESSION['modo']; ?>.png" class="margintop24">
        <!-- <img src="images/amigos.png" width="235" height="250" class="margintop21"> -->
        <!-- <img src="images/familia.png" width="210" height="270"> -->
    </div>
    <div class="columna-formulario">
        <form id="fm_registro" method="post">
            <ul id="fm_login">
            	<li><label class="span200">Rut (ej. 12346567-8)</label><input name="usuario" type="text" id="rut" maxlength="10" value="<?php echo $_SESSION['rut']; ?>"><span id="uno" class="b-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span><!--<img src="<?php echo URL_THEME;?>/campana-registro/images/rut-valido.png" width="27" height="27" class="verificador">--></li><br class="limpiar">
                <li class="hidden"><label class="span200">Contraseña</label><input name="pass" type="password" id="password" autocomplete="off"><span id="dos" class="b-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span></li><br class="limpiar">
                <li><label id="txtrecupera"><a href="javascript:void(0);" id="arecupera">¿Olvidaste tu contraseña? <span class="underline">Haz click aquí<span></a></label></li>
                <li id="lierror" style=" display:none;">El rut o la contraseña son erróneos</li>
                <input type="hidden" name="cms_salco" id="cms_salco" value="login_campana" />
                <li class="boton-enviar hidden">
                    <input id="btn_enviar" type="button">
                </li>
            </ul>
        </form>
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
