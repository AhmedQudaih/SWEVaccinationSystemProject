<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Invoices
 *
 * @author ahmed
 */
include_once '..\DatabaseLayer\DosesQueries.php';
include_once '..\DatabaseLayer\UserQueries.php';
class Invoices {
    //put your code here
   private $UserQueries;
   private $DosesQueries;
  
    public function StaffInvoices($StaffId) {
        $this->UserQueries= new UserQueries();
        $result= $this->UserQueries->GetSalary($StaffId);
        return $result;
    }
     public function SalesInvoices($VaccinationId) {
        $this->DosesQueries= new DosesQueries();
        $Data= $this->DosesQueries->GetPriceAndName($VaccinationId);
        return $Data;
    }
    
}

//
//$rp = new Invoices();
//$result = $rp->SalesInvoices(0);
//var_dump($result);
