<body>
<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');

echo '<form action="/Recette/updateProposerRecette.php" method="post">';
echo '<div class="flex flex-col w-max">';
echo '<label for="nomRecette">nomRecette</label>';
echo '<input type="text" id="nomRecette" name="nomRecette" placeholder="Nom">';
echo '</div>';

echo '<div class="flex flex-col w-max">';
echo '<label for="descriptionRecette">descriptionRecette</label>';
echo '<input type="text" id="descriptionRecette" name="descriptionRecette" placeholder="Description">';
echo '</div>';

echo '<div class="flex flex-col w-max">';
echo '<label for="image">Image</label>';
echo '<input type="file" id="image" name="image" placeholder="Image">';
echo '</div>';

echo '<div class="flex flex-col w-max">';
echo '<label for="plante">Composition Plante</label>';
$req = $db->prepare('SELECT * FROM PLANTE');
$req->execute();
$plantes = $req->fetchAll();
foreach ($plantes as $plante) {
    echo '<div class="flex">';
    echo '<input type="checkbox" id="' . htmlspecialchars($plante['idPlante']) . '" name="planteCheckbox[]" value="' . htmlspecialchars($plante['idPlante']) . '">';
    echo '<label for="' . htmlspecialchars($plante['idPlante']) . '">' . htmlspecialchars($plante['name']) . '</label>';
    echo '</div>';
}

$req2 = $db->prepare('SELECT * FROM JARDIN');
$req2->execute();
$jardins = $req2->fetchAll();

echo '<select id="nomJardin" name="nomJardin">';
foreach ($jardins as $jardin) {
    echo '<option value="' . htmlspecialchars($jardin['name']) . '">' . htmlspecialchars($jardin['name']) . '</option>';
}
echo '</select>';

echo '<div class="flex flex-col w-max button-primary pointer">';
echo '<input type="submit" value="Ajouter">';
echo '</div>';

echo '</form>';
?>
<script src="/assets/js/ajouterPlante.js"></script>
</body>