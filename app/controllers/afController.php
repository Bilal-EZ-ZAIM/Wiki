<?php


class Af extends Controller
{



    public function af()
    {
        $wiki = new Wiki;
        $result = $wiki->findAll();
        $user = new Utilisateur;
        $this->view('af' , $result);
    }



}

?>