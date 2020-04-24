<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Admin
 */
if (!isset($_SESSION)) {
    session_start();
}
include_once '../DatabaseLayer/UserQueries.php';
class User {
    public $Name;
    public $password;
    public $id;
    public $UserTypeId;
    private $UserQueries;
     public function __construct() {
                 $this->UserQueries= new UserQueries();
    } 
    public function Registration($PatientSSN,$BabyName , $Name, $Email,$Password,$BirthDate){
        $result= $this->UserQueries->SetPatient($PatientSSN,$BabyName , $Name, $Email,$Password,$BirthDate);
        if ($result==true){    
        }
        return $result;
    }
    public function Login($ID,$Password) {
        $staff= $this->UserQueries->getStaffByUsernameAndPassword($ID, $Password);
        $patient= $this->UserQueries->getPatientByUsernameAndPassword($ID, $Password);
        if ($staff == $patient){
            return false;       
        }elseif ($staff or $patient == true){
            if($staff==true){
                $this->Name=$staff['user1']['Name'];
                $this->password= $staff['user1']['Password'];
                $this->id= $staff['user1']['StaffId'];
                $this->UserTypeId=$staff['user1']['TypeID'];
                $_SESSION['Name']=$this->Name;
                $_SESSION['Password']=$this->password;
                $_SESSION['TypeID']=$this->UserTypeId;
                $_SESSION['StaffId']= $this->id; 
            } else {
                $this->Name=$patient['user1']['Name'];
                $this->password= $patient['user1']['Password'];
                $this->id= $patient['user1']['PatientSSN'];
                $this->UserTypeId=0;
                $_SESSION['Name']=$this->Name;
                $_SESSION['Password']=$this->password;
                $_SESSION['TypeID']=$this->UserTypeId;
                $_SESSION['PatientSSN']= $this->id;
                }
            return true;
        } 
   }
          
    public function logout(){
        if(isset($_SESSION['Name'])){
            session_destroy();
            return true;
        }
        else{
            return false;
        }
    }
    
     public function getUserPermisiions(){
         $result= $this->UserQueries->getUserPermissions($_SESSION['TypeID']);
         return $result;
     
   }
      
}
//
//$rp = new User();
//$result = $rp->getUserPermisiions($_SESSION['TypeID']);
//var_dump($result);
