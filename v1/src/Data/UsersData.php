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
                    u.id,r.Role, u.FirstName, u.LastName, u.DOB, g.Gender, u.DOB, u.Email, u.Phone, u.AddressLine1,u.AddressLine2, u.State,u.Country, u.Password, u.Avatar_path, u.Member_since
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

    public function getUsers()
    { 
        try{
        $sql = "SELECT 
                    u.id,r.Role, u.FirstName, u.LastName, u.DOB, g.Gender, u.DOB, u.Email, u.Phone, u.AddressLine1,u.AddressLine2, u.State,u.Country, u.Password, u.Avatar_path, u.Member_since
                FROM 
                    Users u 
                JOIN 
                    Genders g on g.id = u.Gender_id
                JOIN 
                    Roles r on r.id = u.Role_id";

            $result = $this->db->query($sql);
            return $result;
            } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            }
    }

    public function getUserByID($id)
    {
        $sql = "SELECT 
                    u.id,r.Role, u.FirstName, u.LastName, u.DOB, g.Gender, u.DOB, u.Email, u.Phone, u.AddressLine1,u.AddressLine2, u.State,u.Country, u.Password, u.Avatar_path, u.Member_since
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


    public function addNewUser($UseraddData){
        $result = $this->getUserByEmail($UseraddData['Email']);
        if($result['num']>0){
            return false;
        }
        else{
            $role = $UseraddData['Role_id'];
            $firstname = $UseraddData['FirstName'];
            $lastname = $UseraddData['LastName'];
            $gender = $UseraddData['Gender_id'];
            $DOB = $UseraddData['DOB'];
            $email = $UseraddData['Email'];
            $phone =$UseraddData['Phone'];
            $addressline1 = $UseraddData['AddressLine1'];
            $addressline2 = $UseraddData['AddressLine2'];
            $state = $UseraddData['State'];
            $country = $UseraddData['Country'];
            $password = md5($UseraddData['Password']);
            $avatar_path = $UseraddData['Avatar_path'];
            $member_since = date('Y-m-d');
            
            $sql = "INSERT INTO 
                        Users(Role_id,FirstName,LastName,Gender_id,DOB,Email,Phone,AddressLine1,AddressLine2,State,Country,Password,Avatar_Path,Member_since)
                    VALUES
                        (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([$role, $firstname, $lastname, $gender, $DOB, $email, $phone, $addressline1,$addressline2,$state,$country, $password, $avatar_path,$member_since]);
            if($result){
                return true;
            }else{
                return false;
            }
        }
}


    public function updateUserByID($UserupdateData)
    {
        $id = $UserupdateData['id']; 
        $role = $UserupdateData['Role_id'];
        $firstname = $UserupdateData['FirstName'];
        $lastname = $UserupdateData['LastName'];
        $gender = $UserupdateData['Gender_id'];
        $DOB = $UserupdateData['DOB'];
        $email = $UserupdateData['Email'];
        $phone = $UserupdateData['Phone'];
        $addressline1 = $UserupdateData['AddressLine1'];
        $addressline2 = $UserupdateData['AddressLine2'];
        $state = $UserupdateData['State'];
        $country = $UserupdateData['Country'];
        $password = md5($UserupdateData['Password']);
        $avatar_path = $UserupdateData['Avatar_path'];
        $member_since = $UserupdateData['Member_since'];


        $sql = "UPDATE Users u
                SET 
                    u.Role_id = ?,
                    u.FirstName = ?,
                    u.LastName = ?,
                    u.Gender_id = ?,
                    u.DOB = ?,
                    u.Email = ?,
                    u.Phone = ?,
                    u.AddressLine1 = ?,
                    u.AddressLine2 = ?,
                    u.State = ?,
                    u.Country = ?,
                    u.Password = ?,
                    u.Avatar_path = ?,
                    u.Member_since = ?
                WHERE
                    u.id = ?";
        

        $stmt = $this->db->prepare($sql);

        $result = $stmt->execute([$id,$role, $firstname, $lastname, $gender, $DOB, $email, $phone, $addressline1,$addressline2,$state,$country, $password, $avatar_path,$member_since]);

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
                    u.id,u.Role_id, u.FirstName, u.LastName, u.DOB, u.Gender_id, u.DOB, u.Email, u.Phone, u.AddressLine1,u.AddressLine2, u.State,u.Country, u.Password, u.Avatar_path, u.Member_since
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
    
    public function getUserID($id)
    {
        $sql = "SELECT 
                    u.id, u.Role_id, u.FirstName, u.LastName, u.DOB, u.Gender_id, u.DOB, u.Email, u.Phone, u.AddressLine1,u.AddressLine2, u.State,u.Country, u.Password, u.Avatar_path, u.Member_since
                FROM 
                    Users u 
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

    public function getUserByEmail($email){

        $sql = "SELECT 
                   count(*) as num 
                FROM 
                    Users u 
                WHERE
                    u.Email = ?"; 

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$email])){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
        }else{
                return null;
            }
    }


}



