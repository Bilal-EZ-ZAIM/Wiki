<?php

class Model extends Database
{


    public function getTable()
    {
        return $this->table;
    }

    public function dynamicJoin($joinTable, $currentTableColumn, $joinColumn)
    {
        $query = "SELECT * FROM $this->table";
        $query .= " INNER JOIN $joinTable ON $this->table.$currentTableColumn = $joinTable.$joinColumn";

        return $this->query($query);
    }

    public function dynamicMultiJoin($joins)
    {
        $query = "SELECT * FROM $this->table";

        foreach ($joins as $join) {
            $joinTable = $join['table'];
            $currentTableColumn = $join['currentTableColumn'];
            $joinColumn = $join['joinColumn'];

            $query .= " INNER JOIN $joinTable ON $this->table.$currentTableColumn = $joinTable.$joinColumn";
        }

        return $this->query($query);
    }

    public function findAll()
    {
        $query = "SELECT * FROM $this->table";
        return $this->query($query);
    }
    public function getColomn()
    {
        $query = "SHOW COLUMNS FROM $this->table";
        $use = $this->query($query);
        $array = [];
        for ($i = 0; $i < count($use); $i++) {
            array_push($array, $use[$i]->Field);
        }
        return $array;

    }
    public function where($data)
    {
        $query = "SELECT * FROM $this->table WHERE ";
        $conditions = [];

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $conditions[] = "$key = :$key";
            }

            $query .= implode(" AND ", $conditions);
            return $this->query($query, $data);
        } else {
            return [];
        }
    }





    public function insert($data = [])
    {
        $colum = $this->getColomn();

        if (count($colum) !== count($data)) {
            die("Number of columns does not match number of values");
        }

        $columns = implode(", ", $colum);
        $placeholders = ":" . implode(", :", $colum);
        $query = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        
        try {
            $this->query($query, $data);
            return true;
        } catch (PDOException $e) {
            die("Insert failed: " . $e->getMessage());
        }
    }



    public function update($column, $value, $data, $id_column = 'id')
    {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $query .= "`$key` = :$key, ";
        }

        $query = rtrim($query, ', ');

        $query .= " WHERE `$column` = :$column ";


        $data[$column] = $value;

        try {
            $this->query($query, $data);
            return true;
        } catch (PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }


    public function delete($condition, $params = [])
    {
        $query = "DELETE FROM $this->table WHERE $condition";
        show($query);

        try {
            $this->query($query, $params);
            return true;
        } catch (PDOException $e) {
            die("Delete failed: " . $e->getMessage());
        }
    }





}

?>