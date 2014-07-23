<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
		<div class="clearfix"></div>
	</div>
    	<!-- END CONTENT -->
	<div class="clearfix"></div>
	<!-- FOOTER -->
	<div id="wfooter">
		<div id="footer">
			<div id="footer_logo"></div>
			<div id="footer_info">
				<h1>M&aacute;s informaci&oacute;n</h1>
				<ul>
					<?php wp_nav_menu(Array('theme_location'=>'es', 'menu' => 'menu_mas_informacion', 'container'=>'', 'items_wrap' => '%3$s', 'before'=>''));?>
					<li><a href="http://www.salcobrand.trabajando.com/index.cfm" title="Trabaja con nosotros." target="_blank">Trabaja con nosotros.</a></li>
					<li><a href="http://www.salcobrand.cl/boleta/consulta_boleta.php" title="Boleta electr&oacute;nica." target="_blank">Boleta electr&oacute;nica.</a></li>
				</ul>
			</div>
			<div id="footer_acerca">
				<h1>Acerca de</h1>
				<ul>
					<?php wp_nav_menu(Array('theme_location'=>'es', 'menu' => 'menu_acerca_de', 'container'=>'', 'items_wrap' => '%3$s', 'before'=>''));?>
					<li>Salcobrand S.A. 2011</li>
					<li><a href="http://latam.icrossing.com" target="_blank" title="Desarrollado por iCrossing Latam.">Desarrollado por iCrossing Latam.</a></li>
				</ul>
			</div>
			<div id="footer_contacto">
				<h1>Contacto</h1>
				<ul>
					<?php wp_nav_menu(Array('theme_location'=>'es', 'menu' => 'menu_contacto', 'container'=>'', 'items_wrap' => '%3$s', 'before'=>''));?>
					<li>Tel&eacute;fonos de consulta:</li>
					<li>800 800 008 - 800 200 899</li>
					<li>Salcobrand a Domicilio:</li>
					<li>600 360 6000</li>
					<!--<li>Total Query SQL: <?php global $wpdb; echo count($wpdb->count_query);?></li>-->
					<!--<li><?php echo date("d-M-Y H:i:s");?></li>-->
				</ul>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
	<!-- END FOOTER -->
</div>
</div>
</body>
</html>