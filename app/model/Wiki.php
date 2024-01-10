<?php

class Wiki extends Model
{
    private $titre;
    private $contenu;
    private $dateCreation;
    private $categorie;
    private $balise;
    protected $table = 'Wiki';

    public function settitre($titre)
    {
        $this->titre = htmlspecialchars($titre);
    }
    public function setcontenu($contenu)
    {
        $this->contenu = htmlspecialchars($contenu);
    }
    public function setdateCreation($dateCreation)
    {
        $this->dateCreation = htmlspecialchars($dateCreation);
    }
    public function setcategorie($categorie)
    {
        $this->categorie = htmlspecialchars($categorie);
    }
    public function setbalise($balise)
    {
        $this->balise = htmlspecialchars($balise);
    }


    public function ajoutWiki()
    {
       
            $data = ['idWiki' => null, 'titre' => $this->titre , 'contenu' => $this->contenu , 'dateCreation' => 'CURRENT_DATE', 'auteurID' =>  $_SESSION['id'] , 'categorieID' => $this->categorie , 'baliseID' => $this->balise];
            return $data;
        

    }
    // public function modiferCategorie()
    // {
    //     if ($_SESSION['role_id'] == 2) {
    //         $data = [ 'nomCategorie' => $this->nomCategorie];
    //         return $data;
    //     }

    // }
}


?>