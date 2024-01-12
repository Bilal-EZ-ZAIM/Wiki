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
       
            $data = ['idWiki' => null, 'titre' => $this->titre , 'contenu' => $this->contenu , 'dateCreation' => $this->dateCreation, 'auteurID' =>  $_SESSION['id'] , 'categorie' => $this->categorie , 'balise' => $this->balise , 'is_archived'=>0];
            return $data;
        

    }
    public function modiferWiki()
    {
            $data = ['titre' => $this->titre ,  'contenu' => $this->contenu];
            return $data;
    
    }
}


?>