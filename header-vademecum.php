<?php 

 $current_user = wp_get_current_user();

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post_meta($post->ID, 'noticia_109_87', true), $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    //$first_img = "/images/default.jpg";
  }
  return $first_img;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es_ES">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<meta property="og:image" content="<?php echo catch_that_image() ?>" />
<meta property="fb:admins" content="100003313422266, 100001013813223" />

<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<title><?php
global $page, $paged;
wp_title('|', true, 'right');
bloginfo('name');
$site_description = get_bloginfo('description', 'display');
if($paged >= 2 || $page >= 2)
	echo ' | '.sprintf(__('Page %s', 'twentyten'), max($paged, $page));
?></title>
<meta name="description" content="<?php echo amt_content_description(); ?>">
<?php endwhile; endif; elseif(is_home()) : ?>
<title>Farmacias Salcobrand | Salcobrand</title>
<meta name="description" content="Farmacias Salcobrand siempre está pensando en tu salud y bienestar, ven y descubre las ofertas y beneficios que tenemos para ti y tu familia" />
<?php endif; ?>

<?php 
if (is_category()) { ?>
<title><?php
global $page, $paged;
wp_title('|', true, 'right');
bloginfo('name');
$site_description = get_bloginfo('description', 'display');
if($site_description && (is_home() || is_front_page()))
	echo " | $site_description";
?>
</title>
<meta name="description" content="<?php echo category_description(); ?>"/>
<?php } 
?>

<link rel="canonical" href="http://<?php echo $_SERVER["HTTP_HOST"] ?><?php echo parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH); ?>" />

<?php $browser = salco_browser();?>
<?php if($browser['browser'] == "MSIE"){?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo URL_THEME;?>/iexplorer.css" />
<?php }else{?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url');?>" />
<?php }?>


<link rel="stylesheet" href="<?php echo URL_THEME;?>/css/normalize.css">
<link rel="stylesheet" href="<?php echo URL_THEME;?>/css/estilos.css">
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery.customSelect.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jwplayer.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/ga_social_tracking.js"></script>
<!-- <script type="text/javascript" src="<?php echo URL_BASE;?>wp-content/plugins/fancybox2/jquery.fancybox.js"></script> -->


<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAiEB79KMzfdSYGMGPSX2GahT4aWz2H-i19D11dwBmPvpNGPkTLRRLWgb5x-AbRU8EwDIAJ8NkGHKkDw" type="text/javascript"></script>
<script type="text/javascript" src="http://gmaps-utility-library.googlecode.com/svn/trunk/markermanager/release/src/markermanager.js"></script>

<link href="<?php echo URL_BASE;?>wp-content/plugins/magic-gallery/css/gallery.css" media="all" type="text/css" rel="stylesheet" />
<link href="<?php echo URL_BASE;?>wp-content/plugins/magic-gallery/css/lightbox.css" media="all" type="text/css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="<?php echo URL_BASE;?>wp-content/plugins/fancybox2/jquery.fancybox.css" type="text/css" media="screen" /> -->

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
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/docs.min.js"></script>

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


<?php if(!empty($current_user->data->ID)): ?>

<script type="text/javascript">

/* <![CDATA[ */

var google_conversion_id = 979585201;

var google_custom_params = window.google_tag_params;

var google_remarketing_only = true;

/* ]]> */

</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">

</script>

<noscript>

<div style="display:inline;">

<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/979585201/?value=0&amp;guid=ON&amp;script=0"/>

</div>

</noscript>

<?php endif; ?>





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