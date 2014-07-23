<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es_ES">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php
global $page, $paged;
wp_title('|', true, 'right');
bloginfo('name');
$site_description = get_bloginfo('description', 'display');
if($site_description && (is_home() || is_front_page()))
	echo " | $site_description";
if($paged >= 2 || $page >= 2)
	echo ' | '.sprintf(__('Page %s', 'twentyten'), max($paged, $page));
?></title>
<?php $browser = salco_browser();?>
<?php if($browser['browser'] == "MSIE"){?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo URL_THEME;?>/ie.css" />
<?php }else{?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url');?>" />
<?php }?>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery.customSelect.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery.corner.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jwplayer.js"></script>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAiEB79KMzfdSYGMGPSX2GahT4aWz2H-i19D11dwBmPvpNGPkTLRRLWgb5x-AbRU8EwDIAJ8NkGHKkDw" type="text/javascript"></script>
<script type="text/javascript" src="http://gmaps-utility-library.googlecode.com/svn/trunk/markermanager/release/src/markermanager.js"></script>

<link href="<?php echo URL_BASE;?>wp-content/plugins/magic-gallery/css/gallery.css" media="all" type="text/css" rel="stylesheet" />
<link href="<?php echo URL_BASE;?>wp-content/plugins/magic-gallery/css/lightbox.css" media="all" type="text/css" rel="stylesheet" />

<link rel="index" title="<?php bloginfo('name');?>" href="<?php echo URL_BASE;?>" />


<script type="text/javascript" src="<?php echo URL_BASE;?>wp-includes/js/l10n.js?ver=20101110"></script>
<script type="text/javascript" src="<?php echo URL_BASE;?>wp-includes/js/prototype.js?ver=1.6.1"></script>


<script type="text/javascript" src="<?php echo URL_BASE;?>wp-includes/js/scriptaculous/wp-scriptaculous.js?ver=1.8.3"></script>
<script type="text/javascript" src="<?php echo URL_BASE;?>wp-includes/js/scriptaculous/builder.js?ver=1.8.3"></script>
<script type="text/javascript" src="<?php echo URL_BASE;?>wp-includes/js/scriptaculous/effects.js?ver=1.8.3"></script>
<script type="text/javascript" src="<?php echo URL_BASE;?>wp-includes/js/scriptaculous/dragdrop.js?ver=1.8.3"></script>
<script type="text/javascript" src="<?php echo URL_BASE;?>wp-includes/js/scriptaculous/slider.js?ver=1.8.3"></script>

<script type="text/javascript" src="<?php echo URL_BASE;?>wp-includes/js/scriptaculous/controls.js?ver=1.8.3"></script>
<script type="text/javascript" src="<?php echo URL_BASE;?>wp-content/plugins/magic-gallery/js/lightbox.js"></script>

<style type="text/css">
#noticias_detalle table,
#noticias_detalle table,
#template1 .template1_post table{
	border: solid #999 1px;
	margin-top: 5px;
	margin-bottom: 5px;
}
#noticias_detalle table tr td,
#noticias_detalle table tr td,
#template1 .template1_post table tr td{
	color:#696969;
	font-family:Arial;
	font-size:11px;
	border: solid #999 1px;
	padding: 3px;
}
#noticias_detalle p,
#template1 .template1_post p{
	margin-bottom: 10px;
}
#template1 .template1_post img{
	border: none;
	margin: 0px;
}
#template1 .template1_post .alignright{
	float: right;
}
#template1 .template1_post .alignleft{
	float: left;
	margin-right: 10px;
	margin-top: 15px;
}
.customStyleSelectBoxInner{
margin-left: 3px;
}
#alerta .alerta_content p{
	padding-left: 85px;
	padding-right: 85px;
}
</style>





<script type="text/javascript">
                        var _gaq = _gaq || [];
                        _gaq.push(['_setAccount', 'UA-9463726-1']);
                        _gaq.push(['_trackPageview']);
                       
                        (function() {
                        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                        })();
                        </script>




</head>
<body>
<!-- ALERTA -->
<div id="alerta_wrap" style="display:none;">
	<div id="alerta">
		<div class="alerta_header">
			<a href="#" class="alerta_close"></a>
		</div>
		<div class="alerta_content">
			<h1></h1>
			<p></p>
		</div>
		<div class="alerta_footer"></div>
	</div>
	<div class="clearfix"></div>
</div>
<!-- END ALERTA -->
<div id="wrapper">
	<div id="fondo_wrap">
		<?php get_template_part('header_barra_top', get_post_format());?>
		<?php get_template_part('header_header', get_post_format());?>
		<?php get_template_part('header_nav', get_post_format());?>
		<!-- CONTENT -->
		<div id="content">



