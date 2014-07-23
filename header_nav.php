<!-- MENU HEADER -->
<div id="h_nav">
    	<a href="<?php echo esc_url(home_url("/"));?>" class="home"></a>
        <ul class="hover_nav_a">
        	<?php wp_nav_menu(Array(
			'container'=>'',
        		'theme_location'=>'es',
        		'menu' => 'menu_principal',
        		'items_wrap' => '%3$s',
        		'link_before' => '<span>',
        		'link_after' => '</span>'
        	));?>
        </ul>
    </div>
<!-- END MENU HEADER -->

<!-- TARJETA SALCOBRAND EN _blank -->
<script>
   jQuery(document).ready(function(){
        jQuery("#menu-item-2135 a").click(function(event){
            event.preventDefault();
            window.open(jQuery(this).attr('href'));
        });
   });
</script>
<!-- FIN SALCOBRAND EN _blank -->