<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;


class GendersData {
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllGenders()
    {

        $sql = "SELECT 
                    g.Gender
                FROM 
                    Genders g";

        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            $gender = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $gender;
        } else {
            return null;
        }
    }


   

    public function getGenderByID($id)
    {
        $sql = "SELECT 
                    g.Gender
                FROM 
                    Genders g
                WHERE
                    g.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $gender = $stmt->fetch(PDO::FETCH_ASSOC);
            return $gender;
        }else{
                return null;
            }
    }


    public function addGender($GenderaddData)
    {
        $gender = $GenderaddData['Gender'];
 
   

        $sql = "INSERT INTO Genders
                    (Gender)
                VALUES
                    (?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$gender]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updateGenderByID($genderupdateData)
    {
        $gender = $genderupdateData['Gender'];
        $id = $genderupdateData['id']; 

        $sql = "UPDATE gender p
                SET 
                    g.Gender = ?,
                WHERE
                    g.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$gender,$id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function deleteGenderByID($id)
    {
        $sql = "DELETE FROM 
                    Gender 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $gender = $stmt->fetch(PDO::FETCH_ASSOC);
            return $gender;
        }else{
                return null;
            }
    }



}

?>