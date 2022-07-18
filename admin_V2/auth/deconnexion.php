<?php 
    session_start(); // demarrage de la session
    session_destroy(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
    header("location: /admin_V2/GGRE-connect-ADMIN.php?"); // On redirige
    die();

?>