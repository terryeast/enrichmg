<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package enrichmg
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">
    <div id="top-container" style=" margin:0 auto; overflow:hidden;">
        <?php if ( is_active_sidebar( 'custom-header-widget' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'custom-header-widget' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

    
    </div> 

	<header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            	<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<div id="headerLogo" class="alignleft">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a></div>
	<?php } // if ( ! empty( $header_image ) ) ?>
          <div class="alignleft site-header-text">
			<h1 class="site-title alignleft"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div></div>
        
        <nav id="site-navigation" class="main-navigation" role="navigation">
        
            <h1><img src= " <?php echo(get_template_directory_uri() . '/images/red-ham-icon.jpg'); ?>" width="30px" height="30px"/><?php _e( ' Menu', 'enrichmg' ); ?></h1>
            
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'enrichmg' ); ?>"><?php _e( 'Skip to content', 'enrichmg' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	
	</header><!-- #masthead -->
    


	<div id="content" class="site-content">
