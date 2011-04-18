<?php get_header(); ?>
<div class="span-18">

	<h1 class="page-title"><span>Perdu ?</span></h1>
	<div class="span-17 post">
		La page que vous recherchez n'existe visiblement pas/plus.<br /><br />
		Essayez le formulaire de recherche, ou visitez les derniers articles du blog :
		<ul>
		<?php
			query_posts('posts_per_page=5');
			while ( have_posts() ) : the_post();
		?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php
			endwhile;
		?>		
		</ul>
	</div>
	<div class="span-1">&nbsp;</div>
</div>
<?php get_footer(); ?>