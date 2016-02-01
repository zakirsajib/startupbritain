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
        	<div class="entry-content single-team-content" id="single-team-content">
	        	<div class="span2 offset1">
		        	<?php if(has_post_thumbnail() ) : ?>
	  					<?php the_post_thumbnail('full', array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?>
	  					<?php else:?>
	  						<img class="left" src="http://placehold.it/225x175" alt="default image" />
	  				<?php endif;?>
	        	</div>
	        	<div class="allcontents span8">
	        		<b><?php the_title()?></b>
		  			<div class="contents" id="team-single"><?php the_content();?></div>
        		</div> <! end contents !>
        	</div>
			<?php endwhile;?>
			
        </div>	<! end container !>
    </div>
</div>
<?php get_footer();?>