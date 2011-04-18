<!-- comments -->
<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Ne pas charger cette page directement, merci.');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">Cet article est protégé par mot de passe. Entrez le mot de passe pour voir les commentaires.</p>

			<?php
			return;
		}
	}
	
	/* This variable is for alternating comment background */
	$commentNum = 1;
	
	if ($comments) : ?>
<div id="comments">
	<h3><?php comments_number(__('Aucun commentaire'), __('Un commentaire'), __('% commentaires'));?></h3>

	<?php foreach ($comments as $comment) : ?>
	<div class="comment">
		<div style="float:right;">
			<span style="font-size:30px;color:#bbbbbb;font-weight:bold;"><?php echo $commentNum; ?></span>
			<?php echo get_avatar($comment, 50, 'mm', ''); ?> 
		</div>
		<?php comment_author_link(); ?><br />
		<span class="date">Le <?php comment_date('d/m/Y') ?> à <?php comment_time() ?> <?php edit_comment_link('Edit','',''); ?></span><br />
		<?php comment_text() ?>
		<?php if ($comment->comment_approved == '0') : ?>
		<em><?php echo __('Votre commentaire est en attente de validation.'); ?></em>
		<?php endif; ?>			
	</div>
	<?php $commentNum = $commentNum + 1; ?> 
	<?php endforeach; /* end for each comment */ ?>

</div>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		Les commentaires pour cet article sont clos.
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div id="leave_comment">
	<h3><?php echo __('Laisser un commentaire'); ?></h3>
	<br />
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>Vous devez être <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">identifié</a> pour poster un commentaire.</p></div>
	<?php else : ?>
	
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	
	<?php if ( $user_ID ) : ?>
	
	<p>Identifié en tant que <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Se déconnecter">Se déconnecter &raquo;</a></p>
	
	<?php else : ?>
	
	<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
	<label for="author"><small><?php echo __('Nom'); ?> <?php if ($req) echo "(obligatoire)"; ?></small></label></p>
	
	<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
	<label for="email"><small><?php echo __('E-Mail (ne sera pas publié)'); ?> <?php if ($req) echo "(obligatoire)"; ?></small></label></p>
	
	<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
	<label for="url"><small><?php echo __('Site Web'); ?></small></label></p>
	
	<?php endif; ?>
	
	<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
	
	<p><textarea name="comment" id="comment" style="width: 95%" rows="10" tabindex="4"></textarea></p>
	
	<p style="width:auto; text-align:center;"><input name="submit" type="submit" class="submit" id="submit" tabindex="5" value="<?php echo __('Envoyer votre commentaire'); ?>" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>
	
	</form>
<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>

<!-- end comments -->
