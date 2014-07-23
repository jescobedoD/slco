<?php
/**
 * Template Name: Detalle Noticias
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<?php get_template_part('content_sub_noticias', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php
	$category_id = wp_get_post_categories(get_the_id());
	foreach($category_id AS $category_this){
		if($category_this->cat_ID !="39"){
			$category = get_categories(array(
				'include' => $category_this,
				'number' => 1
			));
		}
	}
	?>
	<!-- NOTICIAS DETALLE -->
	<div id="noticias_detalle">
		<?php get_template_part('content_breadcums', get_post_format());?>
		<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
		<div id="noticias_detalle_post">
			<div id="noticias_detalle_img">
				<a href="<?php the_permalink(); ?>"><span><?php echo $category[0]->name;?></span></a>
				<?php echo get_post_meta(get_the_ID(), 'noticia_441_197', true);?>
			</div>
            <div id="noticias_detalle_fecha">
				<span><?php the_date();?></span>
			</div>
			<div id="noticias_detalle_titulo">
				<h1><?php the_title();?></h1>
			</div>
			<div id="noticias_detalle_sub">
				<span><?php the_excerpt(); ?></span>
			</div>
			<div id="noticias_detalle_des">
				<p><?php the_content(); ?></p>
			</div>
            
            
            
			<?php $galery = get_post_meta(get_the_ID(), 'galeria_id', true);?>
			<?php if($galery!=""){?>
				<div class="noticias_detalle_galeria">
					<div class="noticias_detalle_galeria_til">Imagenes del Evento</div>
					<?php echo gallery_display(Array('id' => $galery));?>
					<div class="noticias_detalle_galeria_haz">haz clic en la imagen para agrandar</div>
				</div>
			<?php }?>
			<?php get_template_part('comments', get_post_format());?>
			</div>
            <?php get_template_part('content_noticias_detalle_thumbs', get_post_format());?>
            <div style="position:relative; float:none;" > <span><a href="../../<?php echo $category[0]->slug;?>" style="float:right; margin-right:132px;">Ver todos los artículos</a></span></div>
        </div>
        <!-- END VIDEOS -->
<?php endwhile; endif; ?>