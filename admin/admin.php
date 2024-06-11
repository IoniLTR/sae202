<body>
<?php 
    /**
     * Connexion à la base de données
     */
    require_once('../assets/conf/head.inc.php');
    require_once('../assets/conf/conf.inc.php');
    require_once('../assets/conf/header.inc.php');
?>
<div>
    <button class="view-button button-secondary" data-view="Users" onclick="setView('Users')">Users</button>
    <button class=" view-button button-primary" data-view="Jardins" onclick="setView('Jardins')">Jardins</button>
    <button class=" view-button button-primary" data-view="Parcelles" onclick="setView('Parcelles')">Parcelles</button>
    <button class=" view-button button-primary" data-view="Plantes" onclick="setView('Plantes')">Plantes</button>
    <button class=" view-button button-primary" data-view="Type_Plante" onclick="setView('Type_Plante')">Type Plante</button>
    <button class=" view-button button-primary" data-view="Recettes" onclick="setView('Recettes')">Recettes</button>
</div>


<div class="view Users">
<?php
    /**
     * Affichage des données de la table USER
     */
    $req = $db->query("SELECT * FROM USER;");
    require_once('../admin/User/inscriptionUser.php');
    echo '<table>';
    echo '<tr class="text-main">';
    echo '<th>idUser</th>';
    echo '<th>name</th>';
    echo '<th>forname</th>';
    echo '<th>email</th>';
    echo '<th>password</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8">';
        echo '<td class="p-5">'.$rep['idUser'].'</td>';
        echo '<td class="p-5">'.$rep['name'].'</td>';
        echo '<td class="p-5">'.$rep['forname'].'</td>';
        echo '<td class="p-5">'.$rep['email'].'</td>';
        echo '<td class="p-5">'.$rep['password'].'</td>';
        echo '<td class="p-5"><a class="button-primary" href="/admin/User/modificationUser.php?num='. $rep['idUser'] . '">MODIFIER</a></td>';
        echo '<td class="p-5"><a class="button-tercery" href="/admin/User/deleteUser.php?num='. $rep['idUser'] . '">SUPPRIMER</a></td>';
        echo '</tr>';
    }
    echo '</table>';
?>
</div>

<div class="view Jardins">
    <?php
    /**
     * Affichage des données de la table JARDIN
     */
    require_once('../admin/Jardin/inscriptionJardin.php');
     
    $req = $db->query("SELECT * FROM JARDIN;");
    echo '<table>';
    echo '<tr class="text-main">';
    echo '<th>idJardin</th>';
    echo '<th>name</th>';
    echo '<th>ville</th>';
    echo '<th>CP</th>';
    echo '<th>adresse</th>';
    echo '<th>taille</th>';
    echo '<th>max</th>';
    echo '<th>ownerId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8 p-5">';
        echo '<td class="p-5">'.$rep['idJardin'].'</td>'; 
        echo '<td class="p-5">'.$rep['name'].'</td>';
        echo '<td class="p-5">'.$rep['ville'].'</td>';
        echo '<td class="p-5">'.$rep['CP'].'</td>';
        echo '<td class="p-5">'.$rep['adresse'].'</td>';
        echo '<td class="p-5">'.$rep['taille'].'</td>';
        echo '<td class="p-5">'.$rep['max'].'</td>';
        echo '<td class="p-5">'.$rep['ownerId'].'</td>';
        echo '<td class="p-5"><a class="button-primary" href="/admin/Jardin/modificationJardin.php?num='. $rep['idJardin'] . '">MODIFIER</a></td>';
        echo '<td class="p-5"><a class="button-tercery" href="/admin/Jardin/deleteJardin.php?num='. $rep['idJardin'] . '">SUPPRIMER</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>

<div class="view Parcelles">
    <?php
    /**
     * Affichage des données de la table PARCELLE
     */
    require_once('../admin/Parcelle/inscriptionParcelle.php');

    $req = $db->query(" SELECT PARCELLE.idParcelle, PARCELLE.superficie, PARCELLE.jardinId, PARCELLE.occupantId,
                                JARDIN.name AS jardinName, 
                                USER.email AS userEmail
                        FROM PARCELLE
                        INNER JOIN JARDIN ON JARDIN.idJardin = PARCELLE.idParcelle
                        INNER JOIN USER ON USER.idUser = PARCELLE.idParcelle
;");
    echo '<table>';
    echo '<tr class="text-main">';
    echo '<th>idParcelle</th>';
    echo '<th>superficie</th>';
    echo '<th>jardinId</th>';
    echo '<th>nomJardin</th>';
    echo '<th>occupantId</th>';
    echo '<th>emailOccupant</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8 p-5">';
        echo '<td class="p-5">'.$rep['idParcelle'].'</td>';
        echo '<td class="p-5">'.$rep['superficie'].'</td>';
        echo '<td class="p-5">'.$rep['jardinId'].'</td>';
        echo '<td class="p-5">'.$rep['jardinName'].'</td>';
        echo '<td class="p-5">'.$rep['occupantId'].'</td>';
        echo '<td class="p-5">'.$rep['userEmail'].'</td>';
        echo '<td class="p-5"><a class="button-primary" href="/admin/Parcelle/modificationParcelle.php?num='. $rep['idParcelle'] . '">MODIFIER</a></td>';
        echo '<td class="p-5"><a class="button-tercery" href="/admin/Parcelle/deleteParcelle.php?num='. $rep['idParcelle'] . '">SUPPRIMER</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>

<div class="view Plantes">
    <?php
    /**
     * Affichage des données de la table PLANTE
     */
    $req = $db->query("SELECT * FROM PLANTE;");
    echo '<table>';
    echo '<tr class="text-main">';
    echo '<th>idPlante</th>';
    echo '<th>name</th>';
    echo '<th>typePlanteId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr> class="h-8 p-5"';
        echo '<td class"p-5">'.$rep['idPlante'].'</td>';
        echo '<td class"p-5">'.$rep['name'].'</td>';
        echo '<td class"p-5">'.$rep['typePlanteId'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>

<div class="view Type_Plante">
    <?php
    /**
     * Affichage des données de la table TYPE_PLANTE
     */
    $req = $db->query("SELECT * FROM TYPE_PLANTE;");
    echo '<table>';
    echo '<tr class="text-main">';
    echo '<th>idTypePlante</th>';
    echo '<th>typeName</th>';
    echo '<th>origineName</th>'; 
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="p-5">';
        echo '<td class="p-5">'.$rep['idTypePlante'].'</td>';
        echo '<td class="p-5">'.$rep['typeName'].'</td>';
        echo '<td class="p-5">'.$rep['origineName'].'</td>'; 
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>

<div class="view Recette">
    <?php
    /**
     * Affichage des données de la table RECETTE
     */
    $req = $db->query("SELECT * FROM RECETTE;");
    echo '<table>';
    echo '<tr class="text-main">';
    echo '<th>idRecette</th>';
    echo '<th>name</th>';
    echo '<th>creatorId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="p-5">';
        echo '<td class="p-5">'.$rep['idRecette'].'</td>';
        echo '<td class="p-5">'.$rep['name'].'</td>';
        echo '<td class="p-5">'.$rep['creatorId'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>
<script src="../assets/js/adminPanel.js"></script>
</body>
