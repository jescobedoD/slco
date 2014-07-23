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
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- NUESTRA EMPRESA -->
<?php
$ne = get_categories(array(
	'slug' => 'nuestra-empresa'
));
$args = array(
	'numberposts'     => 20,
	'category'        => $ne[0]->cat_ID,
	'post_type'       => 'post',
	'orderby'         => 'post_title',
	'order'           => 'DESC',
	'post_status'     => 'publish'
);
$posts_ne = get_posts($args);
?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div id="noticias">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
            <div id="nuestra_empresa_intro">
	            <p><?php the_content();?></p>
            </div>
            <script type="text/javascript">
				jQuery(document).ready(function() {
					var arreglo = [];
					<?php foreach($posts_ne AS $post){;?>arreglo.push("<?php echo $post->post_title;?>");<?php }?>
					jQuery('#nuestra_empresa_content').cycle({
						fx: 'fade',
						speed: 1000,
						pause: true,
						timeout: 0,
						pager: '#nuestra_empresa_pager',
						prev: '#nuestra_empresa_prev',
						next: '#nuestra_empresa_next',
						pagerAnchorBuilder: function(idx, slide) {
							return '<a href="#"><span> '+arreglo[idx]+' <\/span><\/a>';
						}
					});
				});
			</script>
            <div id="nuestra_empresa_box">
            	<div id="nuestra_empresa_content">
                	<?php foreach($posts_ne AS $post){;?>
                	<div class="ne_caja">
                		<?php echo get_post_meta($post->ID, 'nuestra_empresa_210_197', true);?>
                        <span class="ne_year">A&ntilde;o <?php echo $post->post_title;?></span>
                        <!--<span class="ne_sub">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna.</span>-->
                        <p><?php echo $post->post_content;?></p>
                    </div>
                    <?php }?>
				</div>
				<!-- WIDTH PAGER -->
                <script type="text/javascript">
				jQuery(document).ready(function(){
				 cambiarAncho(590);
					function cambiarAncho(pagerAncho){
						var pagerItems = jQuery('#nuestra_empresa_pager a').size();
						var itemAncho = (pagerAncho/pagerItems)-1;
						jQuery('#nuestra_empresa_pager').css({'width': pagerAncho +'px'});
						jQuery('#nuestra_empresa_pager a').css({'width': itemAncho +'px'});
					}
				});
				</script>
                <!-- END WIDTH PAGER -->
                <div id="nuestra_empresa_timeline">
                    <!--<span>Elije el a&ntilde;o</span>-->
                    <div id="nuestra_empresa_prev">
                    </div>
                    <div id="nuestra_empresa_next">
                    </div>
                    <div id="nuestra_empresa_pager">
                    </div>
                </div>
            </div>	
</div>
<?php endwhile; endif; ?>
        <!-- END NUESTRA EMPRESA -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>