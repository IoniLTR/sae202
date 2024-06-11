<?php
    /**
     * Connexion à la base de données
     */
    require_once('../../assets/conf/conf.inc.php');

    
    if (isset($_GET['num'])) {
        $jardin_delete = $_GET['num'];
    
        try {
            $req = $db->prepare('DELETE FROM JARDIN WHERE idJardin = :jardin_delete');
            $req->bindParam(':jardin_delete', $jardin_delete, PDO::PARAM_INT);
            
            if ($req->execute()) {
                header('Location: /admin.php');
            } else {
                echo 'Échec de la suppression du jardin.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la suppression: ' . $e->getMessage();
        }
    }
?>