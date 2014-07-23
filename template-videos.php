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
<!-- VIDEOS -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php
	$category_id = wp_get_post_categories(get_the_id());
	$category = get_categories(array(
		'include' => $category_id[0],
		'number' => 1
	));
	?>
	<div id="videos">
		<?php get_template_part('content_breadcums', get_post_format());?>
		<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
			<div id="video_post">
				<div id="video_fecha">
					<span><?php the_date();?></span>
				</div>
				<div id="video_player_<?php the_ID();?>"></div>
				<script type="text/javascript">
					jwplayer("video_player_<?php the_ID();?>").setup({
						flashplayer	:"<?php echo URL_THEME;?>/swf/player.swf",
						file		:"<?php echo get_post_meta(get_the_ID(), 'url_video', true);?>",
						image		:"<?php echo get_post_meta(get_the_ID(), 'image_video', true);?>",
						height		:275,
						width		:448,
						plugins		:{sharing:{link:false}}
					});
				</script>
				<div id="video_sub">
					<span>Descripci&oacute;n Video</span>
				</div>
				<div id="video_des">
					<p><?php the_content();?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php get_template_part('content_otros_videos', get_post_format());?>
	</div>
<?php endwhile; endif; ?>
<!-- END VIDEOS -->