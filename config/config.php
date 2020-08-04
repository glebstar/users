<?php

$config = [
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'database' => 'users',
        'username' => '*',
        'password' => '*',
    ],
    'error_level'           => E_ALL,
    'display_errors'        => 'Off',
    'script_version'        => 5,
];

if (file_exists(ROOT_DIR . '/config/config.local.php')) {
    require_once ROOT_DIR . '/config/config.local.php';
}