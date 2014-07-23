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
	<?php get_template_part('content_sub_beneficios', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- BENEFICIOS -->
<div id="promociones">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
            <div id="beneficios_intro">
            <p>En Salcobrand trabajamos para d&iacute;a a d&iacute;a entregarte m&aacute;s beneficios. Ac&aacute; podr&aacute;s conocer diferentes promociones y descuentos exclusivos para nuestros clientes.</p>
            </div>
            <div id="beneficios_box">
                <div class="beneficios_caja">
                    <span class="titulo_bc">Convenios</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_01.png" /></span>
                    <p>Conoce nuestros convenios empresa, sus beneficios y c&oacute;mo contactar a nuestras ejecutivas.</p>
                    <a href="<?php echo URL_BASE;?>category/convenios-salcobrand">M&aacute;s Informaci&oacute;n</a>
                </div>
                
                <div class="beneficios_caja">
                    <span class="titulo_bc">Medios de Pago</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_02.png" /></span>
                    <p>Descubre todos los descuentos y promociones para nuestros clientes.</p>
                    <a href="<?php echo URL_BASE;?>category/medios-de-pago-salcobrand">M&aacute;s Informaci&oacute;n</a>
                </div>
                
                <div class="beneficios_caja">
                    <span class="titulo_bc">Mujer Bienestar</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_04.png" /></span>
                    <p>Conoce todos los beneficios de nuestra comunidad Mujer Bienestar.</p>
                    <a href="<?php echo URL_BASE;?>mujer-bienestar">M&aacute;s Informaci&oacute;n</a>
                </div>

                <div class="beneficios_caja">
                    <span class="titulo_bc">Alianza LANPASS</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_03.png" /></span>
                    <p>Acumula KMS. LANPASS en compras sobre $10.000 en Salcobrand.</p>
                    <a href="<?php echo URL_BASE;?>category/kilometros-lanpass">M&aacute;s Informaci&oacute;n</a>
                </div>
                
                <div class="beneficios_caja">
                    <span class="titulo_bc">Alianza Entel</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_08.png" /></span>
                    <p>Aprovecha todos los lunes un 15% de dcto con la Zona Entel.</p>
                    <a href="<?php echo URL_BASE;?>landing/zona-entel-y-salcobrand/">M&aacute;s Informaci&oacute;n</a>
                </div>
                
                <div class="beneficios_caja">
                    <span class="titulo_bc">Promociones</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_05.png" /></span>
                    <p>Revisa las promociones exclusivas para nuestros clientes.</p>
                    <a href="<?php echo URL_BASE;?>category/promociones-salcobrand/">M&aacute;s Informaci&oacute;n</a>
                </div>
                
                <div class="beneficios_caja">
                    <span class="titulo_bc">Marcas Exclusivas</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_06.png" /></span>
                    <p>Conoce las marcas exclusivas que tenemos en nuestros locales Salcobrand.</p>
                    <a href="<?php echo URL_BASE;?>category/marcas-exclusivas">M&aacute;s Informaci&oacute;n</a>
                </div>
                
                <div class="beneficios_caja">
                    <span class="titulo_bc">Comunidad M&oacute;vil</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_07.png" /></span>
                    <p>Porque queremos estar siempre contigo y acompa&ntilde;arte donde vayas, hazte parte de Salcobrand M&oacute;vil.</p>
                    <a href="<?php echo URL_BASE;?>category/comunidad-movil-salcobrand">M&aacute;s Informaci&oacute;n</a>
                </div>

		<div class="beneficios_caja">
                    <span class="titulo_bc">Caja de Compensación Los Andes</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_02.png" /></span>
                    <p>Conoce todos los beneficios que hemos preparado para ti.</p>
                    <a href="<?php echo URL_BASE;?>landing/beneficio-caja-los-andes/">M&aacute;s Informaci&oacute;n</a>
                </div>

		<div class="beneficios_caja">
                    <span class="titulo_bc">Consalud</span>
                    <span class="img_bc"><img src="<?php echo URL_THEME;?>/images/beneficios_top_bgr_04.png" /></span>
                    <p> Si eres Cliente Consalud, descubre aquí tus beneficios.</p>
                    <a href="<?php echo URL_BASE;?>landing/beneficio-consalud/">M&aacute;s Informaci&oacute;n</a>
                </div>
              
          </div>
        </div>
        <!-- END BENEFICIOS -->
        
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>