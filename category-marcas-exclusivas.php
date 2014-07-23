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
	<?php get_template_part('content_sub_beneficios', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- MARCAS EXCLUSIVAS -->
<div id="promociones">
	<?php get_template_part('content_breadcums_beneficios', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
            <div id="marcas_exclusivas_intro">
            <p>En Salcobrand tenemos exclusivas marcas que puedes disfrutar. Con&oacute;celas aqu&iacute; y disfr&uacute;talas t&uacute; y tu familia.</p>
            </div>
            
            <div id="marcas_exclusivas_box">
            
            	<div class="marcas">
                	<div class="marcas_titulo">
                    	<span>Exclusivas Espacio</span>
                    </div>
                    <!-- MARCAS ESPACIOS -->
                    <script type="text/javascript">
						jQuery(document).ready(function() {
							jQuery('#marcas_box_espacios').cycle({
								fx: 'fade',
								speed: 1000,
								pause: true,
								timeout: 0,
								pager: '#marca_pager_espacios',
								prev: '#marca_espacios_prev',
								next: '#marca_espacios_next',
								pagerAnchorBuilder: function(idx, slide) {
									return '<a href="#"><\/a>';
								}
							});
							if(jQuery("#marca_pager_espacios a").size() == 1){
								jQuery("#marca_pager_espacios").hide();
								jQuery("#marca_espacios_prev").hide();
								jQuery("#marca_espacios_next").hide();
							}
						});
					</script>
                    
                    <div id="marca_pager_espacios" class="marca_pager">
                    </div>
                    <div id="marca_espacios_prev" class="marca_prev">
                    </div>
                    <div id="marca_espacios_next" class="marca_next">
                    </div>
                    
                    <div id="marcas_box_espacios" class="marcas_box">
                    	<?php
						$args = array(
							'slug' => 'marcas-exclusivas-espacios'
						);
						$category = get_categories($args);
						$args = array(
							'numberposts'     => 40,
							'category'        => $category[0]->cat_ID,
							'post_type'       => 'post',
							'orderby'         => 'post_date',
							'order'           => 'DESC',
							'post_status'     => 'publish'
						);
						$posts = get_posts($args);
						?>
						<?php
						$columna =0;
						foreach($posts AS $post){
							if($columna==0){
								echo '<div class="marca_box">';
							}
							?>
							<div class="marca">
								<a href="<?php echo get_permalink($post->ID);?>" target="_parent">
									
									<?php echo get_post_meta($post->ID, 'imagen_marca_117_117', true);?>
								</a>
							</div>
						<?php
							if($columna == 3){
								echo '</div>';
								$columna=0;
							}else{
								$columna++;
							}
						}
						if($columna <= 3 && $columna > 0){
							echo '</div>';
						}
						?>
                    </div>
                    <!-- END MARCAS ESPACIOS -->
                    
                    <div class="vitrina_grad">
                    </div>
                </div>
                
                <div class="marcas">
                	<div class="marcas_titulo">
                    	<span>Exclusivas en Salcobrand</span>
                    </div>
                    <div class="marcas_titulo_sub">
                    	<span>Infantil</span>
                    </div>
                    <!-- MARCAS SALCOBRAND INFANTIL -->
                    <script type="text/javascript">
						jQuery(document).ready(function() {
							jQuery('#marcas_box_salco_infantil').cycle({
								fx: 'fade',
								speed: 1000,
								pause: true,
								timeout: 0,
								pager: '#marca_pager_salco_infantil',
								prev: '#marca_salco_infantil_prev',
								next: '#marca_salco_infantil_next',
								pagerAnchorBuilder: function(idx, slide) {
									return '<a href="#"><\/a>';
								}
							});
							if(jQuery("#marca_pager_salco_infantil a").size() == 1){
								jQuery("#marca_pager_salco_infantil").hide();
								jQuery("#marca_salco_infantil_prev").hide();
								jQuery("#marca_salco_infantil_next").hide();
							}
						});
					</script>
                    
                    <div id="marca_pager_salco_infantil" class="marca_pager">
                    </div>
                    <div id="marca_salco_infantil_prev" class="marca_prev">
                    </div>
                    <div id="marca_salco_infantil_next" class="marca_next">
                    </div>
                    
                    <div id="marcas_box_salco_infantil" class="marcas_box">
                    	<?php
						$args = array(
							'slug' => 'marcas-infantil'
						);
						$category = get_categories($args);
						$args = array(
							'numberposts'     => 40,
							'category'        => $category[0]->cat_ID,
							'post_type'       => 'post',
							'orderby'         => 'post_date',
							'order'           => 'DESC',
							'post_status'     => 'publish'
						);
						$posts = get_posts($args);
						?>
						<?php
						$columna =0;
						foreach($posts AS $post){
							if($columna==0){
								echo '<div class="marca_box">';
							}
							?>
							<div class="marca">
								<a href="<?php echo get_permalink($post->ID);?>" target="_parent">
									<?php echo get_post_meta($post->ID, 'imagen_marca_117_117', true);?>
								</a>
							</div>
						<?php
							if($columna == 3){
								echo '</div>';
								$columna=0;
							}else{
								$columna++;
							}
						}
						if($columna <= 3 && $columna > 0){
							echo '</div>';
						}
						?>
                    </div>
                    <!-- END MARCAS SALCOBRAND INFANTIL -->
                    
                    <div class="vitrina_grad">
                    </div>
                </div>
                
                <div class="marcas">
	                <div class="marcas_titulo_sub">
                    	<span>Belleza</span>
                    </div>
                    <!-- MARCAS SALCOBRAND BELLEZA -->
                    <script type="text/javascript">
						jQuery(document).ready(function() {
							jQuery('#marcas_box_salco_belleza').cycle({
								fx: 'fade',
								speed: 1000,
								pause: true,
								timeout: 0,
								pager: '#marca_pager_salco_belleza',
								prev: '#marca_salco_belleza_prev',
								next: '#marca_salco_belleza_next',
								pagerAnchorBuilder: function(idx, slide) {
									return '<a href="#"><\/a>';
								}
							});
							if(jQuery("#marca_pager_salco_belleza a").size() == 1){
								jQuery("#marca_pager_salco_belleza").hide();
								jQuery("#marca_salco_belleza_prev").hide();
								jQuery("#marca_salco_belleza_next").hide();
							}
						});
					</script>
                    
                    <div id="marca_pager_salco_belleza" class="marca_pager">
                    </div>
                    <div id="marca_salco_belleza_prev" class="marca_prev">
                    </div>
                    <div id="marca_salco_belleza_next" class="marca_next">
                    </div>
                    
                    <div id="marcas_box_salco_belleza" class="marcas_box">
                    	<?php
						$args = array(
							'slug' => 'marcas-belleza'
						);
						$category = get_categories($args);
						$args = array(
							'numberposts'     => 40,
							'category'        => $category[0]->cat_ID,
							'post_type'       => 'post',
							'orderby'         => 'post_date',
							'order'           => 'DESC',
							'post_status'     => 'publish'
						);
						$posts = get_posts($args);
						?>
						<?php
						$columna =0;
						foreach($posts AS $post){
							if($columna==0){
								echo '<div class="marca_box">';
							}
							?>
							<div class="marca">
								<a href="<?php echo get_permalink($post->ID);?>" target="_parent">
									<?php echo get_post_meta($post->ID, 'imagen_marca_117_117', true);?>
								</a>
							</div>
						<?php
							if($columna == 3){
								echo '</div>';
								$columna=0;
							}else{
								$columna++;
							}
						}
						if($columna <= 3 && $columna > 0){
							echo '</div>';
						}
						?>
                    </div>
                    <!-- END MARCAS SALCOBRAND BELLEZA -->
                    
                    <div class="vitrina_grad">
                    </div>
                </div>
                
                <div class="marcas">
	                <div class="marcas_titulo_sub">
                    	<span>Cuidado y Bienestar</span>
                    </div>
                    <!-- MARCAS SALCOBRAND CUIDADO Y BIENESTAR -->
                    <script type="text/javascript">
						jQuery(document).ready(function() {
							jQuery('#marcas_box_salco_cuidado').cycle({
								fx: 'fade',
								speed: 1000,
								pause: true,
								timeout: 0,
								pager: '#marca_pager_salco_cuidado',
								prev: '#marca_salco_cuidado_prev',
								next: '#marca_salco_cuidado_next',
								pagerAnchorBuilder: function(idx, slide) {
									return '<a href="#"><\/a>';
								}
							});
							if(jQuery("#marca_pager_salco_cuidado a").size() == 1){
								jQuery("#marca_pager_salco_cuidado").hide();
								jQuery("#marca_salco_cuidado_prev").hide();
								jQuery("#marca_salco_cuidado_prev").hide();
							}
						});
					</script>
                    
                    <div id="marca_pager_salco_cuidado" class="marca_pager">
                    </div>
                    <div id="marca_salco_cuidado_prev" class="marca_prev">
                    </div>
                    <div id="marca_salco_cuidado_next" class="marca_next">
                    </div>
                    
                    <div id="marcas_box_salco_cuidado" class="marcas_box">
                    	<?php
						$args = array(
							'slug' => 'marcas-cuidado-bienestar'
						);
						$category = get_categories($args);
						$args = array(
							'numberposts'     => 40,
							'category'        => $category[0]->cat_ID,
							'post_type'       => 'post',
							'orderby'         => 'post_date',
							'order'           => 'DESC',
							'post_status'     => 'publish'
						);
						$posts = get_posts($args);
						?>
						<?php
						$columna =0;
						foreach($posts AS $post){
							if($columna==0){
								echo '<div class="marca_box">';
							}
							?>
							<div class="marca">
								<a href="<?php echo get_permalink($post->ID);?>" target="_parent">
									<?php echo get_post_meta($post->ID, 'imagen_marca_117_117', true);?>
								</a>
							</div>
						<?php
							if($columna == 3){
								echo '</div>';
								$columna=0;
							}else{
								$columna++;
							}
						}
						if($columna <= 3 && $columna > 0){
							echo '</div>';
						}
						?>
                    </div>
                    <!-- END MARCAS SALCOBRAND CUIDADO Y BIENESTAR -->
                    
                    <div class="vitrina_grad">
                    </div>
                </div>
                
            </div>
            
        </div>
        <!-- END MARCAS EXCLUSIVAS -->
        
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>