<?php
include_once "../models/ConDB.php";
include_once "./Authenticate.php";

session_start();

$conDB = new ConDB('root','');
$con = $conDB->conn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $authenticate = new Authenticate($con);

    if(empty($username)||empty($password)){
        $_SESSION['error'] = "Please provide all value!";
        header("Location: ../index.php");
        return;
    }

    if ($authenticate->login($username, $password)) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: ../views/user.php");
        return;
        // Redirect or set session variable here
    } else {
        $_SESSION['error'] = "username or password is incorrect!";
        header("Location: ../index.php");
        return;
    }
}
