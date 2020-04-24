<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabseClass
 *
 * @author Admin
 */
class DatabseClass {
   private $db_name='sweproject';
   private $host_name="localhost";
   private $username='root';
   private $password='';
   private $db_connnection;
   
   public function __construct() {
       $this->db_connnection=$this->db_connect();
   }
   
   private function db_connect(){
     $connection= mysqli_connect($this->host_name, $this->username, $this->password, $this->db_name);
    if($connection){
        return $connection;
    }
    else{
        die("Databse Connection Error");
    }

   }
   public function database_query($query){
      $result= mysqli_query($this->db_connnection, $query);
      return $result;
   }
   public function database_result_assoc($result){
       $data=array();
       
       $counter=0;
       while ($row=mysqli_fetch_assoc($result)){
           $counter=$counter+1;
           $key='user'.$counter;
           $data[$key]=$row;
       }
      
      return $data;
   }
   
   public function row_count($result){
       return mysqli_num_rows($result);
   }

   public function db_close(){
      if(!mysqli_close($this->db_connnection)){
          die("DB Connection Closing Failed !");
      }
   }
 
}



