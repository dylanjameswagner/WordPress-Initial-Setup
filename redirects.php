<?php
/**
 * 301 Redirects
 *
 * An associative array of old and new urls. Trailing slashes are trimmed from
 * the request URI so array keys should not have a trailing slash for match compatibility.
 *
 * @link https://pantheon.io/docs/articles/sites/code/redirect-incoming-requests/
 */
$request = rtrim( $_SERVER['REQUEST_URI'], '/\\' ); // trim trailing slash
$redirects = array(
    '/old' => '/new/',
);

if ( array_key_exists( $request, $redirects ) ) :
    header( 'HTTP/1.0 301 Moved Permanently' );
    header( 'Location: ' . $redirects[ $request ] );
    exit();
endif;
