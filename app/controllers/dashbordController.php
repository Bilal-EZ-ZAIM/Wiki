<?php
class Dashbord extends Controller
{



    public function dashbord()
    {
        $categorie = new Categorie;
        $tage = new Tage;
        $wiki = new Wiki;
        $utilisateur = new Utilisateur;
        $utilisateurs = $utilisateur->findAll();
        $wikis = $wiki->findAll();
        $categori = $categorie->findAll();
        $tag = $tage->findAll();
        $datas = ['categori' => $categori, 'tag' => $tag, 'wiki' => $wikis  , 'utilisateurs' => $utilisateurs];
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
            Functions::redirect('dashbord');
        }
        if (isset($_POST['suppremerCategory'])) {
            $condition = "idCategorie = :idCategorie";
            $params = ["idCategorie" => $_POST['idSupCategoey']];
            $categorie->delete($condition, $params);
            Functions::redirect('dashbord');
        }
        if (isset($_POST['ajoutBalise'])) {
            $tage->setnomBalise($_POST['nomTag']);
            $data = $tage->ajoutBalise();
            $tage->insert($data);
            Functions::redirect('dashbord');
        }
        if (isset($_POST['balises'])) {
            $tage->setnomBalise($_POST['ModifernomTag']);
            $conditionValue = $_POST['idBalise'];
            $conditionColumn = 'idBalise';
            $dataModifer = $tage->modiferBalise();
            $tage->update($conditionColumn, $conditionValue, $dataModifer);
            Functions::redirect('dashbord');
        }
        if (isset($_POST['suppremerTage'])) {
            $condition = "idBalise = :idBalise";
            $params = ["idBalise" => $_POST['idSupTage']];
            $tage->delete($condition, $params);
            Functions::redirect('dashbord');
        }
        if (isset($_POST['ModiferPrivet'])) {
            $conditionValue = $_POST['is_archived'];
            $conditionColumn = 'idWiki';
            $wiki->update($conditionColumn, $conditionValue, ['is_archived' => 0]);
            Functions::redirect('dashbord');
        }
        if (isset($_POST['ModifePublic'])) {
            $conditionValue = $_POST['is_archived'];
            $conditionColumn = 'idWiki';
            $wiki->update($conditionColumn, $conditionValue, ['is_archived' => 1]);
            Functions::redirect('dashbord');
        }
        if ($_SESSION['role_id'] == 2) {
            $this->view('dashbord', $datas);
        } else {
            Functions::redirect('home');
        }

    }



}

?>