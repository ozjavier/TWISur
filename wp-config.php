<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'iupsur' );

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
define( 'AUTH_KEY',         '0l0k6k3a(bl7^,EUq)V:kd)wGvFp1xb]Y@Vb e9Oh@i*B[8WV.Og?=A*iKX<w#Y2' );
define( 'SECURE_AUTH_KEY',  ',N~vk6~KYqjST)C+?kL U3m(Zx)%dyyV(SnSgvT.$8|0H.#<!Zi*=GvF<5QDrDSd' );
define( 'LOGGED_IN_KEY',    'iSWNU*J5:v}/+v3V+Y6%(0UhpjkFvU.X>a{@l;.$=(vja pj7q)@HFgrIt$gN/:Q' );
define( 'NONCE_KEY',        '3FE?p=U(GlA)%uB0 0~X3D<lUM4E&(?ZL%/a+7]VI]@@Dj=GN+P#nAkLZ JH:C>2' );
define( 'AUTH_SALT',        'QhNi9;)} )64CEc7*<d*GD~DvL>/`)@yL8Oja$GJFL(#r3M&o4D:UQUr::!,?)@o' );
define( 'SECURE_AUTH_SALT', 'Y6F!b*^O$0#Zf?z{6]mB0`I{9SFgJdw4bWHZI6Uj[#ko@n5qpVYT-PBtSv=h #j ' );
define( 'LOGGED_IN_SALT',   'OoX$~e?ef]j}bQ4L:$w#WUW{E>Mfa$sc|A:,a&N=[hr#/om:uJ:)6 ,qZgmu3Lu@' );
define( 'NONCE_SALT',       '})08%4 3|ul*[QSv|1aNyItdWdt<1NHKgN&v%wt.fJ-$4LJf%Mc*$1+L=NDPsZ z' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
