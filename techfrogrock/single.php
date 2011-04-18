<?php get_header(); ?>
<div class="span-18">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	<h1 class="page-title"><span><?php the_date() ?></span></h1>
	<div class="span-17 post">
		<span><?php the_category(', '); ?></span>
		<div style="float:right;"><?php edit_post_link(__('Edit')); ?> </div>
		<h2 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="thumbnail"><?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  )
		the_post_thumbnail(); ?></div>
		<?php the_content(); ?>
		<p class="tags"><?php the_tags('Tags : '); ?></p>
		<p>
		<script type="text/javascript">var switchTo5x=false;</script>
		<script charset="utf-8" type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">stLight.options({publisher:'wp.cab428c1-f9bb-4643-9a52-dae128f0f3f7'});var st_type='wordpress3.1.1';</script></p>
		<p>
			<span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='partager'></span>
			<span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='partager'></span>
			<span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='partager'></span>
			<span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='partager'></span>
		</p>
		<?php comments_template(); // Get wp-comments.php template ?>
	</div>
	<div class="span-1">&nbsp;</div>
<?php endwhile; ?>
<?php else : ?>
	<h2 class="center">Not Found</h2>
	<p class="center">Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>