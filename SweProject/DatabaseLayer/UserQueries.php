<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserQueries
 *
 * @author Admin
 */
include_once 'DatabseClass.php';
include_once 'AppointmentQueries.php';
class UserQueries {

    private $Db;
    private $AppointmentQueries;

    public function __construct() {
        $this->Db = new DatabseClass();
    }

    public function getStaffByUsernameAndPassword($StaffId, $password) {
        $query = "SELECT * FROM staff JOIN users ON users.ID = staff.StaffId  WHERE StaffId=$StaffId AND Password = $password";
        $result = $this->Db->database_query($query);
        $data = $this->Db->database_result_assoc($result);
        return $data;
        
    }

    public function getPatientByUsernameAndPassword($PatientId, $password) {
        $query = "SELECT * FROM `patient` WHERE PatientSSN=$PatientId AND Password= $password";
       $result = $this->Db->database_query($query);
       $data = $this->Db->database_result_assoc($result);
        return $data;
        
    }

    public function SetSalary($salary, $StaffId) {
        $query = "UPDATE `staff` SET `Salary` = '$salary' WHERE `staff`.`StaffId` = $StaffId;";
        $result = $this->Db->database_query($query);
        return $result;
    }
    public function GetSalary($StaffId) {
        $query = "SELECT Salary , Name FROM `staff` WHERE StaffId= $StaffId";
        $result = $this->Db->database_query($query);
        $data = $this->Db->database_result_assoc($result);
        return $data;
    }
    public function GetSalarySum() {
        $query = "SELECT SUM(Salary) FROM staff";
        $result = $this->Db->database_query($query);
        $data = $this->Db->database_result_assoc($result);
        return $data;
    }
    public function SetPatient($PatientSSN,$BabyName , $Name, $Email,$Password,$BirthDate) {
        $query = " INSERT INTO `patient` (`PatientSSN`,`Name`, `E-mail`, `BabyName`, `Password`, `BirthDate`) VALUES ('$PatientSSN','$Name', '$Email', '$BabyName', '$Password', '$BirthDate');";
        $result = $this->Db->database_query($query);
        $this->AppointmentQueries= new AppointmentQueries();
        $this->AppointmentQueries->FirstAppointment($PatientSSN);      
        return $result;
    }
    
    public function getUserPermissions($userTypeId){
        $query="SELECT links.LinkName,links.url FROM `typelinks`,links where typelinks.LinkId=links.LinkId and typelinks.TypeId =$userTypeId";
        $result = $this->Db->database_query($query);
        $data = $this->Db->database_result_assoc($result);
        return $data;  
    }

    
  

}

        

//
//$rp = new UserQueries();
//$result = $rp->FirstAppointment(1234);
//var_dump($result);

