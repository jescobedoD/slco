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
<!-- CONTACTO -->

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


<div id="despacho_domicilio" style="background:none;">
	<?php get_template_part('content_breadcums_tcs', get_post_format());?>
    <?php $user_data = salco_get_display_userdata();?>

	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<div id="contacto_intro">
            	<span>T&uacute; opini&oacute;n es muy importante para nosotros</span>
                <p>Env&iacute;anos tus comentarios, sugerencias y dudas. Un equipo de Salcobrand revisar&aacute; tu mensaje y<br />te dar&aacute; una respuesta a la brevedad posible.</p>
            </div>
            <script type="text/javascript">
			jQuery(function(){
				jQuery('.form_c_region').customStyle({width:230});
				jQuery('.form_c_provi').customStyle({width:230});
				jQuery('.form_c_asunto').customStyle({width:230});
				jQuery('.form_c_ciudad').customStyle({width:230});
				/*function validarForm(){
					alert(1);
					return false;
				}*/
			});
			</script>
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
            <div id="contacto_form">
            	<form id="form_contacto" action="?" method="post" onsubmit="return validarForm(this);">
                    <div class="c_general">
                    	<span>Nombre</span>
                        <input name="nombre" type="text" value="<?php echo $user_data->first_name;?>"  <?php 
							if ($user_data->first_name != ""){ echo " readonly='readonly'";}
							?>/>
                  </div>
                    <div class="c_general">
                    	<span>Apellido</span>
                        <input type="text" name="apellido" value="<?php echo $user_data->last_name;?>" <?php 
							if ($user_data->last_name != ""){ echo " readonly='readonly'";}
							?>/>
                    </div>
                    <div class="c_rut">
                    <?php $rut = explode("-",$user_data->user_login);?>
                    	<span>Rut</span>
                        <input type="text" onkeydown="return checkKey(event,1);" class="c_rut_a" name="rut" value="<?php echo $rut[0];?>" <?php 
							if ($rut[0] != ""){ echo " readonly='readonly'";}
							?>/>
                        <input name="cv" type="text" class="c_rut_b" onkeydown="return checkKey(event,2);" value="<?php echo $rut[1];?>" maxlength="1" <?php 
							if ($rut[1] != ""){ echo " readonly='readonly'";}
							?>/>
                    </div>
                    <div class="c_general">
                    	<span>Email</span>
                        <input type="text" name="email" autocomplete="off" value="<?php echo $user_data->user_email;?>" <?php 
							if ($user_data->user_email != ""){ echo " readonly='readonly'";}
							?>/>
                    </div>
                    <div class="c_asunto">
                    	<div class="c_asunto_til">Asunto del Mensaje</div>
                        <div class="select-wrap">
                        <select class="form_c_asunto" name="asunto">
                        	<option>Selecciona</option>
				<option>Exclusivo Tarjeta Cr&eacute;dito</option>
                            	<option>Consulta ubicación de locales y horarios</option> 
				<option>Consulta de productos, precios y promociones </option>
				<option>Consulta sobre convenios</option>
				<option>Exclusivo Tarjeta de Crédito Salcobrand</option>
				<option>Sugerencias</option>
				<option>Felicitaciones</option>
				<option>Reclamos de atención al cliente</option>
				<option>Solicitud copia de boleta </option>
                        </select>
                        </div>
                    </div>
                    <div class="c_region">
                    	<div class="c_region_til">Seleccione Regi&oacute;n</div>
                    	<div class="select-wrap">
							<select id="r_region" class="form_c_region" name="region" onchange="cambiar_region(this);">
								<option value="0">Selecciona</option>
								<?php foreach(salco_regiones() AS $item){?>
								<option value="<?php echo $item->idregion;?>" <?php echo ($current_user->region == $item->idregion)? 'selected="selected"': '';?>><?php echo $item->nombre;?></option>
								<?php }?>
							</select>
						</div>
                    </div>
                    <div class="c_provi">
                    	<div class="c_provi_til">Seleccione Provincia</div>
                        <div class="select-wrap">
                        <select class="form_c_provi" name="provincia" onchange="cambiar_provincia(this);">
                        	<option value="0">...</option>
                            <?php
							foreach(salco_provincias() as $item) {
								if ($item->idregion == $current_user->region) {
									$select = ($current_user->provincia == $item->idprovincia) ? 'selected="selected"' : "";
									echo '<option value="' . $item->idprovincia . '" ' . $select . '>' . $item->nombre . '</option>';
								}
							}
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="c_ciudad">
                    	<div class="c_ciudad_til">Comuna</div>
                    	<div class="select-wrap">
                        <select class="form_c_ciudad" name="comuna">
                        	<option value="0">...</option>
                             <?php
							foreach(salco_comunas() as $item) {
								if ($item->idciudad == $current_user->provincia) {
									$select = ($current_user->comuna == $item->idcomunas) ? 'selected="selected"' : "";
									echo '<option value="' . $item->idcomunas . '" ' . $select . '>' . $item->nombre . '</option>';
								}
							}
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="c_tel">
                    	<span>Tel&eacute;fono (c&oacute;d + n&uacute;mero)</span>
                        <input name="tel_cod" type="text" class="c_tel_a" onkeydown="return checkKey(event,1);" value="" maxlength="4"/>
                        <input name="tel_num" type="text" class="c_tel_b" onkeydown="return checkKey(event,1);" value="<?php echo $current_user->telefono_fijo; ?>" maxlength="12"/>
                    </div>
                    
                    <div class="c_mensaje">
                    	<span>Mensaje</span>
                        <textarea name="mensaje"></textarea>
                    </div>
                    <div class="c_enviar">
                    	<input type="hidden" name="cms_salco" value="contacto"/>
                    	<input type="submit" value="" />
                    </div>
                </form>
            </div>
        </div>
        <?php if(status_contacto()== "exito"){?>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("#alerta_wrap .alerta_close").click(function(){
					jQuery("#alerta_wrap").hide();
					return false;
				});
				jQuery("#alerta_wrap h1").html("&igrave;Felicitaciones!");
				jQuery("#alerta_header a").attr("href", "#");
				jQuery("#alerta_wrap p").html("Tu mensaje ha sido enviado correctamente");
				jQuery("#alerta_wrap").show();
			});
			</script>
		<?php }elseif(status_contacto()){?>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("#alerta_wrap .alerta_close").click(function(){
					jQuery("#alerta_wrap").hide();
					return false;
				});
				jQuery("#alerta_wrap h1").html("&igrave;Atenci&oacute;n!");
				jQuery("#alerta_header a").attr("href", "#");
				jQuery("#alerta_wrap p").html("<?php echo status_contacto();?>");
				jQuery("#alerta_wrap").show();
			});
			</script>
		<?php }?>
        <!-- END CONTACTO -->
<?php get_footer(); ?>