<?php

echo '<form action="/admin/User/validationInscriptionUser.php" method="post">';
echo '<div class="flex flex-col w-max">
        <label for="name">Nom</label>
        <input type="text" name="name" placeholder="nom">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="forname">Prénom</label>
        <input type="text" name="forname" placeholder="prenom">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" placeholder="mot de passe">
      </div>';
echo '<div class="flex flex-col w-max button-primary pointer">
        <input type="submit" value="inscription">
      </div>';
echo '</form>';
?>