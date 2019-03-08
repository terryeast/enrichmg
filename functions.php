<?php
/**
 * enrichmg functions and definitions
 *
 * @package enrichmg
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function enrichmg_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on enrichmg, use a find and replace
	 * to change 'enrichmg' to the name of your theme in all the template files
	 */
	
	load_theme_textdomain( 'enrichmg', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'enrichmg' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	add_editor_style( 'editor-style.css' );

	/**
	 * Setup the WordPress core custom background feature.
	 */
  

	add_theme_support( 'custom-background', apply_filters( 'enrichmg_custom_background_args', array(
		'default-color' => 'dd3333',
		'default-image' => '',
	) ) );
	
	/* New title-tag support */
	add_theme_support( 'title-tag' );
  
  if ( ! isset( $content_width ) )
	$content_width = 640;
}


add_action( 'after_setup_theme', 'enrichmg_setup' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Register widgetized area and update sidebar with default widgets
 */
function enrichmg_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'enrichmg' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'TopAd', 'enrichmg' ),
		'id'            => 'custom-header-widget',
		'before_widget' => '<aside style="width:700px; margin:0 auto;">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'BottomAd', 'enrichmg' ),
		'id'            => 'custom-footer-widget',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'enrichmg_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function enrichmg_scripts() {
	wp_enqueue_style( 'enrichmg-style', get_stylesheet_uri() );

	wp_enqueue_script( 'enrichmg-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
    
    wp_enqueue_script( 'enrichmg-topPanel', get_template_directory_uri() . '/js/topPanel.js', array(),'20181019',true);

	wp_enqueue_script( 'enrichmg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'enrichmg-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'enrichmg_scripts' );

add_filter("manage_upload_columns", 'upload_columns');
add_action("manage_media_custom_column", 'media_custom_columns', 0, 2);

function upload_columns($columns) {

	unset($columns['parent']);
	$columns['better_parent'] = "Parent";

	return $columns;

}
 function media_custom_columns($column_name, $id) {

	$post = get_post($id);

	if($column_name != 'better_parent')
		return;

		if ( $post->post_parent > 0 ) {
			if ( get_post($post->post_parent) ) {
				$title =_draft_or_post_title($post->post_parent);
			}
			?>
			<strong><a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a></strong>, <?php echo get_the_time(__('Y/m/d', 'enrichmg')); ?>
			<br />
			<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Re-Attach', 'enrichmg'); ?></a></td>

			<?php
		} else {
			?>
			<?php _e('(Unattached)', 'enrichmg'); ?><br />
			<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Attach', 'enrichmg'); ?></a>
			<?php
		}

}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

