<?php

function creerCommande($quantite, $cout, $statut, $idcli, $idpro, $redirect)
{
    $idpro = intval($idpro);
    // $date = htmlspecialchars($date);
    $quantite = intval($quantite);
    $cout = intval($cout);
    // $statut = htmlspecialchars($statut);
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
        // return;
    }

    $stockDisponible = $produit['stockprod'];

    // Vérification du stock
    if ($stockDisponible < $quantite) {
        echo "Stock insuffisant. Disponible : " . $stockDisponible;
        // return;
    }

    // Création de la commande
    $cmd = $connexion->prepare(
        "INSERT INTO commande
        (datecmd, qtecmd, coutcmd, statutcmd, idcli, idprod)
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
    // $date = date('Y-m-d');
    // for ($i = 1 ; $i < 6 ; $i++){
    //     creerCommande(2,500,"éffectué",2,1,"ici");
    //     creerCommande(3,500,"en cours",1,1,"ici");
    //     creerCommande(1,500,"annulée",3,1,"ici");
    //     }
        //voir tout les commandes
    function voirAllCommande(){
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM commande");
        $sam->execute();
        $commandes = $sam->fetchAll(PDO::FETCH_ASSOC);
        //  var_dump( $commandes);
        $connexion = null;
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
    function updatecommande($date, $quantite, $cout, $statut, $idcli, $idpro, $redirect,$id){
       $id = intval($id); 
    $idpro = intval($idpro);
    $date = htmlspecialchars($date);
    $quantite = intval($quantite);
    $cout = intval($cout);
    $statut = htmlspecialchars($statut);
    $idcli = intval($idcli);

    include dirname(__DIR__) . '/fonction/connexion.php';

        $sam = $connexion->prepare("UPDATE commande SET datecmd = STR_TO_DATE(?,'%d/%m/%Y'), qtecmd = ?, coutcmd = ?, statutcmd = ?, idcli = ?, idprod = ? WHERE idcmd = ? ");
        $sam->execute([$date, $quantite, $cout, $statut, $idcli, $idpro,$id]);
        $connexion = null;
        //  header("location: $redirect");
    }
    //supprimer commande
    function supprimercommande( $id ){
         $id= intval($id);
         include dirname(__DIR__). '/fonction/connexion.php';
         $sam = $connexion->prepare("DELETE FROM commande WHERE idcmd = ?");
         $sam->execute([$id]);
         $connexion = null;
     }    

    //  ---------------------------- fonction de filtrage de commande

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
    // commandeJour("annulée");
    function commandesemaine($statut){
        $statut = htmlspecialchars($statut);
        $date = date('Y-m-d');
        include dirname(__DIR__).'/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM commande WHERE  WEEK(datecmd) = WEEK(CURDATE())
        AND  YEAR(datecmd) =  YEAR(CURDATE()) AND statutcmd = ?");
        $sam->execute([$statut]);
        $commande =  $sam->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($commande);
          $connexion = null;
    }
    // commandesemaine("annulée");
    // commandesemaine();
     function commandemois($statut){
        $statut = htmlspecialchars($statut);
        $date = date('Y-m-d');
        include dirname(__DIR__).'/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM commande WHERE   MONTH(datecmd) =  MONTH(CURDATE())
        AND  YEAR(datecmd) =  YEAR(CURDATE()) AND statutcmd = ?");
        $sam->execute([$statut]);
        $commande =  $sam->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($commande);
          $connexion = null;
    }
    // commandemois("éffectué");
     function commandeJourAvant($statut){
        $statut = htmlspecialchars($statut);
        $date = date('Y-m-d');
        include dirname(__DIR__).'/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM commande WHERE  DATE(datecmd) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND statutcmd = ?");
        $sam->execute([$statut]);
        $commande =  $sam->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($commande);
        $connexion = null;
     }
    //  commandeJourAvant("éffectuée");
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
    //  commandeSemaineAvant("annulée");
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
    //  commandeMoisAvant("éffectué");
?>