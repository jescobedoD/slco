<!-- CAJAS HOME -->
<script type="text/javascript">
jQuery(function(){
	jQuery("#cajas_home div").hover(
		function(){jQuery(this).addClass('bgr_chHover');},
		function(){jQuery(this).removeClass('bgr_chHover');}
	);
})
</script>
<?php
//
$args = array(
	'slug' => 'noticias-home'
);
$noticias = get_categories($args);
$args = array(
	'numberposts'     => 1,
	'category'        => $noticias[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish'
);
$posts_noticias = get_posts($args);
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
<div id="cajas_home">
	<?php foreach($posts_noticias AS $post){ setup_postdata($post);?>
	<div id="cajas_home_salud">
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_big_ch"><!--/a-->
		<!-- <h1>Salud</h1> -->
		<h1><strong><?php the_title();?></strong></h1>
		<?php echo get_post_meta($post->ID, 'noticia_190_127', true);?>
		<p><?php echo salco_sustraer($post->post_excerpt, 90, "...");?></p>
		</a>
        <a href="<?php echo get_permalink($post->ID);?>" class="vermas_ch"></a>
	</div>
	<?php }?>
	<?php foreach($posts_salud AS $post){ setup_postdata($post);?>
	<div id="cajas_home_belleza">
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_big_ch">
		<!--<h1>Belleza</h1>-->
		<h1><strong><?php the_title();?></strong></h1>
		<?php echo get_post_meta($post->ID, 'noticia_190_127', true);?>
		<p><?php echo salco_sustraer($post->post_excerpt, 90, "...");?></p>
        </a>
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_ch"></a>
	</div>
	<?php }?>
	<?php foreach($posts_bienestar AS $post){ setup_postdata($post);?>
	<div id="cajas_home_bienestar">
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_big_ch">
		<!-- <h1>Bienestar</h1>-->
		<h1><strong><?php the_title();?></strong></h1>
		<?php echo get_post_meta($post->ID, 'noticia_190_127', true);?>
		<p><?php echo salco_sustraer($post->post_excerpt, 90, "...");?></p>
        </a>
		<a href="<?php echo get_permalink($post->ID);?>" class="vermas_ch"></a>
	</div>
	<?php }?>
</div>
<!-- END CAJAS HOME -->