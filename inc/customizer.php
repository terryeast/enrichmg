<?php
/**
 * enrichmg Theme Customizer
 *
 * @package enrichmg
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

// Standard Features established by Theme Option Inits
function enrichmg_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
  
// Theme Options Panel
 $wp_customize->add_panel( 'enrichmg_theme_options', array(
		    'description'    => __( 'Basic theme Options', 'enrichmg' ),
		    'capability'     => 'edit_theme_options',
		    'priority'       => 200,
		    'title'    		 => __( 'Theme Options', 'enrichmg' ),
		) );
  
 // Theme Option Panel, Article Formatting Subpanel
 $wp_customize->add_section( 'enrichmg_article_format', array(
		'description'	=> __( ' Article Formatting Options', 'enrichmg' ),
		'panel'			=> 'enrichmg_theme_options',
		'title'    		=> __( 'Article Options', 'enrichmg' ),
		'priority' 		=> 202,
	) );
 
 
 // Theme Option Panel, Article Formatting Subpanel, Header
  $wp_customize->add_setting('h1_header_color',
    	array(
        'default' => '#ef3d42',
        'transport' => 'postMessage',
	'capability' => 'manage_options',
	'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,'h1_header_color',
        array(
            'label' => __('Article Header Color', 'enrichmg'),
            'section' => 'enrichmg_article_format',
            'settings' => 'h1_header_color',
	      )
	)
    );
  
   // Theme Option Panel, Article Formatting Subpanel, Text Color
  $wp_customize->add_setting('article_text_color',
    	array(
        'default' => '#000000',
        'transport' => 'postMessage',
	'capability' => 'manage_options',
	'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,'article_text_color',
        array(
            'label' => __('Article Text Color', 'enrichmg'),
            'section' => 'enrichmg_article_format',
            'settings' => 'article_text_color',
	      )
	)
    );
  
   // Theme Option Panel, Article Formatting Subpanel, Link Color
  $wp_customize->add_setting('article_link_color',
    	array(
        'default' => '#ffffff',
        'transport' => 'postMessage',
	'capability' => 'manage_options',
	'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,'article_link_color',
        array(
            'label' => __('Article Link Color', 'enrichmg'),
            'section' => 'enrichmg_article_format',
            'settings' => 'article_link_color',
	      )
	)
    );
  
   // Theme Option Panel, Article Formatting Subpanel, Background Color
  $wp_customize->add_setting('article_background_color',
    	array(
        'default' => '#b7b7b7',
        'transport' => 'postMessage',
	'capability' => 'manage_options',
	'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,'article_background_color',
        array(
            'label' => __('Article Background Color', 'enrichmg'),
            'section' => 'enrichmg_article_format',
            'settings' => 'article_background_color',
	      )
	)
    );
  
  
 // Theme Option Panel, Aside Formatting Subpanel
 $wp_customize->add_section( 'enrichmg_aside_format', array(
		'description'	=> __( ' Aside Formatting Options', 'enrichmg' ),
		'panel'			=> 'enrichmg_theme_options',
		'title'    		=> __( 'Aside Options', 'enrichmg' ),
		'priority' 		=> 203,
	) );
 
 
 // Theme Option Panel, Aside Formatting Subpanel, Header
  $wp_customize->add_setting('aside_h1_color',
    	array(
        'default' => '#ef3d42',
        'transport' => 'postMessage',
	'capability' => 'manage_options',
	'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,'aside_h1_color',
        array(
            'label' => __('Aside Header Color', 'enrichmg'),
            'section' => 'enrichmg_aside_format',
            'settings' => 'aside_h1_color',
	      )
	)
    );
  
   // Theme Option Panel, Aside Formatting Subpanel, Text Color
  $wp_customize->add_setting('aside_text_color',
    	array(
        'default' => '#000000',
        'transport' => 'postMessage',
	'capability' => 'manage_options',
	'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,'aside_text_color',
        array(
            'label' => __('Aside Text Color', 'enrichmg'),
            'section' => 'enrichmg_aside_format',
            'settings' => 'aside_text_color',
	      )
	)
    );
  
   // Theme Option Panel, Aside Formatting Subpanel, Link Color
  $wp_customize->add_setting('aside_link_color',
    	array(
        'default' => '#000000',
        'transport' => 'postMessage',
	'capability' => 'manage_options',
	'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,'aside_link_color',
        array(
            'label' => __('Aside Link Color', 'enrichmg'),
            'section' => 'enrichmg_aside_format',
            'settings' => 'aside_link_color',
	      )
	)
    );
  
    $wp_customize->add_setting('aside_background_color',
    	array(
        'default' => '#ffffff',
        'transport' => 'postMessage',
	'capability' => 'manage_options',
	'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
  
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,'aside_background_color',
        array(
            'label' => __('Aside Background Color', 'enrichmg'),
            'section' => 'enrichmg_aside_format',
            'settings' => 'aside_background_color',
	      )
	)
    );
  
  
}
add_action( 'customize_register', 'enrichmg_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function enrichmg_customize_preview_js() {
	wp_enqueue_script( 'enrichmg_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery','customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'enrichmg_customize_preview_js' );

function enrichmg_customizer_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
           <?php generate_css('#primary #main header.entry-header h1.entry-title a', 'color', 'h1_header_color'); ?>
	   <?php generate_css('#primary #main header.entry-header h1.entry-title ', 'color', 'h1_header_color'); ?>
	   <?php generate_css('#primary #main div.entry-content  ', 'color', 'article_text_color'); ?>
	   <?php generate_css('#primary #main div.entry-content a ', 'color', 'article_link_color'); ?>
	   <?php generate_css('#primary #main div.entry-header a ', 'color', 'article_link_color'); ?>
	   <?php generate_css('#primary #main .entry-meta a ', 'color', 'article_link_color'); ?>
	   <?php generate_css('#primary #main .entry-meta ', 'color', 'article_text_color'); ?>
	   <?php generate_css('article.post', 'background-color', 'article_background_color'); ?>
	   <?php generate_css('article.page', 'background-color', 'article_background_color'); ?>
	   <?php generate_css('article.attachment', 'background-color', 'article_background_color'); ?>
	   <?php generate_css('#secondary .widget h1', 'color', 'aside_h1_color'); ?>
	   <?php generate_css('#secondary aside', 'color', 'aside_text_color'); ?>
	   <?php generate_css('#secondary aside ul li a', 'color', 'aside_link_color'); ?>
	   <?php generate_css('#secondary', 'background-color', 'aside_background_color'); ?>
  
      </style> 
      <!--/Customizer CSS-->
<?php
}

function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
}

// Output custom CSS to live site
add_action( 'wp_head', 'enrichmg_customizer_output' );