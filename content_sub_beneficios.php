<!-- MENU SIDEBAR -->
<script type="text/javascript">
jQuery(function(){
	var numElem = jQuery("#menu_sidebar ul li").size();
	if(numElem==1){
		jQuery("#menu_sidebar").hide();
	}
});
</script>
<div id="menu_sidebar">
	<ul>
		<?php wp_nav_menu(Array(
        	'theme_location'=>'es',
        	'menu' => 'sub_menu_beneficios',
        	'items_wrap' => '%3$s',
        	'link_before' => '',
        	'link_after' => ''
        ));?>
	</ul>
</div>
<!-- END MENU SIDEBAR -->