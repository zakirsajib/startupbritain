<?php
// create shortcode to list all advisor
add_shortcode( 'list-advisor', 'rmcc_advisor_listing_shortcode1' );
function rmcc_advisor_listing_shortcode1( $atts ) {
    
    global $wp_query;
    ob_start();
    
    
    $query = new WP_Query( array(
        'post_type' => 'cfe_advisor',
        'posts_per_page' => -1,
        'order' => 'DESC',
        'orderby' => 'post_date'
    ) );
    
    
    if ( $query->have_posts() ) { ?>
	        <ul>
            	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<li class="menu-item-type-cfe_advisor"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>            
				<?php endwhile;?>
	        </ul>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}?>