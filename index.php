<?php 

global $current_user;
get_currentuserinfo();

#echo '<div style="display:none">';
#print_r($current_user);
#echo '</div>';


/*if(!isset($_COOKIE['lightbox'])){
	#setcookie('lightbox',1,time()+60*60*24*30);
	#setcookie("lightbox", 1); 
	
	$ft = true;
}else{
	$ft = false;
}
*/

get_header(); ?>

<!-- Segment Pixel - Salcobrand - DO NOT MODIFY -->
<script src="https://secure.adnxs.com/seg?add=1182561&t=1" type="text/javascript"></script>
<!-- End of Segment Pixel -->

<?php get_template_part('content_bajada_home', get_post_format());?>
<?php get_template_part('content_menu_izq', get_post_format());?>
<?php get_template_part('content_banner_mini', get_post_format());?>
<?php get_template_part('content_banner_secundario', get_post_format());?>
<?php get_template_part('content_caja_sb_domicilio', get_post_format());?>
<?php get_template_part('content_lind_destacados', get_post_format());?>
<?php get_template_part('content_destacados', get_post_format());?>
<?php get_footer(); ?>


<!-- Codigo del LIghtbox para imagen -->


<!--
<link rel="stylesheet" type="text/css" href="http://www.salcobrand.cl/cl/wp-content/plugins/multi-functional-flexi-lightbox/thickbox.css"></link><script type='text/javascript'>
var options = {display_on_page : '1',delay : '8', title : 'En el Mes del Corazón',message : '&lt;img src =&quot;http://www.salcobrand.cl/cl/wp-content/uploads/2013/08/flash_inicio1.swf&quot; border=&quot;0&quot;/&gt;',width : '550',height : '400',exc : '[no_lb]',display_on_post : '-1',show_once : '-1'};</script>
<script src="http://www.salcobrand.cl/cl/wp-content/plugins/multi-functional-flexi-lightbox/thickbox.php" type="text/javascript"></script><div id="hiddenContent" style="display: none"><object type="application/x-shockwave-flash" data="http://www.salcobrand.cl/cl/wp-content/uploads/2013/08/flash_inicio1.swf" width="100%" height="100%" AUTOSTART=TRUE LOOP=TRUE>		</div>
	</div>
-->
<!-- Codigo del LIghtbox para imagen -->


<!-- 
<link rel="stylesheet" type="text/css" href="http://www.salcobrand.cl/cl/wp-content/plugins/multi-functional-flexi-lightbox/thickbox.css"></link><script type='text/javascript'>
var options = {display_on_page : '1',delay : '8', title : 'Inscríbete y participa por un viaje soñado',message : '&lt;img src =&quot;http://www.salcobrand.cl/cl/wp-content/uploads/2013/12/lighbox_web.jpg&quot; border=&quot;0&quot;/&gt;',width : '830',height : '660',exc : '[no_lb]',display_on_post : '-1',show_once : '-1'};</script>
<script src="http://www.salcobrand.cl/cl/wp-content/plugins/multi-functional-flexi-lightbox/thickbox.php" type="text/javascript"></script><div id="hiddenContent" style="display: none"><img src="http://www.salcobrand.cl/cl/wp-content/uploads/2013/12/lighbox_web.jpg" width="820" height="645" usemap="#Map" border="0"/>
<map name="Map" id="Map">
  <area shape="rect" coords="786,5,817,32" href="javascript:void(0);" onclick="jQuery('#TB_closeWindowButton').trigger('click')" />
  <area shape="rect" coords="326,531,494,564" href="http://www.salcobrand.cl/cl/viaje-sonado/" target="_blank"/>
</map>
		</div>

	</div>

-->


	
<?php 

/*if($_GET['r']): ?>
<script>
location.href="http://www.salcobrand.cl/cl/actualiza-tus-datos/?r=1"; 
</script>
<?php endif;


#if($ft && $_SERVER['REQUEST_URI'] == '/cl/'):

if(!$current_user->id):
if(empty($current_user->origen) && ($_SERVER['REQUEST_URI'] == '/cl/' || $_SERVER['REQUEST_URI'] == '/cl/?ref=fb')):

if($_GET['ref']) $link = 'http://www.salcobrand.cl/cl/campana_registro/?origen=facebook';
else $link = 'http://www.salcobrand.cl/cl/campana_registro/';

 ?>
	<script src="campana_registro/js/shadowbox/shadowbox.js"></script>
	<link rel="stylesheet" href="campana_registro/js/shadowbox/shadowbox.css" />
	<script>
	Shadowbox.init({enableKeys: false});


	setTimeout("loadLightbox();",1000);

	function loadLightbox(){
		Shadowbox.open({
			content:    '<?php echo $link; ?>',
			player:     "html",
			height:545,
			width: 650
		});
	}

	</script>

<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>



<?php
 endif;
endif;  */?>