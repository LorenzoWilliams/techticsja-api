<?php

namespace techticsja\Database;
/* use techticsja\Data\AppointmentsData;
use techticsja\Data\GendersData;
use techticsja\Data\InvoicesData;
use techticsja\Data\PaymentsData;
use techticsja\Data\Pay_StatusData;
use techticsja\Data\ProductsData;
use techticsja\Data\RolesData;
use techticsja\Data\UsersData;
use techticsja\Data\VisitsData; */



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

/* require_once 'AppointmentsData.php';
require_once 'GendersData.php';
require_once 'InvoicesData.php';
require_once 'PaymentsData.php';
require_once 'PayStatusData.php';
require_once 'ProductsData.php';
require_once 'RolesData.php';
require_once 'UsersData.php';
require_once 'VisitsData.php'; */

/* $appointment = new AppointmentsData($pdo);
$gender = new GendersData($pdo);
$invoice = new InvoicesData($pdo);
$payment = new PaymentsData($pdo);
$pay_status = new Pay_StatusData($pdo);
$product = new ProductsData($pdo);
$role = new RolesData($pdo);
$user = new UsersData($pdo);
$visit = new VisitsData($pdo);
 */

?>