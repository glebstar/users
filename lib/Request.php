<?php

namespace lib;

class Request
{
    public static function redirect($uri)
    {
        header("Location: " . $uri);
        exit;
    }

    public static function redirect301($uri)
    {
        header( "HTTP/1.1 301 Moved Permanently" );
        Header( "location: " . $uri );
        exit;
    }

    public static function getVar($name, $default = null, $htmlspec=true)
    {
        $res = null;
        if (isset($_REQUEST[$name]))
            $res = @$_REQUEST[$name];
        else
            return $default;
        if ( $htmlspec ) {
            $res = str_replace('\\', "&#92;", htmlspecialchars($res));
        }
        return trim($res);
    }
}