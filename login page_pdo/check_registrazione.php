<?php

session_start();

//controllo il submit nella pagina di registrazione 
if(isset($_POST['register'])){
    $username =$_POST['username'];
    $cognome =$_POST['cognome'];
    $password =$_POST['password'];
    $conferma_pass = $_POST['conferma_pass'];

    //controllo se le due password sono uguali
    if($password != $conferma_pass){
        $_SESSION['username'] = $username;
        $_SESSION['cognome'] = $cognome;
        $_SESSION['password'] = $password;
        $_SESSION['conferma_pass'] = $conferma_pass;

        $_SESSION['error'] = 'password sbagliata';
    }else{
        include 'my_db.php';

        //controlla se username è presente o no
        $query = $conn->prepare('SELECT * FROM users WHERE username= :username OR cognome= :cognome');
        $query->execute(['username' => $username, 'cognome' => $cognome,]);

        if($query->rowCount() > 0){
            $_SESSION['username'] = $username;
            $_SESSION['cognome'] = $cognome;
            $_SESSION['password'] = $password;
            $_SESSION['conferma_pass'] = $conferma_pass;

            $_SESSION['error'] = 'Username è già stato utilizzato';
        }else{
            //password criptato
            $password = password_hash($password, PASSWORD_DEFAULT);

            //inserisci un nuovo utente al db
            $query =$conn->prepare('INSERT INTO users (username, cognome, password) VALUES(:username, :cognome, :password)');
            try{
                $query->execute([ 'username' => $username, 'cognome' => $cognome, 'password' => $password]);
                $_SESSION['success'] = 'Username Confermato. Accedi <a href="index.php">login</a> ora';
            }catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();

            }
        }

    }
}else{
    $_SESSION['error'] = 'Compila i campi';
}
header('location:registration.php');

?>