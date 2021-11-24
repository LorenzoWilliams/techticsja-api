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
                    p.Position
                FROM 
                    Positions p";

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
                    p.Position
                FROM 
                    Positions p
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

        $sql = "INSERT INTO Positions
                    (Position)
                VALUES
                    (?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$position]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updatePositionByID($positionupdateData)
    {
        $position = $positionupdateData['Position'];
        $id = $positionupdateData['id']; 

        $sql = "UPDATE Positions p
                SET 
                    p.Position = ?,
                WHERE
                    p.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$position,$id]);
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