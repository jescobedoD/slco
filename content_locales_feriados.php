<!-- Locales Feriados -->
<?php
$argumentos = array(
	'slug' => 'feriados'
);
$argumentos = array(
	'numberposts'     => 1,
	'category'        => 90,
	'post_type'       => 'post',
	'orderby'         => 'post_date',
	'order'           => 'DESC'
);
$locales_festivos = get_posts($argumentos);
?>
		<?php	
			foreach($locales_festivos AS $festivos){?>
			<div id="h_numero2">
				<a href="<?php echo get_post_meta($festivos->ID, 'url_locales_feriados', true);?>" target="_self">
					<?php echo $festivos->post_content;?>
				</a>
			</div>
		<?php }?>

<!-- END LOCALES DE TURNO -->