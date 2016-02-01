<?php 
get_header();
?>
<div class="home-container row-fluid" id="single-post">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php while(have_posts()) : the_post();?>   
        
        <div class="row-fluid">
	       
	       <?php if(get_field('upload_header_image')):?>
	       <div class="bgimg"></div>
	       <style>
		   	.bgimg{
			   	background: url('<?php the_field('upload_header_image')?>') no-repeat center center;
			   	background-size:cover;
		   	}
		   </style> 
		   <?php else:?>
		   	<div class="bgimg"></div>
	       <style>
		   	.bgimg{
			   	background: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/header-bg.jpg') no-repeat center center;
			   	background-size:cover;
		   	}
		   </style>
		   <?php endif;?>   
        </div>	
        <div class="container">
        	
        	<div class="entry-content single-blog-content span8">
	        	<div class="allcontents">
	        		<h2><?php the_title()?></h2>
					<div class="entry-date"><?php the_time('l, F j, Y') ?></div>
	        	</div>
	        	<div class="clearfix"></div>
	        	<div class="allcontents">
			        	<?php if(has_post_thumbnail() ) : ?>
		  					<?php the_post_thumbnail('full', array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?>
		  				<?php endif;?>
		  				<div class="clearfix"></div>
		  				<div class="contents"><?php the_content();?></div>
		  				<div class="clearfix"></div>
		  				<div class="horizontal-border-single"></div>
        		</div> <! end contents !>
        		<div class="clearfix"></div>
				
				<div class="row-fluid">
					<div class="allcontents">
						<div class="span6 sharethis">
							<?php echo do_shortcode('[sharethisshortcode]');?>
						</div>
						<div class="span6 navigation">
							<?php echo do_shortcode('[resources-pagination]');?>
						</div>
					</div>
				</div>
        		
        	</div>
			<?php endwhile;?>
			
			<div class="span4 sidebar">	
				<div class="team-url"><a href="<?php echo home_url();?>/resources-section/"><i class="fa fa-arrow-circle-right"></i> Back to all resources</a></div>			
<!--
					<?php if ( is_active_sidebar( 'resources_single_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'resources_single_sidebar' );  ?>
			        <?php endif?>
-->
			</div>
        </div>	<! end container !>        
    </div>
</div>
<?php get_footer();?>