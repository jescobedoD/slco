<!-- BANNER SIDEBAR -->
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('#banner_sidebar .cicle').cycle({
		fx: 'fade',
		speed: 1000,
		pause: false,
		pager: '#banner_sidebar .pager',
		pagerAnchorBuilder: function(idx, slide) {
			return '<a href="#"></a>';
		}
	});
	if(jQuery("#banner_sidebar .cicle a").size() == 1){
		jQuery("#banner_sidebar .pager").hide()
	}
});
</script>
<?php
$banner_sidebar = get_categories(array(
	'slug' => 'banner_sidebar'
));
$args = array(
	'numberposts'     => 3,
	'category'        => $banner_sidebar[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish'
);
$banner_posts = get_posts($args);

$catid = get_the_category($_GET['p']);

$referer = $_SERVER['HTTP_REFERER'];

if($catid[0]->cat_ID == 70 && $referer == 'http://www.salcobrand.cl/cl/category/tarjeta-credito-salcobrand/'){
	define('AUX',1);	
}

?> 
<?php if(AUX!=1) {?>  <!-- No se muestra para TSCB -->                 
<div id="banner_sidebar">
	<div class="cicle">
		<?php foreach($banner_posts AS $banner){?>
			<a alt="<?php echo AUX;?>" href="<?php echo get_post_meta($banner->ID, 'url_banner_sidebar', true);?>" target="<?php echo get_post_meta($banner->ID, 'target_banner_sidebar', true);?>" title="<?php echo bloginfo('name')." | ".$banner->post_title;?>">
				<?php echo $banner->post_content;?>
			</a>
		<?php }?>
	</div>
	<div class="pager"></div>
</div>
<?php } ?>
<!-- END BANNER SIDEBAR -->