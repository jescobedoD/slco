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
<!-- PERFIL -->
<div id="noticias">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
    <div id="perfil_box">
		<div id="perfil_avatar_box">
			<div class="perfil_avatar">
				<?php salco_get_avatar("143");?>
			</div>
			<a href="<?php echo esc_url(home_url("/cambiar-mi-foto/"));?>" class="cambiar_avatar"></a>
		</div>
		<div id="perfil_datos_box">
			<?php
			//update_user_meta($user_id, $meta_key, $meta_value, $prev_value);
			global $current_user;
			get_currentuserinfo();
			/*
			echo 'Username: ' . $current_user->user_login . "\n";
			echo 'User ID: ' . $current_user->ID . "\n";
			*/
			?>
			<div class="perfil_datos">
				<div class="perfil_datos_titulo">
					<span>Nombre:</span>
					<span>Rut:</span>
					<span>Direcci&oacute;n:</span>
					<span>Tel&eacute;fono:</span>
					<span>Celular:</span>
					<span>Email:</span>
				</div>
				<div class="perfil_datos_dato">
					<span><?php echo $current_user->display_name; ?></span>
					<span><?php echo $current_user->user_login;?></span>
					<span><?php echo $current_user->calle." ".$current_user->user_numero." ".$current_user->depto;?></span>
					<span><?php echo $current_user->telefono_fijo;?></span>
					<span><?php echo $current_user->telefono_celular;?></span>
					<span><?php echo $current_user->user_email;?></span>
				</div>
			</div>
			<a href="<?php echo esc_url(home_url("/actualiza-tus-datos/"));?>" class="cambiar_datos"></a>
		</div>
	</div>
</div>
<!-- END PERFIL -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>