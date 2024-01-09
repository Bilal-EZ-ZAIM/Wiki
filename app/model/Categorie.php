<?php

class Categorie extends Model
{
    private $nomCategorie;
    protected $table = 'categorie';

    public function setnomCategorie($nomCategorie)
    {
        $this->nomCategorie = htmlspecialchars($nomCategorie);
    }

    public function ajoutCategorie()
    {
        if ($_SESSION['role_id'] == 2) {
            $data = ['idCategorie' => null, 'idAdministrateur' => $_SESSION['id'], 'nomCategorie' => $this->nomCategorie];
            return $data;
        }

    }
}


?>