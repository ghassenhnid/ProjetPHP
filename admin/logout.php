<?php
    include('../config/constantes.php');

    session_destroy();

    header('location:'.SITEURL.'admin/login.php');


?>