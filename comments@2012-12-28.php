<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<!-- COMENTARIOS -->
<div id="comment">
<?php if(post_password_required()):?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyten' ); ?></p>
<?php else:?>
	<?php if(!comments_open()):?>
		<div id="comment_top">
		<span>Comentarios cerrados</span>
	</div>
	<?php else:?>
	<div id="comment_top">
		<span>Comentarios</span>
		<div style="display:none;"> (<?php printf(get_comments_number());?>)</div>
	</div>
	<div id="comment_middle">
		<!-- FORM COMENTAR -->
		<?php if(current_user_can('level_0')):?>
		<div id="comment_reply">
			<div class="comment_reply_av">
				<?php salco_get_avatar("44");?>
			</div>
			<div class="comment_reply_tx">
				<?php salco_comments();?>
			</div>
		</div>
		<?php else:?>
			<div class="comment_reply_tx">
				<span>&iquest;A&uacute;n no eres usuario?</span> <a href="<?php echo esc_url(home_url("/registrate"));?>" style="color:#037fbd;font-family: Arial;font-size: 11px;">inscr&iacute;bete aqu&iacute;</a>
			</div>
		<?php endif;?>
		<!-- END FORM COMENTAR -->
		<div class="comment_posts">
			<!-- LISTADO COMENTARIOS -->
			<?php $comments = get_comments(array(
				'orderby' => 'ID',
				'order' => 'DESC',
				'post_id' => get_the_ID()
			));
			?>
			<?php if(count($comments)):?>
				<?php foreach($comments AS $comment){?>
					<?php if($comment->comment_approved==1){?>
						<div class="comment_post">
							<div class="comment_post_av">
								<?php salco_get_avatar("44", $comment->user_id);?>
							</div>
							<div class="comment_post_tx">
								<span class="name"><?php comment_author();?></span>
								<span class="date"><?php  comment_date();?></span>
								<p><?php echo comment_text();?></p>
							</div>
						</div>
					<?php }?>
				<?php }?>	
			<?php else:?>
				<div class="comment_post">
					<div class="comment_post_tx">
						<span class="name">No hay comentarios</span>
					</div>
				</div>
			<?php endif;?>
			<!-- END LISTADO COMENTARIOS -->
		</div>
	</div>
	<?php if(get_comment_pages_count()>1 && get_option('page_comments')):?>
		<div class="navigation">
			<div class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', 'twentyten'));?></div>
			<div class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', 'twentyten'));?></div>
		</div>
	<?php endif;?>
	<div id="comment_bottom"></div>
	<?php endif;?>
<?php endif; ?>
</div>
<!-- END COMENTARIOS -->