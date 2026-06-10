<?php
    function creerpaiment($mode, $statut, $idcmd, $redirect)
{
    // $montant= intval($montant);
    $mode= htmlspecialchars($mode);
    $statut = htmlspecialchars($statut);
    $idcmd = intval($idcmd);
    $date = date('Y-m-d'); 
    include dirname(__DIR__) . '/fonction/connexion.php';

    //calculer le montant
    $red = $connexion->prepare("SELECT qtecmd, coutcmd FROM commande WHERE idcmd=?");
    $red->execute([$idcmd]);
     $mont = $red->fetch(PDO::FETCH_ASSOC);

     if($mont){
        $montant = $mont['qtecmd'] * $mont['coutcmd'];

    $cmd = $connexion->prepare(
        "INSERT INTO paiement
        (modepaie, montant, datepaie, statutpaie, idcmd)
        VALUES (?,?, ?, ?, ?)"
    );

    $cmd->execute([
       $mode, $montant,   $date, $statut, $idcmd
    ]);
    }
}
// creerpaiment("wave", "echoué", 63, "ici")
// voir touut les paiements
  function voirAllPaiement(){
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM paiement");
        $sam->execute();
        $paiements = $sam->fetchAll(PDO::FETCH_ASSOC);
        //  var_dump( $paiements);
        $connexion = null;
    }
    // voirAllPaiement();
   //voir un seul paiement
    function voirPaiement( $id ){
        $id= intval($id);
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM paiement WHERE idpaie= ?");
        $sam->execute([$id]);
        $paiement= $sam->fetch(PDO::FETCH_ASSOC);
        // var_dump($paiement);
         $connexion = null;
    }
    //  voirPaiement(2);
     function updatePaiement( $id ){
         $id= intval($id);
         include dirname(__DIR__). '/fonction/connexion.php';
         $sam = $connexion->prepare("UPDATE paiement  SET statutpaie =  'annulé'  WHERE idpaie = ?");
         $sam->execute([$id]);
         $connexion = null;
     }   
    updatePaiement( 2);
?>