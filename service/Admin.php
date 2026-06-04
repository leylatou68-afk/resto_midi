<?php 
    //ajouter admin
    function creerAdmin($nom, $prenom, $tel, $redirect, ?int $password = null){
        $nom = htmlspecialchars($nom);
        $prenom = htmlspecialchars($prenom);
        $tel = htmlspecialchars($tel);
        $password = htmlspecialchars($password);
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("INSERT INTO admin (nomadmin,prenomadmin,teladmin,password) VALUES (?,?,?,?)");
        $sam->execute([$nom, $prenom,$tel,$password]);
        $connexion = null;
        header("location: $redirect");

    }
    
    //voir tout les admins
    function voirAllAdmin(){
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM admin");
        $sam->execute();
        $admins = $sam->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($admins);
         $connexion = null;
    }

     //voir un seul admin
    function voirAdmin( $id ){
        $id= intval($id);
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM admin WHERE idadmin= ?");
        $sam->execute([$id]);
        $admin = $sam->fetch(PDO::FETCH_ASSOC);
       // var_dump($admin);
         $connexion = null;
    }

    //mise à jour de admin
    function updateAdmin($nom ,$prenom ,$tel ,$redirect ,$id ,?int $password = null){
         $id= intval($id);
         $nom = htmlspecialchars($nom);
         $prenom = htmlspecialchars($prenom);
         $tel = htmlspecialchars($tel);
         $password = htmlspecialchars($password);
         include dirname(__DIR__). '/fonction/connexion.php';
         $sam = $connexion->prepare("UPDATE admin SET nomadmin = ?,prenomadmin= ?, teladmin = ?,password =? WHERE idadmin = ? ");
         $sam->execute([$nom, $prenom,$tel,$password,$id]);
         $connexion = null;
          //header("location: $redirect");
    }

    //supprimer admin
    function supprimerAdmin( $id ){
         $id= intval($id);
         include dirname(__DIR__). '/fonction/connexion.php';
         $sam = $connexion->prepare("DELETE FROM admin WHERE idadmin = ?");
         $sam->execute([$id]);
         $connexion = null;
     }    
    
?>