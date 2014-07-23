<script type="text/javascript">
/* BANNER PRINCIPAL */
jQuery(document).ready(function() {
	jQuery('#banner_principal').cycle({
		fx: 'fade',
		speed: 1000,
		pause: false,
		pager: '#banner_principal_pager',
		pagerAnchorBuilder: function(idx, slide) {
			return '<a href="#" ></a>';
		}
	});
});
/* END BANNER PRINCIPAL */
/* RADIUS BORDER */
jQuery(document).ready(function(){
	jQuery("#banner_principal").corner("5px");
});
/* END RADIUS BORDER */
</script>
<!-- BANNER PRINCIPAL -->
<?php
$args = array(
	'slug' => 'banner-home'
);
$banner_home = get_categories($args);
$args = array(
	'numberposts'     => 8,
	'category'        => $banner_home[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC'
);
$posts_array = get_posts($args);
?>
<div id="banner_principal_box">
	<div id="banner_principal_pager_box">
		<div class="pager_left"></div>
		<div id="banner_principal_pager"></div>
		<div class="pager_right"></div>
	</div>
	<div id="banner_principal">
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
<!-- END BANNER PRINCIPAL -->