/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).css('color', to );
			$( '.site-description' ).css('color', to );
		} );
	} );
  
	// Article Header Color
	wp.customize( 'h1_header_color', function( value ) {
		value.bind( function( to ) {
			$( '#primary #main h1.entry-title a' ).css('color', to);
			$( '#primary #main h1.entry-title' ).css('color', to);
		} );
	} );
	
	// Article Text Color
	wp.customize( 'article_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#primary #main .entry-content' ).css('color', to);
			$( '#primary #main .entry-meta' ).css('color', to);
		} );
	} );
	
	// Article Link Color
	wp.customize( 'article_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#primary #main div.entry-content a ' ).css('color', to);
			$( '#primary #main div.entry-header a ' ).css('color', to);
			$( '#primary #main .entry-meta a ' ).css('color', to);
		} );
	} );
  
	// Article Background Color
	wp.customize( 'article_background_color', function( value ) {
		value.bind( function( to ) {
			$( 'article.post' ).css('background-color', to);
			$( 'article.page' ).css('background-color', to);
			$( 'article.attachment' ).css('background-color', to);
		} );
	} );
	
	
	
	// Aside Header Color
	wp.customize( 'aside_h1_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary .widget h1' ).css('color', to);
		} );
	} );
	
	// Aside Text Color
	wp.customize( 'aside_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary aside' ).css('color', to);
		} );
	} );
	
	// Aside Link Color
	wp.customize( 'aside_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary aside ul li a ' ).css('color', to);
		} );
	} );
  
	// Aside Background Color
	wp.customize( 'aside_background_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary' ).css('background-color', to);
		} );
	} );
  
	
  
  
} )( jQuery );
