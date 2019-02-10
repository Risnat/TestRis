<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

if (isset ($_SESSION['connecte']))
{}
else
{  $_SESSION['connecte']= 'pasok';}

$trajets= $_SESSION['trajetsPossibles'];
$trajetchoisi=$trajets[$_SESSION['numChoisi']];
$date=$trajetchoisi['date_trajet'];
$heure=$trajetchoisi['heure_trajet'];
$verslycee=$trajetchoisi['vers_lycee'];
$adresse_formatee=$trajetchoisi['adresse_formatee'];
$accepteArret=$trajetchoisi['accepte_arret'];
$email_covoit=$trajetchoisi['email_covoit'];
?>
 <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
       {$message=test_input($_POST["message"]);
  
  //===================
//maj realse
//===================================
include("connexion.php");
$requete = $connexion->prepare('SELECT * from realise  WHERE id_conducteur = '.$trajetchoisi['id_conducteur'].' AND id_trajet='.$trajetchoisi['id_trajet'].' AND nbre_passagers>=1;');

$succes=$requete->execute();
$restePlaces= $requete->fetchAll();
if (count($restePlaces) == 0)
   { echo "plus de place dans ce covoiturage";}
else 
{
$stmt = $connexion->prepare("UPDATE realise SET id_passager1 = :id_passager,nbre_passagers=nbre_passagers-1 WHERE id_conducteur = :id_conducteur AND id_trajet=:id_trajet");

$stmt->bindParam(':id_passager', $_SESSION['id_covoit_connecte']);
$stmt->bindParam(':id_conducteur', $trajetchoisi['id_conducteur']);
$stmt->bindParam(':id_trajet', $trajetchoisi['id_trajet']);
$succes=$stmt->execute();

// mise Ã  jour de la ligne

  if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email_covoit))  // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = $_SESSION['message'];

$message_html = "<html><head></head><body>".$_SESSION['message']."</body></html>";
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());

//=====Définition du sujet.

$sujet = "covoiturage du ". $date." à ".$heure.", une place vient d'être réservée";

//=========

$header = "From: \"passager\"". $_SESSION['usrMail'].$passage_ligne;
$header.= "Reply-to: \"Conducteur\" ". $email_covoit.$passage_ligne; 
$header.= "MIME-Version: 1.0".$passage_ligne; 
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

$messageAEnvoyer = $passage_ligne."--".$boundary.$passage_ligne;;



//=====Ajout du message au format texte.

$messageAEnvoyer.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;

$messageAEnvoyer.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

$messageAEnvoyer.= $passage_ligne.$message_txt.$passage_ligne;

//==========

$messageAEnvoyer.= $passage_ligne."--".$boundary.$passage_ligne;

//=====Ajout du message au format HTML

$messageAEnvoyer.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;

$messageAEnvoyer.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

$messageAEnvoyer.= $passage_ligne.$message_html.$passage_ligne;

//==========

$messageAEnvoyer.= $passage_ligne."--".$boundary."--".$passage_ligne;

$messageAEnvoyer.= $passage_ligne."--".$boundary."--".$passage_ligne;

//==========

 

//=====Envoi de l'e-mail.

mail($_SESSION['usrMail'],$sujet,$messageAEnvoyer,$header);
header('Location: ../index.php');exit();
}}
//==========

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


