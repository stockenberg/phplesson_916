<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:03
 */

/**
 * Common paths
 */
define('BASE_PATH', __DIR__ . "/");
define('ASSETS', __DIR__ . '/assets/');
define('PAGES', __DIR__ . '/pages/');
define('CLASSES', __DIR__ . '/classes/');

/**
 * DB Environment
 */
define('DSN', 'mysql:host=localhost;dbname=CHANGEME');
define('DBUSER', 'CHANGEME');
define('DBPASS', 'CHANGEME');

/**
 * Rights Definition
 */
define('ADMIN', 1);
define('AUTHOR', 2);
define('USER', 3);