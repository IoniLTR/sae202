<?php
session_start();
?>
<nav class=" flex center w-ful">
    <div>
        <img src="/assets/img/logo.png" alt="">
    </div>
    <div class="flex justify-end items-center gap-4 w-full text-main">
        <a href="/index.php">Accueil</a>
        <a href="/Jardin/jardinList.php">Jardins</a>
        <a href="/Plante/planteList.php">Plantes</a>
        <a href="/contact.php">Contact</a>
        <a href="/admin/admin.php">Admin</a>
        
        
        <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['id'])): ?>
            <span>
                <?php echo htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']); ?>
            </span>
            <a href="/User/deconnexion.php">Déconnexion</a>
            <a href="/User/profil.php">Profil</a>
        <?php else: ?>
            <a href="/User/userConnexion.php">Connexion</a>
        <?php endif; ?>
    </div>
    
</nav>
