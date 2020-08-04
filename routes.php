<?php

require_once LIB_DIR . '/App.php';
require_once CODE_DIR . '/Controllers/Controller.php';

use lib\App;
use lib\Request;

switch ($_SERVER['REQUEST_URI']) {
    case '/';
        require_once CODE_DIR . '/Controllers/Home.php';
        App::run(\code\Controllers\Home::class, 'index');
        break;
    case '/login':
        require_once CODE_DIR . '/Controllers/Login.php';
        App::run(\code\Controllers\Login::class, 'index');
        break;
    case '/login-post':
        require_once CODE_DIR . '/Controllers/Login.php';
        App::run(\code\Controllers\Login::class, 'login');
        break;
    case '/register':
        require_once CODE_DIR . '/Controllers/Register.php';
        App::run(\code\Controllers\Register::class, 'index');
        break;
    case '/register-post':
        require_once CODE_DIR . '/Controllers/Register.php';
        App::run(\code\Controllers\Register::class, 'register');
        break;
    case '/logout':
        unset($_SESSION['user_id']);
        Request::redirect('/login');
        break;
    default:
        require_once CODE_DIR . '/Controllers/Page404.php';
        App::run(\code\Controllers\Page404::class, 'index');
        break;
}