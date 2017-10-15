<?php
// Template Name: Full Width Page

add_filter( 'genesis_attr_site-inner', 'be_site_inner_attr' );

// Remove default page header.
remove_action( 'genesis_after_header', 'business_page_header_open', 20 );
remove_action( 'genesis_after_header', 'business_page_header_title', 24 );
remove_action( 'genesis_after_header', 'business_page_header_close', 28 );

/**
 * Add the attributes from 'entry', since this replaces the main entry.
 *
 * @author Bill Erickson
 * @link http://www.billerickson.net/full-width-landing-pages-in-genesis/
 *
 * @param array $attributes Existing attributes.
 * @return array Amended attributes.
 */
function be_site_inner_attr( $attributes ) {

    // Add a class of 'full' for styling this .site-inner differently
    $attributes['class'] .= ' full';

    // Add an id of 'genesis-content' for accessible skip links
    $attributes['id'] = 'genesis-content';

    // Add the attributes from .entry, since this replaces the main entry
    $attributes = wp_parse_args( $attributes, genesis_attributes_entry( array() ) );

    return $attributes;
}

// Display Header.
get_header();

// Display Content.
the_post(); // sets the 'in the loop' property to true. Needed for Beaver Builder but not Elementor.
the_content();

// Display Comments (if any are already present and if comments are enabled in Genesis settings - disabled by default for Pages).
genesis_get_comments_template();

// Display Footer.
get_footer();