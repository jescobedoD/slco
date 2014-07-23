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
<!-- RESULTADOS BUSQUEDA -->
<div id="resultados_busqueda">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo">Resultados de la b&uacute;squeda: <?php echo get_search_query();?></div>
	<?php if(have_posts()):?>
		<script type="text/javascript">
		jQuery(function(){
			jQuery(".resultado_busqueda").hover(
				function(){jQuery(this).addClass('bgr_rbHover');},
				function(){jQuery(this).removeClass('bgr_rbHover');}
			);
		})
		</script>
		<div id="resultados">

<script>
  (function() {
    var cx = '013996852336361137773:zdgacrocsfe';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search gname="storesearch" linktarget="_parent" queryParameterName="s"></gcse:search>

		</div>
	<?php else:?>
		<div id="resultados">
			<p style="color:#333333;font-family:Arial;font-size:11px;font-weight:normal;">Disculpa, no encontramos ning&uacute;n resultado bajo tu criterio de b&uacute;squeda: <strong><?php echo get_search_query();?></strong></p>
		</div>
	<?php endif; ?>
</div>
<!-- END RESULTADOS BUSQUEDA -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>