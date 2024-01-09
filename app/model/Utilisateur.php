<?php

class Utilisateur extends Model
{

    protected $nom;
    protected $prenom;
    protected $email;
    protected $mot_de_passe;
    protected $role_id;
    protected $virefiyMotPass;
    protected $table = 'utilisateur';


    public function setNom($nom)
    {
        $this->nom = htmlspecialchars($nom);
    }

    public function setPrenom($prenom)
    {
        $this->prenom = htmlspecialchars($prenom);
    }

    public function setEmail($email)
    {
        if (filter_var($email , FILTER_VALIDATE_EMAIL)) {
            $this->email = htmlspecialchars($email);
        }
        $this->email = htmlspecialchars($email);
    }
    

    public function setMotDePasse($mot_de_passe)
    {
        $hashedPassword = password_hash(htmlspecialchars($mot_de_passe), PASSWORD_DEFAULT);
        $this->mot_de_passe = $hashedPassword ;
    }
    public function virefiyMotPass($virefiyMotPass)
    {
        $this->$virefiyMotPass =  password_verify($virefiyMotPass, $virefiyMotPass);
        $this->mot_de_passe = $virefiyMotPass;
        $data = ['mot_de_passe' => $this->virefiyMotPass];
        return $data;

    }


    public function setroleId($role_id)
    {
        $this->role_id = $role_id;
    }

    public function regester()
    {
        $data = ['idUtilisateur' => null, 'prenom' => $this->prenom, 'nom' => $this->nom, 'email' => $this->email, "mot_de_passe" => $this->mot_de_passe, 'role_id' => $this->role_id];
        return $data;
    }

    public function login()
    {
        $data = ['email' => $this->email];
        return $data;
    }
    public function logout(){
        $_SESSION['id'] = null;
        $_SESSION['role_id'] = null;
        
    }

}

