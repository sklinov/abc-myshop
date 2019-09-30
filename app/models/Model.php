<?php

namespace app\models;
use PDO;

class Model
{
    protected $conn;

    public function __construct($db) 
    {
        $this->conn = $db;
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