<?php
session_start();

define('ROOT_DIR', dirname(__FILE__) . '/..');
define('CODE_DIR', ROOT_DIR . '/code');
define('LIB_DIR', ROOT_DIR . '/lib');

require_once ROOT_DIR . '/config/config.php';

error_reporting($config['error_level']);
ini_set('display_errors', $config['display_errors']);

require_once LIB_DIR . '/Db.php';
require_once LIB_DIR . '/Request.php';
require_once LIB_DIR . '/helpers.php';
require_once ROOT_DIR . '/routes.php';

