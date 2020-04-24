<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Appointment
 *
 * @author ahmed
 */
include_once '../DatabaseLayer/DosesQueries.php';
include_once '../DatabaseLayer/AppointmentQueries.php';
class Appointment {
    //put your code here
    private $DosesQueries;
    private $Re_schedule;
    public function PatientAppointmentDoseAndDate($PatientId) {
        $this->DosesQueries = new DosesQueries();
        $result= $this->DosesQueries->PatientNextAppointment($PatientId);
        return $result;
    }
    
    public function Reschedule($PatientId,$Date) {
        $this->Re_schedule = new AppointmentQueries();
        $result= $this->Re_schedule->ReScheduling($PatientId, $Date);
        return $result;         
    }
    public function PatientDosesHistory($PatientId) {
        $this->DosesQueries = new DosesQueries();
        $result= $this->DosesQueries->PatientHistoryDoses($PatientId);
        return $result;           
    }
   
    public function NextDose($PatientId){
        $TodayDate=strtotime("+1 Months");
        $Date= date("Y-m-d", $TodayDate);
        $this->DosesQueries= new DosesQueries();
        $History= $this->DosesQueries->PatientHistoryDoses($PatientId);
        foreach ($History as $item) {
            $itemNeeded = $item;}
       $NextDoseID=$itemNeeded['VaccinationId']+1;
        $this->Re_schedule=new AppointmentQueries();
        $this->Re_schedule->InsertAppointment($NextDoseID, $PatientId,$Date );
    }
}

//$rp = new Appointment();
//$result = $rp->PatientAppointmentDoseAndDate(123456);





