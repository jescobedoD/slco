<!-- BANNER SECUNDARIO -->
<style>
a{text-decoration:none}
</style>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#banner_secundario').cycle({
		fx: 'fade',
		speed: 1000,
		pause: false,
		pager: '#banner_secundario_pager',
		pagerAnchorBuilder: function(idx, slide) {
			return '<a href="#">'+(idx+1)+'</a>';
		}
	});
	if(jQuery("#banner_secundario_pager a").size() == 1){
		jQuery("#banner_secundario_pager").hide()
	}
});
</script>

<?php
$args = array(
	'slug' => 'noticias-home'
);
$noticias = get_categories($args);
$args = array(
	'numberposts'     => 3,
	'category'        => $noticias[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish'
);
$posts_array = get_posts($args);
?>
<div id="banner_secundario_box" style="background-color:#FFF">
	<div id="banner_secundario_pager"></div>
	<div id="banner_secundario">
		<?php foreach($posts_array AS $post){ setup_postdata($post);?>
		<div class="bs_box">
			
            <div class="img_bs">
            <a href="<?php the_permalink(); ?>">	
					<?php echo get_post_meta($post->ID, 'noticia_239_195', true);?>
				
            </a>
            </div>
            
			<div class="text_bs">
				<span class="fecha"><?php the_date(); ?></span>
				<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
				<p><?php echo salco_sustraer(get_the_excerpt(), 500, "...");?></p>
			</div>
			<a href="<?php the_permalink(); ?>" class="vermas_bs"></a>
		</div>
		<?php }?>
	</div>
</div>
<!-- END BANNER SECUNDARIO -->