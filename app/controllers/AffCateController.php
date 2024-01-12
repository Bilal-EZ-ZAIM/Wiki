<?php


class AffCate extends Controller
{



    public function AffCate()
    {
        $category = new Categorie;
        $result = $category->findAll();
        $this->view('AffCate' , $result);
    }



}

?>