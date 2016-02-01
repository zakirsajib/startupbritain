<?php
// create shortcode to list all authors
add_shortcode( 'list-author', 'sub_author_listing' );
function sub_author_listing() {
    ob_start();?>
	<div class="list-author">
		<?php wp_list_authors('show_fullname=1&optioncount=0&orderby=post_count&order=DESC');?>
	</div>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
}?>