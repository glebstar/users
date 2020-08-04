<?php

namespace code\Controllers;

require_once CODE_DIR . '/Models/User.php';

use code\Model\User;
use lib\Request;
use lib\Db;

class Register extends Controller
{
    public function index()
    {
        if (User::isLogin()) {
            Request::redirect('/account');
        }

        $this->_pars['project_title'] = 'Users | Registration';
        $this->render(CODE_DIR . '/Views/Register/index.php');
    }

    public function register()
    {
        $email = Request::getVar('email');
        if (!$email) {
            $this->_pars['errors'][] = 'Email is required';
        }

        $user = Db::getRow('SELECT * FROM users WHERE email=?', [$email]);
        if ($user) {
            $this->_pars['errors'][] = 'Email already exists';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->_pars['errors'][] = 'Email is incorrect';
        }

        $login = Request::getVar('login');
        if (!$login) {
            $this->_pars['errors'][] = 'Login is required';
        }

        $user = Db::getRow('SELECT * FROM users WHERE login=?', [$login]);
        if ($user) {
            $this->_pars['errors'][] = 'Login already exists';
        }

        $fio = Request::getVar('fio');
        if (!$fio) {
            $this->_pars['errors'][] = 'Full name is required';
        }

        $password = Request::getVar('password');
        if (!$password) {
            $this->_pars['errors'][] = 'Password is required';
        }

        $confirmPassword = Request::getVar('confirm-password');

        if ($password != $confirmPassword) {
            $this->_pars['errors'][] = 'Password mismatch';
        }

        if (isset($this->_pars['errors'])) {
            $_SESSION['errors'] = $this->_pars['errors'];
            Request::redirect('/register');
        }

        User::register([
            'email' => $email,
            'login' => $login,
            'fio' => $fio,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ]);

        Request::redirect('/account');
    }
}