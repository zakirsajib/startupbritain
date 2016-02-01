<?php global $data; ?>

<div class="footer row-fluid">
		<div class="footer-inner container">
		  	<div class="span3 col1">
		  		<?php if ( is_active_sidebar( 'f_sidebar_one' ) ) : ?>
		        	<?php dynamic_sidebar( 'f_sidebar_one' );  ?>
		        <?php endif;?>
		        
		  	</div>
		  	<div class="span6 col2 mailchimp-subscriptions">
		  		<?php if ( is_active_sidebar( 'f_sidebar_two' ) ) : ?>
		  		<div class="vertical-left-border"></div>
		        	<?php dynamic_sidebar( 'f_sidebar_two' );  ?>
		        <div class="vertical-border"></div>
		        <?php endif;?>
		        
		  	</div>
		  	<div class="span3 col3">
		  		<?php if ( is_active_sidebar( 'f_sidebar_three' ) ) : ?>
		        	<?php dynamic_sidebar( 'f_sidebar_three' );  ?>
		        <?php endif;?>
		  	</div>
		</div>
</div>
<?php echo $data['space_body']; ?>

<?php if(is_page('resources-section')):?>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php endif;?>

<?php echo $data['google_analytics']; ?>
<?php wp_footer();?>
</body>
</html>