<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<?php
if(!current_user_can('level_0')){
	wp_redirect(get_bloginfo('wpurl')."/");
}
?>
<?php get_header(); ?>
<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<?php get_template_part('content_sub_perfil', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- REGISTRO -->
<div id="registro">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	
	<div id="registro_form">
		<div style="float:right;">
			<?php salco_get_avatar("143");?>
		</div>
		<form id="form_registro" action="<?php echo esc_url(home_url("/cambiar-mi-foto/"));?>" method="post" enctype="multipart/form-data" target="_parent" style="float:left;">
			<div class="r_titulo">1. Modifica tu avatar</div>
			<div class="r_left">
				<div class="r_general">
					<span>* Selecciona tu imagen</span>
					<input type="file" name="avatar" value="" autocomplete="off" />
				</div>
			</div>
			<div class="r_enviar">
				<input type="hidden" name="cms_salco" value="avatar" />
				<input type="submit" value="Subir imagen" />
			</div>
		</form>
		<?php if(status_avatar()== "exito"){?>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				if(typeof show_alert_redirect == 'function') {
					show_alert_redirect("&igrave;Felicitaciones!", "Tu avatar han sido modificado correctamente", "<?php echo get_bloginfo('wpurl')."/cambiar-mi-foto/";?>");
				}else{
					alert("Tu avatar han sido modificado correctamente");
				}
			});
			</script>
		<?php }elseif(status_avatar()){?>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				if(typeof show_alert == 'function') {
					show_alert("&igrave;Atenci&oacute;n!", "<?php echo status_avatar();?>");
				}else{
					alert("<?php echo status_avatar();?>");
				}
			});
			</script>
		<?php }?>
	</div>
</div>
<!-- END REGISTRO -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>