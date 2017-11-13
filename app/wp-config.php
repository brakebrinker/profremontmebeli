<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wmnew_profremontmebeli');

/** Имя пользователя MySQL */
define('DB_USER', 'profremontmebeli_us');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'A2x8P1o2');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';qV,W=-Sp~kYEOB`y$56|n1&Lq8jxK/HCy0L_2fO$T|bma9lJ,*T^FyI;?}@MHJd');
define('SECURE_AUTH_KEY',  '{;ZlYv++IkSTvksRh?A`2_EPQo+vM)JJRH{_Doucn*~!x2E0*bVR8[T$SK&[HJ$I');
define('LOGGED_IN_KEY',    'nt:P$jEcfc0BGoXZ&v|ar3.lA95^1Y4S/D8l.Dq=q%Z>!|0_3Nt R:e)fA&fl9K5');
define('NONCE_KEY',        '|S8dJVpj&5{6p7`T>gpy.h3b)HtsK.AdUZu;X$?HZuL*wP6^EZ>VVIJ*O.1^#9ME');
define('AUTH_SALT',        'LU#<;ml/s+u+bnVU^/-&}uTmX{>zHu1dGE_ltn@7`<IG>VqA-!_I]5;<</]woW!W');
define('SECURE_AUTH_SALT', 'lZOl2nFFf~?qltZ,+^E0qt_mYBF!Lnwe8b+ug(-/C4adYI>falD2-}G-bbMiek-I');
define('LOGGED_IN_SALT',   'c+^6eqpqAD=m<(+3oE!m]t<@iS?GUnPP +uTo>%?DGV=NZx4Xozh}F7aF`@]Z)L@');
define('NONCE_SALT',       '<.u$W/9BF!Z}b/}/S]C*OrU-2$6-yKf{`F{bnS.g4I(UoT_CB4qQk)bp=hw,?%tz');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
