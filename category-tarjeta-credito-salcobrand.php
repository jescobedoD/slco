<?php

header('Location: http://www.tcsb.cl/');

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
<!-- TARJETA -->
<div id="tarjeta">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
			
            <!-- BANNER TARJETA -->
            <script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#tarjeta_banner').cycle({
					fx: 'fade',
					speed: 1000,
					pause: false,
					pager: '#banner_tarjeta_pager',
					pagerAnchorBuilder: function(idx, slide) {
						return '<a href="#"><\/a>';
					}
				});
				if(jQuery('#tarjeta_banner div').size() == 1){
					jQuery('#banner_tarjeta_pager_box').hide();
				}
			});
			</script>
			<style type="text/css">
			#banner_tarjeta_pager_box {
				bottom: 7px;
				height: 23px;
				left: 10px;
				position: absolute;
				z-index: 15;
			}
			#banner_tarjeta_pager_box .pager_left {
				background: url("<?php echo URL_THEME;?>/images/pager_left.png") no-repeat scroll 0 0 transparent;
				float: left;
				height: 23px;
				width: 8px;
			}
			#banner_tarjeta_pager_box .pager_right {
				background: url("<?php echo URL_THEME;?>/images/pager_right.png") no-repeat scroll -2px 0 transparent;
				float: left;
				height: 23px;
				width: 6px;
			}
			#banner_tarjeta_pager {
				background: url("<?php echo URL_THEME;?>/images/pager_middle.png") repeat-x scroll 0 0 transparent;
				float: left;
				height: 23px;
			}
			#banner_tarjeta_pager a {
				background: url("<?php echo URL_THEME;?>/images/pager_dot.png") no-repeat scroll 0 0 transparent;
				display: block;
				float: left;
				height: 11px;
				margin: 6px 2px 0 0;
				position: relative;
				width: 12px;
				z-index: 10;
			}
			#banner_tarjeta_pager a:hover, #banner_tarjeta_pager a.activeSlide {
				background-position: -12px 0;
			}
			</style>
            <div id="tarjeta_banner_box">
            	<div id="banner_tarjeta_pager_box">
                	<div class="pager_left"></div>
					<div id="banner_tarjeta_pager"></div>
					<div class="pager_right"></div>
            	</div>
            	<div id="tarjeta_banner">
            		<?php
					$catalogos_home = get_categories(array(
						'slug' => 'banner_tarjeta_credito'
					));
					$args = array(
						'numberposts'     => 8,
						'category'        => $catalogos_home[0]->cat_ID,
						'post_type'       => 'post',
						'orderby'         => 'post_date',
						'order'           => 'DESC',
						'post_status'     => 'publish'
					);
					$posts_catalogos_home = get_posts($args);
					?>
            		<?php foreach($posts_catalogos_home AS $banner){?>
                	<div>
                        <a href="#">
                        <?php echo $banner->post_content;?>
                        </a>
                    </div>
                    <?php }?>
                </div>
            </div>
            <!-- END BANNER TARJETA -->
            
            <div id="tarjeta_cajas">
            	<div class="tarjeta_caja">
                    <span>Atenci&oacute;n al cliente TCSB
</span>
                    <p align="center" style="margin-left:0px;"><br />
Ll&aacute;manos al 800 21 00 62</p>
                </div>
		<!--
                <div class="tarjeta_caja">
                    <span>Promociones</span>
                    <p>Beneficios exclusivos por tus compras en Farmacias Salcobrand</p>
                    <a href="<?php //echo esc_url(home_url("/category/promociones"));?>">M&aacute;s Informaci&oacute;n</a>
                </div>
		-->
                <div class="tarjeta_caja" style="margin: 0 0 0 0;">
                    <span>Comercios Asociados</span>
                    <p>Descubre una gran red de beneficios con tu Tarjeta Cr&eacute;dito Salcobrand.</p>
                    <a href="<?php echo esc_url(home_url("/category/comercios-asociados"));?>">M&aacute;s Informaci&oacute;n</a>
              </div>
                
                
                <div class="tarjeta_caja" style="margin: 0 0 0 12px; height: 195px;">
                    <span>Información TCSB</span>
                    <p><img class="alignnone size-full wp-image-1197" style="float: left; margin-top: 6px;" title="" src="http://www.salcobrand.cl/cl/wp-content/uploads/2011/11/pdf.png" alt="" width="20" height="20" />
                    <a href="http://www.salcobrand.cl/cl/wp-content/uploads/2012/12/Tasas_y_Costo_del_Credito_e_informacion_al_Cliente-Credito_Universal_Asociado_a_Tarjeta_Credito_Salcobrand.pdf" style="position: relative; float: left; margin-top: 35px; width: 170px;">Tasas y Costo de Crédito – Crédito Universal</a></p>
                <p><img class="alignnone size-full wp-image-1197" style="float: left; margin-top: -5px;"  title="" src="http://www.salcobrand.cl/cl/wp-content/uploads/2011/11/pdf.png" alt="" width="20" height="20" />
                    <a href="http://www.salcobrand.cl/cl/wp-content/uploads/2011/11/CONTRATO_TCSB_2012.pdf" style="position: relative; float: left; width: 170px; margin-top: 25px;">Contrato TCSB</a></p>
				<p><img class="alignnone size-full wp-image-1197" style="float: left; margin-top: -15px;"  title="" src="http://www.salcobrand.cl/cl/wp-content/uploads/2011/11/pdf.png" alt="" width="20" height="20" />
                    <a href="http://www.salcobrand.cl/cl/wp-content/uploads/2011/11/Anexo_Adecuacion_Contrato_MAtic_Kard_S.a.pdf" style="position: relative; float: left; width: 170px; margin-top: 15px;">Anexo Adecuación Contrato Matic Kard</a></p>
				<p><img class="alignnone size-full wp-image-1197" style="float: left; margin-top: -5px;"  title="" src="http://www.salcobrand.cl/cl/wp-content/uploads/2011/11/pdf.png" alt="" width="20" height="20" />
                    <a href="http://www.salcobrand.cl/cl/wp-content/uploads/2012/11/INFORMATIVO_EECC_TCSB_SERNAC_NOVIEMBRE_2012.pdf" style="position: relative; float: left; width: 170px; margin-top: 25px;">Nuevo Estado de Cuentas TCSB</a></p>
                
                
                </div>
                
            </div>
			<!--
            <div class="tc_vertodos">
            	<a href="<?php //echo esc_url(home_url("/category/beneficios-tarjeta"));?>">Ver Todos los Beneficios</a>
            </div>
            -->
        </div>
        <!-- END RSE -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>