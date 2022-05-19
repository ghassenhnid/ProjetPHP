<?php include('../config/constantes.php') ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login</title>
</head>
<body>
    
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <br><br>

        <form action="" method="POST" class="text-center">
            Nom d'utilisateur: <br>
            <input type="text" name="nomUtilisateur" placeholder="Nom d'utilisateur"> <br> <br>
            
            Mot de passe: <br>
            <input type="password" name = "motDePasse" placeholder="Mot de passe"> <br> <br>

            <input type="submit" name = "submit" value = "Login" class = "button-first">
            <br><br>
        </form>

        <p class="text-center">Created By - <a href="https://www.linkedin.com/in/ghassen-hnid/">Ghassen HNID</a></p>
    </div>

</body>
</html>

<?php

    if(isset($_POST['submit'])){
        $nomUtilisateur = $_POST['nomUtilisateur'];
        $motDePasse = md5($_POST['motDePasse']);


        $sql = "SELECT * FROM `admin` WHERE nomUtilisateur = '$nomUtilisateur' AND motDePasse = '$motDePasse'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class = 'sucess'>Connexion réussie.</div>";
            $_SESSION['utilisateur'] = $nomUtilisateur;

            header('location:'.SITEURL.'admin/');
        }else{
            $_SESSION['login'] = "<div class = 'error'>Vérifier les informations entrées !</div>";

            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>