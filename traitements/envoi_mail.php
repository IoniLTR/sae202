<?php
if (count($_POST)==0) {
	
}

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$message=$_POST['message'];
$email=$_POST['email'];
$email_content = 'Bonjour, '.$nom.' '.$prenom.', votre demande pour un '.$_POST['fav_language'].' a été prise en compte';



$prenom=mb_strtolower($prenom);
$nom=mb_strtolower($nom);


echo 'Votre nom : '.$prenom.' '.$nom.'<br>';
echo 'Adresse mail : '.$email.'<br>';
echo 'Message : '.$message.'<br>'; 


$subject='Demande pour un '.$_POST['fav_language'].' par '.$prenom.' '.$nom;
$headers['From']=$email;							
$headers['Reply-to']=$email;						
$headers['X-Mailer']='PHP/'.phpversion();	
$headers['MIME-Version'] = '1.0';
$headers['Content-type'] = 'text/html; charset=utf-8';		
$email_dest="ioni.letell@gmail.com";


if (!empty($_POST['nom'])) {
	$nom=ucfirst($_POST['nom']);
} else {
  header('location: ../footer.php');
}
//le mail
if (!empty($_POST['email'])) {
    // Si le champ email contient des données
        // Verification du format de l'email
        if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email=$_POST['email'];
      } else {
      // Si l'email est incorrect on retourne au formulaire  
         header('location: ../footer.php');
      }
  // Si le champ email est vide, on retourne au formulaire     
  } else {
   header('location: ../footer.php');
  }
  if (!empty($_POST['prenom'])) {
	$nom=ucfirst($_POST['prenom']);
} else {
  header('location: ../footer.php');
}
  //message
  if (!empty($_POST['message'])) {
	$nom=ucfirst($_POST['message']);
} else {
  header('location: ../footer.php');
}
  // Vérification des données du formulaire

$affichage_retour = '';														// Lignes à ajouter au début des vérifications
$erreurs=0;

// Exemple pour le nom
if (!empty($_POST['nom'])) {
	$nom=$_POST['nom'];
} else {
    // header('location: contact.php'); 									// Ligne à remplacer
    $affichage_retour .='Le champ NOM est obligatoire<br>';
    $erreurs++;
}


// Exemple pour l'adresse mail
if (!empty($_POST['email'])) {
  
  	// Verification du format de l'email
  	if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
      $email=$_POST['email'];
    } else {
    // Si l'email est incorrect 
    // header('location: contact.php'); 									// Ligne à remplacer
    $affichage_retour .='Adresse mail incorrecte<br>';
    $erreurs++;
    }
        
// Si le champ email est vide
} else {
    // header('location: contact.php'); 									// Ligne à remplacer
    $affichage_retour .='Le champ EMAIL est obligatoire<br>';
    $erreurs++;
}

if ($erreurs == 0)
    //Envoi du mail de contact)
    if (mail($email_dest,$subject,$message,$headers)) {
    $erreurs=0;
    } else {
    $erreurs++;
    echo 'dest mail';
    }
    
    // Préparation des données pour la confirmation
    
    //Envoi du mail de confirmation
    if (mail($email,$subject,$email_content,$headers)) {
    $erreurs=0;
    } else {
    $erreurs++;
    }
    
    // Détermination du message à affichée après les tentatives d'envoi
        $affichage_retour='Votre demande à bien été envoyée';
      
        if ($erreurs != 0) {
      $affichage_retour='Echec de l\'envoi du message';
      }
    
  ?>


<main>

<?php
if ($erreurs == 0) {                                       
echo '<div id="reussite">'."\n";
echo '<p>'.$affichage_retour.'</p>'."\n";
echo '<form action="../index.php">'."\n";
echo '<button type="submit">Retour</button>'."\n";        
echo '</form>'."\n";
echo '</div>'."\n";

} else {                                                 

echo '<div id="echec">'."\n";
echo '<p>'.$affichage_retour.'</p>'."\n";
echo '<form action="../contact.php">'."\n";
echo '<button type="submit">Retour</button>'."\n";       
echo '</form>'."\n";
echo '</div>'."\n";
}
?>