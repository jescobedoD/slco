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
<!-- PROMOCIONES -->
<div id="promociones">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<?php
	$categoria = get_categories(array(
		'slug' => 'catalogos'
	));
	$args = array(
		'numberposts'     => 100,
		'category'        => $categoria[0]->cat_ID,
		'post_type'       => 'post',
		'orderby'         => 'post_date',
		'order'           => 'DESC',
		'post_status'     => 'publish'
	);
	$posts = get_posts($args);
	?>
	<?php foreach($posts AS $post){?>
	<div class="promociones_promo">
		<div class="promociones_img" style="width: 200px;">
			<?php echo $post->post_content;?>
		</div>
		<div class="promociones_info">
			<?php $link_catalogo = get_post_meta($post->ID, 'catalogo_link_popup', true);?>
			<?php if($link_catalogo!=""){?>
			<a href="<?php echo $link_catalogo;?>" onclick="window.open('<?php echo $link_catalogo;?>', 'pageFlip', 'location=no,menubar=no,resizable=yes,scrollbars=no,status=no,toolbar=no,left='+(screen.availWidth-866)/2+',top='+(screen.availHeight-600)/2+',width=866,height=600'); return false;" rel="nofollow" class="pp_vermas" style="width: 150px;">Ver cat&aacute;logo</a>
			<?php }?>
			
            <!--------------QUEDA PENDIENTE--------------->
            <?php $link_catalogo2 = get_post_meta($post->ID, 'catalogo_link_popup2', true);?>
			<?php if($link_catalogo2!=""){?>
			<a href="<?php echo $link_catalogo2;?>" onclick="window.open('<?php echo $link_catalogo2;?>', 'pageFlip', 'location=no,menubar=no,resizable=yes,scrollbars=no,status=no,toolbar=no,left='+(screen.availWidth-866)/2+',top='+(screen.availHeight-600)/2+',width=866,height=600'); return false;" rel="nofollow" class="pp_vermas" style="width: 150px;">Ver cat&aacute;logo</a>
			<?php }?>
            <!--------------/QUEDA PENDIENTE--------------->

			<?php $bases_legales = get_post_meta($post->ID, 'catalogo_bases_legales', true);?>
			<?php if($bases_legales!=""){?>
			<a href="<?php echo $bases_legales;?>" target="_blank" class="pp_vermas" style="width: 150px;">Ver bases legales</a>
			<?php }?>       
 		</div>
	</div>
	<?php }?>
</div>
<!-- END PROMOCIONES -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>