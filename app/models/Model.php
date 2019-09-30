<?php

namespace app\models;
use PDO;

class Model
{
    protected $conn;
    private $list;

    public function __construct() 
    {
        $database = new \app\core\Database();
        $this->conn = $database->connect();;
    }

    protected function doQuery($query) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        }
        catch(PDOException $e) {
            echo 'Error:'. $e->getMessage();
        } 
        return $stmt;
    }


}