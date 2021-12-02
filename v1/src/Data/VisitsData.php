<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;


class VisitsData {
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllVisit()
    {

        $sql = "SELECT 
                    v.id,v.VisitDate, v.VisitTime, u.FirstName u.LastName, v.Comments
                FROM 
                    Visits v
                JOIN 
                    Users u ON u.id = v.User_id";

        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            $visits = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $visits;
        } else {
            return null;
        }
    }


    public function getVisitByID($id)
    {
        $sql = "SELECT 
                    v.id,v.VisitDate, v.VisitTime, u.FirstName u.LastName, v.Comments
                FROM 
                    Visits v
                JOIN 
                    Users u ON u.id = v.User_id
                WHERE 
                    v.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $visit = $stmt->fetch(PDO::FETCH_ASSOC);
            return $visit;
        }else{
                return null;
            }
    }


    public function addNewVisit($visitaddData)
    {
        $visitDate = $visitaddData['VisitDate'];
        $visitTime = $visitaddData['VisitTime'];
        $user_id = $visitaddData['User_id'];
        $comments = $visitaddData['Comments'];

        $sql = "INSERT INTO Visits
                    (VisitDate,VisitTime,User_id,Comments)
                VALUES
                (?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$visitDate, $visitTime, $user_id, $comments]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updateVisitByID($visitupdateData)
    {
        $visitDate = $visitupdateData['VisitDate'];
        $visitTime = $visitupdateData['VisitTime'];
        $user_id = $visitupdateData['User_id'];
        $comments = $visitupdateData['Comments'];
        $id = $visitupdateData['id'];

        $sql = "UPDATE Visits v
                SET 
                    v.VisitDate = ?,
                    v.VisitTime = ?,
                    v.User_id = ?,
                    v.Comments = ?
                WHERE
                    v.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$visitDate, $visitTime, $user_id, $comments,$id]);
        if($result){
            // exit('success');
            return true;
        }else{
            return false;
        }
    }

    public function deleteVisitByID($id)
    {
        $sql = "DELETE FROM 
                    Visits 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $visit = $stmt->fetch(PDO::FETCH_ASSOC);
            return $visit;
        }else{
                return null;
            }
    }



}

?>