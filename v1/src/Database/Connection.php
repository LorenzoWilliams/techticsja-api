<?php

namespace techticsja\Database;
use PDO;
use PDOException;

class Connection {
    private $username,
            $password,
            $host,
            $db;

    function __construct()
    {
        
    }

    public function connectParams()
    {
        $this->username = 'root';
        $this->password = '';
        $this->host = 'localhost';
        $this->db ='techticsja_db';
    }

    public function connect()
    {
        $this->connectParams();

        try {
            $conn = new \PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8',$this->username,$this->password);
            return $conn;
        }
        
        catch (PDOException $e){
            echo "An Error has occured to the database".$e->getMessage();
            exit();
        }
    }

}

?>