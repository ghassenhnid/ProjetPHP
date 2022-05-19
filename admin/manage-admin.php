<?php include('Parties/menu.php') ?>



    <div class="main-content">
        <div class="container">
            <h1>Manage Admins</h1>
            <br/>

            <?php
                if (isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; // afficher le message
                    unset ($_SESSION['add']); //supprimer le message
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset ($_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                }
            ?>
            <br><br>


            <!--bouton pour ajouter un admin -->
            <a href="ajouter-admin.php" class="button-first">Ajouter un admin</a>
            <br/><br/><br/>

            <table class="table-full">
                <tr>
                    <th>S.N.</th>
                    <th>Nom + Prénom</th>
                    <th>Nom d'utilisateur</th>
                    <th>Actions</th>
                </tr>


                <?php

                    $sql = "SELECT * FROM `admin` ";
                    $res = mysqli_query($conn, $sql);
                    $numDeSérie=1;

                    if ($res==True){
                        //nombre de ligne(s):
                        $rows = mysqli_num_rows($res);
                    }
                    if ($rows>0){
                        while($rows = mysqli_fetch_assoc($res)){
                            $id=$rows['idAdmin'];
                            $nom=$rows['nom'];
                            $prénom=$rows['prénom'];
                            $nomUtilisateur=$rows['nomUtilisateur'];
                        ?>
                        <tr>
                            <td><?php echo $numDeSérie++ ;?>.</td>
                            <td><?php echo $nom.' '.$prénom;?></td>
                            <td><?php echo $nomUtilisateur;?></td>
                            <td>
                                <a href="<?php echo SITEURL ?>admin/réactualiser-admin.php?id=<?php echo $id?>" class="button-second">Update Admin</a>
                                <a href="<?php echo SITEURL ?>admin/supprimer-admin.php?id=<?php echo $id?>" class="button-third">Delete Admin</a>
                                
                            </td>
                        </tr>
                        <?php
                        }
                    
                    }else{

                    }
                ?>

            </table>
        
        </div>
    </div>

<?php include('Parties/footer.php'); ?>