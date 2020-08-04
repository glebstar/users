<?php

namespace code\Controllers;

require_once CODE_DIR . '/Models/User.php';

use code\Model\User;

class Home extends Controller
{
    public function index()
    {
        $this->_pars['project_title'] = 'Users | Home';
        $this->_pars['is_login'] = User::isLogin();
        $this->render(CODE_DIR . '/Views/Home/index.php');
    }
}