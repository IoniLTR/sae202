<?php
$userId = $_GET['idUser'];
$parcelleId = $_GET['idJardin'];

require_once('../assets/conf/conf.inc.php');

if(!empty($parcelleId) && !empty($userId)) {
    
    $req = $db->prepare('UPDATE PARCELLE SET occupantId = :userId WHERE idParcelle = :parcelleId');
    $req->bindParam(':userId', $userId, PDO::PARAM_INT);
    $req->bindParam(':parcelleId', $parcelleId, PDO::PARAM_INT);
    $req->execute();
        header('Location: /index.php');
}
else {
    echo 'Erreur, nous n\'avons pas pu vous inscrire au jardin. Veuillez réessayer plus tard.';
}
