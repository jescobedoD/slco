<?php
$videos = get_categories(array(
	'slug' => 'videos'
));
$posts_array = get_posts(array(
	'numberposts'     => 5,
	'category'        => $videos[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish',
	'exclude'		=> get_the_id()
));
?>	
<div class="otros_videos_miniatura">
	<span>Otros Videos</span>
	<?php foreach($posts_array AS $post){ setup_postdata($post);?>
	<div class="video_thumb">
		<a href="<?php the_permalink();?>"></a>
		<span><?php the_date();?></span>
		<?php echo get_post_meta(get_the_ID(), 'image_miniatura_video_60_50', true);?>
		<p><?php the_content();?></p>
	</div>
	<?php }?>
</div>