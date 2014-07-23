<?php get_header(); ?>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAiEB79KMzfdSYGMGPSX2GahT4aWz2H-i19D11dwBmPvpNGPkTLRRLWgb5x-AbRU8EwDIAJ8NkGHKkDw" type="text/javascript"></script>
<script type="text/javascript" src="http://gmaps-utility-library.googlecode.com/svn/trunk/markermanager/release/src/markermanager.js"></script>

<script type="text/javascript" src="<?php echo URL_THEME;?>/js/mapa.js"></script>
<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<!-- BANNER ABIERTO SIDEBAR -->
	<div id="banner_sidebar_abierto">
		<a href="#">
			<img src="<?php echo URL_THEME;?>/images/banner_sidebar_abierto.png" width="226" height="73" />
		</a>
	</div>
	<!-- END BANNER ABIERTO SIDEBAR -->
	<?php get_template_part('content_menu2_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<?php
	$regiones = salco_regiones();
	$comunas = salco_comunas();
	$provincias = salco_provincias();
?>
<?php
$category = get_categories(array(
	'slug' => 'locales-de-turno'
));
$posts_array = get_posts(array(
	'numberposts'     => 1,
	'category'        => $category[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish'
));
?>
<!-- BUSCADOR -->
<div id="buscador">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<!-- INTRO -->
	<?php if (have_posts()):?>
		<?php while (have_posts()) : the_post();?>
			<div id="buscador_intro">
				<?php if(isset($_GET['mapa'])){?>
					<?php if(isset($_GET['page']) && isset($_GET['region']) && isset($_GET['comuna'])){?>
						<a href="?<?php echo "dia_turno=".$_GET['dia_turno']."&page=".$_GET['page'];?>" target="_parent" title="Volver" style="color:#037FBD;float:right;font-family:Arial;font-size:12px;margin-top:-35px;text-decoration:none;">Volver</a>
					<?php }?>
				<?php }?>
				<p><?php the_content();?></p>
			</div>
		<?php endwhile;?>
	<?php endif; ?>
	<!-- END INTRO -->
	<?php if(isset($_GET['mapa'])){?>
		<?php if(isset($_GET['page']) && isset($_GET['region']) && isset($_GET['comuna'])){?>
			<?php
			foreach($regiones AS $region){
				if($region->idregion == $_GET['region']){
					$current_region = $region->nombre;
				}
			}
			$idRegion = $_GET['region'];
			foreach($comunas AS $comuna){
				if($comuna->idcomunas == $_GET['comuna']){
					$current_comuna = $comuna->nombre;
				}
			}
			$idComuna = $_GET['comuna'];
			?>
			<?php $farmacias = salco_farmacia($_GET['page'], $idRegion, $idComuna);?>
			<?php if(count($farmacias[0])){?>
				<?php foreach($farmacias[0] AS $farmacia){?>
					<?php if($farmacia->id== $_GET['mapa']){?>
						<script type="text/javascript">
						jQuery(document).ready(function() {
							initialize({
								div:"map_local",
								title:"<?php echo $farmacia->referencia;?>",
								direccion: "Direcci&oacute;n: <?php echo $farmacia->direccion;?><br/>Tel&eacute;fono: <?php echo $farmacia->telefono;?>",
								geo:"<?php echo str_replace(";", ",", $farmacia->coordenadas);?>",
								marker:"<?php echo URL_THEME;?>/images/icon.png"
							});
							GUnload();
						});
						</script>
						<!-- RESULTADO -->
						<div id="buscador_titulo_res">
							B&uacute;squeda: <span><?php echo $current_region;?> / <?php echo $current_comuna;?></span>
						</div>
						<div id="buscador_resultados">
							<div class="buscador_resultado_detalle">
								<span class="bd_ciudad" style="width: 200px;"><?php echo $current_region;?> / <?php echo $current_comuna;?></span>
								<span class="bd_dir_a">Direcci&oacute;n</span>
								<span class="bd_dir_b"><?php echo $farmacia->direccion;?></span>
								<span class="bd_tel_a">Tel&eacute;fono</span>
								<span class="bd_tel_b"><?php echo $farmacia->telefono;?></span>
								<span class="bd_hor_a">Horarios de atenci&oacute;n</span>
								<span class="bd_hor_b" style="width:200px;">
									<?php echo $farmacia->horario;?>: <?php echo $farmacia->luvi;?>hrs.<br />
									<?php if($farmacia->sabado!=""){?>
										S&aacute;bado: <?php echo $farmacia->sabado;?>hrs.
									<?php }?>
									<?php if($farmacia->domingo!=""){?>
										Domingo: <?php echo $farmacia->domingo;?>hrs.
									<?php }?>
								</span>
								<div class="buscador_resultado_detalle_info">
									<?php if($farmacia->redbanc=="1"){?>
									<span class="bd_red">Cajero Autom&aacute;tico</span>
									<?php }?>
									<?php if($farmacia->estacionamiento=="1"){?>
									<span class="bd_est">Estacionamiento</span>
									<?php }?>
									<?php if($farmacia->modulo_tarjeta_credito=="1"){?>
									<span class="bd_tar">M&oacute;dulo Tarjeta Cr&eacute;dito</span>
									<?php }?>
								</div>
								<span class="bd_ubi">Mapa de Ubicaci&oacute;n</span>
								<!-- MAPA -->
								<div class="bd_mapa" id="map_local" style="overflow:hidden;">
									<!--<iframe width="440" height="328" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=es&amp;q=Salcobrand&amp;aq=&amp;sll=-33.547672,-70.567009&amp;sspn=0.014468,0.01929&amp;vpsrc=0&amp;ie=UTF8&amp;t=m&amp;st=109146043351405611748&amp;rq=1&amp;ev=zi&amp;split=1&amp;hq=Salcobrand&amp;hnear=&amp;ll=-33.548334,-70.568533&amp;spn=0.023463,0.03768&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>-->
								</div>
								<!-- END MAPA -->
								<!--<a href="#" class="bd_imprimir">Imprimir Informaci&oacute;n</a>-->
							</div>
						</div>
						<!-- END RESULTADO -->
					<?php }?>
				<?php }?>
			<?php }?>
		<?php }?>
	<?php }else{?>
	<!-- ELEGIR CIUDAD / COMUNA -->
	
	<div id="buscador_elegir">
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.form_buscador_ciudad').customStyle({width:180});
		});
		</script>
		<form id="form_buscador" action="?" method="get">
			<div class="select-wrap">
			<div class="select-wrap">
			<select disabled name="dia_turno" id="dia_turno" class="form_buscador_ciudad" style="width:160px;">
				<option value="false">Seleccione un d&iacute;a</option>
				<?php foreach($posts_array AS $post){
					$date_ini = get_post_meta($post->ID, 'locales_turno_fecha_ini', true);
					$date_end = get_post_meta($post->ID, 'locales_turno_fecha_end', true);
					$meses = get_meses();
					for($i=0; (date("d-m-Y", strtotime($date_ini)+(86400*$i))) < date("d-m-Y", strtotime($date_end)) ;$i++){?>
						<?php
						$date_this = explode("-", date("d-M-Y", strtotime($date_ini)+(86400*$i)));
						?>
						<option value="<?php echo $date_this[0]."-".$date_this[1]."-".$date_this[2];?>"><?php echo $date_this[0]." de ".$meses[strtoupper($date_this[1])]." de ".$date_this[2];?></option>
					<?php }?>
					<?php
					$date_this = explode("-", date("d-M-Y", strtotime($date_end)));
					?>
					<option value="<?php echo date("d-M-Y", strtotime($date_end));?>"><?php echo $date_this[0]." de ".$meses[strtoupper($date_this[1])]." de ".$date_this[2];?></option>
				<?php }?>
			</select>
			</div>
			<div class="select-wrap">
			<select disabled  name="comuna" id="comuna" class="form_buscador_ciudad" style="width:160px;">
			<option value="0">Seleciona comuna</option>
			</select>
			</div>
			</div>
			<input type="hidden" name="page" value="1"/>
			<input type="submit" class="form_buscador_buscar" value=""   disabled />
		</form>
	</div>
	<script type="text/javascript">
	jQuery("#dia_turno").change(function(){
		var value = jQuery(this).val();
		jQuery.ajax({
			  url: "<?php echo URL_BASE;?>?comsalhor&dia_turno="+value,
			  cache: false,
			  success: function(html){
			    //$(this).append(html);
			    
			    jQuery("#comuna").empty();
			    jQuery("#comuna").append('<option value="0">Seleccione comuna</option>');
			    jQuery("#comuna")[0].selectedIndex = 0;
			    jQuery("#comuna").append(html);
			    
			  }
			});
	});
	</script>
	<!-- END ELEGIR CIUDAD / COMUNA -->
	<!-- RESULTADO -->
	<?php if(isset($_GET['dia_turno'])){?>
		<div id="buscador_titulo_res">
			<?php
			$date_this = explode("-", date("d-M-Y", strtotime($_GET['dia_turno'])));
			?>
			Resultado: <span><?php echo $date_this[0]." de ".$meses[strtoupper($date_this[1])]." de ".$date_this[2];?></span>
		</div>
		<div id="buscador_resultados">
			<?php
			$listado_locales = Array();
			$detalle_local_turno = Array();
			foreach($posts_array AS $post){
				$fila_local = explode(";", $post->post_content);
				foreach($fila_local AS $local_info){
					$detalle_local = explode(",", $local_info);
					if($detalle_local[1] == date("d/m/y", strtotime($_GET['dia_turno']))){
						$detalle_local_turno[$detalle_local[0]] = $detalle_local;
						array_push($listado_locales, $detalle_local[0]);
					}
				}
			}
			?>
			<?php $farmacias = salco_farmacia_turno($listado_locales);?>
			<?php if(count($farmacias)){?>
				<?php foreach($farmacias AS $farmacia){?>
					<div class="buscador_resultado">
						<span class="br_dir_a">Direcci&oacute;n</span>
						<span class="br_dir_b" style="width:220px;"><?php echo $farmacia->direccion;?></span>
						<span class="br_ref_a" style="width:430px;">Referencia</span>
						<span class="br_ref_b"><?php echo $farmacia->referencia;?></span>
						<span class="br_tel_a">Tel&eacute;fono</span>
						<span class="br_tel_b"><?php echo $farmacia->telefono;?></span>
						<span class="br_hor_a">Horarios de atenci&oacute;n</span>
						<span class="br_hor_b">
							<?php
							foreach($detalle_local_turno AS $key=>$value){
								if($key == $farmacia->id){
									echo $value[2]." a ".$value[3]." hrs.";
								}
							}
							?>
						</span>
						<?php if($farmacia->coordenadas!=""){?>
						<a href="?<?php echo "dia_turno=".$_GET['dia_turno']."&region=".$farmacia->region_id."&comuna=".$farmacia->comuna."&page=".$_GET['page']."&mapa=".$farmacia->id;?>" class="br_vermapa"></a>
						<?php }?>
						<div class="buscador_resultado_info">
							<?php if($farmacia->redbanc=="1"){?>
								<span class="br_red">Redbanc</span>
							<?php }?>
							<?php if($farmacia->estacionamiento=="1"){?>
									<span class="br_est">Estacionamiento</span>
							<?php }?>
							<?php if($farmacia->modulo_tarjeta_credito=="1"){?>
								<span class="br_tar">M&oacute;dulo Tarjeta Cr&eacute;dito</span>
							<?php }?>
						</div>
					</div>
					<?php }?>
			<?php }else{?>
				<div class="buscador_resultado">
					No hay resultados
				</div>
			<?php }?>
		</div>
	<?php }?>
	<!-- END RESULTADO -->
<?php }?>
</div>
<!-- END BUSCADOR -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer();?>