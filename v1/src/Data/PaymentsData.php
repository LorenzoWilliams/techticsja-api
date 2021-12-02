<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;


class PaymentsData {
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllPayments()
    {
        $sql = "SELECT 
                    p.id,p.bill_id,p.Pay_Status
                FROM 
                    Payments p 
                JOIN 
                    Bills b on b.id = p.bill_id";

        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $payments;
        } else {
            return null;
        }
    }


   
    public function getPaymentByID($id)
    {
        $sql =  "SELECT p.bill_id,p.Pay_Status
                 FROM Payments p
                 JOIN Bills b on b.id = p.bill_id
                 WHERE p.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $payments = $stmt->fetch(PDO::FETCH_ASSOC);
            return $payments;
        }else{
                return null;
            }
    }


    public function addPayments($paymentaddData)
    {
        $bill_id = $paymentaddData['bill_id'];
        $pay_status = $paymentaddData['Pay_Status'];
   

        $sql = "INSERT INTO Payments
                    (bill_id,Pay_Status)
                VALUES
                    (?,?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$bill_id, $pay_status]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updatePaymentsByID($paymentupdateData)
    {
        $bill_id = $paymentupdateData['bill_id'];
        $pay_status = $paymentupdateData['Pay_Status'];
        $id = $paymentupdateData['id']; 

        $sql = "UPDATE Payments p
                SET 
                    p.bill_id = ?,
                    p.Pay_Status = ?,
                WHERE
                    p.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$bill_id, $pay_status,$id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function deletePaymentsByID($id)
    {
        $sql = "DELETE FROM 
                    Payments 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $payments = $stmt->fetch(PDO::FETCH_ASSOC);
            return $payments;
        }else{
                return null;
            }
    }



}

?>