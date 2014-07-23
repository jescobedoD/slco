<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<?php get_header(); ?>
<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<?php get_template_part('content_sub_tarjeta', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- NUESTRA EMPRESA -->
<div id="noticias">
	<?php get_template_part('content_breadcums_tcs', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<p style="font-family:Arial;font-size:11px;margin-bottom:10px;margin-left:0;margin-right:0;margin-top:0;">Busca aqu&iacute; donde puedes utilizar tu Tarjeta Cr&eacute;dito Salcobrand. Tenemos m&aacute;s de 2.300 comercios asociados entre Cl&iacute;nicas, Hospitales, Centros M&eacute;dicos, Centros Dentales y &Oacute;pticas asociados a la red IMED a lo largo de todo Chile.</p>
	<div id="ca_seleccionar">
		<script type="text/javascript">
		jQuery(document).ready(function(){
/* 			jQuery('.ca_rubro').customStyle({width:180});
			jQuery('.ca_comuna').customStyle({width:180}); */
		});
		</script>
		<form id="form_comercios" action="<?php echo esc_url(home_url("/category/comercios-asociados"));?>?" method="get" target="_parent">
		
			<div class="select-wrap">
			<select class="ca_comuna" name="region_id" id="region_id">
				<option value="0">Seleccione Regi&oacute;n</option>
				<?php foreach(salco_asociado_region() AS $key){?>
				<option value="<?php echo cambiaTildes($key->region);?>"><?php echo $key->region;?></option>
				<?php }?>
			</select>
			</div>
			<div class="select-wrap">
			<select class="ca_comuna" name="comuna_id"  id="comuna_id">
				<option value="0">Seleccione Comuna</option>
	
			</select>
			</div>
			<div class="select-wrap">
			<select class="ca_rubro" name="rubro_id" id="rubro_id">
				<option value="0">Seleccione Rubro</option>
			</select>
			</div>
			
			
			<input type="hidden" name="page" value="<?php echo (isset($_GET['page']))? $_GET['page'] : "0";?>"/>
			<input type="submit" id="ca_enviar" value="" />
			<!--<a href="#">Volver</a>-->
		</form>
	</div>
	<div id="ca_resultados">
		<?php
		$asociados = salco_asociado();
		if(count($asociados[0])!=0){?>
			<ul id="ca_til">
				<li>Nombre</li>
				<li>Rubro</li>
				<li>Regi&oacute;n</li>
				<li>Direcci&oacute;n</li>
				<li>Comuna</li>
				<li>Tel&eacute;fono</li>
			</ul>
			<?php foreach($asociados[0] AS $asociado){?>
				<ul>
					<li><span><?php echo wordwrap($asociado->nombre, 16, "\n", true);?></span></li>
					<li><span><?php echo $asociado->rubro;?></span></li>
					<li><span><?php echo $asociado->region;?></span></li>
					<li><span><?php echo $asociado->direccion;?></span></li>
					<li><span><?php echo $asociado->comuna;?></span></li>
					<li><span><?php echo $asociado->telefono;?></span></li>
				</ul>
			<?php }?>
		<?php }else{?>
			<p style="font-family:Arial;font-size:11px;margin-bottom:10px;margin-left:0;margin-right:0;margin-top:0;">No hay resultados,  Recuerde elegir Región, Comuna y Rubro para hacer la busqueda</p>
		<?php }?>
	</div>
	<!--
	<div id="ca_pag">
		<a href="#" class="ca_pag_a ca_pag_no">&lsaquo;&lsaquo; Anteriores</a>
		<ul>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">6</a></li>
			<li><a href="#">7</a></li>
		</ul>
		<span>...</span>
		<ul>
			<li><a href="#">199</a></li>
			<li><a href="#">200</a></li>
		</ul>
		<a href="#" class="ca_pag_s">Siguientes &rsaquo;&rsaquo;</a>
	</div>
	-->
</div>
<!-- END NUESTRA EMPRESA -->
<div id="vitrina_grad"></div>
<script type="text/javascript">
	jQuery.ajaxSetup({ cache: false }); 
	
	jQuery("#region_id").live('change',function(){
		jQuery("#comuna_id").empty();
		var value = jQuery(this).val();
		jQuery.ajax({
			  url: "<?php echo URL_BASE;?>?com_per_reg="+value,
			  cache: false,
			  success: function(datos){
			    //$(this).append(html);
/* 			    jQuery("#comuna_id").empty();
			    jQuery("#comuna_id").append('<option value="0">Seleccione Comuna</option>');
			    jQuery("#comuna_id")[0].selectedIndex = 0;
			    jQuery("#comuna_id").append(html); */
			    jQuery("#comuna_id").append(datos);
			  }
			});
	});
	
	jQuery("#comuna_id").change(function(){
		var value = jQuery(this).val();
		jQuery.ajax({
			  url: "<?php echo URL_BASE;?>/?rub_per_com="+jQuery("#region_id").val()+"|"+value,
			  cache: false,
			  success: function(html){
			    //$(this).append(html);
			    jQuery("#rubro_id").empty();
			    jQuery("#rubro_id").append('<option value="0">Seleccione Rubro</option>');
			    jQuery("#rubro_id")[0].selectedIndex = 0;
			    jQuery("#rubro_id").append(html);
			  }
			});
	});
</script>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer();

function cambiaTildes($string){
	$string = str_replace('Á','A',$string);
	$string = str_replace('É','E',$string);
	$string = str_replace('Í','I',$string);
	$string = str_replace('Ó','O',$string);
	$string = str_replace('Ú','U',$string);
	$string = str_replace('a','a',$string);
	$string = str_replace('e','e',$string);
	$string = str_replace('i','i',$string);
	$string = str_replace('o','o',$string);
	$string = str_replace('u','u',$string);
	
	return $string;
}


 ?>