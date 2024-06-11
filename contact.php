
<?php 
    require_once('./assets/conf/head.inc.php');
    require_once('./assets/conf/conf.inc.php');
    require_once('./assets/conf/header.inc.php');
    ?>

<form class="formulaire" action="traitements/envoi_mail.php" method="post">
    <div id="en-tete">
    
    <div>
        <label class="ecriture" for="prenom"><span></span></label>
        <input type="text" name="prenom" id="prenom" placeholder="Votre Prénom" required>
    </div>
    
    <div>
        <label class="ecriture" for="nom"><span></span></label>
        <input type="text" name="nom" id="nom" placeholder="Votre Nom "required>
    </div>
    </div>

    <label class="ecriture" for="email"><span></span></label>
    <input type="text" name="email" id="email" placeholder="Votre Email" required>

    <div id="buttoncontact">

    <input type="radio" id="devis" name="fav_language" value="Problème de parcelles">
    <label class="ecriture" for="devis">Problème de parcelles</label>

    <input type="radio" id="information" name="fav_language" value="Renseignement">
    <label class="ecriture" for="information">Renseignements</label><br>

    <input type="radio" id="reclamation" name="fav_language" value="Bug">
    <label class="ecrituree" for="bug">Bug sur le site</label><br>

    </div>

    <label class="ecriture" for="message"><span></span></label>
    <textarea name="message" id="message" placeholder="Votre Message" required>
    </textarea>
    <input class="send" type="submit" value="Envoyer">
</form>

<?php 
    require_once('./assets/conf/footer.inc.php');
    ?>