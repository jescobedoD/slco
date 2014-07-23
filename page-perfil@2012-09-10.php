<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<?php
if(!current_user_can('level_0')){
	wp_redirect(get_bloginfo('wpurl')."/");
}
?>
<?php get_header(); ?>
<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<?php get_template_part('content_sub_perfil', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- PERFIL -->
<div id="noticias">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
    <div id="perfil_box">	
		<div id="perfil_datos_box">
		<div id="perfil_avatar_box">
			<div class="perfil_avatar">
				<img src="imagenes/btn_perfil.png" width="26" height="27" alt="" class="btn_perfil"/>
				<?php salco_get_avatar("143");?>
			</div>
			<a href="<?php echo esc_url(home_url("/cambiar-mi-foto/"));?>" class="cambiar_avatar"></a>
		</div>
				<div class="perfil_datos">
					<div class="perfil_datos_titulo">
						<span>Nombre:</span>
						<span>Rut:</span>
						<span>Direcci&oacute;n:</span>
						<span>Tel&eacute;fono:</span>
						<span>Celular:</span>
						<span>Email:</span>
					</div>
					<div class="perfil_datos_dato">
						<span><?php echo $current_user->display_name; ?></span>
						<span><?php echo $current_user->user_login;?></span>
						<span><?php echo $current_user->calle." ".$current_user->user_numero." ".$current_user->depto;?></span>
						<span><?php echo $current_user->telefono_fijo;?></span>
						<span><?php echo $current_user->telefono_celular;?></span>
						<span><?php echo $current_user->user_email;?></span>
					</div>
				</div>
					<a href="<?php echo esc_url(home_url("/actualiza-tus-datos/"));?>" class="cambiar_datos"></a>
		</div>
		
	</div>

	<?php if($_GET['d']): ?>
	<div id="cajas_puntos">
		<?php $descuento = getCuponDcto(reset(explode('-',$current_user->user_login)),end(explode('-',$current_user->user_login)));
			if(count($descuento) > 0): ?>
			<div class="cupon box" id="caja_cupon">
			<div class="caja_cupon">
			<style>
			.cupon .caja_cupon{
				width:316px;
				height:186px;
				margin:5px 0px 0px 5px;
				border: 2px solid #C0EAFA;
			}
			.cupon h2{
				color:#0080c4;
				font-size:13px;
				font-family:Arial;
				margin:15px 0px 0px 15px;
			}
			.caja_cupon .nombre{
				color:#7d7d7d;
				font-size:11px;
				font-family:Arial;
				margin:15px 0px 0px 15px;
				}
			.caja_cupon .fecha{
				color:#7d7d7d;
				font-size:11px;
				font-family:Arial;
				margin:54px 0px 0px 15px;
				}	
			.caja_cupon .foto_codigo{
				width:200px;
				height:40px;
				margin:15px auto;
				color: #7D7D7D;
				font-family: Arial;
				font-size: 11px;
				text-align: center;
			}	
			</style>
				<h2>Descuentos exclusivos Solo para ti</h2>
			  <p class="nombre"><?php echo $descuento[1].' '.$descuento[2]; ?></p>
              <div class="foto_codigo">
              <img src="<?php echo $descuento[5]; ?>" />
			  <?php echo $descuento[4]; ?>
              </div>
			  <p class="fecha">Fecha vencimiento cup&oacute;n de descuento: <?php echo $descuento[3]; ?> </p>
			</div>
			<a href="javascript:void(0);" class="imprime_cupon"></a>
			</div>
			<?php endif; ?>
			<div class="puntos box">
			<?php
				$cms_oracle = new cms_oracle();
				$rut[0] = "17069852";
				$puntos = $cms_oracle->getPuntos(Array('rut' =>reset(explode('-',$current_user->user_login))));
			?>
				<div class="texto_puntos">
					<p>Puntos Disponible <?php echo $puntos[0];?></p>
					<p>Puntos Acomulados <?php echo $puntos[1];?></p>
					<p>Puntos por Vencer <?php echo $puntos[2];?></p>
				</div>
			</div>	
	</div>
	<?php endif; ?>
	
	<script src="http://www.salcobrand.cl/cl/wp-content/themes/salcobrand/js/jquery.PrintArea.js" type="text/javascript"></script>
	<script>
	jQuery(document).ready(function(){
		jQuery('.imprime_cupon').click(function(){
			jQuery('div#caja_cupon').printArea();
		});
	});
	</script>
	
	
	
</div>
<!-- END PERFIL -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer();

function getCuponDcto($p_rut, $p_dv){
	$dbProd  = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=172.20.1.153)(PORT = 1521)))(CONNECT_DATA =(SID=PRODSBF)))";
	$conProd = OCILogon('puntos','puntos',$dbProd) or die("Ocurrio un error de coneccion");
	$p_cod_error="";
    $p_glosa_error="";
	$query = "begin adm_comunidadsb_pkg.recupera_segmentada4($p_rut,'$p_dv',														:l_lin1,:l_lin2,:l_lin3,:l_cupon1,:l_fec_ven1,:l_lin1_b,:l_lin2_b,:l_lin3_b,:l_cupon2,:l_fec_ven2,:l_lin1_c,:l_lin2_c,:l_lin3_c,:l_cupon3,:l_fec_ven3,:l_lin1_d,:l_lin2_d,:l_lin3_d,:l_cupon4,:l_fec_ven4,:l_Codigo_error,:l_Msg_error); end;";
	$stmt = OCIParse($conProd, $query) or die ('Ocurrio un problema a ejecutar : '.$query);

	OCIBindByName($stmt,":l_lin1" ,$l_lin1, 250)   or die   ('Can not bind variable'); 
	OCIBindByName($stmt,":l_lin2" ,$l_lin2, 650)   or die   ('Can not bind variable'); 
	OCIBindByName($stmt,":l_lin3" ,$l_lin3, 500)   or die   ('Can not bind variable'); 
	OCIBindByName($stmt,":l_cupon1" ,$l_cupon1, 250)   or die   ('Can not bind variable'); 		
	OCIBindByName($stmt,":l_fec_ven1" ,$l_fec_ven1, 250)   or die   ('Can not bind variable'); 		
	OCIBindByName($stmt,":l_lin1_b" ,$l_lin1_b, 250)   or die   ('Can not bind variable'); 		
	OCIBindByName($stmt,":l_lin2_b" ,$l_lin2_b, 250)   or die   ('Can not bind variable'); 		
	OCIBindByName($stmt,":l_lin3_b" ,$l_lin3_b, 250)   or die   ('Can not bind variable');
	OCIBindByName($stmt,":l_cupon2" ,$l_cupon2, 250)   or die   ('Can not bind variable'); 				
	OCIBindByName($stmt,":l_fec_ven2" ,$l_fec_ven2, 250)   or die   ('Can not bind variable'); 
	OCIBindByName($stmt,":l_lin1_c" ,$l_lin1_c, 250)   or die   ('Can not bind variable'); 
	OCIBindByName($stmt,":l_lin2_c" ,$l_lin2_c, 650)   or die   ('Can not bind variable'); 
	OCIBindByName($stmt,":l_lin3_c" ,$l_lin3_c, 500)   or die   ('Can not bind variable'); 		
	OCIBindByName($stmt,":l_cupon3" ,$l_cupon3, 250)   or die   ('Can not bind variable'); 				
	OCIBindByName($stmt,":l_fec_ven3" ,$l_fec_ven3, 250)   or die   ('Can not bind variable'); 		
	OCIBindByName($stmt,":l_lin1_d" ,$l_lin1_d, 250)   or die   ('Can not bind variable'); 		
	OCIBindByName($stmt,":l_lin2_d" ,$l_lin2_d, 250)   or die   ('Can not bind variable'); 		
	OCIBindByName($stmt,":l_lin3_d" ,$l_lin3_d, 250)   or die   ('Can not bind variable'); 
	OCIBindByName($stmt,":l_cupon4" ,$l_cupon4, 250)   or die   ('Can not bind variable'); 				
	OCIBindByName($stmt,":l_fec_ven4" ,$l_fec_ven4, 250)   or die   ('Can not bind variable'); 								
	OCIBindByName($stmt,":l_codigo_error" ,$l_codigo_error, 250)   or die   ('Can not bind variable'); 								
	OCIBindByName($stmt,":l_msg_error" ,$l_msg_error, 250)   or die   ('Can not bind variable'); 										
	$cod_error=0;		
	OCIExecute ($stmt)  or die   ('No se ejecuto el procedimiento almacenado'.$query); 
	OCIFreeStatement($stmt);
	
	if($l_codigo_error!=0){
		$cod_error=$l_codigo_error;
		$msg_err=$l_msg_error;
	}

	if($l_lin1!=""){
		$cupon1="<p>".$l_lin1."</p><p>".$l_lin2."</p><p>".$l_lin3."</p><p>".$l_fec_ven1."</p><p>".$l_cupon1."</p>";
		$imagen1="http://www.barcodesoft.com/barcodesoft.ashx?text=".$l_cupon1."&s=EAN13&r=96&hrfontsize=2&h=70&w=180";			   
	}

	$cupon = array($l_lin1,$l_lin2,$l_lin3,$l_fec_ven1,$l_cupon1,$imagen1);
	return $cupon;				
}			
 
?>