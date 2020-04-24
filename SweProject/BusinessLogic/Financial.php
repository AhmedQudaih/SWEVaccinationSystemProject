<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Financial
 *
 * @author ahmed
 */
include_once '..\DatabaseLayer\DosesQueries.php';
include_once '..\DatabaseLayer\UserQueries.php';
class Financial {
     private $UserQueries;
     private $DosesQueries;
    
     public function SetNewSalary($StaffId,$salary) {
        $this->UserQueries= new UserQueries();
        $result = $this->UserQueries->SetSalary($salary, $StaffId);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
     public function SetNewPrice($price,$VaccinationId) {
        $this->DosesQueries= new DosesQueries();
        $result = $this->DosesQueries->UpdatePrice($price, $VaccinationId);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function FinancialReport(){
         $this->DosesQueries= new DosesQueries();
         $data= $this->DosesQueries->DosesReport();
         $this->UserQueries= new UserQueries();
         $Salary= $this->UserQueries->GetSalarySum();
         $DosesReport = array($data,$Salary); 
         return $DosesReport ;  
    }
    public function FinancialReportDosesSum() {
      $this->DosesQueries= new DosesQueries();
      $data= $this->DosesQueries->SumFinishedDoses();
      $sum = 0;
      foreach ($data as $row){
          $sum += $row['Total'];
      }
      return $sum;
      
  }
  public function FinancialReportDoses() {
      $this->DosesQueries= new DosesQueries();
      $data= $this->DosesQueries->FinishedDoses();
      return $data;  
  }
}

//
//$rp = new Financial();
//$result=$rp->SetNewSalary(11,5555);
//var_dump($result);




