<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;

class InvoicesData{
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllInvoices()
    {
        $sql = "SELECT
                   i.InvoiceDate, i.Currency, b.Total,  u.FirstName, u.LastName
                FROM 
                    Invoices i
                JOIN 
                    Users u ON u.id = i.User_id";


        $stmt = $this->db->prepare($sql);
        if($stmt->execute())
        {
            $invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $invoices;
        }else
            {
                return null;
            }

    }


    public function getInvoiceByID($id)
    {
        $sql = "SELECT
                   i.InvoiceDate, i.Currency, b.Total,  u.FirstName, u.LastName
                FROM 
                    Invoices i
                JOIN 
                    Users u ON u.id = i.User_id
                WHERE
                    i.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $invoices = $stmt->fetch(PDO::FETCH_ASSOC);
            return $invoices;
        }else{
                return null;
            }
    }


    public function addNewInvoice($invoicesaddData)
    {
        $invoicedate = $invoicesaddData['InvoiceDate'];
        $currency = $invoicesaddData['Currency'];
        $total= $invoicesaddData['Total'];
        $user_id = $invoicesaddData['User_id'];
        
        $sql = "INSERT INTO Invoices
                    (InvoiceDate,Currency,Total,User_id)
                VALUES
                    (?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$invoicedate, $currency, $total, $user_id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function updateInvoiceByID($invoiceupdateData)
    {
        try{
        $invoicedate = $invoiceupdateData['InvoiceDate'];
        $currency = $invoiceupdateData['Currency'];
        $total= $invoiceupdateData['Total'];
        $user_id = $invoiceupdateData['User_id'];
        $id = $invoiceupdateData['id']; 

        $sql = "UPDATE Invoices i
                SET 
                    i.InvoiceDate= ?,
                    i.Currency = ?,
                    i.Total = ?,
                    i.User_id = ?
                WHERE
                    i.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$invoicedate, $currency, $total, $user_id,$id]);        
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


    public function deleteInvoiceByID($id)
    {
        $sql = "DELETE FROM 
                    Invoices 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $invoices = $stmt->fetch(PDO::FETCH_ASSOC);
            return $invoices;
        }else{
                return null;
            }
    }


}

?>