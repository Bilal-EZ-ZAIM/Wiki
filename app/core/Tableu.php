<?php


class TableColumns
{
    use Database;

    private $tableName;
    private $columns;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->fetchColumns();
    }

    private function fetchColumns()
    {
        try {
            $con = $this->connect();

            $query = "DESCRIBE " . $this->tableName;
            $result = $con->query($query);

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $this->columns[] = $row['Field'];
            }

            // إغلاق الاتصال
            $con = null;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getColumns()
    {
        return $this->columns;
    }
}


// طباعة أسماء الأعمدة
echo "Columns in table '$tableName': " . implode(", ", $columns);



?>