<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');
?>
<form action="/User/resultatRecherchePlante.php" method="get">
    <input type="text" name="texte" placeholder="Nom de la plante">
    <button type="submit">Rechercher</button>
</form>
<?php
if (isset($_GET['texte']) && !empty($_GET['texte'])) {
    $nom = htmlspecialchars($_GET['texte']);
    echo "<p>Voici les résultats pour : $nom</p>";

    // Utiliser un paramètre préparé pour la requête SQL
    $req = $db->prepare("
        SELECT * FROM PLANTE
        INNER JOIN TYPE_PLANTE ON PLANTE.typePlanteId = TYPE_PLANTE.idTypePlante
        LEFT JOIN JARDIN ON PLANTE.jardinId = JARDIN.idJardin
        WHERE plantName LIKE :nom
        GROUP BY PLANTE.idPlante
    ");

    // Ajouter les % pour le LIKE dans la variable PHP
    $searchTerm = '%' . $nom . '%';
    $req->bindParam(':nom', $searchTerm, PDO::PARAM_STR);
    $req->execute();
    $plantes = $req->fetchAll();

    foreach ($plantes as $plante) {
        echo '<article>';
        echo '<a href="#">';
        echo '<figure class="plante-image">';
        echo '<img src="/assets/Uploads/'.$plante['plante_img'].'" alt="'.$plante['plante_img'].'">';
        echo '</figure>';
        echo '<div class="plante-infos">';
        echo '<div class="type-plante">';
        echo '<h1>Nom : ' . $plante['plantName'] . '</h1>';
        echo '</div>';
        echo '<h2>Type : ' . $plante['typeName'] . '</h2>';
        echo '<h3>Origine : ' . $plante['origineName'] . '</h3>';
        echo '<h4>Présent dans le jardin : ' . $plante['name'] . '</h4>';
        echo '</div>';
        echo '</a>';
        echo '</article>';
    }   
}
require_once('../assets/conf/footer.inc.php');
?>
