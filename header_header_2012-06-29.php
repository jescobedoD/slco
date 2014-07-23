<!-- HEADER -->
<div id="header">
	<div id="h_logo">
		<a href="<?php echo esc_url(home_url("/"));?>"></a>
	</div>
    
    	<!--div id="h_numero" style="width:140px; height:20px; margin-right:250px; top:12px;"><a href="http://www.salcobrand.cl/cl/horarios-festivos" target="_blank"><img src="http://www.salcobrand.cl/cl/wp-content/uploads/2012/05/horario-21-mayo.png" border="0"></a></div -->
    
	<div id="h_numero" style="width:250px;">
		<span >Atención al Cliente <strong>800 800 008</strong></span>
  </div>
	<div id="h_redes">
		<a href="http://www.facebook.com/share.php?u=<?php echo URL_BASE;?>" class="h_face" style="margin-right:7px;" ></a>
		<a href="https://twitter.com/home?status=<?php echo URL_BASE;?>" class="h_twitter" style="margin-right:7px;"  ></a>
		<a href="http://www.salcobrand.cl/cl/contactanos-via-web" class="h_twitter" style="background-position: -64px 0; margin-right: 0px;" ></a>

		<!--<a href="#" class="h_rss"></a>-->
	</div>
	<div id="h_buscar">
		<?php get_template_part('searchform', get_post_format());?>
	</div> 
</div>
<!-- END HEADER -->