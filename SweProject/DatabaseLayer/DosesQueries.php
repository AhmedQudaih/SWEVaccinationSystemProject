<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'DatabseClass.php';
class DosesQueries {
    private $Db;
    public function __construct() {
        $this->Db= new DatabseClass();
    }
    public function SumFinishedDoses()
    {
        $query="SELECT f.VaccinationId, (COUNT(f.VaccinationId)* d.Price) AS Total FROM finishedcases f JOIN doses d ON d.VaccinationId = f.VaccinationId GROUP BY VaccinationId";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;
    }
    public function FinishedDoses()
    {
        $query="SELECT VaccinationId, COUNT(VaccinationId) FROM finishedcases GROUP BY VaccinationId";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;
    }
       public function DosesReport()
    {
        $query="SELECT `VaccinationId`, `Vaccination type`,`Price`FROM `doses` ";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;
    }
    
    public function ViewPrice($VaccinationId)
    {
        $query="SELECT `doses`.`Price` FROM `doses`
                WHERE VaccinationId=$VaccinationId";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;
    }
    public function UpdatePrice($price,$VaccinationId )
    {
        $query="UPDATE `doses` SET `Price`=$price 
                WHERE VaccinationId=$VaccinationId";
        $result= $this->Db->database_query($query);
        return $result;
    }

    public function GetPriceAndName($VaccinationId)
    {
        $query="SELECT `Price`,`Vaccination type` FROM `doses` WHERE VaccinationId=$VaccinationId";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;
    }
    
    
    public function PatientNextAppointment($PatientId)
    {
        $query="SELECT d.`Vaccination type` , a.AppDate FROM appointment a join doses d on a.VaccinationId = d.VaccinationId WHERE a.PatientSSN =$PatientId";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);        
        return $data;
    }
    
    public function PatientHistoryDoses($PatientId)
    {
        $query="SELECT VaccinationId FROM `finishedcases` WHERE PatientSSN =$PatientId";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;
    }
    
    
    
    
    
}
//$rp = new DosesQueries();
//$result = $rp->PatientNextAppointment(123456);
//var_dump($result);





//
//$rp = new DosesQueries();
//$result = $rp->PatientNextAppointment(11);
//var_dump($result);
//



//    SELECT * FROM `doses` where VaccinationId=1
   // INSERT INTO your_table_name (your_column_name)
//VALUES (the_value);
//    $test= new DosesQueries();
//   $test->GetQuantity(1);
//    var_dump($test->GetQuantity(1));
//    
