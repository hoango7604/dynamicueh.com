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
define('DB_NAME', 'DBDynamicUEH');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '`q||:m1cFlw){43^P:>nFFkYV@@EI,7VC*!/~LYF1^;$*4<3iC[ZL>1I|k@r9Wk ');
define('SECURE_AUTH_KEY',  'Fc|U]aCq|V^C oDdZcAxoB-}0,R%h:n)KU6`Mh|`iIdaK$I<pWiB+f? j-?(Z>)7');
define('LOGGED_IN_KEY',    '=6vq9n%-!6H{+QxO9(a~eF]Mem>sK,{^I,~$fE>d^]+1P_ij;F%|)#7<29_ll&Y%');
define('NONCE_KEY',        'o{zf?TJJ.I-v6Rm//B*m?e0kG`GVBN8fl[&w=>Ey2|f.9Ur+V@gDdFU1WI4MR8@=');
define('AUTH_SALT',        'ZyDG=r(#^S +Y7TG--6SaUOXZaJG~>](Qy_ lv}-+EB?f$yrF,VxIARB~usR,$ER');
define('SECURE_AUTH_SALT', '8DoDSs|pb,/;DbwTnCM+oC5,tr<0^#Cpu{j{E]O==k=225cnpTR$N6^Y&,3QkNt_');
define('LOGGED_IN_SALT',   'F!Z VJ8///0);|_{xqL}pG]o;HAESi9zS=>C$oe$XL,b(z4G0Aue~uE.!um=0|@V');
define('NONCE_SALT',       'vV|}P`|)`)E3mFCP9&r|3{+V[&YK^3OwS:N};qa4r=(RT!Jm{R!*/=fvt:rUKdnT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
