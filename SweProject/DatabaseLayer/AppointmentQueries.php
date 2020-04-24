<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'DatabseClass.php';
class AppointmentQueries {
    private $Db;
    public function __construct() {
        $this->Db= new DatabseClass();
    }
public function ViewAppointment($PatientSSN)
    {
        $query="SELECT 'Date' FROM `appointment` 
                WHERE PatientSSN=$PatientSSN";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;
    } 
    public function ReScheduling($PatientId,$Date )
    {
        $query="UPDATE appointment SET `AppDate`= '$Date' WHERE PatientSSN=$PatientId";
        $result= $this->Db->database_query($query);
        return $result;
    }
    public function TodayAppointment($TodayDate) {
        $query="SELECT a.`VaccinationId`, `a`.`PatientSSN` , p.`Name`, p.`BabyName` FROM appointment a JOIN patient p on a.`PatientSSN`= p.`PatientSSN` WHERE `AppDate`='$TodayDate'";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;
    }
    
    public function FirstAppointment($PatientSSN) {
        $query1="SELECT DATE_ADD(`BirthDate`, INTERVAL 2 MONTH) AS Date FROM patient WHERE PatientSSN= $PatientSSN";
        $nextDate = $this->Db->database_query($query1);
        $data1 = $this->Db->database_result_assoc($nextDate);
        $AppDate=$data1['user1']['Date'];
        $this->InsertAppointment(1,$PatientSSN,$AppDate);
        return $AppDate;
        }
    
     public function InsertAppointment($NextDoseID,$PatientSSN,$AppDate) {
        $query2 = "INSERT INTO `appointment` (`VaccinationId`, `PatientSSN`, `AppDate`) VALUES ('$NextDoseID', '$PatientSSN', '$AppDate');";
        $result = $this->Db->database_query($query2);
        return $result;
            }
   
}
    
//$rp = new AppointmentQueries();
//$result = $rp->ViewAppointment(1234);
//var_dump($result);