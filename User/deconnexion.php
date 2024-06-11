<?php
    session_start();

    //on détruit la session
    session_destroy();

    //on redirige l'utilisateur vers la page d'accueil
    header('Location:  /index.php');
?>