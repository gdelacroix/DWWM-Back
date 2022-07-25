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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'PYi+M;P=yO`F>lf2WJ|6|4MVr@U@e.>[V_D96Miiq$F.$Dq#M,7K`EP=/G,:UIMN' );
define( 'SECURE_AUTH_KEY',  '+mu,E_Ee6Ras@(b:,U{1}TMyeY6z}+Qq{b/{l%F2^FH%+jm]2Z3*xGxGdKvx,l51' );
define( 'LOGGED_IN_KEY',    'yIXSa}2B8ZfUtn|KQ{t^@vJD-B+/`*:V(%z Ajw2L]9]*l1;`jQ2R[n6Zv5=DDGW' );
define( 'NONCE_KEY',        ':6t$MeSNL(EBkw#]B4t!G%h1)2ZT;M*fDExU= G%L3Sta,EcSuRx[,orP 1eD)vn' );
define( 'AUTH_SALT',        'C%Txt<a+@k1F>MHAKRjSIAc9-+mV2MH@6pIs9Y@4@lPJ{%0B@@/7ROY_E3pSb/Q6' );
define( 'SECURE_AUTH_SALT', ':%/,`<kofJ>vxgQ;5sc +S$wO]#n9UBn*#OPdC _m[v_cfkM$qMnz<d kCxXu&iM' );
define( 'LOGGED_IN_SALT',   'qJhw.J76$9Zvp>6Vuxyd.=B!H1SH_kD^Gg]@*uc(`lDH9B1c=Vdwg3#m3F)cQe`j' );
define( 'NONCE_SALT',       '&:D*gUkDn5s@Du/T5z2+d&^13eKj;QEpsE&B}ybv1$CleT,*K7Pm L78IF^Qp+_6' );

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
