<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionQueries
 *
 * @author Mo'men
 */
include_once 'DatabseClass.php';
class QuestionQueries {   
    private $Db;
    public function __construct() {
        $this->Db= new DatabseClass();
    }
    public function AddQuestion($question)
    {
        $query="INSERT INTO `questions` (`QuestionsId`, `CommonQuestions`) VALUES (NULL, '$question');";
        $result= $this->Db->database_query($query);
        return $result;
    }
    public function DeleteQuestion($QuestionsId)
    {
        $query="Delete from questions 
                Where QuestionsId=$QuestionsId ";
        $result= $this->Db->database_query($query);
        return $result;
    }
    public function  ViweQuestion()
    {
        $query="SELECT * FROM `questions`";
        $result= $this->Db->database_query($query);
        $data=$this->Db->database_result_assoc($result);
        return $data;
        
    }
  
}