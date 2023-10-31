<?php
class ConDB{
    private $user,$pass;
    public $conn;

    public function __construct($user,$pass){
        $this->user = $user; 
        $this->pass = $pass; 
    }

    public function connect(){
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=test_db',$this->user,$this->pass);
            echo("Connected to Database successfully!");
        }catch(PDOException $e){
            echo $e->getMessage(); 
        }
    }
} 
?>