<?php
class Profile extends Controller
{

    public function Profile()
    {
        $categorie = new Categorie;
        $tage = new Tage;
        $wiki = new Wiki;
        $tages = $tage->findAll();
        $wikis = $wiki->where(['auteurID' => $_SESSION['id']]);


        $categories = $categorie->findAll();

        if (isset($_POST['ajoutWiki'])) {

            $wiki->settitre($_POST['nomTiter']);
            $wiki->setcontenu($_POST['nomCountent']);
            $wiki->setcategorie($_POST['categorie']);
            $wiki->setbalise($_POST['tage']);
            $wiki->setdateCreation(date('Y-m-d'));
            $data = $wiki->ajoutWiki();
            $wiki->insert($data);
            redirect('profile');
        }
        if (isset($_POST['supprimerWiki'])) {
            $condition = "idWiki = :idWiki";
            $params = ["idWiki" => $_POST['idSupwiki']];
            $wiki->delete($condition, $params);
            redirect('profile');
        }
        if (isset($_POST['ModiferWiki'])) {
            $wiki->settitre($_POST['modiferTitre']);
            $wiki->setcontenu($_POST['modiferCountent']);
            $conditionValue = $_POST['idWiki'];
            $conditionColumn = 'idWiki';
            $dataModifer = $wiki->modiferWiki();
            show($dataModifer);
            $wiki->update($conditionColumn, $conditionValue, $dataModifer);
            redirect('profile');
        }
        if ($_SESSION['id'] != null) {
            $user = new Utilisateur;
            if (isset($_POST['logout'])) {
                $user->logout();
                redirect('home');
            }
            $profile = $user->where(["idUtilisateur" => $_SESSION['id']]);
            $data = [];
            $data['profile'] = $profile;
            $data['tages'] = $tages;
            $data['categories'] = $categories;
            $data['wiki'] = $wikis;
            $this->view('profile', $data);
        }

        if ($_SESSION['id'] == null) {
            redirect('home');
        }

    }



}

?>