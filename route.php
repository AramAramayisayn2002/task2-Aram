<?php
class Route
{
    private $controller = 'IndexController';
    private $method = 'index';
    private $resource;
    public function __construct()
    {
        $dir = 'controllers/';
        $url = $_SERVER['REQUEST_URI'];
        if (stripos($url , '?')) {
            $url = explode('?', $url);
            $this->resource = ($url[1]);
            $url = $url[0];
        }
        $url = $this->getUrl($url);
        if (!empty($url[0])) {
            if ($url[0] == 'admin') {
                $dir = 'controllers/admin/';
                array_splice($url, 0, 1);
            }
            if (isset($url[0]) && $url[0] !== '') {
                $this->controller = ucfirst($url[0]) . 'Controller';
                if (isset($url[1]) && $url[1] !== '') {
                    $this->method = $url[1];
                }
            }
            if (file_exists($dir . $this->controller . '.php')) {
                $this->controller = ucfirst($url[0]) . 'Controller';
                require_controller($dir, $this->controller);
                $this->controller = new $this->controller;
                if (!method_exists($this->controller, $this->method)) {
                    redirect('error');
                }
            } else {
                redirect('error');
            }
        } else {
            require $dir .  $this -> controller . '.php';
            $this->controller = new $this->controller;
        }
        call_user_func([$this->controller, $this->method] , $this -> resource);
    }
    public function getUrl($url)
    {
        $url = explode('/', $url);
        unset($url[0]);
        unset($url[1]);
        unset($url[2]);
        $url = array_values($url);
        return $url;
    }
}