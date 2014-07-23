<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<form id="searchform" action="<?php echo esc_url(home_url('/'));?>" method="get">
	<input type="text" name="s" id="s" class="buscar" value="<?php if(get_search_query()==""){ _e( 'Buscar en SALCOBRAND', 'salcobrand' );}else{echo get_search_query();} ?>" onfocus="if(this.value=='<?php _e( 'Buscar en SALCOBRAND', 'salcobrand' ); ?>')this.value=''" onblur="if(this.value=='')this.value='<?php _e( 'Buscar en SALCOBRAND', 'salcobrand' ); ?>'"/>
	<input type="submit" class="boton" value="" />
</form>
