<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FinishedCases
 *
 * @author ahmed
 */
include_once '../DatabaseLayer/FinishedCasesQueries.php';

class FinishedCases {
  private $FinishedCasesQueries;
    public function __construct() {
          $this->FinishedCasesQueries = new FinishedCasesQueries();
    } 

    public function FinishedCaseReport() {
        $FinishedCase= $this->FinishedCasesQueries->FinishedCasesReport();
        return $FinishedCase;
    }
     public function SetFinishedCase($PatientSSN) {
        $FinishedCase= $this->FinishedCasesQueries->FinishedCase($PatientSSN);
        return $FinishedCase;
    }
}


//
//$rp = new FinishedCases();
//$result = $rp->SetFinishedCase(123456);
//var_dump($result);

