<?php
$user_id = $_POST['idUser'];
$user_nom = $_POST['name'];
$user_prenom = $_POST['forname'];
$user_email = $_POST['email'];
$user_mdp = $_POST['password'];

if(!empty($user_nom) && !empty($user_prenom) && !empty($user_email) && !empty($user_mdp)) {

    require_once('../../assets/conf/conf.inc.php');

    $req = $db->query('UPDATE USER SET name = "'.$user_nom.'", forname = "'.$user_prenom.'", email = "'.$user_email.'", password = "'.$user_mdp.'" WHERE idUser = '.$user_id.';');  
    header('Location: /admin/admin.php.php');
}
else {
    echo 'Veuillez remplir tous les champs';
}


?>