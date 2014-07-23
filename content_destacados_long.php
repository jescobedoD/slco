<!-- CAJAS SECCION -->
<style>
a{
	text-decoration:none;
}

</style>

<script type="text/javascript">
jQuery(function(){
	jQuery("#cajas_seccion div").hover(
		function(){jQuery(this).addClass('bgr_csHover');},
		function(){jQuery(this).removeClass('bgr_csHover');}
	);
})
</script>
<?php
//
$args = array(
	'slug' => 'noticias-de-salud'
);
$salud = get_categories($args);
$args = array(
	'numberposts'     => 1,
	'category'        => $salud[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish'
);
$posts_salud = get_posts($args);
//
$args = array(
	'slug' => 'noticias-de-belleza'
);
$belleza = get_categories($args);
$args = array(
	'numberposts'     => 1,
	'category'        => $belleza[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish'
);
$posts_belleza = get_posts($args);
//
$args = array(
	'slug' => 'noticias-de-bienestar'
);
$bienestar = get_categories($args);
$args = array(
	'numberposts'     => 1,
	'category'        => $bienestar[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish'
);
$posts_bienestar = get_posts($args);
?>
<div id="cajas_seccion">
	<?php foreach($posts_salud AS $post){ setup_postdata($post);?>
	<div id="cajas_seccion_salud" style="margin: 6px 0 0 65px;">
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_big_cs">
		<h1>Salud</h1>
		<h2><?php the_title();?></h2>
		<?php echo get_post_meta($post->ID, 'noticia_190_127', true);?>
		<p><?php echo salco_sustraer($post->post_excerpt, 90, "...");?></p>
        </a>
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_cs"></a>
	</div>
	<?php }?>
	<?php foreach($posts_belleza AS $post){ setup_postdata($post);?>
	<div id="cajas_seccion_belleza" style="margin: 6px 0 0 65px;">
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_big_cs">
		<h1>Belleza</h1>
		<h2><?php the_title();?></h2>
		<?php echo get_post_meta($post->ID, 'noticia_190_127', true);?>
		<p><?php echo salco_sustraer($post->post_excerpt, 90, "...");?></p>
        </a>
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_cs"></a>
	</div>
	<?php }?>
	<?php foreach($posts_bienestar AS $post){ setup_postdata($post);?>
	<div id="cajas_seccion_bienestar" style="margin: 6px 0 0 65px;">
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_big_cs">
		<h1>Bienestar</h1>
		<h2><?php the_title();?></h2>
		<?php echo get_post_meta($post->ID, 'noticia_190_127', true);?>
		<p><?php echo salco_sustraer($post->post_excerpt, 90, "...");?></p>
        </a>
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_cs"></a>
	</div>
	<?php }?>
</div>
<!-- END CAJAS SECCION -->