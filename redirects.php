<?php

/* https://pantheon.io/docs/articles/sites/code/redirect-incoming-requests/ */
// use keys with no trailing slash for with/without compatibility

$request = rtrim($_SERVER['REQUEST_URI'],'/\\'); // remove trailing slash
$redirects = array(
	'/old-page' => '/new-page/',
);

if (array_key_exists($request,$redirects)) :
	header('HTTP/1.0 301 Moved Permanently');
	header('Location: '.$redirects[$request]);
	exit();
endif;
