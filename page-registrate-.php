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
	<?php get_template_part('content_sub_noticias', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- REGISTRO -->

<div id="registro">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.form_r_estado').customStyle({width:227});
		jQuery('.form_r_ubi').customStyle({width:227});
		jQuery('.form_r_fecha_dia').customStyle({width:50});
		jQuery('.form_r_fecha_mes').customStyle({width:80});
		jQuery('.form_r_fecha_year').customStyle({width:60});
		
		//jQuery("input[name='rut_digito']").mask("99999999", {placeholder:""});
		//jQuery("input[name='tel_particular']").mask("99999999999", {placeholder:""});
		//jQuery("input[name='tel_celular']").mask("99999999999", {placeholder:""});
		
	});
	</script>
    
<script type="text/javascript">
function checkKey(e,codigo) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    te = String.fromCharCode(tecla);
    
	switch(codigo)
	{
	case 1:
		patron 	=/[1234567890]/;
  		if (!patron.test(te)) {
      		return false;
    	}
  	break;
	case 2:
  		patron 	=/[1234567890kK]/;
  		if (!patron.test(te)) {
      		return false;
    	}
  	break;
	
	default:
		patron 	=/[1234567890]/;
  		if (!patron.test(te)) {
      		return false;
    	}
	}
	
} 
</script>
    
	<div id="registro_form">
		<form id="form_registro" action="?" method="post" target="_parent">
			<div class="r_titulo" style="width:600px;">1. Crea tu Cuenta</div>
			<div class="r_left">
				<div class="r_general">
					<span>* Nombre</span>
					<input type="text" name="nombre" value="<?php echo (isset($_POST['nombre']))? $_POST['nombre']: '';?>" />
				</div>
				<div class="r_general">
					<span>Segundo Nombre</span>
					<input type="text" name="segundo_nombre" value="<?php echo (isset($_POST['segundo_nombre']))? $_POST['segundo_nombre']: '';?>" />
				</div>
				<div class="r_general">
					<span>* Apellido Paterno</span>
					<input type="text" name="apellido_paterno" value="<?php echo (isset($_POST['apellido_paterno']))? $_POST['apellido_paterno']: '';?>" />
				</div>
				<div class="r_general">
					<span>* Apellido Materno</span>
					<input type="text" name="apellido_materno" value="<?php echo (isset($_POST['apellido_materno']))? $_POST['apellido_materno']: '';?>" />
				</div>
				<div class="r_fecha">
					<span>* Fecha de Nacimiento</span>
					<div class="select-wrap">
					<select class="form_r_fecha_dia" name="fecha_de_nacimiento_dia">
						<option value="0">D&iacute;a</option>
						<?php
						foreach(get_dias() AS $item){?>
							<option value="<?php echo $item;?>" <?php echo (isset($_POST['fecha_de_nacimiento_dia']) && $_POST['fecha_de_nacimiento_dia'] == $item)? 'selected="selected"': '';?>><?php echo $item;?></option>
						<?php }?>
					</select>
					</div>
					<div class="select-wrap">
					<select class="form_r_fecha_mes" name="fecha_de_nacimiento_mes">
						<option value="0">Mes</option>
						<?php
						foreach(get_meses() AS $key=>$item){?>
							<option value="<?php echo $key;?>" <?php echo (isset($_POST['fecha_de_nacimiento_mes']) && $_POST['fecha_de_nacimiento_mes'] == $key)? 'selected="selected"': '';?>><?php echo $item;?></option>
						<?php }?>
					</select>
					</div>
					<div class="select-wrap">
					<select class="form_r_fecha_year" name="fecha_de_nacimiento_anio">
						<option value="0">A&ntilde;o</option>
						<?php
						foreach(get_anios() AS $item){?>
							<option value="<?php echo $item;?>" <?php echo (isset($_POST['fecha_de_nacimiento_anio']) && $_POST['fecha_de_nacimiento_anio'] == $item)? 'selected="selected"': '';?>><?php echo $item;?></option>
						<?php }?>
					</select>
					</div>
				</div>
			</div>                    
			<div class="r_right">
				<div class="r_rut">
					<span>* Rut</span>
					<input name="rut_digito" type="text" class="rut_a" onkeydown="return checkKey(event,1);" value="<?php echo (isset($_POST['rut_digito']))? $_POST['rut_digito']: '';?>" maxlength="8" />
					<input name="rut_verificador" type="text" class="rut_b" onkeydown="return checkKey(event,2);" value="<?php echo (isset($_POST['rut_verificador']))? $_POST['rut_verificador']: '';?>" maxlength="1" />
				</div>
				<div class="r_estado">
					<span>Estado Civil</span>
					<div class="select-wrap">
					<select class="form_r_estado" name="estado_civil">
						<option value="0" <?php echo (isset($_POST['estado_civil']) && $_POST['estado_civil'] == "0")? 'selected="selected"': '';?>>Seleccione</option>
						<option value="SOLTERO"<?php echo (isset($_POST['estado_civil']) && $_POST['estado_civil'] == "SOLTERO")? 'selected="selected"': '';?>>Soltero</option>
						<option value="CASADO"<?php echo (isset($_POST['estado_civil']) && $_POST['estado_civil'] == "CASADO")? 'selected="selected"': '';?>>Casado</option>
						<option value="VIUDO O SEPARADO"<?php echo (isset($_POST['estado_civil']) && $_POST['estado_civil'] == "VIUDO O SEPARADO")? 'selected="selected"': '';?>>Viudo o separado</option>
					</select>
					</div>
				</div>
				<div class="r_sexo_box">
					<span>Sexo</span>
					<div class="r_sexo">
						<input type="radio" value="m" name="sexo" checked="checked" />
						<span class="r_sexo_til">Masculino</span>
						<input type="radio" value="f" name="sexo" />
						<span class="r_sexo_til">Feminino</span>
					</div>
				</div>
				<div class="r_general">
					<span>* E-Mail</span>
					<input type="text" name="email" value="<?php echo (isset($_POST['email']))? $_POST['email']: '';?>" />
				</div>
			</div>
			<div class="r_titulo" style="width:600px;">2. Indícanos tu ubicaci&oacute;n</div>
			<div class="r_left">
				<div class="r_ubi">
					<script type="text/javascript">
					function cambiar_region(n){
						var provincias=new Array();
						<?php foreach(salco_provincias() AS $item){?>
						provincias.push([<?php echo $item->idregion;?>, <?php echo $item->idprovincia;?>, "<?php echo $item->nombre;?>"]);
						<?php }?>
						jQuery("select[name='provincia']").find("option").remove();
						if(n.value=="0"){
							jQuery("select[name='provincia']").append('<option value="0">...</option>');
							jQuery("select[name='provincia']").next().find(".customStyleSelectBoxInner").html("...");
						}else{
							jQuery("select[name='provincia']").append('<option value="0">Seleccione su provincia</option>');
							jQuery("select[name='provincia']").next().find(".customStyleSelectBoxInner").html("Seleccione su provincia");
						}
						
						jQuery("select[name='comuna']").find("option").remove();
						jQuery("select[name='comuna']").append('<option value="0">...</option>');
						jQuery("select[name='comuna']").next().find(".customStyleSelectBoxInner").html("...");
						
						for(var i=0; i<provincias.length;i++){
							if(provincias[i][0] == n.value){
								jQuery("select[name='provincia']").append('<option value="'+provincias[i][1]+'">'+provincias[i][2]+'</option>');
							}
						}
					} 
					</script>
					<span>* Regi&oacute;n</span>
					<div class="select-wrap">
					<select id="r_region" class="form_r_ubi" name="region" onchange="cambiar_region(this);">
						<option value="0">Selecciona</option>
						<?php foreach(salco_regiones() AS $item){?>
							<option value="<?php echo $item->idregion;?>" <?php echo (isset($_POST['region']) && $_POST['region'] == $item->idregion)? 'selected="selected"': '';?>><?php echo $item->nombre;?></option>
						<?php }?>
					</select>
					</div>
				</div>
				<div class="r_ubi">
					<script type="text/javascript">
					function cambiar_provincia(n){
						var comunas=new Array();
						<?php foreach(salco_comunas() AS $item){?>
						comunas.push([<?php echo $item->idciudad;?>, <?php echo $item->idcomunas;?>, "<?php echo $item->nombre;?>"]);
						<?php }?>
						jQuery("select[name='comuna']").find("option").remove();
						if(n.value=="0"){
							jQuery("select[name='comuna']").append('<option value="0">...</option>');
							jQuery("select[name='comuna']").next().find(".customStyleSelectBoxInner").html("...");
						}else{
							jQuery("select[name='comuna']").append('<option value="0">Seleccione su comuna</option>');
							jQuery("select[name='comuna']").next().find(".customStyleSelectBoxInner").html("Seleccione su comuna");
						}
						
						for(var i=0; i<comunas.length;i++){
							if(comunas[i][0] == n.value){
								jQuery("select[name='comuna']").append('<option value="'+comunas[i][1]+'">'+comunas[i][2]+'</option>');
							}
						}
					} 
					</script>
					<span>* Provincia</span>
					<div class="select-wrap">
					<select id="r_provincia" class="form_r_ubi" name="provincia" onchange="cambiar_provincia(this);">
						<?php
						if(isset($_POST['provincia'])){
							echo '<option value="0">Seleccione su provincia</option>';
							foreach(salco_provincias() AS $item){
								if($item->idregion== $_POST['region']){
									$select = (isset($_POST['provincia']) && $_POST['provincia'] == $item->idprovincia)? 'selected="selected"' : "";
									echo '<option value="'.$item->idprovincia.'" '.$select.'>'.$item->nombre.'</option>';
								}
							}
						}else{
							echo '<option value="0">...</option>';
						}?>
					</select>
					</div>
				</div>
				<div class="r_ubi">
					<span>* Comuna</span>
					<div class="select-wrap">
					<select id="r_comuna" class="form_r_ubi" name="comuna">
						<?php
						if(isset($_POST['comuna'])){
							echo '<option value="0">Seleccione su comuna</option>';
							foreach(salco_comunas() AS $item){
								if($item->idciudad== $_POST['provincia']){
									$select = (isset($_POST['comuna']) && $_POST['comuna'] == $item->idcomunas)? 'selected="selected"' : "";
									echo '<option value="'.$item->idcomunas.'" '.$select.'>'.$item->nombre.'</option>';
								}
							}
						}else{
							echo '<option value="0">...</option>';
						}?>
					</select>
					</div>
				</div>
			</div>
			<div class="r_right">
				<div class="r_rut">
					<span>*Av. Calle o Psje., N&deg;</span>
					<input type="text" class="rut_a" name="dir_calle" value="<?php echo (isset($_POST['dir_calle']))? $_POST['dir_calle']: '';?>" />
					<input type="text" class="rut_b" onkeydown="return checkKey(event,1);" maxlength="8" name="dir_numero" value="<?php echo (isset($_POST['dir_numero']))? $_POST['dir_numero']: '';?>" />
				</div>
				<div class="r_general">
					<span>N&deg; de Block, Depto.</span>
					<input type="text" onkeydown="return checkKey(event,1);" name="dir_depto" value="<?php echo (isset($_POST['dir_depto']))? $_POST['dir_depto']: '';?>" />
				</div>
			</div>
			<div class="r_titulo" style="width:100%; display:inline-block;">3. Ay&uacute;danos a ubicarte <span style="display:inline; font-weight:normal;">(agregar al menos un teléfono)</span></div>
			<div class="r_left">
				<div class="r_general">
					<span> Tel. Particular</span>
					<input type="text" name="tel_particular" onkeydown="return checkKey(event,1);" maxlength="12" value="<?php echo (isset($_POST['tel_particular']))? $_POST['tel_particular']: '';?>" />
				</div>
			</div>
			<div class="r_right">
				<div class="r_general">
					<span>Tel. Celular</span>
					<input type="text" name="tel_celular" onkeydown="return checkKey(event,1);" maxlength="12" value="<?php echo (isset($_POST['tel_celular']))? $_POST['tel_celular']: '';?>" />
				</div>
			</div>
			<div class="r_titulo" style="width:600px;">4. Contrase&ntilde;a de Acceso</div>
			<div class="r_left">
				<div class="r_general">
					<span>* Contrase&ntilde;a</span>
					<input type="password" name="password" value="" />
				</div>
				<div class="r_general">
					<span>* Repetir Contrase&ntilde;a</span>
					<input type="password" name="re_password" value="" />
				</div>
			</div>
			<div class="r_recibir">
				<input type="checkbox" id="r_acepto" name="acepto" checked="checked" value="true" />
				<span>Acepto recibir ofertas y noticias de Salcobrand en mi correo electr&oacute;nico.</span></div>
            <div class="r_recibir">
				<input type="checkbox" id="r_acepto_sms" name="acepto_sms" checked="checked" value="true" />
				<span>Acepto recibir informaci&oacute;n de Salcobrand v&iacute;a SMS.</span></div>
            
            
			<div class="r_enviar">
				<input type="hidden" name="cms_salco" value="registro" />
				<input type="submit" value="Enviar datos de registro" />
			</div>
		</form>
		<?php if(status_registro()== "exito"){?>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("#alerta_wrap .alerta_close").click(function(){
					jQuery("#alerta_wrap").hide();
					return true;
				});
				jQuery("#alerta_wrap .alerta_header a").attr("href", "<?php echo URL_BASE;?>");
				jQuery("#alerta_wrap h1").html("&igrave;Felicitaciones!");
				jQuery("#alerta_wrap p").html("Tus datos han sido enviados correctamente");
				jQuery("#alerta_wrap").show();
			});
			</script>
		<?php }elseif(status_registro()){?>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("#alerta_wrap .alerta_close").click(function(){
					jQuery("#alerta_wrap").hide();
					return false;
				});
				jQuery("#alerta_header a").attr("href", "#");
				jQuery("#alerta_wrap h1").html("&igrave;Atenci&oacute;n!");
				jQuery("#alerta_wrap p").html("<?php echo status_registro();?>");
				jQuery("#alerta_wrap").show();
			});
			</script>
		<?php }?>
	</div>
</div>
<!-- END REGISTRO -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>