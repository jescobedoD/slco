<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<?php get_header(); ?>
<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<?php get_template_part('content_sub_noticias', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- NOTICIAS -->
<div id="noticias">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<!-- BANNER NOTICIAS IZQ -->
            <div id="banners_noticias_izq">
            	<?php
				$args = array(
					'slug' => 'noticias-de-salud'
				);
				$salud = get_categories($args);
				$args = array(
					'numberposts'     => 1,
					'category'        => $salud[0]->cat_ID,
					'post_type'       => 'post',
					'orderby'         => 'post_date',
					'order'           => 'DESC',
					'post_status'     => 'publish'
				);
				$posts_salud = get_posts($args);
				?>
				<?php foreach($posts_salud AS $post){?>
            	<div id="banner_ni_salud">
                	<a href="<?php echo get_permalink($post->ID);?>">
                    	<span>Noticias de Salud</span>
                    	<?php echo get_post_meta($post->ID, 'noticia_240_108', true);?>
                    </a>
                </div>
                <?php }?>
                <?php
				$args = array(
					'slug' => 'noticias-de-belleza'
				);
				$belleza = get_categories($args);
				$args = array(
					'numberposts'     => 1,
					'category'        => $belleza[0]->cat_ID,
					'post_type'       => 'post',
					'orderby'         => 'post_date',
					'order'           => 'DESC',
					'post_status'     => 'publish'
				);
				$posts_belleza = get_posts($args);
				?>
				<?php foreach($posts_belleza AS $post){?>
                <div id="banner_ni_belleza">
                	<a href="<?php echo get_permalink($post->ID);?>">
                    	<span>Noticias de Belleza</span>
                       <?php echo get_post_meta($post->ID, 'noticia_240_108', true);?>
                    </a>
                </div>
                <?php }?>
                <?php
				$args = array(
					'slug' => 'noticias-de-bienestar'
				);
				$bienestar = get_categories($args);
				$args = array(
					'numberposts'     => 1,
					'category'        => $bienestar[0]->cat_ID,
					'post_type'       => 'post',
					'orderby'         => 'post_date',
					'order'           => 'DESC',
					'post_status'     => 'publish'
				);
				$posts_bienestar = get_posts($args);
				?>
				<?php foreach($posts_bienestar AS $post){?>
                <div id="banner_ni_bienestar">
                	<a href="<?php echo get_permalink($post->ID);?>">
                    	<span>Noticias de Bienestar</span>
                        <?php echo get_post_meta($post->ID, 'noticia_240_108', true);?>
                    </a>
                </div>
                <?php }?>
            </div>
            <!-- END BANNER NOTICIAS IZQ -->
            
            <!-- BANNER NOTICIAS PRINCIPAL -->
            <?php
			$args = array(
				'slug' => 'noticias-salcobrand'
			);
			$salcobrand = get_categories($args);
			$args = array(
				'numberposts'     => 1,
				'category'        => $salcobrand[0]->cat_ID,
				'post_type'       => 'post',
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'post_status'     => 'publish'
			);
			$posts_salcobrand = get_posts($args);
			?>
			<?php foreach($posts_salcobrand AS $post){?>
            <div id="banner_noticias_principal">
            	<div id="banner_np_img">
                	<a href="<?php echo esc_url(home_url("/category/".$salcobrand[0]->slug));?>"><span><?php echo $salcobrand[0]->name;?></span></a>
                	<?php echo get_post_meta($post->ID, 'noticia_441_197', true);?>
                </div>
                <div id="banner_np_texto">
                	<div id="banner_np_texto_til">
                    	<a href="<?php echo get_permalink($posts->ID);?>"><?php echo $post->post_title;?></a>
					</div>
                    <div id="banner_np_texto_tx">
                    <p><?php echo salco_sustraer($post->post_excerpt, 400, "...");?></p>
                    </div>
                    <div id="banner_np_texto_mas">
                    	<a href="<?php echo get_permalink($posts->ID);?>" style="text-decoration:underline">Seguir Leyendo</a>
                    </div>
                </div>
            </div>
            <?php }?>
            <!-- END BANNER NOTICIAS PRINCIPAL -->
            
            <!-- APLICACIONES -->
            <div id="noticias_app">
                <a href="<?php echo esc_url(home_url("/category/calcular-imc"));?>">
                	<span>Calcular IMC</span>
                	<img src="<?php echo URL_THEME;?>/images/noticias_masa.png" />
                </a>
            </div>
            <!-- END APLICACIONES -->

            <!-- NOTICIAS VIDEO -->
            <?php
			$videos = get_categories(array(
				'slug' => 'videos'
			));
			$posts_array = get_posts(array(
				'numberposts'     => 1,
				'category'        => $videos[0]->cat_ID,
				'post_type'       => 'post',
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'post_status'     => 'publish'
			));
			?>
			<?php foreach($posts_array AS $post){?>
            <div id="noticias_video">
            	<span><?php echo $videos[0]->name;?></span>
				<div id="noticias_player" style="height:275px;width:448px;display:block;">
                	
                </div>
				<script type="text/javascript">
				jQuery(function(){
					jwplayer("noticias_player").setup({
						flashplayer	:"<?php echo URL_THEME;?>/swf/player.swf",
						file		:"<?php echo get_post_meta($post->ID, 'url_video', true);?>",
						image		:"<?php echo get_post_meta($post->ID, 'image_video', true);?>",
						height		:240,
						width		:428,
						plugins		:{sharing:{link:false}}
					});
				});
				</script>
                <a href="<?php echo esc_url(home_url("/category/".$videos[0]->slug));?>"  style="text-decoration:underline"  >Ver todos los videos</a>
            </div>
            <?php }?>
            <!-- END NOTICIAS VIDEO -->
            <!-- NOTICIAS ARCHIVO -->
            <!--
            <div id="noticias_archivo">
            	<div id="noticias_archivo_til">
                	Archivo de noticias
                </div>
                <?php
				$noticias = get_categories(array(
					'slug' => 'noticias'
				));
				$args = array(
					'numberposts'     => 1,
					'category'        => $noticias[0]->cat_ID,
					'post_type'       => 'post',
					'orderby'         => 'post_date',
					'order'           => 'DESC',
					'post_status'     => 'publish'
				);
				$posts_noticias = get_posts($args);
				?>
				<?php foreach($posts_noticias AS $posts){ setup_postdata($posts);?>
					<div class="noticia_archivo">
						<div class="noticia_archivo_thumb">
							<?php echo get_post_meta($posts->ID, 'noticia_109_87', true);?>
						</div>
						<div class="noticia_archivo_text">
							<h1><?php echo $posts->post_title;?></h1>
							<p><?php echo salco_sustraer($posts->post_content, 400, "...");?></p>
							<a href="<?php echo get_permalink($posts->ID);?>" class="noticia_archivo_mas">Seguir Leyendo</a>
						</div>
					</div>
				<?php }?>
                <div class="noticia_archivo_todas">
                	<a href="<?php echo esc_url(home_url("/category/noticias"));?>">Ver Todas las Noticias &gt;&gt;</a>
                </div>
            </div>
            -->
            <!-- END NOTICIAS ARCHIVO -->
        </div>
        <!-- END NOTICIAS -->
<div id="vitrina_grad"></div>
<?php //get_template_part('content_lind_destacados', get_post_format());?>
<?php //get_template_part('content_destacados', get_post_format());?>
<?php get_footer(); ?>