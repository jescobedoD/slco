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
	<!--?php get_template_part('content_banner_sidebar', get_post_format());?-->
    <?php get_template_part('content_banner_sidebar', get_post_format());?>
    
  <script type="text/javascript">
    jQuery(function() {
        jQuery('.promociones_info a').lightBox();
    });
    </script>  
    
</div>
<!-- END SIDEBAR -->
<!-- PROMOCIONES -->
<div id="promociones">
	<?php get_template_part('content_breadcums_beneficios', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<?php
	$categoria = get_categories(array(
		'slug' => 'promociones-salcobrand'
	));
	$args = array(
		'numberposts'     => 100,
		'category'        => $categoria[0]->cat_ID,
		'post_type'       => 'post',
		'orderby'         => 'post_date',
		'order'           => 'ASC',
		'post_status'     => 'publish'
	);
	$posts = get_posts($args);
	?>
	<?php foreach($posts AS $post){?>
	<div class="promociones_promo">
		<div class="promociones_img">
			<?php echo get_post_meta($post->ID, 'imagen_promo_315_277', true);?>
		</div>
		<div class="promociones_info">
			<h1><?php echo $post->post_title;?></h1>
			<span>Descripci&oacute;n:</span>
			<p><?php echo $post->post_content;?></p>
			<a  rel="lightbox[album]" href="<?php echo $post->post_excerpt;?>" class="pp_vermas">Ver m&aacute;s</a>
			<?php
			$bases_legales = get_post_meta($post->ID, 'bases_legales_promo', true);
			if($bases_legales){?>
				<a href="<?php echo $bases_legales;?>" class="pp_verbases">Ver bases legales</a>
			<?php }?>
		</div>
	</div>
	<?php }?>
</div>
<!-- END PROMOCIONES -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>