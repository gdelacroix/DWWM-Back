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
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', 'wp_user' );

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
define( 'AUTH_KEY',         '5($-bz%-i5zE4OF3-<UNu4e4zC#hxjj}CXF`fyRZv=k*`M&y* 2S*U4TAw)2~,ZI' );
define( 'SECURE_AUTH_KEY',  'SB<8jN^flmr7eu^[_g{fS&r2k40VOJlJk-FX)v}~N9)!n#oJ@ +^{|uRp_U.PQH]' );
define( 'LOGGED_IN_KEY',    'q_iAmR?N3yv,l!:(:~0?B%Q%J0O<!w9)9^U(o>FLG.A.C:S5`>QIy$!M^WZHOP1D' );
define( 'NONCE_KEY',        '8N?PK/)}OpjY8c,F<I@Ev&@}`u`t2y*eLP LnT={$~:cNSAA$gLWs5FF7OQ}wk?7' );
define( 'AUTH_SALT',        'zWY:5 u+4dtSyfGHxka[,E>W4>*pEIzL>KsG+YH:)|fa.xT$BU.bD_e)Zdx)#P0@' );
define( 'SECURE_AUTH_SALT', 'RY/o;`K=Jy@xmfFR^:?z7Fe1$+p1a-pqb/#bw8h)m87.h@`rWJjrBi7!?.&592L6' );
define( 'LOGGED_IN_SALT',   'T838o_/:+}~o>cKj{-hAd7g.sS6M&w+U./X%e}x$?(4yJjPlUv-p:t9GiUcY#Wj5' );
define( 'NONCE_SALT',       'ZGwwSb(6DF4%_S >mk@zd)@.TVL26d_=`d!%ZN$R(!R@4<&.z(yN7sb/xTk,{cA<' );

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
