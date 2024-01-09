<?php

class Database {
    private function connect(){
        try {
            $string = "mysql:host=".DBHOST.";dbname=".DBNAME;
            $con = new PDO($string, DBUSER, DBPASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    public function query($query, $data = [])
{
    try {
        $con = $this->connect();
        $stm = $con->prepare($query);
        $stm->execute($data);
        if (strpos(strtoupper($query), 'INSERT') !== false) {
            return true;
        }

        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return is_array($result) ? $result : [];
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}

    public function get_row($query, $data = []){
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $stm->execute($data);

            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result) > 0){
                return $result[0];
            } else {
                return [];
            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
}






?>




