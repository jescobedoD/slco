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
			'slug' => 'noticias-salcobrand'
		);
		$noticias = get_categories($args);
		$args = array(
			'numberposts'     => 10,
			'category'        => $noticias[0]->cat_ID,
			'post_type'       => 'post',
			'orderby'         => 'post_date',
			'order'           => 'DESC',
			'post_status'     => 'publish',
			'posts_per_page'  => 10,
			'paged' => $paged
		);
		$posts_noticias = get_posts($args);
		?>
		<?php 

		$c = 0;

		foreach($posts_noticias AS $posts_noticia){?>
		<div class="noticia_archivo">
			<div class="noticia_archivo_thumb">
				<a href="<?php echo get_permalink($posts_noticia->ID);?>"><?php echo get_post_meta($posts_noticia->ID, 'noticia_109_87', true);?></a>
			</div>
			<div class="noticia_archivo_text">
				<h1 class="titulo"><a href="<?php echo get_permalink($posts_noticia->ID);?>"><?php echo $posts_noticia->post_title;?></a></h1>
				<p><?php echo $posts_noticia->post_excerpt;?></p>
				<p>
					<?php
					$date = reset(explode(' ',$posts_noticia->post_date));
					$date = explode('-',$date);

					echo $date[2].'-'.$date[1].'-'.$date[0]; ?>
				</p>
				<a href="<?php echo get_permalink($posts_noticia->ID);?>" class="noticia_archivo_mas">Seguir Leyendo</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php
			$c++;
		 }?>
	</div>
	<?php
		#### PAGINACION ###
		$max_page = 4;
		if (!$paged && $max_page >= 1) {
			$current_page = 1;
		}
		else {
			$current_page = $paged;
		}
		?>
		<div class="pager" style="font-family:arial; font-size:14px; margin: 0 0 0 210px; color:#027EBF">
			<ul class="group">
				<?php echo paginate_links(array(
			"base" => add_query_arg("paged", "%#%"),
			"format" => '',
			"type" => "plain",
			"total" => $max_page,
			"current" => $current_page,
			"show_all" => false,
			"end_size" => 4,
			"mid_size" => 2,
			"prev_next" => true,
			"next_text" => __('>'),
			"prev_text" => __('<')
			));
			wp_reset_query(); ?>
			</ul>
		</div>
		<?php
		### FIN PAGINACION ###
		?>
	<!-- END NOTICIAS ARCHIVO -->
</div>
<!-- END NOTICIAS -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>