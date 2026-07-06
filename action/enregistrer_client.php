<?php
session_start();
include dirname(__DIR__) .'/service/Client.php';

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$adresse = htmlspecialchars($_POST['adresse']);
$tel = htmlspecialchars($_POST['tel']);
$password = htmlspecialchars($_POST['password']);
$redirect = "../nosplats.php";

$compte = voirClientParTel($tel);
if ($compte) {
    $_SESSION['alert'] = "vous avez déja un compte";
    header('Location: ../connexion.php'); 
}
else {
    
    creerClient($nom, $prenom, $adresse, $tel, $password, $redirect);
}
?>