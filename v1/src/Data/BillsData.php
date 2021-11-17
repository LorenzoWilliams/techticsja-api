<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;

class BillsData{
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllBills()
    {
        $sql = "SELECT
                    b.BillDate, b.Currency, b.Total, r.FirstName as 'Rececptionist FirstName', r.LastName as 'Rececptionist LastName', pa.FirstName as 'Patient FirstName',pa.LastName as 'Patient LastName'
                FROM 
                    Bills b
                JOIN 
                    Users r ON r.id = b.Receptionist_id
                JOIN 
                    Users pa ON pa.id = b.Patient_id";


        $stmt = $this->db->prepare($sql);
        if($stmt->execute())
        {
            $bills = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $bills;
        }else
            {
                return null;
            }

    }


    public function getBillByID($id)
    {
        $sql = "SELECT
                   b.BillDate, b.Currency, b.Total, r.FirstName as 'Rececptionist FirstName', r.LastName as 'Rececptionist LastName', pa.FirstName as 'Patient FirstName',pa.LastName as 'Patient LastName'
                FROM 
                    Bills b
                JOIN 
                    Users r ON r.id = b.Receptionist_id
                JOIN 
                    Users pa ON pa.id = b.Patient_id
                WHERE
                    b.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $bills = $stmt->fetch(PDO::FETCH_ASSOC);
            return $bills;
        }else{
                return null;
            }
    }


    public function addNewBill($billsaddData)
    {
        $billdate = $billsaddData['BillDate'];
        $currency = $billsaddData['Currency'];
        $total= $billsaddData['Total'];
        $receptionist_id = $billsaddData['Receptionist_id'];
        $patient_id = $billsaddData['Patient_id'];
        
        $sql = "INSERT INTO Bills
                    (BillDate,Currency,Total,Receptionist_id,Patient_id)
                VALUES
                    (?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$billdate, $currency, $total, $receptionist_id, $patient_id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function updateBillByID($billupdateData)
    {
        try{
        $billdate = $billupdateData['BillDate'];
        $currency = $billupdateData['Currency'];
        $total= $billupdateData['Total'];
        $receptionist_id = $billupdateData['Receptionist_id'];
        $patient_id = $billupdateData['Patient_id'];
        $id = $billupdateData['id']; 

        $sql = "UPDATE Bills b
                SET 
                    b.BillDate= ?,
                    b.Currency = ?,
                    b.Total = ?,
                    b.Receptionist_id = ?,
                    b.Patient_id = ?
                WHERE
                    b.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$billdate, $currency, $total, $receptionist_id, $patient_id,$id]);        
        if($result){
            // exit('success');
            return true;
        }else{
            return false;
        }
    }
    catch(PDOException $e){
        print_r($e->getMessage());
        exit();
    }
    }


    public function deleteBillByID($id)
    {
        $sql = "DELETE FROM 
                    Bills 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $bills = $stmt->fetch(PDO::FETCH_ASSOC);
            return $bills;
        }else{
                return null;
            }
    }


}

?>