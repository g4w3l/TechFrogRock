<div class="span-5 last sidebar">
	<ul id="sidebar">
		<li>
			<h4>A propos</h4>		
			<div style="float:right;margin-left:3px;"><img src="<?php bloginfo('template_directory'); ?>/images/gawel_avatar.jpg" title="avatar" /></div>
			Chef de projet web et musicien à d'autres heures, ce blog me permet de partager mes humeurs et découvertes.
		</li>
		<li>
			<h4>Recherche</h4>
			<div class="searchdiv" id="searchdiv">
				<form id="searchform" action="<?php bloginfo('url'); ?>" method="get">
					<input id="s" type="text" name="s" value="">
					<input type="submit" id="go" value="" title="<?php _e('Recherche'); ?>" />
				</form>
			</div>
		</li>
		<li>
			<h4>Sur twitter...</h4>
			<div class="floatright"><a href="http://www.twitter.com/g4w3l"><img src="http://twitter-badges.s3.amazonaws.com/t_small-a.png" alt="S'abonner à g4w3l sur Twitter"/></a></div>
			<?php echo getTweets(); ?>
		</li>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<?php wp_list_pages('title_li=<h4>Pages</h4>'); ?>
		<li>
			<h4>Archives</h4>	 
			<ul>
				<?php wp_get_archives('type=monthly'); ?>	 
			</ul>
		</li>
		<?php endif; ?>
	</ul>		
</div>