<?php

namespace code\Controllers;

class Controller
{
    protected $_pars = [
        'project_title' => 'Users',
    ];

    public function run($method)
    {
        if (isset($_SESSION['errors'])) {
            $this->_pars['errors'] = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }

        if (!empty($_REQUEST)) {
            $_SESSION['old'] = $_REQUEST;
        }

        $this->$method();
    }

    protected function render($view)
    {
        require_once CODE_DIR . '/Views/Layouts/main.php';
    }
}