<?php
session_start();

echo "Benvenuto ";

if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    header('location: index.php');
}

?>
<html>
    <head>
        <title>logged</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <form method="post" name="logout">
            <input type="submit" name="logout" value="log out">
        </form>
    </header>
    </body>
</html>
