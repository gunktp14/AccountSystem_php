<?php
    session_start();
    if(empty($_SESSION['login'])){
        header("Location: ./index.php");
        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body{
            margin:0;
            font-family:Arial;
            padding:0;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            padding-top:4rem;
            box-sizing:border-box;
            background-color:#333;
        }
        a.logout-btn{
            background-color: #f8d7da;
            color:#5b272c;
            border-radius: 5px;
            cursor: pointer;
            border:none;
            width:100%;
        
            display:flex;
            justify-content:center;
            text-decoration:none;
            padding:0.5rem 0;
        }
        .main-box{
            display:flex;
            flex-direction:column;
            background-color:#fff;
            padding:2rem;
            width:300px;
            border-radius:10px;
        }

    </style>
</head>
<body>
        

        <div class="main-box">
            <h2>Welcome</h2>
            <p>Username : <?=$_SESSION['username'] ?></p>
            <a class="logout-btn" href="../controllers/logout.php">Logout</a>
        </div>
        
</body>
</html>