<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;


class UserData {
    private $db;

    function __construct(Connection $conn)
    {
        $this->db =  $conn->connect();
    }

    public function getAllUsers()
    { 
        $sql = "SELECT 
                    r.Role, u.FirstName, u.LastName, u.DOB,g.Gender, u.Address, u.Email, u.Phone 
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


    public function getAllUserByRoleID($id)
    {

        $sql = "SELECT 
                    r.Role, u.FirstName, u.LastName, u.DOB,g.Gender, u.Address, u.Email, u.Phone 
                FROM 
                    Users u 
                JOIN 
                    Genders g on g.id = u.Gender_id
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


    public function getUserByID($id)
    {
        $sql = "SELECT 
                    r.Role, u.FirstName, u.LastName, u.DOB, g.Gender, u.Address, u.Email, u.Phone 
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


    public function addNewUser($useraddData)
    {
        $role = $useraddData['Role_id'];
        $password = md5($useraddData['Password']);
        $firstname = $useraddData['FirstName'];
        $lastname = $useraddData['LastName'];
        $DOB = $useraddData['DOB'];
        $address = $useraddData['Address'];
        $email = $useraddData['Email'];
        $phone =$useraddData['Phone'];
        $gender = $useraddData['Gender_id'];

        $sql = "INSERT INTO 
                    Users(Role_id,Password,FirstName,LastName,DOB,Address,Email,Phone,Gender_id)
                VALUES
                    (?,?,?,?,?,?,?,?,?)";
            
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$role, $password, $firstname, $lastname, $DOB, $address, $email, $phone, $gender]);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function updateUserByID($userupdateData)
    {
        $role = $userupdateData['Role_id'];
        $password = md5($userupdateData['Password']);
        $firstname = $userupdateData['FirstName'];
        $lastname = $userupdateData['LastName'];
        $DOB = $userupdateData['DOB'];
        $address = $userupdateData['Address'];
        $email = $userupdateData['Email'];
        $phone = $userupdateData['Phone'];
        $gender = $userupdateData['Gender_id'];
        $id = $userupdateData['id']; 

        $sql = "UPDATE Users u
                SET 
                    u.Role_id = ?,
                    u.Password = ?,
                    u.FirstName = ?,
                    u.LastName = ?,
                    u.DOB = ?,
                    u.Address = ?,
                    u.Email = ?,
                    u.Phone = ?,
                    u.Gender_id = ?
                WHERE
                    u.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$role, $password, $firstname, $lastname, $DOB, $address, $email, $phone, $gender,$id]);
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
                    r.Role
                FROM 
                    Users u 
                JOIN 
                    Roles r on r.id = u.Role_id
                WHERE
                    u.Email = ? AND
                    u.Password=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$email,$password])){
            $role = $stmt->fetch(PDO::FETCH_ASSOC);
                return $role;
        }else{
                return null;
            }
    }
    
    
    
}

