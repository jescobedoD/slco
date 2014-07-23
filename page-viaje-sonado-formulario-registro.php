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

<!--[if lt IE 9]>
	<script type="text/javascript" src="js/ie.html5.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->

<script src="<?php echo URL_THEME;?>/campana-registro/js/functions.js"></script>
<script src="<?php echo URL_THEME;?>/campana-registro/js/jquery.Rut.min.js"></script>
<script src="<?php echo URL_THEME;?>/campana-registro/js/jquery.alphanumeric.js"></script>
<script>
	jQuery(document).ready(function(){
        jQuery('#rut').Rut().rut();
        jQuery('#nombre, #apellido').alpha();
        jQuery('#celular').numeric();

		//$('#load-screen').delay(1000).fadeOut(function(){$(this).remove()});


        jQuery('.verificador').click(function(){
            if(jQuery.Rut.validar(jQuery('#rut').val())){
                jQuery.ajax({
                    type: "POST",
                    url: "http://www.salcobrand.cl/cl/",
                    data: "cms_salco=consultacli&rut="+jQuery('#rut').val(),
                    success: function(datos){
                        location.href="http://www.salcobrand.cl/cl/viaje-sonado-gracias/";
                    }
                });
            }else{
                jQuery('#rutctualiza').css('border','1px solid #FF0026');
            }
        });

        jQuery('#btn_enviar').click(function(){
            jQuery('#load-screen').show();
            var error = 0;
            if(jQuery('#rut').val() == '' || !jQuery.Rut.validar(jQuery('#rut').val())){jQuery('#rut').css('border','1px solid #FF0026');jQuery('#uno').css('display','block');error++;}else{
                jQuery.ajax({
                    type: "POST",
                    url: "http://www.salcobrand.cl/cl/",
                    data: "cms_salco=consultacli&rut="+jQuery('#rut').val(),
                    success: function(datos){
                        if(datos == '1'){
                            jQuery('#rut').css('border','1px solid #FF0026');error++;
                        }
                    }
                });
            }
            if(jQuery('#nombre').val() == ''){jQuery('#nombre').css('border','1px solid #FF0026');jQuery('#dos').css('display','block');error++;}
            if(jQuery('#apellido').val() == ''){jQuery('#apellido').css('border','1px solid #FF0026');jQuery('#tres').css('display','block');error++;}
            if(jQuery('#email').val() == ''){jQuery('#email').css('border','1px solid #FF0026');jQuery('#cuatro').css('display','block');error++;}
            if(jQuery('#celular').val() == ''){jQuery('#celular').css('border','1px solid #FF0026');jQuery('#cinco').css('display','block');error++;}
            if(jQuery('#password').val() == '' || jQuery('#password').val() != jQuery('#password2').val()){jQuery('#password').css('border','1px solid #FF0026');jQuery('#seis').css('display','block');error++;}
            if(jQuery('#password2').val() == '' || jQuery('#password').val() != jQuery('#password2').val()){jQuery('#password2').css('border','1px solid #FF0026');jQuery('#siete').css('display','block');error++;}
            if(jQuery('#terminos').is(':checked')){}else{error++;jQuery('#ocho').css('display','block');}
            

            if(error == 0){
                jQuery.ajax({
                    type: "POST",
                    url: "http://www.salcobrand.cl/cl/",
                    data: jQuery('#fm_registro').serialize(),
                    success: function(datos){
                        if(datos == 'ok'){
                            _gaq.push(['_trackPageview', 'CampanaRegistro', 'Enviardatos']);
                            location.href="http://www.salcobrand.cl/cl/viaje-sonado-gracias/";
                        }
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
        jQuery('#nombre').focus(function(){
            jQuery('#dos').css('display','none');
        });
        jQuery('#apellido').focus(function(){
            jQuery('#tres').css('display','none');
        });
        jQuery('#email').focus(function(){
            jQuery('#cuatro').css('display','none');
        });
        jQuery('#celular').focus(function(){
            jQuery('#cinco').css('display','none');
        });
        jQuery('#password').focus(function(){
            jQuery('#seis').css('display','none');
        });
        jQuery('#password2').focus(function(){
            jQuery('#siete').css('display','none');
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
    <div style="padding: 90px 0 0 318px; position: absolute;"><img src="<?php echo URL_THEME;?>/campana-registro/images/txt-reg.png" /></div>
<!-- loading -->
<div id="load-screen" style="display:none;"></div>

<div class="contenidoform-familia">
	<div class="columna-uno">
    	<img src="<?php echo URL_THEME;?>/campana-registro/images/<?php echo $_SESSION['modo']; ?>.png" class="margintop24">
        <!-- <img src="images/amigos.png" width="235" height="250" class="margintop21"> -->
        <!-- <img src="images/familia.png" width="210" height="270"> -->
    </div>
    <div class="columna-formulario">
    	<form id="fm_registro">
        <ul>
        	<li><label class="span200">Rut (ej. 12346567-8)</label><input name="rut" type="text" id="rut" maxlength="10" value="<?php echo $_SESSION['rut']; ?>"><span id="uno" class="b-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span><!--<img src="<?php echo URL_THEME;?>/campana-registro/images/rut-valido.png" width="27" height="27" class="verificador">--></li><br class="limpiar">
        	<li class="hidden"><label class="span200">Nombre</label><input name="nombre" type="text" id="nombre" maxlength="50"><span id="dos" class="b-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span></li><br class="limpiar">
            <li class="hidden"><label class="span200">Apellido</label><input name="apellido_paterno" type="text" id="apellido" maxlength="50"><span id="tres" class="b-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span></li><br class="limpiar">
            <li class="hidden"><label class="span200">Sexo</label><input type="radio" name="sexo" id="sexo" checked="checked" value="Masculino"><label class="span50">Masculino</label><input type="radio" name="sexo" id="sexo" value="Femenino"><label class="span50">Femenino</label></li><br class="limpiar">
            <li class="hidden"><label class="span200">Email</label><input name="email" type="text" id="email" maxlength="50"><span id="cuatro" class="b-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span></li><br class="limpiar">
            <li class="hidden"><label class="span200">Celular</label><input name="celular" type="text" id="celular" maxlength="8"><span id="cinco" class="b-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span></li><br class="limpiar">
            <li class="hidden"><label class="span200">Fecha Nacimiento</label>
            	<select name="dia" id="dia" class="dia">
                    <?php for($x=1;$x<=31;$x++) echo '<option value="'.$x.'">'.$x.'</option>'; ?>
                </select>
                <select name="mes" id="mes" class="mes">
                	<option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <select name="ano" id="ano" class="year">
                	<?php for($x=2013;$x>=1900;$x--) echo '<option value="'.$x.'">'.$x.'</option>'; ?>
                </select>
            </li><br class="limpiar">
            <li class="hidden"><label class="span200">Contraseña</label><input name="password" type="password" id="password" autocomplete="off"><span id="seis" class="b-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span></li><br class="limpiar">
            <li class="hidden"><label class="span200">Repetir contraseña</label><input name="password2" type="password" id="password2" autocomplete="off"><span id="siete" class="b-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span></li><br class="limpiar">
          	<li class="hidden"><input name="acepto" type="checkbox" id="" checked="checked"><label  class="span400">Acepto recibir ofertas y noticias de Salcobrand en correo electrónico.</label></li><br class="limpiar">
            <li class="hidden"><input name="acepto_sms" type="checkbox" id=""><label  class="span400">Acepto recibir información de Salcobrand via SMS.</label></li><br class="limpiar">
            <li class="hidden"><input name="terminos" type="checkbox" id="terminos" checked="checked"><span id="ocho" class="c-error"><img src="<?php echo URL_THEME;?>/campana-registro/images/error.png" /></span><label  class="span400">Estoy de acuerdo con los términos establecidos en el archivo<br><a href="">Política y Privacidad</a> publicado en este sitio.</label></li><br class="limpiar">
        </ul>
        <li class="boton-enviar hidden">
        	<input id="btn_enviar" type="button">
        </li>
        <input type="hidden" name="cms_salco" id="cms_salco" value="registro_campanas" />
        <input type="hidden" name="origen" value="Campaña Registro 2013" />
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
