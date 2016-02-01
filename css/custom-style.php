<?php global $data; ?>


<style>
body{
	background-color: <?php echo $data['body_background']?>;
	font-size: <?php echo $data['site_font']?>;
}

p{
	color: <?php echo $data['body_color']?>;
}

.footer{
	background-color: <?php echo $data['footer_background']?>
}


/*Custom CSS*/
<?php echo $data['custom_css']?>
</style>