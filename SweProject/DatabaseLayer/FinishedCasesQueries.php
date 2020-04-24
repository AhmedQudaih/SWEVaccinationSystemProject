<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FinishedCasesQueries
 *
 * @author ahmed
 */
include_once 'DatabseClass.php';
include_once '../BusinessLogic/Appointment.php';
class FinishedCasesQueries {
      private $Db;
      private $Appointment;
      public function __construct() {
        $this->Db= new DatabseClass();
    }
      public function FinishedCasesReport(){
        $query="SELECT a.`VaccinationId`, a.`PatientSSN` , p.`Name`, p.`BabyName` FROM finishedcases a JOIN patient p on a.`PatientSSN`= p.`PatientSSN`";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;  
    }
    public function FinishedCase($PatientSSN) {
        $INSERTquery="INSERT INTO finishedcases
            (VaccinationId,PatientSSN)
            SELECT
                    VaccinationId,PatientSSN
              FROM appointment WHERE PatientSSN=$PatientSSN";
        $DeleteQuery="DELETE FROM `appointment` WHERE PatientSSN=$PatientSSN";
        $resultINSERTquery= $this->Db->database_query($INSERTquery);
        $resultDeleteQuery= $this->Db->database_query($DeleteQuery);
        $result=array($resultINSERTquery,$resultDeleteQuery);
        $this->Appointment= new Appointment();
        $this->Appointment->NextDose($PatientSSN);
        return $result;
        
    }
}

//
//$rp = new FinishedCasesQueries();
//$result = $rp->FinishedCase(1234);
//var_dump($result);