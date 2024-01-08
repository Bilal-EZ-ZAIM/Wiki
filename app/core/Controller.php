<?php

class Controller
{
    public function view($name, $data = [] , $input = [])
    {
        $filename = "../app/views/" . $name . ".php";

        if (file_exists($filename)) {
            extract($data);
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }
}
