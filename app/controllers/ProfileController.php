<?php
class Profile extends Controller
{

    public function Profile()
    {






        
        if ($_SESSION['id'] != null) {
            $user = new Utilisateur;
            if(isset($_POST['logout'])){
                $user->logout();
                redirect('home');
            }
           $data =  $user->where(["idUtilisateur"=> $_SESSION['id']]);
            $this->view('profile',$data);
        }
        if ($_SESSION['id'] == null) {
          
           redirect('home');
        }


    }



}

?>