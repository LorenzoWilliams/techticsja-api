<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;


class Pay_StatusData {
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllPay_Status()
    {

        $sql = "SELECT 
                    p.id,p.Pay_Status
                FROM 
                    Pay_Status p";

        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            $pay_Status = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $pay_Status;
        } else {
            return null;
        }
    }


   

    public function getPay_StatusByID($id)
    {
        $sql = "SELECT 
                    p.Pay_Status
                FROM 
                    Pay_Status p
                WHERE
                    p.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $pay_Status = $stmt->fetch(PDO::FETCH_ASSOC);
            return $pay_Status;
        }else{
                return null;
            }
    }


    public function addPay_Status($pay_StatusaddData)
    {
        $pay_Status = $pay_StatusaddData['Pay_Status'];
 
   

        $sql = "INSERT INTO Pay_Status
                    (Pay_Status)
                VALUES
                    (?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$pay_Status]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updatePay_StatusByID($pay_StatusupdateData)
    {
        $pay_Status = $pay_StatusupdateData['Pay_Status'];
        $id = $pay_StatusupdateData['id']; 

        $sql = "UPDATE Pay_Status p
                SET 
                    p.Pay_Status = ?,
                WHERE
                    p.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$pay_Status,$id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function deletePay_StatusByID($id)
    {
        $sql = "DELETE FROM 
                    Pay_Status 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $pay_Status = $stmt->fetch(PDO::FETCH_ASSOC);
            return $pay_Status;
        }else{
                return null;
            }
    }



}

?>