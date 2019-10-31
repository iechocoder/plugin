<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bge' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '79U7p]|s>Krt{(:ARiibF$>kgV#.J)cYdeKx+OwB<q[L4_[?]}!P|}9~b{J_ dI<' );
define( 'SECURE_AUTH_KEY',  'KBN.|!G@hh}m>Vw/{qoQ3v/dLUqu394D -:sr^zi`k0V=,)`bY- xJ $~9%cp:#<' );
define( 'LOGGED_IN_KEY',    'I6@qzTeayA6@M=$JrQzY|`U$WSTOR51S>zEZGB-k)|/gp?C#sRVmMO.`(.0roi6K' );
define( 'NONCE_KEY',        '& QlW6Rd*Eot6|wYydMi=:;qM{PYNPIo~_k@-63TBzP74>M!!8GEo&xCcm-WKCqR' );
define( 'AUTH_SALT',        '?t,ud3n>NCVf1!px6~-OG&R/~&>p6]_W*^):4RER]mW`~!irp+{qWo<g#,/ws.T~' );
define( 'SECURE_AUTH_SALT', 'C3m?}P9p2]|C~>3{uz:(21PQe8@jxZ#_$$$&{OAUlJ>bNV6*%}fC#:d,PW^j@]-.' );
define( 'LOGGED_IN_SALT',   '!, ;2Gpl_P3{$c/QY!glq+8noW` Etq?A+bNU5p/jwLBP^kkz,d74gBA6 E)fg4)' );
define( 'NONCE_SALT',       '$#U*FGKl!o[=y2uUfEEoVAxj,(P>}-A= z*g2Gyk|u1P,C}Leu#fkD,(PAhs<^+H' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
