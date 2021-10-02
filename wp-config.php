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
define( 'DB_NAME', 'realestate_law' );

/** MySQL database username */
define( 'DB_USER', 'realestate_law' );

/** MySQL database password */
define( 'DB_PASSWORD', 'KlLx9xfIRP' );

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
define( 'AUTH_KEY',         'J9=H4ReW1ZPyuu&tA3m;KdB+sPoDOzHj6}*rz?;$_n@xu*%<ool)QeAZ1}B+KGN0' );
define( 'SECURE_AUTH_KEY',  '>|;!d# va|rm)xR$_E)XD$0|w+GT%oTav,co^EHJ_/xsprdTecKC-jqz{v7KQT]g' );
define( 'LOGGED_IN_KEY',    'NMa2D./WO s1xHR{uT<pn=n}<0D,VW9chv23HZlf-&]tXB-5E2rf/0Wu<Bs]wFj_' );
define( 'NONCE_KEY',        ']/U^1]/vq/VVgtu|S?]tQ5[&j!CFo vr-6R66Zstn^9vTP|f}e{R-e|tEE(p|2nJ' );
define( 'AUTH_SALT',        'y-_?7.QOHhMHYh+6{^=& 0VA/kUmvYZUWkXIN{Ck3Bj>Xb|Q??Im8JO/7qc1kZ|S' );
define( 'SECURE_AUTH_SALT', '4V&[X-;-QS(/<x/jI4mTq)zI$a]51$hbHU=Id1w!bD*tOTN/z.9}:#|U%KLp|!c-' );
define( 'LOGGED_IN_SALT',   'l%f<bGWh37_HsV?eOGCSx2fTJyR]?:{F1MMl3}4B*agx98~J3bugGXsZ7sYBlxTp' );
define( 'NONCE_SALT',       'a34^TcJG[!a_J.Vhsq+)`0(.NP]yG.@>Ik7e~7hYSe7Cr@,|D0 d}KV/#+3hWC.V' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'chanhtin_';

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

//define( 'PLL_REMOVE_ALL_DATA', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
