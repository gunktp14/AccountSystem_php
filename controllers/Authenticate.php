<?php

class Authenticate
{
    private $db;

    public function __construct($connection)
    {       
        $this->db = $connection;
        $this->db = new PDO('mysql:host=localhost;dbname=test_db','root','');
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            
            if ($password == $user['password']) {

                return true;
            }
        }

        return false;
    }

    public function register($username, $password)
    {
        try{
            $data = [
                'username' => $username,
                'password' => $password,
            ];
            $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
            $stmt= $this->db->prepare($sql);
            $stmt->execute($data);

            return true;
        }catch(Exception $err){
            return false;
        }

    }

}
