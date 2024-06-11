<?php
echo '<form action="/admin/Parcelle/validationInscriptionParcelle.php" method="post">';
echo '<div class="flex flex-col w-max">
        <label for="superficie">Superficie</label>
        <input type="text" name="superficie" placeholder="superficie">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="jardinId">Jardin ID</label>
        <input type="int" name="jardinId" placeholder="jardinId">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="occupantId">Occupant ID</label>
        <input type="int" name="occupantId" placeholder="occupantId">
      </div>';
echo '<div class="flex flex-col w-max button-primary pointer">
        <input type="submit" value="ajouter">
      </div>';
echo '</form>';
?>