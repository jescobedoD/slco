<?php
/*
Template Name: nuestra-empresa
*/
?>
<?php get_header(); ?>
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
	$regiones = salco_regiones_locales();
	$comunas = salco_comunas();
	$provincias = salco_provincias();
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
						<a href="?<?php echo "region=".$_GET['region']."&comuna=".$_GET['comuna']."&page=".$_GET['page'];?>" target="_parent" title="Volver" style="color:#037FBD;float:right;font-family:Arial;font-size:12px;margin-top:-35px;text-decoration:none;">Volver</a>
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
								<span class="bd_dir_b" style="width:209px;"><?php echo $farmacia->direccion;?></span>
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
			jQuery('.form_buscador_ciudad').customStyle({width:269});
			jQuery('.form_buscador_comuna').customStyle({width:269});
		});
		</script>
		<form id="form_buscador" action="?" method="get">
			<div class="select-wrap">
			<select name="region" id="region_id" class="form_buscador_ciudad" style="width:160px;">
				<option value="false">Seleccione una regi&oacute;n</option>
				<?php foreach($regiones AS $region){?>
					<option value="<?php echo $region->idregion;?>"><?php echo $region->nombre;?></option>
				<?php }?>
			</select>
			</div>
			<div class="select-wrap">
			<select name="comuna" id="comuna_id" class="form_buscador_comuna" style="width:160px;">
				<option value="0">Selecciona comuna</option>
			</select>
			</div>
			<input type="hidden" name="page" value="1"/>
			<input type="submit" class="form_buscador_buscar" onclick="_gaq.push(['_trackEvent', 'Encuentra Salcobrand', 'buscar ']);" value="" />
		</form>
	</div>
	<script type="text/javascript">
	jQuery("#region_id").change(function(){
		var value = jQuery(this).val();
		jQuery.ajax({
			  url: "<?php echo URL_BASE;?>/?comloc_per_reg="+value,
			  cache: false,
			  success: function(html){
			    //$(this).append(html);
			    jQuery("#comuna_id").empty();
			    jQuery("#comuna_id").append('<option value="0">Seleccione Comuna</option>');
			    jQuery("#comuna_id")[0].selectedIndex = 0;
			    jQuery("#comuna_id").append(html);
			  }
			});
	});
	</script>
	<!-- END ELEGIR CIUDAD / COMUNA -->
	<!-- RESULTADO -->
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
		<div id="buscador_titulo_res">
			B&uacute;squeda: <span><?php echo $current_region;?> / <?php echo $current_comuna;?></span>
		</div>
		<div id="buscador_resultados">
			<?php $farmacias = salco_farmacia($_GET['page'], $idRegion, $idComuna);?>
			<?php if(count($farmacias[0])){?>
				<?php foreach($farmacias[0] AS $farmacia){?>
					<div class="buscador_resultado">
						<span class="br_dir_a">Direcci&oacute;n</span>
						<span class="br_dir_b" style="width:220px;"><?php echo $farmacia->direccion;?></span>
						<span class="br_ref_a" style="width:430px;">Referencia</span>
						<span class="br_ref_b"><?php echo $farmacia->referencia;?></span>
						<span class="br_tel_a">Tel&eacute;fono</span>
						<span class="br_tel_b"><?php echo $farmacia->telefono;?></span>
						<span class="br_hor_a">Horarios de atenci&oacute;n</span>
						<span class="br_hor_b">
							<?php echo $farmacia->horario;?>: <?php echo $farmacia->luvi;?>hrs.
							<?php if($farmacia->sabado!=""){?>
								<br />S&aacute;bado: <?php echo $farmacia->sabado;?>hrs.
							<?php }?>
							<?php if($farmacia->domingo!=""){?>
								<br />Domingo: <?php echo $farmacia->domingo;?>hrs.
							<?php }?>
						</span>
						<?php if($farmacia->coordenadas!=""){?>
						<a href="?<?php echo "region=$idRegion&comuna=$idComuna&page=".$_GET['page']."&mapa=".$farmacia->id;?>" class="br_vermapa" onclick="_gaq.push(['_trackEvent', 'Encuentra Salcobrand', 'mapa de ubicacion ']);"></a>
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
		<!--div id="buscador_pag">
			<ul>
				<?php // if($farmacias[2]>1){?>
				<li>
					<a href="?<?php // echo "region=$idRegion&comuna=$idComuna&page=".($farmacias[2]-1);?>">&lt;</a>
				</li>
				<?php // }?>
				<?php // for($i=$farmacias[2]-2; $i<$farmacias[2]; $i++){
					// if($i>0){?>
					<li><a href="?<?php // echo "region=$idRegion&comuna=$idComuna&page=".$i;?>"><?php // echo $i;?></a></li>
					<?php //  }
				// }?>
				<li class="active"><a href="?<?php // echo "region=$idRegion&comuna=$idComuna&page=".($farmacias[2]);?>"><?php // echo $farmacias[2];?></a></li>
				<?php // for($i=$farmacias[2]+1; $i<$farmacias[2]+3; $i++){
				//	if($i<=$farmacias[1]){?>
					<li><a href="?<?php // echo "region=$idRegion&comuna=$idComuna&page=".$i;?>"><?php // echo $i;?></a></li>
					<?php // }
				// }?>
				<?php // if($farmacias[2]<$farmacias[1]){?>
				<li>
					<a href="?<?php // echo "region=$idRegion&comuna=$idComuna&page=".($farmacias[2]+1);?>">&gt;</a>
				</li>
				<?php // }?>
			</ul>
		</div-->
	<?php }?>
	<!-- END RESULTADO -->
<?php }?>
</div>
<!-- END BUSCADOR -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer();?>
