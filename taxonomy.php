<?php get_header();?>
<div class="home-container row-fluid" id="single-post">
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="row-fluid">
				   	<div class="bgimg">
				       <div class="container">
					       <h1 class="heading-title"><?php single_cat_title(); ?></h1>
					   </div>
					</div>
			       <style>
				   	.bgimg{
					   	background: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/header-bg.jpg') no-repeat center center;
					   	background-size:cover;
				   	}
				   </style>
        		</div>
        		
        		<?php
        			global $query_string;
        			query_posts( $query_string . '&posts_per_page=9' );

        		?>
        		<div class="container">
				 	<div class="main-blog-listing" id="content">
					 	<?php $count=0;?>
				 		<?php while ( have_posts() ) : the_post(); ?>
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
						<?php endwhile;?>
				  
<!-- 				  <?php next_posts_link( '<i class="fa fa-long-arrow-down"></i> Older Entries', $query->max_num_pages );previous_posts_link( '<i class="fa fa-long-arrow-up"></i> Newer Entries' );?> -->
				  
				  
				  </div> <! end main-blog-listing !>
				  
<!--
				<div class="span4 sidebar">
				  	<?php if ( is_active_sidebar( 'resources_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'resources_sidebar' );  ?>
					<?php endif;?>
				</div>
-->
            </div>
	</div>
</div>
<?php get_footer();?>