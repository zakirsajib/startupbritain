<?php 

/**
 * The template for displaying Search Results pages.
 *
 */
 
get_header();
?>

<div class="home-container row-fluid" id="single-post">
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="row-fluid">
			   	<div class="bgimg">
			       <div class="container">
				       <h1 class="heading-title">Search Results for: <span class="keyword">"<?php echo get_search_query();?>"</span></h1>
				   </div>
				</div>
			   <style>
			   	.bgimg{
				   	background: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/header-bg.jpg') no-repeat center center;
				   	background-size:100%;
			   	}
			   </style>
			</div>
		
		
		<?php
			global $query_string;
			
			$query_args = explode("&", $query_string);
			$search_query = array();
			
			foreach($query_args as $key => $string) {
				$query_split = explode("=", $string);
				$search_query[$query_split[0]] = urldecode($query_split[1]);
			} // foreach
			
			$search = new WP_Query($search_query);
		?>
		
		<?php if ( $search->have_posts() ) : ?>
				<div class="container">
				 	<div class="main-blog-listing span8">
						<?php while ( have_posts() ) : the_post(); ?>
			            	<div class="row-fluid empty-space-block">
				            	<div <?php post_class('span3'); ?>>
				            		<?php if(has_post_thumbnail() ) : ?>
				  						<?php the_post_thumbnail(array(225, 175), array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?>
				  					<div class="clearfix"></div>
				  					<div class="empty-space"></div>
				  					<a class='st_twitter_custom' href="http://twitter.com/intent/tweet?status=<?php the_title_attribute(); ?>+<?php the_permalink(); ?>" target="_blank"></a>
				  					<a class='st_facebook_custom' href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>" target="_blank"></a>
				  					<a class='st_linkedin_custom' href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>&source=startupbritain.org" target="_blank"></a>
				  					<a class='st_googleplus_custom' href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"></a>
							  		<?php else:?>
							  				<img class="left" src="http://placehold.it/225x175" alt="default image" />
							  		<?php endif;?>
				            	</div>
				            <div id="post-<?php the_ID(); ?>" <?php post_class('span9'); ?>>
					            <?php
									$title 	= get_the_title();
									$keys= explode(" ",$s);
									$title 	= preg_replace('/('.implode('|', $keys) .')/iu',
										'<strong class="search-excerpt">\0</strong>',
										$title);
								?>
				                <a href="<?php the_permalink(); ?>"><h2><?php echo $title; ?></h2></a>
				                <div class="blog-date"><?php the_time(get_option( 'date_format' )) ?></div>
				                <div class="entry-content">
				                	<?php the_excerpt()?>
				                </div>
				            </div>
				            
				            <div class="clearfix"></div>
				            <div class="horizontal-border"></div>
			            </div> <! end row-fluid !>
				  <?php endwhile;?>
				  
				  <?php next_posts_link( 'Next Results', $search->max_num_pages );?>
				<?php previous_posts_link( 'Previous Results' );?>
            <?php wp_reset_postdata(); ?>
				  
				  
				  <div class="vertical-border-blog"></div>
				  </div> <! end main-blog-listing !>
				<div class="span4 sidebar">
				  	<?php if ( is_active_sidebar( 'search_results_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'search_results_sidebar' );  ?>
					<?php endif;?>
				</div>
            </div><! end container !>
		<?php else:?>
		<div class="container">
			<div class="alert alert-block">	
				<h4><?php _e( 'Nothing Found', '' ); ?></h4>
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>	
			</div>
			<?php get_search_form( true ); ?>
		</div>
		<?php endif; ?>					
<?php wp_reset_query();?>
	</div> <! end post class !>
</div> <! end home container !>
<?php get_footer();?>