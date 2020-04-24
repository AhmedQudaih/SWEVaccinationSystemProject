<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nurse
 *
 * @author ahmed
 */
include_once '../DatabaseLayer/AppointmentQueries.php';
class Nurse {
    private $AppointmentQueries;


    public function NurseAppointment($TodayDate) {
        $this->AppointmentQueries= new AppointmentQueries();
        $result=$this->AppointmentQueries->TodayAppointment($TodayDate);
        return $result;
        
    }
}
