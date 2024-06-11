<?php
require_once('../../assets/conf/conf.inc.php');

$jardin_name = htmlspecialchars($_POST['name']);
$jardin_ville = htmlspecialchars($_POST['ville']);
$jardin_CP = htmlspecialchars($_POST['CP']);
$jardin_adresse = htmlspecialchars($_POST['adresse']);
$jardin_taille = intval($_POST['taille']);
$jardin_max = intval($_POST['max']);
$jardin_img = htmlspecialchars($_POST['img']);
$jardin_ownerId = htmlspecialchars($_POST['ownerId']);

$sql = 'INSERT INTO JARDIN (name, ville, CP, adresse, taille, max, img, ownerId) 
        VALUES ("'.$jardin_name.'", "'.$jardin_ville.'", "'.$jardin_CP.'", "'.$jardin_adresse.'", '.$jardin_taille.', '.$jardin_max.', "'.$jardin_img.'", "'.$jardin_ownerId.'")';

$stmt = $db->query($sql);

header('Location: /admin.php');
?>
