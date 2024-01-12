<?php


class Getedata extends Controller
{
    




    public function getedata()
    {
        $wiki = new Categorie;
        $result = $wiki->findAll();
        $this->view('getedata',$result);
    }



}

?>