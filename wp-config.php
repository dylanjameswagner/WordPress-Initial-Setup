<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/** PHP 301 Redirects
 * https://pantheon.io/docs/articles/sites/code/redirect-incoming-requests/
 */
if (file_exists(dirname(__FILE__) . '/../redirects.php')):
	require_once(dirname(__FILE__) . '/../redirects.php');
endif;

/** Environments **/
$environments = array(
	'LIVE' => array(
		'example.com',
		'www.example.com',
		'www.example.com.php53-14.ord1-1.websitetestlink.com',
	),
	'DEV' => array(
		'dev.example.com',
		'dev.example.com.php53-10.ord1-1.websitetestlink.com',
	),
	'LOCAL' => array(
		'example.com.local:8888',
		'example.com.local.10.3.1.196.xip.io:8888',
	),
);

/** Define Environment **/
foreach ($environments AS $environment => $option) :
	if ((is_array($option)
	  && in_array($_SERVER['HTTP_HOST'],$option))
	  || strstr($_SERVER['HTTP_HOST'],$option)) :
		define('ENVIRONMENT',$environment);
		break;
	endif;
endforeach;

if (!defined('ENVIRONMENT')) :
	define('ENVIRONMENT','LIVE');
endif;

/** Override WordPress address and installation directory **/
switch (ENVIRONMENT) :
case 'LIVE' :
	define('WP_HOME'	,'http://www.example.com');
	define('WP_SITEURL'	,'http://www.example.com/wp');
	break;

default :
	define('WP_HOME'	,'http://'.$_SERVER['HTTP_HOST']);
	define('WP_SITEURL'	,'http://'.$_SERVER['HTTP_HOST'].'/wp');
	break;

endswitch;

/** MySQL settings - You can get this info from your web host **/
switch (ENVIRONMENT) :
case 'LIVE' :
	define('DB_HOST'		,'');
	define('DB_NAME'		,'');
	define('DB_USER'		,'');
	define('DB_PASSWORD'	,'');
	break;

case 'DEV' :
	define('DB_HOST'		,'');
	define('DB_NAME'		,'');
	define('DB_USER'		,'');
	define('DB_PASSWORD'	,'');
	break;

case 'LOCAL' :
	define('DB_HOST'		,'localhost');
	define('DB_NAME'		,'example.com');
	define('DB_USER'		,'root');
	define('DB_PASSWORD'	,'root');
	break;

default :

	/** MySQL hostname */
	define('DB_HOST', 'localhost');

	/** The name of the database for WordPress */
	define('DB_NAME', 'database_name_here');

	/** MySQL database username */
	define('DB_USER', 'username_here');

	/** MySQL database password */
	define('DB_PASSWORD', 'password_here');

	break;

endswitch;

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Database Upgrade from utf8 to utf8mb4 */
define('DO_NOT_UPGRADE_GLOBAL_TABLES', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY'			,'put your unique phrase here');
define('SECURE_AUTH_KEY'	,'put your unique phrase here');
define('LOGGED_IN_KEY'		,'put your unique phrase here');
define('NONCE_KEY'			,'put your unique phrase here');
define('AUTH_SALT'			,'put your unique phrase here');
define('SECURE_AUTH_SALT'	,'put your unique phrase here');
define('LOGGED_IN_SALT'		,'put your unique phrase here');
define('NONCE_SALT'			,'put your unique phrase here');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nCQct3_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
switch (ENVIRONMENT) :
case 'LIVE' :
	define('WP_DEBUG',false);
 	define('WP_DEBUG_LOG',true);
	break;

default :
	define('WP_DEBUG',true);
	break;

endswitch;

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
