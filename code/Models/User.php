<?php

namespace code\Model;

use lib\Db;

class User
{
    public static function isLogin()
    {
        if(isset($_SESSION['user_id'])) {
            return true;
        }

        return false;
    }

    public static function register($data)
    {
        Db::insertArray('users', $data);
        $user = Db::getRow('SELECT * FROM users WHERE email=?', [$data['email']]);

        $_SESSION['user_id'] = $user['id'];

        return $user;
    }
}