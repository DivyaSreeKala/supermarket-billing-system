

<?php
     
    session_start();
    session_destroy();
    unset($_SESSION["id"]);
    unset($_SESSION["pass"]);

    header('Location:index.html');
    exit;
    
 ?>
