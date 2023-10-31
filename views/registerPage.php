<!DOCTYPE html>

<?php
    session_start();
    if($_SESSION['login'] == true){
        header("Location: ./user.php");
        return;
    }
?>


<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

            <div class="main-form">
                <h1 class="title">Register</h1>
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
                
                            
                        
               
                <form action="../controllers/checkRegister.php" method="POST">
                    <div class="form-control">
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-control">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-control">
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </div>
                    <button type="submit" class="btn btn-submit">Submit</button>
                    <div class="note-reg">
                        <p>Not a member yet ? </p>
                        <a href="../index.php">Login</a>
                    </div>
                </form>
            </div>

</body>
</html>
