<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/** PHP 301 redirects
 * https://pantheon.io/docs/articles/sites/code/redirect-incoming-requests/
 */
if (file_exists(dirname(__FILE__) . '/redirects.php')):
	require_once(dirname(__FILE__) . '/redirects.php');
endif;

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp/wp-blog-header.php' );
