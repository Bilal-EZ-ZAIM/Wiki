<?php


class App
{
    private $controller = 'home';
    private $method;
    public function splitUrl()
    {
        $url = $_GET['url'] ?? 'home';
        $url = explode("/", $url);
        $this->method = $url[0];
        return $url[0];
    }


    public function loadController()
    {
        $url = $this->splitUrl();
        $filename = "../app/controllers/" . ucfirst($url) . "Controller.php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($url);
        } else {
            $filename = "../app/controllers/_404Controller.php";
            require $filename;
            $this->controller = "_404";
        }
        $controller = new $this->controller;

        call_user_func_array([$controller, $this->method], []);
    }


}
?>