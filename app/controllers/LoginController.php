<?php
class Login extends Controller
{

    public function login()
    {

        if (isset($_POST["login"])) {
            $user = new Utilisateur;
            $user->setEmail($_POST['email']);
            $moto_pass = $_POST['mot_de_passe'];
            $user->virefiyMotPass($_POST['mot_de_passe']);
            $data = $user->login();
            
            $mot = $user->where($data);
            show($mot);
            if (count($data) === 1) {
                $user->where($data);
                if(password_verify($moto_pass, $mot[0]->mot_de_passe)){
                    show($mot[0]->mot_de_passe);
                    $_SESSION['id'] = $mot[0]->idUtilisateur ;
                    $_SESSION['role_id'] = $mot[0]->role_id;
                    redirect('home');
                }else{
                    echo"password in valid";
                };
               
                
            }

      

        }




        $this->view('login');

    }



}

?>