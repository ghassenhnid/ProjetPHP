<?php include('Parties/menu.php') ?>

<div class="main-content">
    <div class="container">
        <h1>Ajouter Admin</h1>

        <br><br>

        <?php
            if (isset($_SESSION['add']))
            {
                echo $_SESSION['add']; // afficher le message
                unset ($_SESSION['add']); //supprimer le message
            }
        ?>

        <form action="" method="POST">

            <table class="table-30">
                <tr>
                    <td>Nom</td>
                    <td><input type="text" name="nom" placeholder="Entrer votre Nom"></td>
                </tr>

                <tr>
                    <td>Prénom</td>
                    <td><input type="text" name="prénom" placeholder="Entrer votre Prénom"></td>
                </tr>

                <tr>
                    <td>Nom d'utilisateur</td>
                    <td><input type="text" name="username" placeholder="Entrer votre nom d'utilisateur"></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="password" placeholder="Entrer votre mot de passe"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Ajouter Admin" class="button-second">

                    </td>
                </tr>


            </table>

        </form>

    </div>
</div>

<?php include('Parties/footer.php'); ?>



<?php
    //traiter la valeur du formulaire et l'enregistrer dans la base de données
    // vérifier si le bouton de soumission est cliqué ou non

    if (isset($_POST['submit']))
    {
    
        //bouton cliqué

        // obtenir les données du formulaire
        $nom = $_POST['nom'];
        $prénom = $_POST['prénom'];
        $nomUtilisateur = $_POST['username'];
        $motDePasse=md5($_POST['motDePasse']); // cryptage du mot de passe
    
        // Enregistrer les données dans la base
        $sql= "INSERT INTO `admin` SET
            nom='$nom',
            prénom='$prénom',
            nomUtilisateur='$nomUtilisateur',
            motDePasse='$motDePasse'
            ";
        
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //vérifier si les données sont bien enregistrées dans la base
        if($res==true){

            //créer une session pour afficher le message
            $_SESSION['add']= "Admin Added Successfully";
            //rediriger la page à 'manage-admin'
            header("location:".SITEURL.'admin/manage-admin.php');

        }else{
            //créer une session pour afficher le message
            $_SESSION['add']= "Failed to add Admin";
            //rediriger la page à 'manage-admin'
            header("location:".SITEURL.'admin/manage-admin.php');
        }

    }

    



?>