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
	<?php get_template_part('content_sub_noticias', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- NUESTRA EMPRESA -->
<div id="noticias">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<div id="ca_seleccionar">
		<form id="form_comercios" action="?">
			<select class="ca_region">
				<option>Seleccione Regi&oacute;n</option>
				<option>Region Metropolitana</option>
			</select>
			<select class="ca_comuna">
				<option>Seleccione Comuna</option>
				<option>Macul</option>
			</select>
			<select class="ca_rubro">
				<option>Seleccione Rubro</option>
				<option>Abogados</option>
			</select>
			<input type="submit" id="ca_enviar" value="" />
			<a href="#">Volver</a>
		</form>
	</div>
	<div id="ca_resultados">
		<ul id="ca_til">
			<li>Nombre</li>
			<li>Rubro</li>
			<li>Regi&oacute;n</li>
			<li>Direcci&oacute;n</li>
			<li>Comuna</li>
			<li>Tel&eacute;fono</li>
		</ul>
		<ul>
			<li><span>ARGCONSULTING E.I.R.L</span></li>
			<li><span>Abogados</span></li>
			<li><span>Maule</span></li>
			<li><span>Prat 364</span></li>
			<li><span>Curico</span></li>
			<li><span>02-6710779</span></li>
		</ul>
		<ul>
			<li><span>ARGCONSULTING E.I.R.L</span></li>
			<li><span>Abogados</span></li>
			<li><span>Maule</span></li>
			<li><span>Prat 364</span></li>
			<li><span>Curico</span></li>
			<li><span>02-6710779</span></li>
		</ul>
	</div>
	<div id="ca_pag">
		<a href="#" class="ca_pag_a ca_pag_no">&lsaquo;&lsaquo; Anteriores</a>
		<ul>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">6</a></li>
			<li><a href="#">7</a></li>
		</ul>
		<span>...</span>
		<ul>
			<li><a href="#">199</a></li>
			<li><a href="#">200</a></li>
		</ul>
		<a href="#" class="ca_pag_s">Siguientes &rsaquo;&rsaquo;</a>
	</div>
</div>
<!-- END NUESTRA EMPRESA -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>