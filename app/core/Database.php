<?php
   namespace app\core;
   use PDO;

    class Database {
        private $host;
        private $db_name;
        private $username;
        private $password;
        private $conn;
        
        public function connect() 
        { 
            $host = "localhost";
            $db_name = "sklinov";
            $username = "myshopsklinovpro";
            $password = "ved4o1zLhX59T8rj";

            $this->host = $host;
            $this->db_name = $db_name;
            $this->username = $username;
            $this->password = $password;
            $this->conn = null;

            try 
            {
                
                $this->conn = new PDO('mysql:host='.$this->host.';
                                       dbname='.$this->db_name,
                                       $this->username, 
                                       $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
            catch(PDOException $e) 
            {
                echo 'Connection error:'. $e->getMessage();
            }
            return $this->conn;
        }
        
    }
