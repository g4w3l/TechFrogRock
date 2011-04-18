<?php get_header(); ?>
<div class="span-18">

<h1 class="page-title"><span>Résultats pour : <?php the_search_query(); ?></span></span></h1>

<?php if(have_posts()) : ?>
	<?php the_post(); ?>          
	<?php rewind_posts(); ?> 
				
	 
	<?php while ( have_posts() ) : the_post(); ?>
			<div class="span-1 postdate">
				<span style="font-size:20px;"><?php echo get_the_date('d'); ?></span><br />
				<?php echo get_the_date('M'); ?><br />
				<?php echo get_the_date('Y'); ?>
			</div>
			<div class="span-16">
				<span><a href="#"><?php the_category(', '); ?></a></span>
				<h2 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="thumbnail"><?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  )
				the_post_thumbnail(); ?></div>
				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'your-theme' )  ); ?>
				<br /><br />
			</div>
			<div class="span-1 last">&nbsp;</div> 
	<?php endwhile; ?>           
	 
		<div class="span-17 last">
		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
			<div id="nav-above" class="navigation">
				<div class="nav-next"><?php previous_posts_link(__( 'Plus récents <span class="meta-nav">&raquo;</span>', 'your-theme' )) ?></div>
				<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Plus anciens', 'your-theme' )) ?></div>			
			</div><!-- #nav-above -->
		<?php } ?> 
		</div>      
	
<?php else : ?>
	<h2>D&eacute;sol&eacute;...</h2>
	<p>Ce que vous recherchez est introuvable.</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>