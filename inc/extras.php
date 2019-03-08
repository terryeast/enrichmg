<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package enrichmg
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function enrichmg_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'enrichmg_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function enrichmg_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'enrichmg_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function enrichmg_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'enrichmg_enhanced_image_navigation', 10, 2 );

function enrichmg_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	} // end if
    
	// Create all variables.
	$title = get_bloginfo( 'name', 'display' );
    $site_description = get_bloginfo( 'description', 'display' );
    $page_name = get_the_title();
    $blog_constant = "Blog";
    
     // create the title tag
	
	if ( $site_description && is_front_page() ) { // front_page
		$title = "$title $sep $site_description";
	} elseif(is_home()) { // if blog index if not front_page
        $title = "$blog_constant $sep $title";
        if ($site_description) {
            $title .= " $sep $site_description ";
        }
    } elseif(is_page() || is_single()) { //if regular page or post
        $title = " $page_name $sep $title "; 
        if ($site_description) {
            $title .= "$sep $site_description ";
        }
    }
	
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( __( 'Page %s', 'enrichmg' ), max( $paged, $page ) ) . " $sep $title";
	} // end if
	return $title;
} // end enichmg_wp_title
add_filter( 'wp_title', 'enrichmg_wp_title', 10, 2 );