<?php
/*
Template Name: nuestra-empresa
*/
?>
<?php get_header();?>
<?php if(isset($_GET['active'])):?>
	<form id="login_form" method="post" action="<?php echo esc_url(home_url("/olvidaste"));?>">
		<input type="hidden" name="cms_salco" value="cambiar"/>
		<input type="text" name="clave" value=""/>
		<input type="text" name="re_clave" value=""/>
		<input type="text" name="cod_activacion" value=""/>
		<input type="submit" class="enviar" value="Enviar" />
	</form>
	<?php if(salco_error_recuperar()){
		echo salco_error_recuperar();
	}?>
<?php else:?>
	<form id="login_form" method="post" action="<?php echo esc_url(home_url("/olvidaste"));?>">
		<input type="hidden" name="cms_salco" value="recuperar"/>
		<input type="text" name="email" value=""/>
		<input type="submit" class="enviar" value="Enviar" />
	</form>
	<?php if(salco_error_recuperar()){
		echo salco_error_recuperar();
	}?>
<?php endif;?>
<?php get_footer();?>