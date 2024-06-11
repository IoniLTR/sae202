<?php
    /**
     * Connexion à la base de données
     */
    require_once('../../assets/conf/conf.inc.php');


    
    if (isset($_GET['num'])) {
        $jardin_modifcation = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM JARDIN WHERE idJardin = :jardin_modifcation');
            $req->bindParam(':jardin_modifcation', $jardin_modifcation, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/admin/Jardin/modificationUpdateJardin.php" method="post">';
                echo '<input type="hidden" name="idJardin" value="'.$rep['idJardin'].'">';
                echo '<label for="name">Nom</label>';
                echo '<input type="text" id="name" name="name" value="'.$rep['name'].'">';
                echo '<label for="ville">Ville</label>';
                echo '<input type="text" id="ville" name="ville" value="'.$rep['ville'].'">';  
                echo '<label for="CP">Code Postal</label>';
                echo '<input type="text" id="CP" name="CP" value="'.$rep['CP'].'">';  
                echo '<label for="adresse">Adresse</label>';
                echo '<input type="text" id="adresse" name="adresse" value="'.$rep['adresse'].'">';
                echo '<label for="taille">Taille</label>';
                echo '<input type="number" id="taille" name="taille" value="'.$rep['taille'].'">';
                echo '<label for="max">Nombre Maximum de Personnes</label>';
                echo '<input type="number" id="max" name="max" value="'.$rep['max'].'">'; 
                echo '<label for="img">Image</label>';
                echo '<input type="file" id="img" name="img" value="'.$rep['img'].'">';  
                echo '<label for="ownerId">ID Propriétaire</label>';
                echo '<input type="text" id="ownerId" name="ownerId" value="'.$rep['ownerId'].'">';
                echo '<input type="submit" value="modifier">';
                echo '</form>';
                
            } else {
                echo 'Échec de l\'affichage des données du jardin.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
