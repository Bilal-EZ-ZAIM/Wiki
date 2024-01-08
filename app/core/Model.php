<?php

trait Model
{
    use Database;
    // protected $table = 'utilisateurs';
    protected $limit = 5;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "id";

    public function findAll()
    {
        $query = "SELECT * FROM $this->table ";
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

        // Check if $data is not empty
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $conditions[] = "$key = :$key";
            }

            $query .= implode(" AND ", $conditions);
            return $this->query($query, $data);
        } else {
            // If $data is empty, return an empty result set or handle it as needed
            return [];
        }
    }


    public function login($data)
    {
        $query = "SELECT * FROM $this->table WHERE email = :email ";

        return $this->query($query, $data);
    }


    // public function where($data, $data_not = [])
    // {

    //     $query = "SELECT * FROM $this->table WHERE ";
    //     $conditions = [];

    //     foreach ($data as $key => $value) {
    //         $conditions[] = "$key = :$key";
    //     }

    //     foreach ($data_not as $key => $value) {
    //         $conditions[] = "$key != :$key";
    //     }

    //     $query .= implode(" AND ", $conditions);
    //     $query .= "ORDER BY $this->order_column  LIMIT $this->limit OFFSET $this->offset ";

    //     $mergedData = array_merge($data, $data_not);

    //     return $this->query($query, $mergedData);
    // }

    // Implement other CRUD methods (insert, update, delete, first) as needed
    public function first($data, $data_not = [])
    {
        $query = "SELECT * FROM $this->table WHERE ";
        $conditions = [];

        foreach ($data as $key => $value) {
            $conditions[] = "$key = :$key";
        }

        foreach ($data_not as $key => $value) {
            $conditions[] = "$key != :$key";
        }

        $query .= implode(" AND ", $conditions);

        if ($this->limit !== null && $this->offset !== null) {
            $query .= " LIMIT :limit OFFSET :offset ";
        }

        $mergedData = array_merge($data, $data_not);

        // Bind LIMIT and OFFSET values separately
        $mergedData['limit'] = $this->limit;
        $mergedData['offset'] = $this->offset;

        $result = $this->query($query, $mergedData);

        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }


    // public function insert($data)
    // {
    //     $keys = array_keys($data);
    //     $query = "INSERT INTO $this->table (" . implode(", ", $keys) . ") VALUES (:" . implode(", :", $keys) . ") ";


    //     try {
    //         $this->query($query, $data);
    //         return true;
    //     } catch (PDOException $e) {
    //         die("Insert failed: " . $e->getMessage());
    //     }
    // }
    public function insert($data = [])
    {
        $colum = $this->getColomn();

        // Check if the number of columns and values match
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

    // public function test($data = [])
    // {
    //     $qz = $this->getColomn();
    //     $query = "INSERT INTO $this->table (" . implode(", ", $qz) . ") VALUES (:" . implode(", :", $data) . ") ";



    //     // $query = "INSERT INTO $this->table" . " ( `  " . implode(' ` , ` ', $qz) . " ` )  " . " VALUES " . ' (:"  ' . implode(' " , :" ', $data) . ' " )  ';
    //     try {
    //         $this->query($query, $data);
    //         return true;
    //     } catch (PDOException $e) {
    //         die("Insert failed: " . $e->getMessage());
    //     }
    // }

    // public function insert($data)
    // {
    //     $keys = array_keys($data);
    //     $query = "INSERT INTO $this->table (" . implode(" , ", $keys) . ") VALUES(:" . implode(" , :", $keys) . ") ";
    //     echo $query;
    //     $this->query($query, $data);
    //     return false;
    // }

    public function update($id, $data, $id_column = 'id')
    {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $query .= "`$key` = :$key, ";
        }

        $query = rtrim($query, ', ');

        $query .= " WHERE `$id_column` = :$id_column ";

        $data[$id_column] = $id;

        try {
            $this->query($query, $data);
            return true; // Update successful
        } catch (PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }

    public function delete($id_column, $id = 'id')
    {
        $data[$id] = $id_column;
        $query = "DELETE FROM $this->table WHERE $id = :$id ";

        try {
            $this->query($query, $data);
            show($data);
            return true;
        } catch (PDOException $e) {
            die("Delete failed: " . $e->getMessage());
        }
    }



}

?>





