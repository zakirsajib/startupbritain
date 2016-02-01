<?php
// create shortcode to list all resources posts
add_shortcode( 'resources-posts', 'resources_listing_shortcode' );
function resources_listing_shortcode( $atts ) {
    
    global $wp_query, $query_string;
    ob_start();
    
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $query_research = new WP_Query( array(
        'post_type' => 'startup_resources',
        'posts_per_page' => -1,
        'order' => 'DESC',
        'orderby' => 'post_date',
        'meta_key' =>'is_this_a_sticky',
        'meta_value' => true,
        'paged'	=> $paged,
        'tax_query' => array(
						'relation' => 'OR',
						array(
							'taxonomy' => 'resources_organisations',
							'field'    => 'slug',
							'terms'    => array( 'natwest', 'sage' ),
						),
						array(
							'taxonomy' => 'resources_topics',
							'field'    => 'slug',
							'terms'    => array( 'funding','networking','planning' ),
						),
						array(
							'taxonomy' => 'resources_tips',
							'field'    => 'slug',
							'terms'    => array( 'tips'),
						),
					)
    ) );
    if ( $query_research->have_posts() ) { ?>
 
 <div class="social-share"><a data-pin-do="buttonPin" data-pin-count="above" href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=&description=<?php the_title_attribute(); ?>"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a></div>
 
 <div class="main-blog-listing-parent">
        <div class="main-blog-listing" id="resources-loading">
	        <?php $count=1;?>
            <?php while ( $query_research->have_posts() ) : $query_research->the_post(); ?>
			            <div id="post-<?php the_ID(); ?>" <?php post_class('white-panel'); ?>>
				            	<?php if(has_post_thumbnail() ) : ?>
				  					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full aligncenter', array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?></a>
				  					<div class="clearfix"></div>
				  					<div class="empty-space"></div>
				  				<?php endif;?>
				                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				                <div class="entry-content">
				                	<?php the_excerpt()?>
				                </div>
				        </div>
				    <?php $count++; ?>
            <?php endwhile;?>
	    </div>	        		        	

			
			
            <?php wp_reset_postdata(); ?>
            
            <div id="loadMore"><span style="color:#ec2124"><i class="fa fa-arrow-circle-down"></i></span> view more</div>
 </div>        
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}?>