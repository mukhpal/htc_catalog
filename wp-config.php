<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'htc' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password@123' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'FS_METHOD', 'direct' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '>LaqmS@+-]/& nQ%+E=HO hvc>:ik:U+>o@el:I=HI^s1DCq1_G:Skz0OC`Hr[.!' );
define( 'SECURE_AUTH_KEY',  'l]5aUph=Ujojk;WL@cU~|^!Z:=8N6p7mox63s_+u[%Z3XIeqn--.qCw2|LB[Ur@l' );
define( 'LOGGED_IN_KEY',    '(s:%rBm]|p?_TrwAkm9r)1]t+s]1~WIho)VTX^pEhM-n}r1PEZA&$TI}J=yMs;/u' );
define( 'NONCE_KEY',        'ymOP_j6t3^F7?eq%sFfYqY`RKPFy6iYkN!Y3tiZACqSd -!=>U>7H!TY7b_rVRzQ' );
define( 'AUTH_SALT',        'n_SnmzO6huttAalE]f+5DQO=~C.5;w[4(Vcv=t%-8IW*>|>gpJgRZT<`b`;R(GXZ' );
define( 'SECURE_AUTH_SALT', 'BSN*`1y>WUZ[cnf14^U)o|BDtw.wYI8-[AN^COl&:t:#`tbPSs`R;feK(D+&S/L|' );
define( 'LOGGED_IN_SALT',   'F63cVF)9)7-$/{-G4-V/(Lfa_#0pvB/I@Es]Ms9_Wr%bm7,u*s0eD6$zF5H)Lt&t' );
define( 'NONCE_SALT',       '2yTm=J3GIQxXmjUE/s+WN!uQO_Ck9#*;6LN&[cX%Mkw[w=W|k O& Y~atfz$7_Eb' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
