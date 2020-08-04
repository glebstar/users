<?php

namespace code\Controllers;

class Page404 extends Controller
{
    public function index()
    {
        $this->render(CODE_DIR . '/Views/Page404/index.php');
    }
}
