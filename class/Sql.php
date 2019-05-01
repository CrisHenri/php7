<?php
   class Sql extends PDO{
     private $conection;

     public function __construct(){
       $this->conection =  new PDO("mysql:host=localhost;dbname=dbphp7","root","1234");
     }
     private function setParams($statment, $parameters = array()){
       foreach($parameters as $key => $value) {
         $this->setParam($statment, $key, $value);
       }
     }
     private function setParam($statment, $key,$value){
       $statment->bindParam($key, $value);
     }
     public function query($rowQuery, $params = array()){

       $stmt = $this->conection->prepare($rowQuery);
       $this->setParams($stmt, $params);

       $stmt->execute();
       return $stmt;
     }

    public function select($rowQuery, $params = array()){
      $stmt =  $this->query($rowQuery, $params);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /*21 MINUTOS*/
   }
 ?>
