<?php

class Tage extends Model
{
    private $nomBalise;
    protected $table = 'balise';

    public function setnomBalise($nomBalise)
    {
        $this->nomBalise = htmlspecialchars($nomBalise);
    }

    public function ajoutBalise()
    {
        if ($_SESSION['role_id'] == 2) {
            $data = ['idBalise' => null, 'idAdministrateur' => $_SESSION['id'], 'nomTag' => $this->nomBalise];
            return $data;
        }

    }
    public function modiferBalise()
    {
        if ($_SESSION['role_id'] == 2) {
            $data = ['nomTag' => $this->nomBalise];
            return $data;
        }

    }
}


?>