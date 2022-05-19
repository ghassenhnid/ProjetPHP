<?php include('Parties/menu.php'); ?>

<div class="main-content">
    <div class="container">
        <h1>Update Admin</h1>

        <br><br>
        <?php
            //Récupérer la valeur du id de l'admin selectionné
            $id=$_GET['id'];
            // la requête pour récupérer la valeur
            $sql = "SELECT * FROM `admin` WHERE idAdmin=$id";

            $res=mysqli_query($conn,$sql);

            if($res==true){
                $count = mysqli_num_rows($res);
                //vérifier si l'admin existe dans la bdd
                if($count==1){
                    $row=mysqli_fetch_assoc($res);
                    

                    $nom=$row['nom']; 
                    $prénom=$row['prénom'];
                    $nomUtilisateur=$row['nomUtilisateur'];
                }
                else{
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Nom: </td>
                    <td>
                        <input type="text" name="nom" value="<?php echo $nom;?>">
                    </td>
                </tr>
                <tr>
                    <td>Prénom: </td>
                    <td>
                        <input type="text" name="prénom" value="<?php echo $prénom;?>">
                    </td>
                </tr>
                <tr>
                    <td>Nom d'utilisateur: </td>
                    <td>
                        <input type="text" name="nomUtilisateur" value="<?php echo $nomUtilisateur;?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="button-second">
                    </td>
                </tr>
                
                
            </table>
        </form>

    </div>
</div>

<?php

    //vérifier si le bouton a été utilisé
    if (isset($_POST['submit'])){

        $id = $_POST['idAdmin'];
        $nom = $_POST['nom'];
        $prénom = $_POST['prénom'];
        $nomUtilisateur = $_POST['nomUtilisateur'];

        $sql = "UPDATE `admin` SET 
        nom = '$nom', 
        prénom = '$prénom', 
        nomUtilisateur = '$nomUtilisateur' 
        WHERE idAdmin = '$id'
        ";

        $res = mysqli_query($conn, $sql);

        if ($res == true){
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";

            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";

            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }



?>


<?php include('Parties/footer.php'); ?>