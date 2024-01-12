<?php


class Ditalise extends Controller
{



    public function ditalise()
    {
        $wiki = new Wiki;

        $result = $wiki->dynamicJoin("utilisateur","auteurID","idUtilisateur",$_GET['id']);
        
        if($_SESSION['role_id'] == 2){
            $this->view('ditalise' , $result);
            return false;
        }
        if($result[0]->is_archived == 1){
            $this->view('ditalise' , $result);
        }else{
            Functions::redirect('home');
        }
       
    }



}

?>