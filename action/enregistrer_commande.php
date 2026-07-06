<?php
session_start();

include dirname(__DIR__) .'/service/Commande.php';

$nom =$_SESSION['nomcli']; 
$prenom =$_SESSION['prenomcli'];
$adresse =$_SESSION['adressecli'];
$tel =$_SESSION['telcli'];
$password = $_SESSION['passwordcli'];
$redirect = "../nosplats.php";

if( empty($tel)){
    header('Location: ../connexion.php'); 
    exit;
}
else{
    header('Location: ../monpanier.php'); 
    exit;
}
var_dump($_SESSION['nomcli']);

?>