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
	<?php get_template_part('content_sub_servicios', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- MARCAS SERVICIOS -->
<div id="promociones">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<div id="servicios_intro">
		<p><?php echo category_description(); ?></p>
	</div>
	
	<div id="servicios_box">
		<?php
		$args = array(
			'slug' => 'servicios-salcobrand'
		);
		$noticias = get_categories($args);
		$args = array(
			'numberposts'     => 10,
			'category'        => $noticias[0]->cat_ID,
			'post_type'       => 'post',
			'orderby'         => 'post_date',
			'order'           => 'DESC',
			'post_status'     => 'publish'
		);
		$posts = get_posts($args);
		?>
		<?php foreach($posts AS $post){?>
		<a href="<?php echo get_post_meta($post->ID, 'link_servicio', true);?>" target="_parent" title="<?php echo $post->post_title;?>"  class="servicio_box"  >
			<!--div class="servicio_box"-->
				<span><?php echo $post->post_title;?></span>
				<p style="width: 570px;"><?php echo $post->post_content;?></p>
				<div class="servicio_box_img">
					<?php echo get_post_meta($post->ID, 'imagen_servicio_icono', true);?>
				</div>
			<!--/div-->
		</a>
		<?php }?>
	</div>
</div>
<!-- END SERVICIOS -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>