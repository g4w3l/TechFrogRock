<?php get_header(); ?>

<div class="span-18">
	<?php query_posts( 'cat_name=zoom&posts_per_page=1' ); ?>
	<?php if (have_posts()) : the_post(); ?>
	<h2 class="zoom"><a href="<?php echo get_category_link( get_cat_ID('zoom') ); ?>">Zoom</a></h2>
	<span class="index_date_post"><?php echo get_the_date('d/m/Y') ?></span>
	<?php the_content(); ?>
	<?php endif; ?>
	<h2>Derniers articles</h2>
	<?php $cat_args = array(
						'number'	=> 3,
						'parent'	=> 0,
						'hide_empty' => 0,
						'exclude' 	=> get_cat_ID('zoom')
					); 
		$cat_num = 0;
	?>
	<?php $categories = get_categories( $cat_args ); ?>
	<?php 
		foreach($categories as $category) { 
			if ($cat_num != 2) { $colborder = 'colborder' ; }
			else { $colborder = ''; } 
			
			query_posts('cat=' . $category->term_id . '&posts_per_page=1');
	?>	
		<div class="span-5 <?php echo $colborder; ?>">
			<div>
				<div class="floatright"><a href="<?php echo get_category_link( $category->term_id ); ?>feed"><img src="<?php bloginfo('template_directory'); ?>/images/rss_icon.png"></a></div>
				<div><h3><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->cat_name; ?></a></h3></div>								
			</div>
			<?php while (have_posts()) : the_post(); ?>
			<div>
				<h4 class="index_title_post"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
				<span class="index_date_post"><?php echo get_the_date('d/m/Y') ?></span>
				<br />
				<br />
				<?php the_excerpt(); ?>
			</div>
			<?php endwhile;?>
		</div>
	<?php $cat_num = $cat_num + 1; ?>
	<?php } ?>
</div>
	
<?php get_footer(); ?>