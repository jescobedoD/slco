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
	<?php get_template_part('content_sub_tarjeta', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->


<!-- PREGUNTAS FRECUENTES -->
<script type="text/javascript">
jQuery(function() {
	jQuery("#pf_accordion").accordion();
});
</script>
<div id="preguntas_frecuentes" style="height:none;">
	<?php get_template_part('content_breadcums_tcs', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<?php
	$categoria = get_categories(array(
		'slug' => 'preguntas-frecuentes'
	));
	$args = array(
		'numberposts'     => 100,
		'category'        => $categoria[0]->cat_ID,
		'post_type'       => 'post',
		'orderby'         => 'post_title',
		'order'           => 'ASC',
		'post_status'     => 'publish'
	);
	$posts = get_posts($args);
	?>
	<div id="pf_accordion">
		<?php foreach($posts AS $post){?>
		<h3><?php echo $post->post_title;?></h3>
		<div>
			<p>
			<?php echo $post->post_content;?>
			</p>
		</div>
		<?php }?>
	</div>
	<div class="clearfix"></div>
</div>
<!-- END PREGUNTAS FRECUENTES -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>