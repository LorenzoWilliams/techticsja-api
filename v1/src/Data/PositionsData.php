<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;

class PositionsData {
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllPositions()
    {

        $sql = "SELECT 
                    p.Position, u.FirstName, u.LastName 
                FROM 
                    Positions p 
                JOIN 
                    Users u on u.id = p.User_id";

        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            $positions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $positions;
        } else {
            return null;
        }
    }


   

    public function getPositionByID($id)
    {
        $sql = "SELECT 
                    p.Position, u.FirstName, u.LastName 
                FROM 
                    Positions p 
                JOIN 
                    Users u on u.id = p.User_id
                WHERE
                    p.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $position = $stmt->fetch(PDO::FETCH_ASSOC);
            return $position;
        }else{
                return null;
            }
    }


    public function addPosition($positionaddData)
    {
        $position = $positionaddData['Position'];
        $user = $positionaddData['User_id'];
   

        $sql = "INSERT INTO Positions
                    (Position,User_id)
                VALUES
                    (?,?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$position, $user]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updatePositionByID($positionupdateData)
    {
        $position = $positionupdateData['Position'];
        $user = $positionupdateData['User_id'];
        $id = $positionupdateData['id']; 

        $sql = "UPDATE Positions p
                SET 
                    p.Position = ?,
                    p.User_id = ?,
                WHERE
                    p.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$position, $user,$id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function deletePositionByID($id)
    {
        $sql = "DELETE FROM 
                    Positions 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $position = $stmt->fetch(PDO::FETCH_ASSOC);
            return $position;
        }else{
                return null;
            }
    }



}

?>