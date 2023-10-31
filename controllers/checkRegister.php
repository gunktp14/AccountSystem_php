<?php
include_once "../models/ConDB.php";
include_once "./Authenticate.php";

session_start();

$conDB = new ConDB('root','');
$con = $conDB->conn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $confirm_password = $_POST['confirm_password'];
    $password = $_POST['password'];

    $authenticate = new Authenticate($con);

    if(empty($username)||empty($password||empty($confirm_password))){
        $_SESSION['error'] = "Please provide all value!";
        header("Location: ../views/registerPage.php");
        return;
    }

    if($confirm_password !== $password){
        $_SESSION['error'] = "Confirm password should be the same!";
        header("Location: ../views/registerPage.php");
        return;
       }

    $authenticate = new Authenticate('localhost', 'test_db', 'root', '');

    if ($authenticate->register($username, $password)) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: ../views/user.php");
        return;
        // Redirect or set session variable here
    } else {
        echo "Register failed!";
        return;
    }
}
