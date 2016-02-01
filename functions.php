<?php
/**
 * Slightly Modified Options Framework
 */
$current_path= dirname(__FILE__);
require_once ($current_path. '/admin/index.php');
// Adding thumbnail into admin's column
require_once($current_path. '/includes/thumbnail.php');	// Thumbnails columns

require_once($current_path. '/includes/blog.php');	
require_once($current_path. '/includes/bus-blog.php');
require_once($current_path. '/includes/content-twitter.php');
require_once($current_path. '/includes/main-blog.php');
require_once($current_path. '/includes/author-list.php');
require_once($current_path. '/includes/sharethis.php');
require_once($current_path. '/includes/team.php');
require_once($current_path. '/includes/team-widget.php');
require_once($current_path. '/includes/startup-tracker.php');
require_once($current_path. '/includes/day-tracker.php');
require_once($current_path. '/includes/month-tracker.php');
require_once($current_path. '/includes/sponsors.php');
require_once($current_path. '/includes/resources.php');
require_once($current_path. '/includes/resourcespage.php');

add_filter('widget_text', 'do_shortcode');

/**
 * Add SVG capabilities
 */
function wpcontent_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */

function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
//add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );




/********** Sets up the content width value based on the theme's design and stylesheet. ***********/
if ( ! isset( $content_width ) )
$content_width = 1170;



/********** Register bootstrap javascript ***********/

function wpbootstrap_scripts_with_jquery(){
	wp_register_script( 'twitter-bootstrap-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) ); // Updated 2.3.2
	wp_enqueue_script( 'twitter-bootstrap-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );


function load_fonts() {
            wp_register_style('opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic');
            wp_enqueue_style( 'opensans');
}
 
add_action('wp_print_styles', 'load_fonts');


/********** Register themes Stylesheet ***********/
function default_theme_styles() {
	global $wp_styles;
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
		
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/owl-carousel/owl.carousel.css');
	wp_enqueue_style( 'owl.carousel.transitions', get_template_directory_uri() . '/owl-carousel/owl.transitions.css');		
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'default-theme-style', get_stylesheet_uri() );
	
	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	
	// Load our IE-only stylesheet for all versions of IE:
	wp_enqueue_style( 'default-theme-ie', get_template_directory_uri() . '/css/ie.css', array( 'default-theme-style' ), '2015');
	$wp_styles->add_data( 'default-theme-ie', 'conditional', 'IE' );
	
	 /**
	* Load our IE version-specific stylesheet:
	* <!--[if IE 7]> ... <![endif]-->
	*/
	wp_enqueue_style( 'default-theme-style-ie7', get_stylesheet_directory_uri() . "/css/ie7.css", array( 'default-theme-style' ), '2015');
	$wp_styles->add_data( 'default-theme-style-ie7', 'conditional', 'IE 7' );
	
	/**
     * Load our IE specific stylesheet for a range of older versions:
     * <!--[if lt IE 9]> ... <![endif]-->
     * <!--[if lte IE 8]> ... <![endif]-->
     * NOTE: You can use the 'less than' or the 'less than or equal to' syntax here interchangeably.
     */
    wp_enqueue_style( 'default-theme-style-old-ie', get_stylesheet_directory_uri() . "/css/old-ie.css", array( 'default-theme-style' ), '2015');
    $wp_styles->add_data( 'default-theme-style-old-ie', 'conditional', 'lt IE 9' );
    
    /**
     * Load our IE specific stylesheet for a range of newer versions:
     * <!--[if gt IE 8]> ... <![endif]-->
     * <!--[if gte IE 9]> ... <![endif]-->
     * NOTE: You can use the 'greater than' or the 'greater than or equal to' syntax here interchangeably.
     */
    wp_enqueue_style( 'default-theme-style-new-ie', get_stylesheet_directory_uri() . "/css/new-ie.css", array( 'default-theme-style' ), '2015');
    $wp_styles->add_data( 'default-theme-style-new-ie', 'conditional', 'gt IE 8' );
	
}
add_action( 'wp_enqueue_scripts', 'default_theme_styles' );






/********** Register themes javascript ***********/

add_action( 'wp_enqueue_scripts', 'load_javascript_files' );
function load_javascript_files(){
	 wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), false );
	 wp_register_script( 'owlCarousel-min', get_template_directory_uri() . '/owl-carousel/owl.carousel.min.js', array('jquery'), false );
	 wp_register_script( 'home-owlCarousel', get_template_directory_uri() . '/js/home-owlCarousel.js', array('jquery'), false );
	 
	 //wp_register_script( 'pinterest_grid', get_template_directory_uri() . '/js/pinterest_grid.js', array('jquery'), false );
	
	 wp_register_script( 'isotope.pkgd.min.js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), false );
	 
	// use wp native jquery library
	wp_enqueue_script( 'jquery' ); // use wp native jquery
    
    if(is_home()|| is_front_page()):
    	wp_enqueue_script( 'owlCarousel-min' );
    	wp_enqueue_script( 'home-owlCarousel' );
    endif;
    
    //if(is_page(1869)):
    	wp_enqueue_script( 'isotope.pkgd.min.js' );
    //endif;
    wp_enqueue_script( 'custom' );
}





/********** Custom Images ***********/

if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
}
if ( function_exists( 'add_image_size' ) ) { 
	//Set the image size by resizing the image proportionally (that is, without distorting it): 
	add_image_size( 'default-thumb', 225, 175, true ); 	
	//Set the default Post Thumnail size by resizing the image proportionally (that is, without distorting it): 
	set_post_thumbnail_size( 225, 175 ); // 50 pixels wide by 50 pixels tall, resize mode
}

add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
    $addsizes = array(
         "default-thumb" => __( "Default Thumb",'')
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}

/*********** Add class to links generated by next_posts_link and previous_posts_link ***********/

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="styled-button"';
}



/*********** Displays navigation to next/previous pages when applicable. INDEX page ***********/

if ( ! function_exists( 'defaulttheme_content_nav' ) ) :

function defaulttheme_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );
	
	
	// Styled hired from twitter bootstrap
	
	
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul id="<?php echo $html_id; ?>" class="pager" role="navigation">
			<h3 class="assistive-text"><?//php _e( 'Post Pagination', THEMENAME ); ?></h3>
			
			<li class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', THEMENAME ) ); ?></li>
			<li class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', THEMENAME ) ); ?></li>
		</ul><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;



/*********** Displays navigation to next/previous pages when applicable. in SINGLE page***********/

if ( ! function_exists( 'content_nav' ) ) :
add_shortcode('blog-pagination','content_nav');
function content_nav() {

global $post;
	
$current_post_type = get_post_type();
if($current_post_type == 'post'):?>
	<div class="row-fluid">
		<ul class="pager">
			
			<li class="previous">
				<?php previous_post_link('%link', '&larr; Previous post');?> 
			</li>
			
			<li class="next">				
				<?php next_post_link('%link', 'Next post &rarr;'); ?>
			</li>
		</ul>
	</div>
<?php endif;
}
endif;



/*********** Displays navigation to next/previous pages when applicable. in Sponsors SINGLE page***********/


if ( ! function_exists( 'sponsors_nav' ) ) :
add_shortcode('sponsors-pagination','sponsors_nav');
function sponsors_nav() {

global $post;
	
$current_post_type = get_post_type();
if($current_post_type == 'startup_sponsors'):?>
	<div class="row-fluid">
		<ul class="pager">
			
			<li class="previous">
				<?php previous_post_link('%link', '&larr; Previous sponsor');?> 
			</li>
			
			<li class="next">				
				<?php next_post_link('%link', 'Next sponsor &rarr;'); ?>
			</li>
		</ul>
	</div>
<?php endif;
}
endif;


/*********** Displays navigation to next/previous pages when applicable. in Resources SINGLE page***********/


if ( ! function_exists( 'resources_nav' ) ) :
add_shortcode('resources-pagination','resources_nav');
function resources_nav() {

global $post;
	
$current_post_type = get_post_type();
if($current_post_type == 'startup_resources'):?>
	<div class="row-fluid">
		<ul class="pager">
			
			<li class="previous">
				<?php previous_post_link('%link', '&larr; Previous resource');?> 
			</li>
			
			<li class="next">				
				<?php next_post_link('%link', 'Next resource &rarr;'); ?>
			</li>
		</ul>
	</div>
<?php endif;
}
endif;




/********** Register Custom Menus ***********/

add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'Primary' => __( 'Primary Menu', THEMENAME)
		)
	);
}



/********** Register sidebar(s) ***********/

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	
		/*General Sidebar*/
		$general_sidebar=array(
			'id' => 'general_sidebar',
			'name' => __( 'About Sidebar' , THEMENAME),
			'description' => __( 'Sidebar for about us page' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		$blog_sidebar=array(
			'id' => 'blog_sidebar',
			'name' => __( 'Blog Page Sidebar' , THEMENAME),
			'description' => __( 'Blog Page Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		$blog_single_sidebar=array(
			'id' => 'blog_single_sidebar',
			'name' => __( 'Blog Single Sidebar' , THEMENAME),
			'description' => __( 'Blog Single Page Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
        
		$events_single_sidebar=array(
			'id' => 'events_single_sidebar',
			'name' => __( 'Single Event Page Sidebar' , THEMENAME),
			'description' => __( 'Single Event Page Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		$bus_sidebar=array(
			'id' => 'bus_sidebar',
			'name' => __( 'Bus Page Sidebar' , THEMENAME),
			'description' => __( 'Bus Page Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		$team_sidebar=array(
			'id' => 'team_sidebar',
			'name' => __( 'Team Page Sidebar' , THEMENAME),
			'description' => __( 'Team Page Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		$team_single_sidebar=array(
			'id' => 'team_single_sidebar',
			'name' => __( 'Single Team Page Sidebar' , THEMENAME),
			'description' => __( 'Single Team Page Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
				
		$search_results_sidebar=array(
			'id' => 'search_results_sidebar',
			'name' => __( 'Search Results Sidebar' , THEMENAME),
			'description' => __( 'Search Results Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		
		$news_sidebar=array(
			'id' => 'news_sidebar',
			'name' => __( 'News Sidebar' , THEMENAME),
			'description' => __( 'News Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		$resources_sidebar=array(
			'id' => 'resources_sidebar',
			'name' => __( 'Resources Sidebar' , THEMENAME),
			'description' => __( 'Resources Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		$resources_single_sidebar=array(
			'id' => 'resources_single_sidebar',
			'name' => __( 'Resources Single Sidebar' , THEMENAME),
			'description' => __( 'Resources Single Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Footer sidebar */
		$f_sidebar_one=array(
			'id' => 'f_sidebar_one',
			'name' => __( 'Footer Sidebar One', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying widgets in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Footer sidebar */
		$f_sidebar_two=array(
			'id' => 'f_sidebar_two',
			'name' => __( 'Footer Sidebar Two', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying contact details in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Footer sidebar */
		$f_sidebar_three=array(
			'id' => 'f_sidebar_three',
			'name' => __( 'Footer Sidebar Three', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying widgets in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		

		/* Register the sidebars. */
		register_sidebar( $general_sidebar );
		register_sidebar( $blog_sidebar );
		register_sidebar( $blog_single_sidebar );
		
		register_sidebar( $events_single_sidebar );
		register_sidebar( $bus_sidebar );
		register_sidebar( $team_sidebar );
		register_sidebar( $team_single_sidebar );
		register_sidebar( $search_results_sidebar );
		register_sidebar( $news_sidebar );
		register_sidebar( $resources_sidebar );
		register_sidebar( $resources_single_sidebar );
		register_sidebar( $f_sidebar_one );
		register_sidebar( $f_sidebar_two );
		register_sidebar( $f_sidebar_three );
}


/********** Set excerpt link ***********/

function new_excerpt_more($more) {
	global $post;
	
	$current_post_type = get_post_type();
	
	if($current_post_type == 'post'):
	
	return ' <br/><br/><a class="read-report" href="'. get_permalink($post->ID) . '"><i class="fa fa-arrow-circle-o-right"></i> read more</a>';
	endif;
	
	if($current_post_type == 'startup_resources'):
	return ' <br/><br/><a class="read-report" href="'. get_permalink($post->ID) . '"><i class="fa fa-arrow-circle-o-right"></i> read more</a>';
	endif;
	
}
add_filter('excerpt_more', 'new_excerpt_more');



/********** Set excerpt length***********/

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
?>