<!DOCTYPE html>
<html>
	<head>
		<title><?php if ( is_404() ) : ?> &raquo; <?php _e('Page non trouvée') ?><?php elseif ( is_home() ) : ?><?php bloginfo('description') ?><?php else : ?><?php wp_title() ?><?php endif ?> | <?php bloginfo('name') ?></title>
		
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
		<meta name="description" content="<?php if (is_single()) : the_excerpt(); else : bloginfo('description'); endif; ?>" />
		
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/blueprint/screen.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/blueprint/print.css" type="text/css" media="print">    
		<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	</head>
	<body>
		<div class="general_container">
	    	<div class="header_container">
	        	<div class="container">
					<div class="span-24 header_logo">
				        <h1><a href="<?php bloginfo('url'); ?>"><img class="header_logo" src="<?php bloginfo('template_directory'); ?>/images/logo.png" title="gawel : tech, frog & rock 'n roll" alt="gawel : tech, frog & rock 'n roll" /></a></h1>
					</div>	
				</div>
			</div>
			<div class="body_container">
				<div class="container content">