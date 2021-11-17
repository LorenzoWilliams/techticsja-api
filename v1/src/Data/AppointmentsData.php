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
          $sql = "SELECT a.AppointmentDate,a.AppointmentTime,ph.FirstName as 'Physician FirstName',ph.LastName as 'Physician LastName', pa.FirstName as 'Patient FirstName',pa.LastName as 'Patient LastName',a.Comments
                    FROM Appointments a
                    JOIN Users ph ON ph.id = a.Physician_id
                    JOIN Users pa ON pa.id = a.Patient_id";  
    
            $stmt = $this->db->prepare($sql);
            if($stmt->execute()){
                $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $appointments;
            }else{
                    return null;
                 }
        }

        public function getAppointmentsByID($id){
        $sql = "SELECT a.AppointmentDate,a.AppointmentTime,ph.FirstName as 'Physician FirstName',ph.LastName as 'Physician LastName', pa.FirstName as 'Patient FirstName',pa.LastName as 'Patient LastName',a.Comments
                  FROM Appointments a
                  JOIN Users ph ON ph.id = a.Physician_id
                  JOIN Users pa ON pa.id = a.Patient_id  
                  WHERE v.id = ?";  

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
        $patient_id = $appointmentaddData['Patient_id'];
        $physician_id = $appointmentaddData['Physician_id'];
        $comments = $appointmentaddData['Comments'];

        $sql = "INSERT INTO Appointments
                    (AppointmentDate,AppointmentTime,Patient_id,Physician_id,Comments)
                VALUES
                (?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$appointmentDate, $appointmentTime, $patient_id, $physician_id, $comments]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updateAppointmentsByID($appointmentupdateData)
    {
        $appointmentDate = $appointmentupdateData['AppointmentDate'];
        $appointmentTime = $appointmentaddData['AppointmentTime'];
        $patient_id = $appointmentupdateData['Patient_id'];
        $physician_id = $appointmentupdateData['Physician_id'];
        $comments = $appointmentupdateData['Comments'];
        $id = $appointmentupdateData['id'];

        $sql = "UPDATE Appointments a
                SET 
                    a.AppointmentDate = ?,
                    a.AppointmentTime = ?,
                    a.Patient_id = ?,
                    a.Physician_id = ?,
                    a.Comments = ?
                WHERE
                    a.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$appointmentDate, $appointmentTime, $patient_id, $physician_id, $comments,$id]);
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