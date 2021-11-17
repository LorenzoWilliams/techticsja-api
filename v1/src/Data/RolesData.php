<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;


class RolesData {
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllRoles()
    {

        $sql = "SELECT 
                    r.Role 
                FROM 
                    Roles r";
                    
    
        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $roles;
        } else {
            return null;
        }
    }


   

    public function getRoleByID($id)
    {
        $sql = "SELECT 
                    r.Role
                FROM 
                    Roles r 
                WHERE
                    r.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $role = $stmt->fetch(PDO::FETCH_ASSOC);
            return $role;
        }else{
                return null;
            }
    }


    public function addRole($roleaddData)
    {
        $role = $roleaddData['Role'];

        $sql = "INSERT INTO Roles
                    (Role)
                VALUES
                    (?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$role]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updateRoleByID($roleupdateData)
    {
        $role = $roleupdateData['Role'];
        $id = $roleupdateData['id']; 

        $sql = "UPDATE Roles r
                SET 
                    r.Role = ?,
                WHERE
                    r.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$role, $id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function deleteRoleByID($id)
    {
        $sql = "DELETE FROM 
                    Roles 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $role = $stmt->fetch(PDO::FETCH_ASSOC);
            return $role;
        }else{
                return null;
            }
    }

   public function getloginUserByRoleID($id)
    {

        $sql = "SELECT 
                    r.Role, u.Email, u.Password 
                FROM 
                    Users u 
                JOIN 
                    Roles r on r.id = u.Role_id
                WHERE
                    u.Role_id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $roleID = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $roleID;
        }else{
                return null;
            }
    }



}

?>