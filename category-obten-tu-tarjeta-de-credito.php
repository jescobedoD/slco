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
<!-- REGISTRO -->
<div id="registro">
	<?php get_template_part('content_breadcums_tcs', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<img src="<?php echo URL_THEME;?>/images/tarjeta_bgr_logo.png" alt="" style="float: right; margin-left: 10px; margin-right: 17px; margin-bottom: 10px; margin-top: -67px; "/>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.form_r_estado').customStyle({width:227});
		jQuery('.form_r_ubi').customStyle({width:227});
		jQuery('.form_r_fecha_dia').customStyle({width:60});
		jQuery('.form_r_fecha_mes').customStyle({width:90});
		jQuery('.form_r_fecha_year').customStyle({width:70});
		
		jQuery("input[name='rut_digito']").mask("99999999", {placeholder:""});
		//jQuery("input[name='tel_particular']").mask("99999999999", {placeholder:""});
		//jQuery("input[name='tel_celular']").mask("99999999999", {placeholder:""});
		
	});
	</script>
	<div id="registro_form">
		<form id="form_registro" action="?" method="post" target="_parent">
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
					<input type="text" class="rut_a" name="rut_digito" value="<?php echo (isset($_POST['rut_digito']))? $_POST['rut_digito']: '';?>" />
					<input type="text" class="rut_b" name="rut_verificador" value="<?php echo (isset($_POST['rut_verificador']))? $_POST['rut_verificador']: '';?>" />
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
			<div class="r_titulo"></div>
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
					<input type="text" class="rut_b" name="dir_numero" value="<?php echo (isset($_POST['dir_numero']))? $_POST['dir_numero']: '';?>" />
				</div>
				<div class="r_general">
					<span>N&deg; de Block, Depto.</span>
					<input type="text" name="dir_depto" value="<?php echo (isset($_POST['dir_depto']))? $_POST['dir_depto']: '';?>" />
				</div>
			</div>
			<div class="r_left">
				<div class="r_general">
					<span>* Tel. Particular</span>
					<input type="text" name="tel_particular" value="<?php echo (isset($_POST['tel_particular']))? $_POST['tel_particular']: '';?>" />
				</div>
			</div>
			<div class="r_right">
				<div class="r_general">
					<span>Tel. Celular</span>
					<input type="text" name="tel_celular" value="<?php echo (isset($_POST['tel_celular']))? $_POST['tel_celular']: '';?>" />
				</div>
			</div>
			<div class="r_titulo"></div>
			<div class="r_right">
				<div class="r_sexo_box">
					<span>Fecha de pago</span>
					<div class="r_sexo">
						<input type="radio" value="1" name="fecha_pago" checked="checked" />
						<span class="r_sexo_til" style="width: 20px;">1</span>
						<input type="radio" value="6" name="fecha_pago" />
						<span class="r_sexo_til" style="width: 20px;">6</span>
						<input type="radio" value="11" name="fecha_pago" />
						<span class="r_sexo_til" style="width: 20px;">11</span>
						<input type="radio" value="21" name="fecha_pago" />
						<span class="r_sexo_til" style="width: 20px;">21</span>
						<input type="radio" value="26" name="fecha_pago" />
						<span class="r_sexo_til" style="width: 20px;">26</span>
					</div>
				</div>
			</div>
			<div class="r_enviar">
				<input type="hidden" name="cms_salco" value="solicitud" />
				<input type="submit" value="Enviar datos de solicitud" />
			</div>
		</form>
		<?php if(status_registro()== "exito"){?>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				show_alert("&igrave;Felicitaciones!", "Tus datos han sido enviados correctamente");
			});
			</script>
		<?php }elseif(status_registro()){?>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				show_alert("&igrave;Atenci&oacute;n!", "<?php echo status_registro();?>");
			});
			</script>
		<?php }?>
	</div>
</div>
<!-- END REGISTRO -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>