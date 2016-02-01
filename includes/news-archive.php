<?php
// create shortcode News/Posts Archive
add_shortcode( 'news-archive', 'news_archive_listing' );
function news_archive_listing() {
    ob_start();?>
	
	<?php 
    		$q = new WP_Query( 
    		array('post_type' => array( 'post' ),
    		'posts_per_page' => -1, 
    		'order' => 'DESC' ));

		if( $q->have_posts() ) :?>
		
		<dl class="accordion">
		
		 <?php while( $q->have_posts() ) :
		
		        $q->the_post();
		
		        $current_month = get_the_date('F');
		
		        if( $q->current_post === 0 ):?>
		           <dt><a href=""><?php the_date( 'F Y' ); ?></a></dt>
		        <?php else: 
		            $f = $q->current_post - 1;       
		            $old_date =   mysql2date( 'F', $q->posts[$f]->post_date ); 
		
		            if($current_month != $old_date):?>
		                <dt><a href=""><?php the_date( 'F Y' );?></a></dt>
		            <?php endif;?>
		        <?php endif;?>
		        <dd><a href="<?php the_permalink()?>"><?php the_title(); ?></a>, <?php the_category(', ') ?>, <span style="color:#214098;"><?php the_time('F j') ?></span></dd>
		    <?php endwhile; wp_reset_query();?>
		</dl>
		<?php endif;?>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
}?>