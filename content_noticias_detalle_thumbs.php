<?php
$category_id = get_the_category();
foreach($category_id AS $category){
	if($category->cat_ID !="39"){
	$args = array(
		'numberposts'	=> 5,
	    'category'		=> (int)$category->cat_ID,
	    'orderby'		=> 'post_date',
	    'order'			=> 'DESC',
	    'exclude'		=> get_the_id()
	);
	$posts_array = get_posts($args);
	?>
	<div id="noticias_detalle_thumbs">
		<span>Artículos Relacionados</span>
		<?php foreach($posts_array AS $post){ setup_postdata($post); ?>
		<div class="noticias_detalle_thumb">
			<a href="<?php echo get_permalink($post->ID);?>"></a>
			<span><?php the_date();?></span>
			<?php echo get_post_meta(get_the_ID(), 'noticia_65_56', true);?>
			<p><?php echo salco_sustraer(get_the_content(), 90, "...");?></p>
		</div>
		<?php }?>
	</div>
	<?php }?>
<?php }?>
