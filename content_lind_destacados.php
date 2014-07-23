<?php
//
$args = array(
	'slug' => 'link_destacados'
);
$salud = get_categories($args);
$args = array(
	'numberposts'     => 4,
	'category'        => $salud[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'ASC',
	'post_status'     => 'publish'
);
$posts_salud = get_posts($args);
?>
<!-- BANNER CAJAS -->
<div id="banner_cajas">
	<?php foreach($posts_salud AS $post){?>
	<div id="banner_cajas_uno_<?php echo $post->ID;?>" class="borde_banner_caja">
		<a href="<?php echo get_post_meta($post->ID, 'link_destacado', true);?>" target="<?php echo $post->post_excerpt;?>" title="<?php echo $post->post_title;?>">
			<?php echo $post->post_content;?>
		</a>
	</div>
	<?php }?>
</div>
<!-- END BANNER CAJAS -->