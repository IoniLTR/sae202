<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');

$userId = $_GET['idUser'];
$parcelleId = $_GET['idJardin'];

try {
$req = $db->prepare('SELECT JARDIN.name AS jardinName, JARDIN.img, PARCELLE.superficie
                     FROM JARDIN
                     INNER JOIN PARCELLE ON PARCELLE.idParcelle = JARDIN.idJardin
                     WHERE JARDIN.idJardin = :idJardin');
    $req->bindParam(':idJardin', $parcelleId, PDO::PARAM_INT);
    $req->execute();
    $parcelle = $req->fetch();

    if ($parcelle) {
        echo '<span>Bonjour ' . htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']) . '</span><br>';

        echo '<span>Vous allez rejoindre le jardin ' . htmlspecialchars($parcelle['jardinName']) . 
        ' de ' . htmlspecialchars($parcelle['superficie']) . ' m²</span><br>';

        echo '<img src="' . htmlspecialchars($parcelle['img']) . '" alt="image jardin"><br>';

        echo '<a href="rejoindreConfirmationJardin.php?idJardin=' . htmlspecialchars($parcelleId) . '&idUser=' . htmlspecialchars($userId) . '">CONFIRMER</a>';
    } else {
        echo '<span>La parcelle demandée n\'existe pas.</span>';
    }
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération des jardins: ' . $e->getMessage();
}
?>
