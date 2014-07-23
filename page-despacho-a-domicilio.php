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
	<?php get_template_part('content_sub_despacho', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- DESPACHO DOMICILIO -->


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
    





<div id="despacho_domicilio">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<div id="despacho_domicilio_intro">
		<span>Completa los datos.</span>
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<?php the_content();?>
		<?php endwhile; endif; ?>
	</div>
	<?php if(current_user_can('level_0')):?>
		<?php $user_data = salco_get_display_userdata();?>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.form_dd_ciudad').customStyle({width:230});
			jQuery('.form_dd_comuna').customStyle({width:230});
			jQuery('.form_dd_forma').customStyle({width:230});
			if(jQuery("select[name='region']").val() != 0){
				//cambiar_region(document.getElementById("form_despacho").region);
			}
		});
		function cambiar_region(n){
			var provincias=new Array();
			<?php foreach(salco_provincias() AS $item){?>
				provincias.push([<?php echo $item->idregion;?>, <?php echo $item->idprovincia;?>, "<?php echo $item->nombre;?>"]);
			<?php }?>
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
			
			for(var i=0; i<provincias.length;i++){
				if(provincias[i][0] == n.value){
					for(j=0; j<comunas.length; j++){
						if(provincias[i][1] == comunas[j][0]){
							jQuery("select[name='comuna']").append('<option value="'+comunas[j][1]+'">'+comunas[j][2]+'</option>');
						}
					}
				}
			}
		}
		</script>				
		<div id="despacho_domicilio_form">
			<form id="form_despacho" action="<?php echo esc_url(home_url("/despacho-a-domicilio"));?>" method="post" target="_parent">
				<span class="dd_titulo_a">Datos generales</span>
				<div class="dd_general">
					<span>Nombre</span>
					<input type="text" name="nombre" value="<?php echo $user_data->first_name;?>" />
				</div>
				<div class="dd_general">
					<span>Apellido</span>
					<input type="text" name="apellido" value="<?php echo $user_data->apellido_paterno." ".$user_data->apellido_materno;?>" />
				</div>
				<div class="dd_general">
					<span>Tel&eacute;fono 1</span>
					<input type="text" onkeydown="return checkKey(event,1);" name="telefono1" value="<?php echo $user_data->telefono_fijo;?>" />
				</div>
				<div class="dd_general">
					<span>Tel&eacute;fono 2</span>
					<input onkeydown="return checkKey(event,1);" type="text" name="telefono2" value="<?php echo $user_data->telefono_celular;?>" />
				</div>
				<div class="dd_rut">
				<?php $rut = explode("-",$user_data->user_login);?>
					<span>Rut</span>
					<input type="text" class="rut_a" readonly="readonly" name="rut" value="<?php echo $rut[0];?>" />
					<input type="text" class="rut_b" readonly="readonly" name="dv" value="<?php echo $rut[1];?>" />
				</div>
				<span class="dd_titulo_b">Lugar de entrega / Lugar de cobro</span>
				<div class="dd_calle">
					<span>Calle</span>
					<input type="text" name="calle" value="<?php echo $user_data->calle;?>" />
				</div>
				<div class="dd_num">
					<span>N&deg;#</span>
					<input type="text" onkeydown="return checkKey(event,1);" name="numero" value="<?php echo $user_data->user_numero;?>" />
				</div>
				<div class="dd_depto">
					<span>Depto.</span>
					<input type="text" onkeydown="return checkKey(event,1);" name="depto" value="<?php echo $user_data->depto;?>" />
				</div>
				<div class="dd_ciudad">
					<div class="dd_ciudad_til">Seleccione Regi&oacute;n</div>
					<div class="select-wrap">
					<select class="form_dd_ciudad" name="region" onchange="cambiar_region(this)">
						<!--<option value="0">Seleccione una regi&oacute;n</option>-->
						<?php foreach(salco_regiones() AS $item){
							if($user_data->region == $item->idregion){?>
							 <option value="<?php //echo $item->idregion;
							 						echo $item->nombre;?>" 
                             selected="selected"><?php echo $item->nombre;?></option>
							<?php }
						}?>
					</select>
					</div>
				</div>
				<div class="dd_comuna">
					<div class="dd_comuna_til">Seleccione Comuna</div>
					<div class="select-wrap">
					<select class="form_dd_comuna" name="comuna">
						<!--<option value="0">...</option>-->
						<?php foreach(salco_comunas() AS $item){
							if($user_data->comuna == $item->idcomunas){?>
							 <option value="<?php //echo $item->idcomunas;
							 						echo $item->nombre;?>" 
                             selected="selected"><?php echo $item->nombre;?></option>
						<?php }
						}?>
					</select>
					</div>
				</div>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery(".dd_agregar a").click(function(){
							var max = 10;
								var listado = jQuery("#detalle_pedido_productos .producto_list").size();
							var html = '';
							html += '<!-- PRODUCTO -->';
							html += '<div class="producto_list">';
								html += '<div class="dd_producto">';
									html += '<span>Producto</span>';
										html += '<input type="text" name="producto_'+(listado+1)+'" value="" />';
								html += '</div>';
								html += '<div class="dd_cantidad">';
									html += '<span>Cantidad</span>';
										html += '<input type="text" name="cantidad_'+(listado+1)+'" value="" />';
								html += '</div>';
							html += '</div>';
							html += '<!-- END PRODUCTO -->';
							if(listado < max){
								jQuery('#detalle_pedido_productos .producto_list:last-child').after(html);
							}
							return false;
						});
						//detalle_pedido_productos
					});
				</script>
				<div class="dd_detalle">
					<span>Detalle de Producto</span>
					<div id="detalle_pedido_productos">
						<!-- PRODUCTO -->
						<div class="producto_list">
							<div class="dd_producto">
								<span>Producto</span>
								<input type="text" name="producto_1" value="<?php echo ((isset($_POST['producto_1']))? $_POST['producto_1'] : "");?>" />
							</div>
							<div class="dd_cantidad">
								<span>Cantidad</span>
								<input type="text" onkeydown="return checkKey(event,1);" name="cantidad_1" value="<?php echo ((isset($_POST['cantidad_1']))? $_POST['cantidad_1'] : "");?>" />
							</div>
						</div>
						<!-- END PRODUCTO -->
						<?php for($i=2; $i<=10; $i++){?>
							<?php
							$name_producto = "producto_$i";
							$name_cantidad = "cantidad_$i";
							?>
							<?php if(isset($_POST[$name_producto]) && isset($_POST[$name_cantidad])){?>
								<!-- PRODUCTO -->
								<div class="producto_list">
									<div class="dd_producto">
										<span>Producto</span>
										<input type="text" name="<?php echo $name_producto;?>" value="<?php echo $_POST[$name_producto];?>" />
									</div>
									<div class="dd_cantidad">
										<span>Cantidad</span>
										<input type="text" onkeydown="return checkKey(event,1);" name="<?php echo $name_cantidad;?>" value="<?php echo $_POST[$name_cantidad];?>" />
									</div>
								</div>
								<!-- END PRODUCTO -->
							<?php }?>
						<?php }?>
					</div>
					<div class="dd_agregar">
						<a href="#"></a>
					</div>
				</div>
				<!--
				<div class="dd_forma">
					<div class="dd_forma_til">Forma de Pago</div>
					<div class="select-wrap">
					<select class="form_dd_forma" name="forma_de_pago">
						<option value="0">Selecciona forma de pago...</option>
						<option value="cheque" <?php echo (isset($_POST['forma_de_pago']) && $_POST['forma_de_pago'] == "cheque")? 'selected="selected"' : '';?>>Cheque</option>
						<option value="credito" <?php echo (isset($_POST['forma_de_pago']) && $_POST['forma_de_pago'] == "credito")? 'selected="selected"' : '';?>>Cr&eacute;dito</option>
						<option value="descuento_planilla" <?php echo (isset($_POST['forma_de_pago']) && $_POST['forma_de_pago'] == "descuento_planilla")? 'selected="selected"' : '';?>>Descuento planilla</option>
						<option value="efectivo" <?php echo (isset($_POST['forma_de_pago']) && $_POST['forma_de_pago'] == "efectivo")? 'selected="selected"' : '';?>>Efectivo</option>
						<option value="redcompra" <?php echo (isset($_POST['forma_de_pago']) && $_POST['forma_de_pago'] == "redcompra")? 'selected="selected"' : '';?>>Redcompra</option>
						<option value="tcsb" <?php echo (isset($_POST['forma_de_pago']) && $_POST['forma_de_pago'] == "tcsb")? 'selected="selected"' : '';?>>TCSB</option>
						<option value="boleta" <?php echo (isset($_POST['forma_de_pago']) && $_POST['forma_de_pago'] == "boleta")? 'selected="selected"' : '';?>>Boleta</option>
						<option value="factura" <?php echo (isset($_POST['forma_de_pago']) && $_POST['forma_de_pago'] == "factura")? 'selected="selected"' : '';?>>Factura</option>
						<option value="guia_de_despacho" <?php echo (isset($_POST['forma_de_pago']) && $_POST['forma_de_pago'] == "guia_de_despacho")? 'selected="selected"' : '';?>>Gu&iacute;a de despacho</option>
					</select>
					</div>
				</div>
				-->
				<div class="dd_acepto">
					<input type="checkbox" id="dd_email" name="dd_email" value="1" <?php
                    if (isset($_POST['dd_email'])) { 
					   if($_POST['dd_email'] == '1') {
						   echo 'checked="checked"';
					   }
					 } else { echo 'checked="checked"'; }?> />
					<span>Acepto recibir ofertas y noticias de Salcobrand en mi correo electr&oacute;nico.</span>
				</div>
                
                <div class="dd_acepto">
                    <input type="checkbox" id="dd_sms" name="dd_sms" value="1" <?php
                    if (isset($_POST['dd_sms'])) { 
					   if($_POST['dd_sms'] == '1') {
						   echo 'checked="checked"';
					   }
					 } else { echo 'checked="checked"'; }?>
					/>
					<span>Acepto recibir informaci&oacute;n de Salcobrand v&iacute;a SMS.</span>
                </div>
				<div class="dd_enviar">
					<input type="hidden" name="cms_salco" value="despacho_domicilio"/>
					<input type="submit" value="" />
				</div>
			</form>
			<?php if(status_despacho_domicilio()== "exito"){?>
				<script type="text/javascript">
				jQuery(document).ready(function(){
				jQuery("#alerta_wrap .alerta_close").click(function(){
					jQuery("#alerta_wrap").hide();
					return false;
				});
				jQuery("#alerta_wrap h1").html("&igrave;Felicitaciones!");
				jQuery("#alerta_header a").attr("href", "#");
				jQuery("#alerta_wrap p").html("Tu pedido ha sido enviado correctamente");
				jQuery("#alerta_wrap").show();
			});
				</script>
			<?php }elseif(status_despacho_domicilio()){?>
				<script type="text/javascript">
				jQuery(document).ready(function(){
				jQuery("#alerta_wrap .alerta_close").click(function(){
					jQuery("#alerta_wrap").hide();
					return false;
				});
				jQuery("#alerta_wrap h1").html("&igrave;Atenci&oacute;n!");
				jQuery("#alerta_header a").attr("href", "#");
				jQuery("#alerta_wrap p").html("<?php echo status_despacho_domicilio();?>");
				jQuery("#alerta_wrap").show();
			});
				</script>
			<?php }?>
			<!--
			<div id="despacho_domicilio_banner_box">
				<div class="despacho_domicilio_banner">
					<img src="<?php echo URL_THEME;?>/images/despacho_banner_01.png" width="576" height="106" title="Banner" />
				</div>
			</div>
			-->
		</div>
	<?php else:?>
		<div id="despacho_domicilio_form">
			<p style="color: red;font-family: Arial;font-size: 12px;font-weight: normal; margin: 3px 0px 14px 5px;">Para realizar un pedido debes estar registrado. Si ya est&aacute;s registrado debes iniciar sesi&oacute;n.</p>
		</div>
	<?php endif;?>
</div>
<!-- END DESPACHO DOMICILIO -->
<?php get_footer(); ?>