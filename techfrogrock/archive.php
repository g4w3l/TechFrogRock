<?php get_header(); ?>
<div class="span-18">

<?php the_post(); ?>          
<?php if ( is_day() ) : ?>
                <h1 class="page-title"><?php printf( __( 'Archives du <span>%s</span>', 'your-theme' ), get_the_time(get_option('date_format')) ) ?></h1>
<?php elseif ( is_month() ) : ?>
                <h1 class="page-title"><?php printf( __( 'Archives de <span>%s</span>', 'your-theme' ), get_the_time('F Y') ) ?></h1>
<?php elseif ( is_year() ) : ?>
                <h1 class="page-title"><?php printf( __( 'Archives de <span>%s</span>', 'your-theme' ), get_the_time('Y') ) ?></h1>
<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
                <h1 class="page-title"><?php _e( 'Blog Archives', 'your-theme' ) ?></h1>
<?php endif; ?> 
<?php rewind_posts(); ?>
 
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                <div id="nav-above" class="navigation">
                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'your-theme' )) ?></div>
                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'your-theme' )) ?></div>
                </div><!-- #nav-above -->
<?php } ?>           
 
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
 
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                <div id="nav-below" class="navigation">
                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'your-theme' )) ?></div>
                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'your-theme' )) ?></div>
                </div><!-- #nav-below -->
<?php } ?>

</div>
<?php get_footer(); ?>