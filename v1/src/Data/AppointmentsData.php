<?php

namespace techticsja\Data;
use PDO;
use techticsja\Database\Connection;
use PDOException;

    class AppointmentsData{
        private $db;

        function __construct(Connection $conn)
        {
            $this->db =  $conn->connect();
        }

        public function getAllAppointments()
        {
          $sql = "SELECT a.AppointmentDate,a.AppointmentTime,u.FirstName u.LastName,a.Comments
                    FROM Appointments a
                    JOIN Users u ON u.id = a.User_id";  
    
            $stmt = $this->db->prepare($sql);
            if($stmt->execute()){
                $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $appointments;
            }else{
                    return null;
                 }
        }

        public function getAppointmentsByID($id){
        $sql = "SELECT a.AppointmentDate,a.AppointmentTime,u.FirstName u.LastName,a.Comments
                FROM Appointments a
                JOIN Users u ON u.id = a.User_id
                  WHERE u.id = ?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $appointments = $stmt->fetch(PDO::FETCH_ASSOC);
            return $appointments;
        }else{
                return null;
            }
    }

    public function addNewAppointments($appointmentaddData)
    {
        $appointmentDate = $appointmentaddData['AppointmentDate'];
        $appointmentTime = $appointmentaddData['AppointmentTime'];
        $user_id = $appointmentaddData['User_id'];
        $comments = $appointmentaddData['Comments'];

        $sql = "INSERT INTO Appointments
                    (AppointmentDate,AppointmentTime,User_id,Comments)
                VALUES
                (?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$appointmentDate, $appointmentTime, $user_id, $comments]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updateAppointmentsByID($appointmentupdateData)
    {
        $appointmentDate = $appointmentupdateData['AppointmentDate'];
        $appointmentTime = $appointmentupdateData['AppointmentTime'];
        $user_id = $appointmentupdateData['User_id'];
        $comments = $appointmentupdateData['Comments'];
        $id = $appointmentupdateData['id'];

        $sql = "UPDATE Appointments a
                SET 
                    a.AppointmentDate = ?,
                    a.AppointmentTime = ?,
                    a.User_id = ?,
                    a.Comments = ?
                WHERE
                    a.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$appointmentDate, $appointmentTime, $user_id, $comments,$id]);
        if($result){
            // exit('success');
            return true;
        }else{
            return false;
        }
    }

    public function deleteAppointmentsByID($id)
    {
        $sql = "DELETE FROM 
                    Appointments 
                WHERE 
                    id=?";  

        $stmt = $this->db->prepare($sql);
        if($stmt->execute([$id])){
            $appointments = $stmt->fetch(PDO::FETCH_ASSOC);
            return $appointments;
        }else{
                return null;
            }
    }

    }
    ?>