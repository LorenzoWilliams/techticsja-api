<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;

class ProductsData {
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllProducts()
    {

        $sql = "SELECT 
                    p.id,p.Product
                FROM 
                    Products p";

        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        } else {
            return null;
        }
    }



    public function getProductByID($id)
    {
        $sql = "SELECT 
                    p.Product
                FROM 
                    Products p
                WHERE
                    p.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product;
        }else{
                return null;
            }
    }


    public function addProduct($productaddData)
    {
        $product = $productaddData['Product'];

        $sql = "INSERT INTO Products
                    (Product)
                VALUES
                    (?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$product]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updateProductByID($productupdateData)
    {
        $product = $productupdateData['Product'];
        $id = $productupdateData['id']; 

        $sql = "UPDATE Products p
                SET 
                    p.Product = ?,
                WHERE
                    p.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$product,$id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function deleteProductByID($id)
    {
        $sql = "DELETE FROM 
                    Products 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product;
        }else{
                return null;
            }
    }



}

?>