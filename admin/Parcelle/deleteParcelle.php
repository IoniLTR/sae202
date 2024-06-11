<?php
/**
 * Connexion à la base de données
 */
require_once('../../assets/conf/conf.inc.php');


if (isset($_GET['num'])) {
    $parcelle_delete = $_GET['num'];

    try {
        $req = $db->prepare('DELETE FROM PARCELLE WHERE idParcelle = :parcelle_delete');
        $req->bindParam(':parcelle_delete', $parcelle_delete, PDO::PARAM_INT);

        if ($req->execute()) {
            header('Location: /admin.php');
            exit(); 
            echo 'Échec de la suppression de la parcelle.';
        }
    } catch (PDOException $e) {
        echo 'Erreur lors de la suppression: ' . $e->getMessage();
    }
} else {
    echo 'Aucun numéro de parcelle spécifié.';
}
?>
