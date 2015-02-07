<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'camples_dev');

/** MySQL database username */
define('DB_USER', 'jzhang');

/** MySQL database password */
define('DB_PASSWORD', 'Ted.1208');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'dmrIbY#gX:dHP+PzF.Z_(hAu&&xf~EU^n2{>[W^{]K@eR_-sH8H?A](=~ITV_Y)T');
define('SECURE_AUTH_KEY', 'K5lAD$=^+Xku.#=vL=G kM4vja@yM|N7`}%0{NVMQrPIxfsGi+u[+TUYO/xC0]MN');
define('LOGGED_IN_KEY', '/E.2w-0MM$x4oy}}f/D7)u>Nwza^urxTp._V dulT^|Ts-rA@s*:hg2Jrqq</t:u');
define('NONCE_KEY', '19JCM!;5.Y&f2:S> ]tK+bQ]WJtbp3;lE|javL=Z?%2>t}xA0kUt|xmjnTt.!F`x');
define('AUTH_SALT', '9jo+FB%I3{[?Sx,{w MV0(IjV1ev<b`oJ7P&Tq3$c~$x2737&OEYn/TMx:_l+#wz');
define('SECURE_AUTH_SALT', 'XT|EqEdN!FL:GfC-/)nVWqV4FQ*c*+zvtP7TP/2n0AD]DEHXW&QOG~]7XptlL1qt');
define('LOGGED_IN_SALT', 'Sa|.A<1q5_}>pT+-N5&|2@_)*h+Ltc=R!j1|B}4<c9%qr|p_#>M?ktQCi3eZ=|G8');
define('NONCE_SALT', 'IO>FXyE0z$Z7g`FB zrw`xanie~mIe6:iHJi4H_ZW?)d_)9O;-8s<@^Unja@86c,');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('WP_DEBUGLOG', true);

define('WP_CACHE', true);

/* Multisite */
define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'ec2-54-67-40-58.us-west-1.compute.amazonaws.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define('FORCE_SSL_ADMIN', false);

/* User Role Editor for multisite */
define('URE_ENABLE_SIMPLE_ADMIN_FOR_MULTISITE', 1);
define('URE_MULTISITE_DIRECT_UPDATE', 1);
define('URE_SHOW_ADMIN_ROLE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/* Enable domain mapping plugin */
define( 'SUNRISE', 'on' );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
