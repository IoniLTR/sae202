<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');
?>

<form action="/User/resultatRechercheJardin.php" method="get">
<input type="text" name="texte" placeholder="Nom du jardin">
<button type="submit" >Rechercher</button>
</form>
<h2>JARDINS</h2>

<?php
try {
    $req = $db->prepare('SELECT JARDIN.idJardin, JARDIN.ownerId, JARDIN.name AS jardinName, JARDIN.ville, JARDIN.CP, JARDIN.adresse, JARDIN.taille, JARDIN.max, JARDIN.img, USER.name AS userName, USER.forname AS userForname, USER.email AS userEmail, COUNT(PARCELLE.idParcelle) AS countParcelles
        FROM JARDIN 
        INNER JOIN USER 
        ON JARDIN.ownerId = USER.idUser
        LEFT JOIN PARCELLE
        ON PARCELLE.jardinId = JARDIN.idJardin
        GROUP BY JARDIN.idJardin');
    $req->execute();
    $jardins = $req->fetchAll();

    if (!empty($_SESSION['id'])) {
        echo '<a class="button-primary" href="/Jardin/proposerJardin.php">Proposer un jardin</a>';
    }

    echo '<div class="flex flex-col gap-8">';
    foreach ($jardins as $jardin) {
        echo '<div class="relative border-2 border-main rounded-xl overflow-hidden">';

        echo '<div class="relative overflow-hidden h-36 w-full">';
            echo '<img class="w-full h-hull" src="/assets/Uploads/' . ($jardin['img']) . '"></img>';
            
            echo '<div class="absolute bottom-2 right-2 flex p-2 bg-grey bg-opacity-50 rounded-lg mix-blend-hard-light	 flex-col center items-center">';
            if (!empty($jardin['userName']) && !empty($jardin['userForname']) && !empty($jardin['userEmail'])) {
                echo '<p> ' . htmlspecialchars($jardin['userName']) . ' ' . htmlspecialchars($jardin['userForname']);
                echo '<p class="satoshi-light"> ' . htmlspecialchars($jardin['userEmail']) . ' </p>';
            } else {
                echo '<p>Responsable: Inconnu</p>';
            }
            echo '</div>';
        echo '</div>';

        echo '<div class="p-6 relative block">';
        echo '<p class="satoshi-light">' . htmlspecialchars($jardin['ville']) . ' - ' . htmlspecialchars($jardin['CP']) . ' - ' . htmlspecialchars($jardin['adresse']) .'</p>';

        echo '<p class="text-xl text-main satoshi-medium py-2">' . htmlspecialchars($jardin['jardinName']) . '</p>';

        echo '<p> Parcelle disponible: ' . htmlspecialchars($jardin['countParcelles']) . '/' . htmlspecialchars($jardin['max']) . '</p>';
        echo '<p class="pb  -4">' . htmlspecialchars($jardin['taille']) . 'm²</p>';




        if (!empty($_SESSION['id'])) {
            if ($jardin['countParcelles'] < $jardin['max'] && $jardin['ownerId'] != $_SESSION['id'] && $jardin['countParcelles'] > 0) {
                echo '<a class="button-primary " href="rejoindreJardin.php?idJardin=' . htmlspecialchars($jardin['idJardin']) . '&idUser=' . htmlspecialchars($_SESSION['id']) . '">Rejoindre</a>';
            } else {
                echo '<span>Parcelles pleines</span>';
            }
        } else {
            echo '<span>Connectez-vous pour rejoindre une parcelle</span>';
        }
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération des jardins: ' . $e->getMessage();
}
?>

<?php
require_once('../assets/conf/footer.inc.php');
?>
