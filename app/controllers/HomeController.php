<?php


class Home extends Controller
{



    public function home()
    {
        $user = new Utilisateur;
        $this->view('home');
    }



}

?>