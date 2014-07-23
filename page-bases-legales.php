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
<div id="template1">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<div class="template1_post">
			<?php
				$argumentos = array(
					'slug' => 'bases-legales'
				);
				$argumentos = array(
						'numberposts'     => -1,
						'category'        => 101,
						'post_type'       => 'post',
						'orderby'         => 'post_date',
						'order'           => 'DESC'
					);
					$bases_legales = get_posts($argumentos);
					?>
							<?php	
								foreach($bases_legales AS $bases){?>
										<p><?php echo $bases->post_content;?></p>
							<?php }?>
		</div>
	<?php endwhile; endif; ?>
</div>
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>