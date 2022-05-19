<?php

    session_start();



    //pour stocker des valeurs non répétitives

        define('SITEURL', 'http://localhost/commander-des-pizzas/');
        define('LOCALHOST','localhost');
        define('DB_USERNAME','root');
        define('DB_PASSWORD','root');
        define('DB_NAME', 'pizza_order');


        $conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); // connexion à la bdd
        $bdd_select=mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

?>