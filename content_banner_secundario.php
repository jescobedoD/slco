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
			return '<a href="#" ></a>';
		}
	});
});
/* END BANNER PRINCIPAL */
/* RADIUS BORDER */
jQuery(document).ready(function(){
	jQuery("#banner_secundario").corner("5px");
});
</script>

<?php
$args = array(
	'slug' => 'banner-secundario'
);
$banner_secundario = get_categories($args);
$args = array(
	'numberposts'     => 8,
	'category'        => $banner_secundario[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_status'     => 'publish'
);
$posts_array = get_posts($args);
?>
<div id="banner_secundario_box">
	<div id="banner_secundario_pager_box">
		<div class="pager_left"></div>
		<div id="banner_secundario_pager"></div>
		<div class="pager_right"></div>
	</div>
	<div id="banner_secundario">
		<?php foreach($posts_array AS $banner){
		setup_postdata($banner);?>
		<div>
			<?php if($banner->post_title != "#"){?>
			<div class="vermas_bp">
				<a href="<?php echo $banner->post_title;?>" title="Ver m&aacute;s" target="_parent"></a>
			</div>
			<?php }?>
			<?php echo $banner->post_content;?>
		</div>
		<?php }?>
	</div>
</div>
<!-- END BANNER SECUNDARIO -->