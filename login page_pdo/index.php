<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <title> SKA </title>
        <meta charset=utf-8>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h3>Login</h3>
        <?php   //errore isset
                if(isset($_SESSION['error'])){
                    echo "
                        <div class='alert alert-danger text-center'>
                            <i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']."
                        </div>
                    ";
  
                    //errore unset
                    unset($_SESSION['error']);
                }
  
                /*if(isset($_SESSION['success'])){
                    echo "
                        <div class='alert alert-success text-center'>
                            <i class='fas fa-check-circle'></i> ".$_SESSION['success']."
                        </div>
                    ";

                    //echo "header('location: welcome.php')" . $_SESSION['success'];
  
                    //unset success
                    unset($_SESSION['success']);
                }*/
            ?>
        <form method= "post" action="login.php">
            <label>Username</label>
            <input type="username" id="username" name="username" value="<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; unset($_SESSION['username']) ?>" placeholder="inserisci username" required><br>

            <label>Password</label>
            <input type="password" id="password" name="password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; unset($_SESSION['password']) ?>" placeholder="inserisci password" required><br>

            <button type="submit" name="login" class="submit">Login</button>
        </form>
        <p class ="submit2">Non hai un account? <a href=registration.php>Registrati</a></p>
    </body>
</html>