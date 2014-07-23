<!-- HEADER -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="header">
	<div id="h_logo">
		<a href="<?php echo esc_url(home_url("/"));?>"></a>
	</div>
    
	<?php get_template_part('content_locales_feriados', get_post_format());?>

    
	<div id="h_numero" style="width:250px;">
		<span>Atención al Cliente <strong>800 800 008</strong><br>
			desde celulares <strong>02 2560 47 00</strong></span>
  </div>
	<div id="h_redes">
		<!--<a href="http://www.facebook.com/share.php?u=<?php echo URL_BASE;?>" class="h_face" style="margin-right:7px;" ></a>-->
		<div class="fb-like" data-href="https://www.facebook.com/Salcobrand" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
		<a href="http://www.facebook.com/salcobrand" onclick="_gaq.push(['_trackEvent', 'Redes Sociales', 'facebook ']);" class="h_face" style="margin-right:7px; margin-left:7px;" ></a>
		<a href="https://twitter.com/salcobrand" target="_blank" class="h_twitter" style="margin-right:7px;" onclick="_gaq.push(['_trackEvent', 'Redes Sociales', 'twitter ']);"  ></a>
		<a href="http://www.salcobrand.cl/cl/contactanos-via-web" class="h_twitter" style="background-position: -64px 0; margin-right: 0px;" ></a>

		<!--<a href="#" class="h_rss"></a>-->
	</div>
	<div id="h_buscar">
		<?php get_template_part('searchform', get_post_format());?>
	</div> 
</div>
<!-- END HEADER -->