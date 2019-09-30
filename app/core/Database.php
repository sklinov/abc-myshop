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
            // $config_file = $_SERVER['DOCUMENT_ROOT'].PROJECT_SUBFOLDER.'/app/core/config.php';
            // if(file_exists($config_file))
            // {
            //     require_once $config_file;
            // }
            // else
            // {
            //     echo '<br>Configuration file not found';
            //     exit();
            // }
            $host = "localhost";
            $db_name = "myshop";
            $username = "myshop";
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
