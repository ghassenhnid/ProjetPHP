<?php

//appeler le fichier constantes.php
include('../config/constantes.php');

// get the id of the admin to be deleted
echo $id = $_GET['id'];

// créer une requete pour supprimer l'admin
$sql = "DELETE FROM `admin` where idAdmin=$id";

//Executer la requête
$res = mysqli_query($conn,$sql);

//vérifier l'exécution de la requête
if($res==true){
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    header('location:'.SITEURL.'admin/manage-admin.php' );
}else{
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php' );
};



?>