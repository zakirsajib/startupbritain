<?php 
get_header();
?>
<div class="home-container row-fluid" id="single-teampost">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php while(have_posts()) : the_post();?>   
        <div class="row-fluid">
		   	<div class="bgimg">
		       <div class="container">
			       <h1 class="heading-title"><?php the_title()?></h1>
			   </div>
			</div>
	       <style>
		   	.bgimg{
			   	background: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/header-bg.jpg') no-repeat center center;
			   	background-size:cover;
		   	}
		   </style>
        </div>	
        	
        <div class="container">
        	<div class="entry-content" id="single-sponsors-content">
	        	<div class="allcontents">
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
							<?php echo do_shortcode('[sponsors-pagination]');?>
						</div>
					</div>
				</div>
        		
        	</div>
			<?php endwhile;?>
			
        </div>	<! end container !>
    </div>
</div>
<?php get_footer();?>