<?php
     //ajouter des clients
    function creerClient($nom, $prenom,$adress, $tel,$cartbanque,$idad, $redirect, ?string $password = null){
        $idad = intval($idad);
        $nom = htmlspecialchars($nom);
        $prenom = htmlspecialchars( $prenom);
        $adress =htmlspecialchars($adress);
        $tel= htmlspecialchars($tel);
        $cartbanque = htmlspecialchars($cartbanque);
        $password = htmlspecialchars ($password );
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("INSERT INTO client (nomcli,prenomcli,adressecli,telcli,numbanq,idadmin,passwordcli)
          VALUES (?,?,?,?,?,?,?)");
        $sam->execute([$nom, $prenom,$adress, $tel,$cartbanque,$idad, $password]);
        $connexion = null;
        header("location: $redirect");
    }
    //voir les clients
    function voirClients(){
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM client");
        $sam->execute();
        $clients = $sam->fetchAll(PDO::FETCH_ASSOC);
       // var_dump( $clients);
        $connexion = null;
    }

         //voir un seul client
    function voirClient( $id ){
        $id= intval($id);
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM client WHERE idcli= ?");
        $sam->execute([$id]);
        $client= $sam->fetch(PDO::FETCH_ASSOC);
        //var_dump($client);
        $connexion = null;
    
    }
     //mise à jour de client
    function updateClient($nom, $prenom,$adress, $tel,$cartbanque,$idad,$id, $redirect, ?string $password = null){
        $id= intval($id);
        $idad = intval($idad);
        $nom = htmlspecialchars($nom);
        $prenom = htmlspecialchars( $prenom);
        $adress =htmlspecialchars($adress);
        $tel= htmlspecialchars($tel);
        $cartbanque = htmlspecialchars($cartbanque);
        $password = htmlspecialchars ($password );
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("UPDATE client SET nomcli=?,prenomcli=?,adressecli=?,telcli=?,numbanq=?,idadmin=?,passwordcli=? WHERE idcli=? ");
        $sam->execute([$nom, $prenom,$adress, $tel,$cartbanque,$idad,$password,$id]);
        $connexion = null;
         header("location: $redirect");
    }
     //supprimer client
    function supprimerClient( $id ){
         $id= intval($id);
         include dirname(__DIR__). '/fonction/connexion.php';
         $sam = $connexion->prepare("DELETE FROM client WHERE idcli = ?");
         $sam->execute([$id]);
         $connexion = null;
     }  

?>