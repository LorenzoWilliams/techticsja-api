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

        $sql = "SELECT v.VisitDate, v.VisitTime, r.FirstName as 'Rececptionist FirstName',r.LastName as 'Rececptionist LastName', n.FirstName as 'Nurse FirstName',n.LastName as 'Nurse LastName',ph.FirstName as 'Physician FirstName',ph.LastName as 'Physician LastName', pa.FirstName as 'Patient FirstName',pa.LastName as 'Patient LastName',v.Weight_lb,v.Height_cm, v.Blood_Pressure,v.Blood_Sugar,v.Symptoms, v.Diagnosis, v.Prescription, v.Comments
		FROM Visits v
        JOIN Users r ON r.id = v.Receptionist_id
        JOIN Users n ON n.id = v.Nurse_id
		JOIN Users ph ON ph.id = v.Physician_id
		JOIN Users pa ON pa.id = v.Patient_id";

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
        $sql = "SELECT v.VisitDate, v.VisitTime, r.FirstName as 'Rececptionist FirstName',r.LastName as 'Rececptionist LastName', n.FirstName as 'Nurse FirstName',n.LastName as 'Nurse LastName',ph.FirstName as 'Physician FirstName',ph.LastName as 'Physician LastName', pa.FirstName as 'Patient FirstName',pa.LastName as 'Patient LastName',v.Weight_lb,v.Height_cm, v.Blood_Pressure,v.Blood_Sugar,v.Symptoms, v.Diagnosis, v.Prescription, v.Comments
		FROM Visits v
        JOIN Users r ON r.id = v.Receptionist_id
        JOIN Users n ON n.id = v.Nurse_id
		JOIN Users ph ON ph.id = v.Physician_id
		JOIN Users pa ON pa.id = v.Patient_id
        WHERE v.id = ?";  

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
        $receptionist_id = $visitaddData['Receptionist_id'];
        $nurse_id = $visitaddData['Nurse_id'];
        $patient_id = $visitaddData['Patient_id'];
        $physician_id = $visitaddData['Physician_id'];
        $weight_lb = $visitaddData['Weight_lb'];
        $height_cm = $visitaddData['Height_cm'];
        $blood_Pressure =$visitaddData['Blood_Pressure'];
        $blood_Sugar = $visitaddData['Blood_Sugar'];
        $symptoms =$visitaddData['Symptoms'];
        $diagnosis = $visitaddData['Diagnosis'];
        $prescription =$visitaddData['Prescription'];
        $comments = $visitaddData['Comments'];

        $sql = "INSERT INTO Visits
                    (VisitDate,VisitTime,Receptionist_id,Nurse_id,Patient_id,Physician_id,Weight_lb,Height_cm,Blood_Pressure,Blood_Sugar,Symptoms,Diagnosis,Prescription,Comments)
                VALUES
                (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$visitDate, $visitTime, $receptionist_id, $nurse_id, $patient_id, $physician_id, $weight_lb, $height_cm, $blood_Pressure, $blood_Sugar, $symptoms, $diagnosis, $prescription, $comments]);
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
        $receptionist_id = $visitupdateData['Receptionist_id'];
        $nurse_id = $visitupdateData['Nurse_id'];
        $patient_id = $visitupdateData['Patient_id'];
        $physician_id = $visitupdateData['Physician_id'];
        $weight_lb = $visitupdateData['Weight_lb'];
        $height_cm = $visitupdateData['Height_cm'];
        $blood_Pressure =$visitupdateData['Blood_Pressure'];
        $blood_Sugar = $visitupdateData['Blood_Sugar'];
        $symptoms =$visitupdateData['Symptoms'];
        $diagnosis = $visitupdateData['Diagnosis'];
        $prescription =$visitupdateData['Prescription'];
        $comments = $visitupdateData['Comments'];
        $id = $visitupdateData['id'];

        $sql = "UPDATE Visits v
                SET 
                    v.VisitDate = ?,
                    v.VisitTime = ?,
                    v.Receptionist_id = ?,
                    v.Nurse_id = ?,
                    v.Patient_id = ?,
                    v.Physician_id = ?,
                    v.Weight_lb = ?,
                    v.Height_cm = ?,
                    v.Blood_Pressure = ?,
                    v.Blood_Sugar = ?
                    v.Symptoms = ?,
                    v.Diagnosis = ?
                    v.Prescription = ?,
                    v.Comments = ?
                WHERE
                    v.id = ?";
        

        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([$visitDate, $visitTime, $receptionist_id, $nurse_id, $patient_id, $physician_id, $weight_lb, $height_cm, $blood_Pressure, $blood_Sugar, $symptoms, $diagnosis, $prescription, $comments,$id]);
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