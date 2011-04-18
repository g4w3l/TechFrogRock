<?php 
	add_theme_support( 'post-thumbnails' );
	
	if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

	function parse($text) {
		$text = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $text);
		$text = preg_replace('#@([a-z0-9_]+)#i', '@<a href="http://twitter.com/$1">$1</a>', $text);
		$text = preg_replace('# \#([a-z0-9_-]+)#i', ' #<a href="http://search.twitter.com/search?q=%23$1">$1</a>', $text);
		return $text;	 
	}

	function getTweets() {
		$twitterUser 	= "g4w3l";		// twitter username
		$nbTweets 		= 1;			// number of tweets
		$twitterURL 	= "http://twitter.com/statuses/user_timeline/$twitterUser.xml?count=$nbTweets";
		
		$date_format 	= 'd M Y, H:i:s'; /* Format de la date à afficher */
		
		$oStr 			= '<ul class="twitter_statuses">';
		 
		if( $twitterXML = @simplexml_load_file( $twitterURL ) )
		{
			foreach( $twitterXML->status as $status )
			{
				$datetime = date_create($status->created_at);
				$date = date_format($datetime, $date_format)."\n";
				
				$oStr = $oStr . '<li>' . parse($status->text) . '<br />';
				$oStr = $oStr . ' <span class="twitter_date"><a href="http://twitter.com/'.$twitterUser.'/status/'.$status->id.'">'.$date.'</a></span></li>';
			}
		}
		
		$oStr			.= "</ul>";
		
		return $oStr;
	}
?>