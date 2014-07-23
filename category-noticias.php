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
	<?php get_template_part('content_sub_noticias', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- NOTICIAS -->
<div id="noticias">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<!-- NOTICIAS ARCHIVO -->
	<div id="noticias_archivo">
		<?php
		$args = array(
			'slug' => 'noticias'
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
		$posts_noticias = get_posts($args);
		?>
		<?php foreach($posts_noticias AS $posts_noticia){?>
		<div class="noticia_archivo">
			<div class="noticia_archivo_thumb">
				<?php echo get_post_meta($posts_noticia->ID, 'noticia_109_87', true);?>
			</div>
			<div class="noticia_archivo_text">
				<h1 class="titulo"><?php echo $posts_noticia->post_title;?></h1>
				<p><?php echo $posts_noticia->post_excerpt;?></p>
				<a href="<?php echo get_permalink($posts_noticia->ID);?>" class="noticia_archivo_mas" style="text-decoration:underline">Seguir Leyendo</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php }?>
	</div>
	<!-- END NOTICIAS ARCHIVO -->
</div>
<!-- END NOTICIAS -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>