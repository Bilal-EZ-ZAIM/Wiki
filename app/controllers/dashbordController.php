<?php
class Dashbord extends Controller
{



    public function dashbord()
    {
        if (isset($_POST['ajoutCategorie'])) {
            $categorie = new Categorie;
            $categorie->setnomCategorie($_POST['nomCategorie']);
            $data = $categorie->ajoutCategorie();
            $categorie->insert($data);
        }
        if (isset($_POST['ajoutBalise'])) {
            $tage = new Tage;
            $tage->setnomBalise($_POST['nomTag']);
            $data = $tage->ajoutBalise();
            $tage->insert($data);
        }
        $this->view('dashbord');
    }



}

?>