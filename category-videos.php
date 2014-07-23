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
<?php
$videos = get_categories(array(
	'slug' => 'videos'
));
$posts_array = get_posts(array(
	'numberposts'     => 1,
	'category'        => $videos[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish'
));
?>
<div id="videos">
		<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<?php foreach($posts_array AS $post){ setup_postdata($post);?>
		<div id="video_post">
			<div id="video_fecha">
				<span><?php the_date();?></span>
			</div>
			<div id="video_titulo">
				<h1 style="color: #027EBF;font-size: 14px;margin-bottom: 5px;"><?php the_title();?></h1>
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
	<?php }?>
	<?php get_template_part('content_otros_videos', get_post_format());?>
</div>
<!-- END VIDEOS -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>