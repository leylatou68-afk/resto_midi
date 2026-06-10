<?php
      function creerliker($statut, $idprod,$idcli, $redirect)
{
    $statut = htmlspecialchars($statut);
    $idprod= intval($idprod);
    $idcli= intval($idcli);
   
    include dirname(__DIR__) . '/fonction/connexion.php';
    $cmd = $connexion->prepare(
        "INSERT INTO liker
        (statutliker, idprod,idcli)
        VALUES (?, ?, ?)"
    );

    $cmd->execute([ $statut, $idprod,$idcli ]);
}
// creerliker("non",5,3,"ici");
//voir les likes
 function voirAllLiker(){
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM liker");
        $sam->execute();
        $likers = $sam->fetchAll(PDO::FETCH_ASSOC);
        //  var_dump( $likers);
        $connexion = null;
    }
    // voirAllLiker();
   //voir un seul like
    function voirLiker( $id ){
        $id= intval($id);
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM liker WHERE idliker= ?");
        $sam->execute([$id]);
        $liker= $sam->fetch(PDO::FETCH_ASSOC);
        // var_dump($liker);
         $connexion = null;
    }
    // voirLiker(2);
    // supprimer un like
    function supprimerLiker( $id ){
         $id= intval($id);
         include dirname(__DIR__). '/fonction/connexion.php';
         $sam = $connexion->prepare("DELETE FROM liker WHERE idliker = ?");
         $sam->execute([$id]);
         $connexion = null;
     }    
    // supprimerLiker(3);
?>