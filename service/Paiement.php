<?php
    function creerPaiment($mode, $idcmd, $redirect)
    {
        $mode = htmlspecialchars($mode);
        $idcmd = intval($idcmd);
        $date = date('Y-m-d'); 
        $statut = 'Paiement éffectué';
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
            VALUES (?, ?, ?, ?, ?)"
        );

        $cmd->execute([
           $mode, $montant,   $date, $statut, $idcmd
        ]);
        }
    }


// voir  un  paiement
    function paiementCommande( $idcmd ){
       $idcmd = intval($idcmd);

       include dirname(__DIR__). '/fonction/connexion.php';        
       $sam = $connexion->prepare("SELECT * FROM paiement WHERE idcmd = ? ");
       $sam->execute([$idcmd]);
       $paiement = $sam->fetch(PDO::FETCH_ASSOC);

       var_dump($paiement);
      $connexion = null;
      
    }

// total du jour
    function totalJour()
    {
        $date = date('Y-m-d');
        include dirname(__DIR__).'/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT SUM(montant) as total FROM paiement WHERE statutpaie = 'paiement éffectué' AND datepaie = ? ");
        $sam->execute([ $date]);
        $total =  $sam->fetch(PDO::FETCH_ASSOC);
        echo $total['total'];
        var_dump($total);
          $connexion = null;
    }


//  total de la semaine
    function totalaSemaine(){
       
       include dirname(__DIR__).'/fonction/connexion.php';
       $sam = $connexion->prepare("SELECT SUM(montant) as total  FROM paiement WHERE statutpaie = 'payé'  AND  WEEK(datepaie) = WEEK(CURDATE())
       AND  YEAR(datepaie) =  YEAR(CURDATE()) ");
       $sam->execute();
       $total =  $sam->fetch(PDO::FETCH_ASSOC);
       echo $total['total'];
       // var_dump($total);
         $connexion = null;
    }


// total du mois
    function totalMois(){
       
       include dirname(__DIR__).'/fonction/connexion.php';
       $sam = $connexion->prepare("SELECT SUM(montant) as total  FROM  paiement WHERE statutpaie = 'paiement éffectué'  AND  MONTH(datepaie) =  MONTH(CURDATE())
       AND  YEAR(datepaie) =  YEAR(CURDATE()) ");
       $sam->execute();
       $total =  $sam->fetch(PDO::FETCH_ASSOC);
        echo $total['total'];
       // var_dump($total);
         $connexion = null;
    }


//  total du jour précédant
    function totalJourAvant(){
       
       include dirname(__DIR__).'/fonction/connexion.php';
       $sam = $connexion->prepare("SELECT  SUM(montant) as total FROM paiement WHERE statutpaie = 'paiement éffectué'  AND DATE(datepaie) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ");
       $sam->execute();
       $total =  $sam->fetch(PDO::FETCH_ASSOC);
        echo $total['total'];
       $connexion = null;
    }


//  total de la semaine précédante
    function totalSemaineAvant(){
      
       $date = date('Y-m-d');
       include dirname(__DIR__).'/fonction/connexion.php';
       $sam = $connexion->prepare("SELECT SUM(montant) as total FROM  paiement
                               WHERE statutpaie = 'paiement éffectué'  AND WEEK(datepaie) = WEEK(DATE_SUB(CURDATE(), INTERVAL 1 WEEK)) 
                               AND YEAR(datepaie) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 WEEK)) 
                                ");
       $sam->execute();
       $total =  $sam->fetch(PDO::FETCH_ASSOC);
        echo $total['total'];
       // var_dump($total);
       $connexion = null;
    }


//   total du mois précédant
    function totalMoisAvant(){
       $date = date('Y-m-d');
       include dirname(__DIR__).'/fonction/connexion.php';
       $sam = $connexion->prepare("SELECT  SUM(montant) as total FROM  paiement
                               WHERE statutpaie = 'paiement éffectué'  AND MONTH(datepaie) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) 
                               AND YEAR(datepaie) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) 
                                ");
       $sam->execute();
       $total =  $sam->fetch(PDO::FETCH_ASSOC);
        echo $total['total'];
       // var_dump($total);
       $connexion = null;
    }


    //  voirPaiement(2);
    //  function updatePaiement( $id ){
    //      $id= intval($id);
    //      include dirname(__DIR__). '/fonction/connexion.php';
    //      $sam = $connexion->prepare("UPDATE paiement  SET statutpaie =  'annulé'  WHERE idpaie = ?");
    //      $sam->execute([$id]);
    //      $connexion = null;
    //  }   
    
?>