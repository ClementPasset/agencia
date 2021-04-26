<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'agencia' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'h*qpkm/{grm^{=VW+i{-$GShFMP5DX92X5MmdcnF:(0jfDSQa%T(,`/hb%!z|l6}' );
define( 'SECURE_AUTH_KEY',  '?aQYr@48!xTh^-Hon?,Q<t^&{c?PH/_;2`BC5RVJd=8i_3ji<u%G*0FPA/7@A^& ' );
define( 'LOGGED_IN_KEY',    'x^;-kv3:()kpsu,)&+w*>470Sx^fR1TiLuC1I/]Ar*Blk`t;|;1hDj1)OldUQ]hU' );
define( 'NONCE_KEY',        'VGY}RE>:vZ An.}{h(B4${[4$.n+ w>Y) w&GMlZS]DWmO=T,V2y9Ya`7=H+Ykhv' );
define( 'AUTH_SALT',        '_xm9?LNU>ltes6%% >o(,=JUUjUEQroWgOC:c9u!I#qr]I+XJ~,-2Y<0!Vf@`_m>' );
define( 'SECURE_AUTH_SALT', ')lw~9a`P?cM}X|*[y Y>;UyQn##ViS!*qT;Fh89qeiI,YoO5YiOAE 5XfnHDGK/W' );
define( 'LOGGED_IN_SALT',   'A.J!zmC,XPtwwh(UUw[c@]$.-veuJ{Ff%SJAPizhF(1#+;4eJDddL.HoDY%xXZaG' );
define( 'NONCE_SALT',       '?##}_!`%FMD~~3aiya:?0Xi8D1$y]r3`UnQQv/Inq1Zwy#Z5t5#9wIP=D%}.?2 B' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
