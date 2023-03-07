<<?php
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password =$_POST['password'];

    //includo il database
    include 'my_db.php';

    $query = $conn->prepare('SELECT * FROM users WHERE username= :username OR cognome= :cognome');

    try{
        $query->execute(['username' => $username, 'cognome' => $cognome]);

        //controlla se esiste username
        if($query->rowCount() > 0){
            
            $user = $query->fetch();
    
            //verifica e conferma l'accesso
            if(password_verify($password, $user['password'])){
                $_SESSION['success'];
                header('location: welcome.php');
                exit();
               
                
            }else{
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                $_SESSION['error'] ='Password errata';
            }
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            $_SESSION['error'] = 'Username non trovato';
        }

    }catch(PDOException $e){
         $_SESSION['error'] = $e->getMessage();

    }

}else{
    $_SESSION['error'] = 'Compila i campi';
    }
    header('location:index.php');

?>