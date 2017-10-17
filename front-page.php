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

<<<<<<< HEAD
// Run Genesis.
//genesis();
=======
// Remove default page header
remove_action( 'genesis_after_header', 'business_page_header_open', 20 );
remove_action( 'genesis_after_header', 'business_page_header_title', 24 );
remove_action( 'genesis_after_header', 'business_page_header_close', 28 );

>>>>>>> 6e8e13ab0f509de954040e3d450f722666e4e1e0
