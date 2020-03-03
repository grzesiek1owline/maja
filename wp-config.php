<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawień MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy i ABSPATH. Więcej informacji
 * znajduje się na stronie
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a możesz zdobyć
 * od administratora Twojego serwera.
 *
 * Ten plik jest używany przez skrypt automatycznie tworzący plik
 * wp-config.php podczas instalacji. Nie musisz korzystać z tego
 * skryptu, możesz po prostu skopiować ten plik, nazwać go
 * "wp-config.php" i wprowadzić do niego odpowiednie wartości.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', "maja");

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', "root");

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', "");

/** Nazwa hosta serwera MySQL */
define('DB_HOST', "localhost");

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Fte7|?qx=i#w5g(s4V}l9lkaVI^+Cg^ #XqP8H+G43pYk*gqsfyx(qnv0R?gv<,>');
define('SECURE_AUTH_KEY',  '.[]<-Ctzy0$h6?><{K1sq]ROV[rg-i{vID$hwje8x]eaeBhfnXr7e8@XBpEl?J8r');
define('LOGGED_IN_KEY',    'xX`T2K#G(SHsK!{6gOG[4vB%_A~|V;4@2`}S)XZalvMK_K0:R<~k-@T+;>Vv4/Ta');
define('NONCE_KEY',        '4XL;F-]/k9 dZG`C[.-+B@n.N$gudVed7S~l`2q1;9ngN,Ul|H2~4:bAw}!l&?8|');
define('AUTH_SALT',        '&%n!-+HR)OP+gH(+Psy|~E90)MU|Wdi4O&?My<m(Hs&E2@D3|?PunANOs5P/go_G');
define('SECURE_AUTH_SALT', 'd7^.fxC./a%O%uS?%y*z}/#)B &W7aq-3z;-#]A~juMl_k8{WBvV{)B-pEvJ?1Gm');
define('LOGGED_IN_SALT',   'Gk@y__I$gk|^XkhQhVM#Cp[$!if.cEmS!792-?y6*%J%yiof;qgc&R7y]U/pmGiT');
define('NONCE_SALT',       'j)S$K>XJ_h=!Wr/EAM=@4?lw=XdRz)$vFe:3{yD@e6u4:SNWBQ:#&bMI&;N>`t-w');


/**#@-*/
/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
define( 'WP_CACHE', true );
$table_prefix  = 'wp_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie ostrzeżeń
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
// ini_set('display_errors','Off');
// ini_set('error_reporting', E_ALL );
// define('WP_DEBUG', false);
// define('WP_DEBUG_DISPLAY', false);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');
