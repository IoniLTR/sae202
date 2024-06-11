<?php
try {
    // Inclusion de la configuration
    require_once('../../assets/conf/conf.inc.php');

    // Récupération et sécurisation des données POST
    $idJardin = intval($_POST['idJardin']);
    $jardin_name = htmlspecialchars($_POST['name']);
    $jardin_ville = htmlspecialchars($_POST['ville']);
    $jardin_CP = htmlspecialchars($_POST['CP']);
    $jardin_adresse = htmlspecialchars($_POST['adresse']);
    $jardin_taille = intval($_POST['taille']);
    $jardin_max = intval($_POST['max']);
    $jardin_img = htmlspecialchars($_POST['img']);
    $jardin_ownerId = htmlspecialchars($_POST['ownerId']);

    // Préparation de la requête SQL
    $stmt = $db->prepare('UPDATE JARDIN SET 
                          name = :name, 
                          ville = :ville, 
                          CP = :CP, 
                          adresse = :adresse, 
                          taille = :taille, 
                          max = :max, 
                          img = :img, 
                          ownerId = :ownerId 
                          WHERE idJardin = :idJardin');

    // Liaison des valeurs
    $stmt->bindParam(':idJardin', $idJardin, PDO::PARAM_INT);
    $stmt->bindParam(':name', $jardin_name);
    $stmt->bindParam(':ville', $jardin_ville);
    $stmt->bindParam(':CP', $jardin_CP);
    $stmt->bindParam(':adresse', $jardin_adresse);
    $stmt->bindParam(':taille', $jardin_taille, PDO::PARAM_INT);
    $stmt->bindParam(':max', $jardin_max, PDO::PARAM_INT);
    $stmt->bindParam(':img', $jardin_img);
    $stmt->bindParam(':ownerId', $jardin_ownerId);

    // Exécution de la requête avec gestion des erreurs
    if ($stmt->execute()) {
        header('Location: /admin/admin.php');
        exit();
    } else {
        echo "Une erreur s'est produite lors de la mise à jour des données.";
        print_r($stmt->errorInfo()); // Affiche les informations sur l'erreur
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
