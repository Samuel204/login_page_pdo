<?php session_start()?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pagina Registazione | SKA</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h3> Registrazione </h3>
        <?php
                //errore isset
                if(isset($_SESSION['error'])){
                    echo "
                        <div class='alert alert-danger text-center'>
                            <i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']."
                        </div>
                    ";
  
                    //errore unset
                    unset($_SESSION['error']);
                }
  
                if(isset($_SESSION['success'])){
                    echo "
                        <div class='alert alert-success text-center'>
                            <i class='fas fa-check-circle'></i> ".$_SESSION['success']."
                        </div>
                    ";
  
                    //unset success
                    unset($_SESSION['success']);
                }
            ?>
        <form action="check_registrazione.php" method="post">
            
            <label>Nome</label>
            <input type="username" id="username" name="username" value="<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; unset($_SESSION['username']) ?>" placeholder="inserisci username" required><br>
            
            <label>Cognome</label>
            <input type="cognome" id="cognome" name="cognome" value="<?php echo (isset($_SESSION['cognome'])) ? $_SESSION['cognome'] : ''; unset($_SESSION['cognome']) ?>" placeholder="inserisci cognome" required><br>
           
            <label>Password</label>
            <input type="password" id="password" name="password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; unset($_SESSION['password']) ?>" placeholder="inserisci password" required><br>

            <label>Conferma password</label>
            <input type="password" id="conferma_pass" name="conferma_pass" value="<?php echo (isset($_SESSION['conferma_pass'])) ? $_SESSION['conferma_pass'] : ''; unset($_SESSION['conferma_pass']) ?>" placeholder="inserisci password" required><br>

            <button type="submit" name="register" class="submit" value="registrazione">Registrati</button>

        </form>
        <p class ="submit2"> Hai già un account? <a href=index.php>Accedi</a></p>
    </body>
</html>
