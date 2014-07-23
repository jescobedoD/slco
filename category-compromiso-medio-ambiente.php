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
	<?php get_template_part('content_sub_rse', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- RSE -->
<div id="rse">
	<?php get_template_part('content_breadcums_rse', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
		<div id="rse_intro">
			<p>Como Salcobrand entendemos la RSE como uno de los pilares fundamentales de la empresa. La vemos como un compromiso<br />voluntario  con cada uno de los grupos con los que nos relacionamos; nuestros colaboradores, proveedores, clientes y con las comunidades en las que estamos insertos. 
			<p>Concebimos cada una de nuestras acciones de RSE como un compromiso a largo plazo, lo que conlleva un trabajo constante con cada una de nuestras alianzas y equipos de trabajo para que este fin est&eacute; presente en cada proyecto que emprendemos. <br />Para lograr este objetivo hemos asumido compromisos; corporativos, con la comunidad, con el medio ambiente y con nuestros colaboradores.</p>
		</div>
		<div id="rse_compromisos_box">
                <div id="rse_compromisos">
                    <div class="rse_c_caja">
                        <span>Compromisos Corporativos</span>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat magister </p>
                        <a href="#">M&aacute;s Informaci&oacute;n</a>
                    </div>
                    <div class="rse_c_caja">
                        <span>Compromisos con la Comunidad</span>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat magister </p>
                        <a href="#">M&aacute;s Informaci&oacute;n</a>
                    </div>
                    <div class="rse_c_caja">
                        <span>Compromisos Medio Ambiente</span>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat magister </p>
                        <a href="#">M&aacute;s Informaci&oacute;n</a>
                    </div>
                    <div class="rse_c_caja">
                        <span>Compromisos con Colaboradores</span>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat magister </p>
                        <a href="#">M&aacute;s Informaci&oacute;n</a>
                    </div>
                </div>
            </div>
        </div>
<!-- END RSE -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>