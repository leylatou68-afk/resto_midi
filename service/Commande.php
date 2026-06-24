<?php

// ajouter une commande
function creerCommande($quantite, $cout, $idcli, $idpro, $redirect)
{
$idpro = intval($idpro);
$quantite = intval($quantite);
$cout = intval($cout);
$statut = 'en cours';
$idcli = intval($idcli);
$date = date('Y-m-d'); 
include dirname(__DIR__) . '/fonction/connexion.php';
// Vérifier le stock disponible
$req = $connexion->prepare(
    "SELECT stockprod FROM produit WHERE idprod = ?"
);
$req->execute([$idpro]);
$produit = $req->fetch(PDO::FETCH_ASSOC);
if (!$produit) {
    echo "Produit introuvable";
    return;
}
$stockDisponible = $produit['stockprod'];
if ($stockDisponible < $quantite) {
    echo "Stock insuffisant. Disponible : " . $stockDisponible;
    return;
}
$cmd = $connexion->prepare(
    "INSERT INTO commande
    (datecmd, qtecmd, coutcmd, statutcmd , idcli, idprod)
    VALUES (?, ?, ?, ?, ?, ?)"
);
$cmd->execute([
    $date,
    $quantite,
    $cout,
    $statut,
    $idcli,
    $idpro
]);
// Mise à jour du stock
$nouveauStock = $stockDisponible - $quantite;
$update = $connexion->prepare(
    "UPDATE produit SET stockprod = ? WHERE idprod = ?"
);
$update->execute([
    $nouveauStock,
    $idpro
]);
echo "Commande enregistrée avec succès.";
$connexion = null;
// header("Location: $redirect");
}

//voir une seule commande
function voirCommande( $id ){
$id= intval($id);
include dirname(__DIR__). '/fonction/connexion.php';
$sam = $connexion->prepare("SELECT * FROM commande WHERE idcmd= ?");
$sam->execute([$id]);
$commande= $sam->fetch(PDO::FETCH_ASSOC);
// var_dump($commande);
$connexion = null;
}

//mise à jour de commande
function updatecommande( $quantite, $cout, $idcli, $idpro, $redirect,$id){
   $id = intval($id); 
   $idpro = intval($idpro);
   $quantite = intval($quantite);
   $cout = intval($cout);
   $statut = 'en cours';
   $idcli = intval($idcli);
   $date = date('Y-m-d'); 
   include dirname(__DIR__) . '/fonction/connexion.php';
   $sam = $connexion->prepare("UPDATE commande SET datecmd = STR_TO_DATE(?,'%d/%m/%Y'), qtecmd = ?,
                                 coutcmd = ?, statutcmd = ?, idcli = ?, idprod = ? WHERE idcmd = ? ");
   $sam->execute([$date, $quantite, $cout, $statut, $idcli, $idpro,$id]);
   $connexion = null;
     header("location: $redirect");
}

// annuler une commande
function annulerCommande( $idcmd, $idcli ){
     $idcmd = intval($idcmd);
     $idcli = intval($idcli);
     include dirname(__DIR__). '/fonction/connexion.php';
     $sam = $connexion->prepare("SELECT idcli  FROM commande WHERE idcmd=? ");
     $sam->execute([$idcmd]);
     $commande = $sam->fetch(PDO::FETCH_ASSOC);
        if($idcli == $commande['idcli'] ){
             $sam = $connexion->prepare(" UPDATE commande  SET  statutcmd ='Annulée' WHERE idcmd = ?  ");
             $sam->execute([$idcmd]);
        }
        else{
          echo 'Erreur de demande.';
        }
    $connexion = null;
}  

//  les commandes de la journéé
function commandeJour($statut)
{
    $statut = htmlspecialchars($statut);
    $date = date('Y-m-d');
    include dirname(__DIR__).'/fonction/connexion.php';
    $sam = $connexion->prepare("SELECT *  FROM commande WHERE statutcmd = ? AND datecmd = ? ");
    $sam->execute([$statut, $date]);
    $commande =  $sam->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($commande);
      $connexion = null;
}

// commandes de la semaine
function commandeSemaine($statut){
    $statut = htmlspecialchars($statut);
    include dirname(__DIR__).'/fonction/connexion.php';
    $sam = $connexion->prepare("SELECT * FROM commande WHERE  WEEK(datecmd) = WEEK(CURDATE())
    AND  YEAR(datecmd) =  YEAR(CURDATE()) AND statutcmd = ?");
    $sam->execute([$statut]);
    $commande =  $sam->fetchAll(PDO::FETCH_ASSOC);
    $connexion = null;
}

// commandes du mois
 function commandeMois($statut){
    $statut = htmlspecialchars($statut);
    include dirname(__DIR__).'/fonction/connexion.php';
    $sam = $connexion->prepare("SELECT * FROM commande WHERE   MONTH(datecmd) =  MONTH(CURDATE())
    AND  YEAR(datecmd) =  YEAR(CURDATE()) AND statutcmd = ?");
    $sam->execute([$statut]);
    $commande =  $sam->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($commande);
      $connexion = null;
}

// les commandes de la journée précédante
 function commandeJourAvant($statut){
    $statut = htmlspecialchars($statut);
    include dirname(__DIR__).'/fonction/connexion.php';
    $sam = $connexion->prepare("SELECT * FROM commande WHERE  DATE(datecmd) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND statutcmd = ?");
    $sam->execute([$statut]);
    $commande =  $sam->fetchAll(PDO::FETCH_ASSOC);
    $connexion = null;
}

// les commandesde la semaine précédante
 function commandeSemaineAvant($statut){
    $statut = htmlspecialchars($statut);
    $date = date('Y-m-d');
    include dirname(__DIR__).'/fonction/connexion.php';
    $sam = $connexion->prepare("SELECT * FROM commande 
                            WHERE WEEK(datecmd) = WEEK(DATE_SUB(CURDATE(), INTERVAL 1 WEEK)) 
                            AND YEAR(datecmd) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 WEEK)) 
                            AND statutcmd = ?");
    $sam->execute([$statut]);
    $commande =  $sam->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($commande);
    $connexion = null;
}

// les commandes du mois précédantte
 function commandeMoisAvant($statut){
    $statut = htmlspecialchars($statut);
    $date = date('Y-m-d');
    include dirname(__DIR__).'/fonction/connexion.php';
    $sam = $connexion->prepare("SELECT * FROM commande 
                            WHERE MONTH(datecmd) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) 
                            AND YEAR(datecmd) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) 
                            AND statutcmd = ?");
    $sam->execute([$statut]);
    $commande =  $sam->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($commande);
    $connexion = null;
}


?>