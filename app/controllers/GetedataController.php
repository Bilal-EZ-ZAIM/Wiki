<?php


class Getedata extends Controller
{
    




    public function getedata()
    {
        $wiki = new Wiki;
        $result = $wiki->findAll();
        $this->view('getedata');
    }



}

?>