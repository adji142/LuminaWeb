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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'comk5683_lumina2' ); // comk5683_ renungan_lm

/** MySQL database username */
define( 'DB_USER', 'comk5683_root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'lagis3nt0s4' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'Z];.Ii4b[`ILlDuI^Up|o/>gP9vvb.:;W]AyVNKfHgX`oi|N(c=i5PCaM.ke=KhZ' );
define( 'SECURE_AUTH_KEY',  '$h)K<lUSY(t@[lUK)#jCaYyF}Qi:5^mhV(%Ze#z%DjUU@dn0~Vlz^5g5|&K2f!*t' );
define( 'LOGGED_IN_KEY',    '4FIv<Ya!OLtB&Z:vMcJsePB&jS&bZo;IILS%lbS3.7yzE.bY> }KE/U YuPM![r_' );
define( 'NONCE_KEY',        'X!P7_)%o?Z_qiAv,2}PRFgQyg@;WjpR=-wE]>;l u@d@h7Nib1Uo5Zs*[`GA3o.d' );
define( 'AUTH_SALT',        ' 0bj^F%9az4G2i4-J[Qg ]7]EI/<Q|GlGk.SexBbRK8]#g3`$FsCwQ7~Cq6w<V|.' );
define( 'SECURE_AUTH_SALT', 'bx-+!ZoQ#XtT} p$7C_A.5p#IaGL?>Yix7TeUTHRm,0,wKtD<CQ|+F;m8/H0:ZT~' );
define( 'LOGGED_IN_SALT',   '^J~03POrZ()<Tl(4:A8Nt9c1=.24xCz-|&,7vkz`J2W>r4?>fZDGy:2@}Tc3~G9p' );
define( 'NONCE_SALT',       'Yhzd{:%jyA0?TGG^!?=@As m9y1y*Pm~8v:qqc,>/--je,^<ta@XMeb]CO}gBoE.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ais_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
