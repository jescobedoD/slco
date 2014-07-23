<!-- BANNER MINI HOME -->
<script type="text/javascript">
jQuery(document).ready(function(){
	/* RADIUS BORDER */
	<?php $browser = salco_browser();?>
	<?php if($browser['browser'] != "MSIE"){?>
		jQuery(".banner_mini_home .banner_mini_home_borde").corner("5px");
	<?php }?>
	/*BANNER 1*/
	jQuery('#banner_mini_home_uno').cycle({
		fx: 'fade',
		speed: 1000,
		pause: false,
		pager: '#bmh_uno_pager',
		pagerAnchorBuilder: function(idx, slide) {
			return '<a href="#"></a>';
		}
	});
	if(jQuery("#bmh_uno_pager a").size() == 1){
		jQuery(".banner_uno_home_pager").hide()
	}
	/*BANNER 2*/
	jQuery('#banner_mini_home_dos').cycle({
		fx: 'fade',
		speed: 1000,
		pause: false,
		pager: '#bmh_dos_pager',
		pagerAnchorBuilder: function(idx, slide) {
			return '<a href="#"></a>';
		}
	});
	if(jQuery("#bmh_dos_pager a").size() == 1){
		jQuery(".banner_dos_home_pager").hide()
	}
	/*BANNER 3*/
	jQuery('#banner_mini_home_tres').cycle({
		fx: 'fade',
		speed: 1000,
		pause: false,
		pager: '#bmh_tres_pager',
		pagerAnchorBuilder: function(idx, slide) {
			return '<a href="#"></a>';
		}
	});
	if(jQuery("#bmh_tres_pager a").size() == 1){
		jQuery(".banner_tres_home_pager").hide()
	}
});
</script>
<div id="banner_mini_home_box">
	<div class="banner_mini_home_box">
		<div class="bmh_pager_box banner_uno_home_pager">
			<div class="pager_left"></div>
			<div id="bmh_uno_pager" class="bmh_pager"></div>
			<div class="pager_right"></div>
		</div>
		<?php
		$catalogos_home = get_categories(array(
			'slug' => 'promociones-home'
		));
		$args = array(
			'numberposts'     => 8,
			'category'        => $catalogos_home[0]->cat_ID,
			'post_type'       => 'post',
			'orderby'         => 'post_date',
			'order'           => 'DESC',
			'post_status'     => 'publish'
		);
		$posts_catalogos_home = get_posts($args);
		
		
		//echo get_post_meta($banner->ID, 'imagen_promocion_home', true);?
		
		?>
		<div id="banner_mini_home_uno" class="banner_mini_home">
			<?php foreach($posts_catalogos_home AS $banner){?>
			<div>
				<a href="<?php echo get_post_meta($banner->ID, 'imagen_promocion_home', true);?>" target="<?php echo get_post_meta($banner->ID, 'imagen_promocion_target', true);?>" rel="">
					<span class="banner_mini_home_borde"></span>
					<span class="banner_mini_home_borde_2"><?php echo $banner->post_title;?></span>
					<?php echo $banner->post_content;?>
				</a>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="banner_mini_home_box">
		<div class="bmh_pager_box banner_dos_home_pager">
			<div class="pager_left"></div>
			<div id="bmh_dos_pager" class="bmh_pager"></div>
			<div class="pager_right"></div>
		</div>
		<?php
		$catalogos_home = get_categories(array(
			'slug' => 'alianzas-home'
		));
		$args = array(
			'numberposts'     => 8,
			'category'        => $catalogos_home[0]->cat_ID,
			'post_type'       => 'post',
			'orderby'         => 'post_date',
			'order'           => 'DESC',
			'post_status'     => 'publish'
		);
		$posts_catalogos_home = get_posts($args);
		?>
		<div id="banner_mini_home_dos" class="banner_mini_home">
			<?php foreach($posts_catalogos_home AS $banner){?>
			<div>
				<a href="<?php echo get_post_meta($banner->ID, 'imagen_alianza_home', true);?>" target="<?php echo get_post_meta($banner->ID, 'imagen_alianza_target', true);?>" rel="">
					<span class="banner_mini_home_borde"></span>
					<span class="banner_mini_home_borde_2"><?php echo $banner->post_title;?></span>
					<?php echo $banner->post_content;?>
				</a>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="banner_mini_home_box banner_mini_home_box_last">
		<div class="bmh_pager_box banner_tres_home_pager">
			<div class="pager_left"></div>
			<div id="bmh_tres_pager" class="bmh_pager"></div>
			<div class="pager_right"></div>
		</div>
		<?php
		$catalogos_home = get_categories(array(
			'slug' => 'catalogos-home'
		));
		$args = array(
			'numberposts'     => 8,
			'category'        => $catalogos_home[0]->cat_ID,
			'post_type'       => 'post',
			'orderby'         => 'post_date',
			'order'           => 'DESC',
			'post_status'     => 'publish'
		);
		$posts_catalogos_home = get_posts($args);
		?>
		<div id="banner_mini_home_tres" class="banner_mini_home">
			<?php foreach($posts_catalogos_home AS $banner){?>
			<div>	<a href="<?php echo esc_url(home_url("/category/catalogos"));?>">
				<a href="<?php echo esc_url(home_url("/category/catalogos"));?>">
					<span class="banner_mini_home_borde"></span>
					<span class="banner_mini_home_borde_2"><?php echo $banner->post_title;?></span>
					<?php echo $banner->post_content;?>
				</a>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<!-- END BANNER MINI HOME -->