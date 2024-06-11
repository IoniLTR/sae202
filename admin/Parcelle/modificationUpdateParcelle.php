<?php
$parcelle_id = $_POST['idParcelle'];
$parcelle_superficie = $_POST['superficie'];
$parcelle_jardinId = $_POST['jardinId'];
$parcelle_occupantId = $_POST['occupantId'];

if(!empty($parcelle_id) && !empty($parcelle_superficie) && !empty($parcelle_jardinId) && !empty($parcelle_occupantId)) {

    require_once('../../assets/conf/conf.inc.php');

    
    $req = $db->query('UPDATE PARCELLE SET superficie = "'.$parcelle_superficie.'", jardinId = "'.$parcelle_jardinId.'", occupantId = "'.$parcelle_occupantId.'" WHERE idParcelle = '.$parcelle_id.';');  
    header('Location: /admin.php');
}
else {
    echo 'Veuillez remplir tous les champs';
}


?>