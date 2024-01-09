<?php
class Signup extends Controller
{

    public function Signup()
    {

        if(isset($_POST["submit"])){
            $user = new Utilisateur;
            $user->setNom($_POST['nom']);
            $user->setEmail($_POST['email']);
            $user->setPrenom($_POST['prenom']);
            $user->setMotDePasse($_POST['mot_de_passe']);
            $user->setroleId($_POST['user_type']);
            show($_POST['user_type']);
            $checkEmail = $user->login();
            $validEmail = $user->where($checkEmail);
            if(!count($validEmail)){
                $data =  $user->regester();          
                $user->insert($data);
                show($data);
                redirect("login");
            }else{
                echo('email in valid');
            }
            
        }
        $this->view('Signup');
    }

   

}

?>