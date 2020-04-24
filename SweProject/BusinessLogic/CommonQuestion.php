<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonQuestion
 *
 * @author ahmed
 */
include_once '../DatabaseLayer/QuestionQueries.php';
class CommonQuestion {
    //put your code here
    private $Common;
    public function __construct() {
         $this->Common= new QuestionQueries();
    } 
    public function SetCommonQuestion($Question) {
        $result=$this->Common->AddQuestion($Question);
        return $result;
    }
    public function DeleteCommonQuestion($Question) {
        $result=$this->Common->DeleteQuestion($Question);
        return $result;
    }
    public function ViewCommonQuestion() {
        $result= $this->Common->ViweQuestion();
        return $result;
    }
    
}
