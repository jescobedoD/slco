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
	<?php get_template_part('content_sub_medicamentos', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<div id="template1">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<div class="template1_post">
			<?php the_content();?>
            <?php
			 $cupon = recoge_cupon();?>
            
			<?php for($i=0; $i<15; $i++){ ?>
			<?php 
			if (($i == 5) || ($i == 10) || ($i == 15)) {
				echo "<br />";
			}
			echo $cupon[$i];
			?> <br />
            <?php } ?>
            <!--a href="http://www.salcobrand.cl/paginasb/wp-content/uploads/2011/11/bases_legales_TCSB.pdf" target="_blank"><span class="pp_vermas">Ver bases legales</span></a-->
		</div>
	<?php endwhile; endif; ?>
</div>
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>