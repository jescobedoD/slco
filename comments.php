<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>

 <div id="fb-root"></div>
	<script>(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
  		js = d.createElement(s); js.id = id;
  		js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

  </script>





	
   <div style="margin-top: 30px;"><h3><?php echo $web_app_title ?></h3></div>
             
   <center><script type="text/javascript">_ga.trackFacebook();</script><div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="20" data-width="450"></div></center>