<?php

function old($value, $default = '')
{
    if (isset($_SESSION['old'][$value])) {
        return $_SESSION['old'][$value];
    }

    return $default;
}