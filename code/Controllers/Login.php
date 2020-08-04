<?php

namespace code\Controllers;

require_once CODE_DIR . '/Models/User.php';

use lib\Db;
use lib\Request;
use code\Model\User;

class Login extends Controller
{
    public function index()
    {
        if (User::isLogin()) {
            Request::redirect('/account');
        }

        $this->_pars['project_title'] = 'Users | Login';
        $this->render(CODE_DIR . '/Views/Login/index.php');
    }

    public function login()
    {
        $login = Request::getVar('login');
        if (!$login) {
            $this->_pars['errors'][] = 'Login is required';
        }

        $password = Request::getVar('password');
        if (!$password) {
            $this->_pars['errors'][] = 'Password is required';
        }

        $user = Db::getRow('SELECT * FROM users WHERE login=?', [$login]);
        if (!$user) {
            $this->_pars['errors'][] = 'login or password is incorrect';
        } else {
            if(!password_verify($password, $user['password'])) {
                $this->_pars['errors'][] = 'login or password is incorrect';
            }
        }

        if (isset($this->_pars['errors'])) {
            $_SESSION['errors'] = $this->_pars['errors'];
            Request::redirect('/login');
        }

        $_SESSION['user_id'] = $user['id'];

        Request::redirect('/account');
    }
}