<?php

namespace code\Controllers;

require_once CODE_DIR . '/Models/User.php';

use code\Model\User;
use lib\Request;
use lib\Db;

class Account extends Controller
{
    public function index()
    {
        if (!User::isLogin()) {
            Request::redirect('/login');
        }

        $this->_pars['project_title'] = 'Users | Account';
        $this->_pars['user'] = User::getUser();

        $this->render(CODE_DIR . '/Views/Account/index.php');
    }

    public function update()
    {
        if (!User::isLogin()) {
            Request::redirect('/login');
        }

        $user = User::getUser();

        $fio = Request::getVar('fio');
        if (!$fio) {
            $this->_pars['errors'][] = 'Full name is required';
        }

        $password = Request::getVar('password');
        if ($password) {
            $confirmPassword = Request::getVar('confirm-password');

            if ($password != $confirmPassword) {
                $this->_pars['errors'][] = 'Password mismatch';
            }
        }

        if (isset($this->_pars['errors'])) {
            $_SESSION['errors'] = $this->_pars['errors'];
            Request::redirect('/account');
        }

        $data = [];
        $data['fio'] = $fio;
        if($password) {
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        Db::updateWithArray('users', $user['id'], $data);

        $_SESSION['message'] = 'Successfully';

        Request::redirect('/account');
    }
}