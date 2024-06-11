<?php
    /**
     * Connexion à la base de données
     */
    require_once('../../assets/conf/conf.inc.php');

    
    if (isset($_GET['num'])) {
        $user_delete = $_GET['num'];
    
        try {
            $req = $db->prepare('DELETE FROM USER WHERE idUser = :user_delete');
            $req->bindParam(':user_delete', $user_delete, PDO::PARAM_INT);
            
            if ($req->execute()) {
                header('Location: /admin/admin.php');
            } else {
                echo 'Échec de la suppression de l\'utilisateur.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la suppression: ' . $e->getMessage();
        }
    }
?>