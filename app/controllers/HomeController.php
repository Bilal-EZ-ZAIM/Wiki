<?php


class Home extends Controller
{



    public function home()
    {
        $wiki = new Wiki;
        $category = new Categorie ;
        $categories = $category->findAll();
        $result = $wiki->findAll();
        $data = ['wiki' => $result , 'categories'=> $categories];
        $user = new Utilisateur;
        $this->view('home' , $data);
    }



}

?>