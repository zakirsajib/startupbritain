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
					<?php if(is_singular('post')):?>
						<div class="author-link"><?php the_author_posts_link(); ?></div>
					<?php endif;?>
	        	</div>
	        	<div class="clearfix"></div>
	        	<div class="allcontents">
			        	<?php //if(has_post_thumbnail() ) : ?>
		  					<?php //the_post_thumbnail(array(486, 243), array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?>
		  				<?php //endif;?>
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
							<?php echo do_shortcode('[blog-pagination]');?>
						</div>
					</div>
				</div>
        		
        	</div>
			<?php endwhile;?>
			
			<div class="span4 sidebar">				
				<?php if(is_singular('ai1ec_event')):?>
					<?php if ( is_active_sidebar( 'events_single_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'events_single_sidebar' );  ?>
			        <?php endif?>
				<?php elseif(is_singular('post')):?>
				<div class="team-url"><a href="<?php echo home_url();?>/blog/"><i class="fa fa-arrow-circle-right"></i> Back to all blog posts</a></div>
					<?php if ( is_active_sidebar( 'blog_single_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'blog_single_sidebar' );  ?>
			        <?php endif?>
				<?php endif;?>
			</div>
        </div>	<! end container !>
        
        <?php //echo do_shortcode('[vc_row full_width="stretch_row_content" css=".vc_custom_1451909635115{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;padding-top: 35px !important;padding-right: 25% !important;padding-bottom: 35px !important;padding-left: 25% !important;background-color: #e4e4e4 !important;}"][vc_column width="1/3"][vc_column_text]<p style="text-align: center;"><span style="color: #214098;">Supported by</span></p>[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image image="1469" img_size="full" alignment="center" onclick="custom_link" img_link_target="_blank" link="http://personal.natwest.com/" el_class="natwest"][/vc_column][vc_column width="1/3"][vc_single_image image="1468" img_size="full" alignment="center" onclick="custom_link" img_link_target="_blank" link="http://www.sage.co.uk/" el_class="sage"][/vc_column][/vc_row]')?>
        
        
    </div>
</div>
<?php get_footer();?>