<?php
    session_start();

    // $motdepass  = htmlspecialchars($motdepass);
    // $tel  = htmlspecialchars($tel);
    $motdepass = '0909';
   $tel = '034872627' ;
    include dirname(__DIR__) . '/fonction/connexion.php';
    $sam = $connexion->prepare("SELECT * FROM client WHERE telcli = ?" );
    $sam->execute([$tel]);
    $compte = $sam->fetch(PDO::FETCH_ASSOC);
    if( $compte ){
        $P1 = $compte['passwordcli'];
        if (($motdepass === $P1) ){
          $_SESSION['nomcli'] = $compte['nomcli'];
          $_SESSION['prenomcli'] = $compte['prenomcli'];
          $_SESSION['adressecli'] =$compte['adressecli'];
          $_SESSION['telcli'] = $compte['telcli'];
          $_SESSION['numbanq'] =$compte['numbanq'];

        }    
    }
     $sam = $connexion->prepare("SELECT * FROM admin WHERE teladmin = ?" );
     $sam->execute([$tel]);
     $compte = $sam->fetch(PDO::FETCH_ASSOC);
     if($compte){
         $P1 = $compte['password'];
        if ($motdepass===$P1){
             $_SESSION['nomadmin'] =$compte['nomadmin'];
             $_SESSION['prenomadmin'] = $compte['prenomadmin'];
             $_SESSION['teladmin'] = $compte['teladmin'];
             header('location:../index.php');
            
         }
         else{
             echo 'Connexion échoué admin';
             return;
         }
     }
     else{
        echo 'connexion échoué admin et client';
     }
            
    
        
?>