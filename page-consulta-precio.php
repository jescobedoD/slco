<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo URL_THEME;?>/css/consulta-precio/normalize.css">
<link rel="stylesheet" href="<?php echo URL_THEME;?>/css/consulta-precio/estilos.css">
<link rel="stylesheet" href="<?php echo URL_THEME;?>/css/consulta-precio/bootstrap.css">



<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<?php get_template_part('content_sub_medicamentos', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<div id="template1">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<?php /* if (have_posts()) : while (have_posts()) : the_post();?>
		<div class="template1_post">
			<iframe height="725" width="679" frameborder="0" scrolling="no" src="<?php echo URL_BASE;?>/mft_2011/MFT/MFT.HTM"></iframe>
		</div>
	<?php endwhile; endif; */ ?>

	
	<iframe src="<?php echo URL_BASE;?>/consultaprecio/index.php" width="680" height="800"></iframe>


</div>
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>

<?php get_footer(); ?>
