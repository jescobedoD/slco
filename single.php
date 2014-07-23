<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<?php get_header();?>
<?php
$category_id = wp_get_post_categories(get_the_id());
//var_dump($category_id[0]);
switch($category_id[0]){
	case "8":
	case "13":
	case "14":
	case "15":
	case "17":
	case "39":
		get_template_part('template-noticias', get_post_format());
		break;
	case "54":
	case "60":
	case "61":
	case "62":
		get_template_part('template-marcas', get_post_format());
		break;
	case "18":
		get_template_part('template-videos', get_post_format());
		break;
	case "70":
		get_template_part('template-landing', get_post_format());
		break;	
}
?>
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>
