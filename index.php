
<!DOCTYPE html>
<?php
    session_start();
    
    if($_SESSION['login'] == true ){
        header("Location: ./user.php");
        return;
    }
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

            <div class="main-form">
                <h1 class="title">Login</h1>
                <?php
            
                        if(isset($_SESSION['error'])){
                            ?>

                                    <div class="alert-danger">
                                        <?php echo($_SESSION['error']);
                                            unset($_SESSION['error']);
                                        ?>
                                    </div>

                            <?php 
                        }
                            ?>
                <form action="./controllers/checklogin.php" method="POST">
                    <div class="form-control">
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-control">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-submit">Submit</button>
                    <div class="note-reg">
                        <p>Not a member yet ? </p>
                        <a href="./views/registerPage.php">Register</a>
                    </div>
                </form>
            </div>

</body>
</html>
