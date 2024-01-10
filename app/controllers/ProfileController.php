<?php
class Profile extends Controller
{

    public function Profile()
    {
        $categorie = new Categorie;
        $tage = new Tage;
        $tages = $tage->findAll();
        $categories = $categorie->findAll();
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
            $this->view('profile', $data);
        }
        if(isset($_POST['ajoutWiki'])){
            $wiki = new Wiki;
            $wiki->settitre($_POST['nomTiter']);
            $wiki->setcontenu($_POST['nomCountent']);
            $wiki->setcategorie($_POST['categorie']);
            $wiki->setbalise($_POST['tage']);
            $data = $wiki->ajoutWiki();
            $wiki->insert($data);
        }
        if ($_SESSION['id'] == null) {
            redirect('home');
        }

    }



}

?>