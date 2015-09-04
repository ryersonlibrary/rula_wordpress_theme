/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site description
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Address
	// This is a bit wonky still, using refresh transport instead.
	wp.customize( 'rula-address', function( value ) {
		value.bind( function( to ) {
			$( 'footer .address' ).text( to );
		} );
	} );

	wp.customize( 'rula-email', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .email' ).text( to );
		} );
	} );

	wp.customize( 'rula-phone', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .phone' ).text( to );
		} );
	} );

	// Social Media Section :)
	wp.customize( 'rula-twitter', function( value ) {
		value.bind( function( to ) {
			$( 'span.twitter-handle' ).text( to );
		} );
	} );
	wp.customize( 'rula-facebook', function( value ) {
		value.bind( function( to ) {
			$( 'span.facebook-handle' ).text( to );
		} );
	} );
	wp.customize( 'rula-instagram', function( value ) {
		value.bind( function( to ) {
			$( 'span.instagram-handle' ).text( to );
		} );
	} );

} )( jQuery );
