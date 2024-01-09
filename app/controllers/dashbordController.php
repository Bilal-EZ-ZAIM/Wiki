<?php
class Dashbord extends Controller
{



    public function dashbord()
    {
        $categorie = new Categorie;
        $tage = new Tage;
        $categori = $categorie->findAll();
        $tag = $tage->findAll();
        $data = ['categori' => $categori, 'tag' => $tag];
        if (isset($_POST['ajoutCategorie'])) {

            $categorie->setnomCategorie($_POST['nomCategorie']);
            $data = $categorie->ajoutCategorie();
            $categorie->insert($data);
        }
        if (isset($_POST['ModiferCategory'])) {
            $categorie->setnomCategorie($_POST['neaveCategory']);
            $conditionValue = $_POST['idCategoey'];
            $conditionColumn = 'idCategorie';
            $dataModifer = $categorie->modiferCategorie();
            $categorie->update($conditionColumn, $conditionValue, $dataModifer);
            redirect('dashbord');
        }
        if (isset($_POST['suppremerCategory'])) {
            $conditionValue = $_POST['idSupCategoey'];
            $condition = "idCategorie = :idCategorie";
            $params = ["idCategorie" => $_POST['idSupCategoey']];
            $categorie->delete($condition, $params);
            redirect('dashbord');
        }
        if (isset($_POST['ajoutBalise'])) {
            $tage->setnomBalise($_POST['nomTag']);
            $data = $tage->ajoutBalise();
            $tage->insert($data);
        }
        if (isset($_POST['ModifernomTag'])) {
            $tage->setnomBalise($_POST['ModifernomTag']);
            $conditionValue = $_POST['idBalise'];
            $conditionColumn = 'idBalise';
            $dataModifer = $tage->modiferBalise();
            $tage->update($conditionColumn, $conditionValue, $dataModifer);
            redirect('dashbord');
        }
        if (isset($_POST['suppremerTage'])) {
            $condition = "idBalise = :idBalise";
            $params = ["idBalise" => $_POST['idSupTage']];
            $tage->delete($condition, $params);
            redirect('dashbord');
        }
        $this->view('dashbord', $data);
    }



}

?>