<?php
function require_controller($dir, $controller)
{
    require_once $dir . $controller . '.php';
}
function redirect($url)
{
    header('location:' . DOM . $url);
    return true;
}