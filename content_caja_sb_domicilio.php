<?php
//
$args = array(
	'slug' => 'link_caja_sbdomicilio'
);
$cajasb = get_categories($args);
$args = array(
	'numberposts'     => 1,
	'category'        => $cajasb[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'ASC',
	'post_status'     => 'publish'
);
$posts_cajasb = get_posts($args);
?>

<div id="caja_sb_domicilio_box">
	<?php foreach($posts_cajasb AS $post){?>
		<a href="<?php echo get_post_meta($post->ID, 'link_destacado', true);?>" target="<?php echo $post->post_excerpt;?>" title="<?php echo $post->post_title;?>">
			<?php echo $post->post_content;?>
		</a>
	<?php }?>
</div>
