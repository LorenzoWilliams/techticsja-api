<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;


class UsersData {
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllUsers()
    { 
        $sql = "SELECT 
                    u.id,r.Roles, u.FirstName, u.LastName, u.DOB, g.Gender, u.DOB, u.Email, u.Phone, u.Address, u.Password, u.avatar_path
                FROM 
                    Users u 
                JOIN 
                    Genders g on g.id = u.Gender_id
                JOIN 
                    Roles r on r.id = u.Role_id";

        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } else {
            return null;
        }
    }

    public function getUserByID($id)
    {
        $sql = "SELECT 
                    r.Roles, u.FirstName, u.LastName, u.DOB, g.Gender, u.DOB, u.Email, u.Phone, u.Address, u.Password, u.avatar_path
                FROM 
                    Users u 
                JOIN 
                    Genders g on g.id = u.Gender_id
                JOIN 
                    Roles r on r.id = u.Role_id
                WHERE
                    u.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }else{
                return null;
            }
    }


    public function addNewUser($UseraddData)
    {
        $role = $UseraddData['Role_id'];
        $firstname = $UseraddData['FirstName'];
        $lastname = $UseraddData['LastName'];
        $gender = $UseraddData['Gender_id'];
        $DOB = $UseraddData['DOB'];
        $email = $UseraddData['Email'];
        $phone =$UseraddData['Phone'];
        $address = $UseraddData['Address'];
        $password = md5($UseraddData['Password']);
        $avatar_path = $UseraddData['Avatar_path'];
        
        $sql = "INSERT INTO 
                    Users(Role_id,FirstName,LastName,Gender_id,DOB,Email,Phone,Address,Password,Avatar_Path)
                VALUES
                    (?,?,?,?,?,?,?,?,?,?)";
            
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$role, $firstname, $lastname, $gender, $DOB, $email, $phone, $address, $password, $avatar_path]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function updateUserByID($UserupdateData)
    {
        $role = $UserupdateData['Role_id'];
        $firstname = $UserupdateData['FirstName'];
        $lastname = $UserupdateData['LastName'];
        $gender = $UserupdateData['Gender_id'];
        $DOB = $UserupdateData['DOB'];
        $email = $UserupdateData['Email'];
        $phone = $UserupdateData['Phone'];
        $address = $UserupdateData['Address'];
        $password = md5($UserupdateData['Password']);
        $avatar = $UserupdateData['Avatar_path'];
        $id = $UserupdateData['id']; 

        $sql = "UPDATE Users u
                SET 
                    u.Role_id = ?,
                    u.FirstName = ?,
                    u.LastName = ?,
                    u.Gender_id = ?,
                    u.DOB = ?,
                    u.Email = ?,
                    u.Phone = ?,
                    u.Address = ?,
                    u.Password = ?,
                WHERE
                    u.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$role,$firstname, $lastname, $gender, $DOB, $email, $phone, $address, $password,$avatar, $id]);
        if($result){
            // exit('success');
            return true;
        }else{
            return false;
        }
    }


    public function deleteUserByID($id)
    {
        $sql = "DELETE FROM 
                    Users 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }else{
                return null;
            }
    }

    public function getloginUserRole($loginData)
    {

        $email = $loginData['Email'];
        $password = md5($loginData['Password']);

        

        $sql = "SELECT 
                    u.id,u.Role_id, u.FirstName, u.LastName, u.DOB, u.Gender_id, u.DOB, u.Email, u.Phone, u.Address, u.Password, u.avatar_path
                FROM 
                    Users u 
                WHERE
                    u.Email = ? AND
                    u.Password=? ";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$email, $password])){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
        }else{
                return null;
            }
    }
    
    
}
