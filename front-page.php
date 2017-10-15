<?php
/**
 * Business Pro.
 *
 * This file adds the front page to the Business Pro Theme.
 *
 * @package Business Pro
 * @author  SeoThemes
 * @license GPL-2.0+
 * @link    https://seothemes.com/themes/business-pro/
 */

get_template_part( 'template', 'full' );

// Remove default page header
remove_action( 'genesis_after_header', 'business_page_header_open', 20 );
remove_action( 'genesis_after_header', 'business_page_header_title', 24 );
remove_action( 'genesis_after_header', 'business_page_header_close', 28 );


add_filter( 'genesis_attr_site-inner', 'sk_attributes_site_inner' );
/**
 * Add attributes for site-inner element.
 *
 * @since 2.0.0
 *
 * @param array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function sk_attributes_site_inner( $attributes ) {
	$attributes['role']     = 'main';
	$attributes['itemprop'] = 'mainContentOfPage';
	return $attributes;
}
// Remove div.site-inner's div.wrap
add_filter( 'genesis_structural_wrap-site-inner', '__return_empty_string' );
// Display header
get_header();
// Display Content
the_post(); // sets the 'in the loop' property to true.
the_content();
// Display Footer
get_footer();



// Run Genesis.
//genesis();
