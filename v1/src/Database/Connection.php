<?php

namespace techticsja\Database;
use techticsja\Data\UsersData;
require_once 'v1/src/Data/UsersData.php'; 



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


$conn = new Connection;
$user = new UsersData($conn);

$user->addNewUser(array(
    "Role_id" => '2', 
    "FirstName" => 'Lorenzo', 
    "LastName" =>'Williams', 
    "Gender_id" => '1', 
    "DOB" => '1991-02-12', 
    "Email" => 'Lorenzo_1Williams@hotmail.com', 
    "Phone" => '8763716518', 
    "Address" => 'Portmore, St. Catherine', 
    "Password" => '12345',
    "Avatar_path" => 'uploads/ceo.jpg',
    "Member_since" => '')
);


?>