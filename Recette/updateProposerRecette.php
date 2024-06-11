<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');

$nomRecette = $_POST['nomRecette'];
$descriptionRecette = $_POST['descriptionRecette'];
$image = $_POST['image'];
$idJardin = $_POST['idJardin'];
$creatorId = $_SESSION['id'];
$plantes = $_POST['planteCheckbox'];

$req = $db->prepare('INSERT INTO RECETTE (name, description, img, creatorId) VALUES (:nomRecette, :descriptionRecette, :image, :creatorId)');
$req->execute(array(
    'nomRecette' => $nomRecette,
    'descriptionRecette' => $descriptionRecette,
    'image' => $image,
    'creatorId' => $creatorId
));

$lastRecetteId = $db->lastInsertId();

foreach ($plantes as $planteId) {
    $req2 = $db->prepare('INSERT INTO RECETTE_PLANTE (idRecette, idPlante) VALUES (:idRecette, :idPlante)');
    $req2->execute(array(
        'idRecette' => $lastRecetteId,
        'idPlante' => $planteId
    ));
}

header('Location: /admin/admin.php');
?>
