<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<?php get_template_part('content_sub_beneficios', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<div id="template1">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<div class="template1_post">
			<a href="<?php echo esc_url(home_url("/category/marcas-exclusivas"));?>" target="_parent" style="float:right;margin-top:-17px;color: #027EBF; text-decoration:underline;">Volver a Marcas Exclusivas</a>
			<?php the_content();?>
		</div>
	<?php endwhile; endif; ?>
</div>