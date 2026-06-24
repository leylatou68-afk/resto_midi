<?php

    //ajouter des produits
    function creerProduit($nom,int $stock, int $prix,string $description,$redirect,?string $image = null){
        $nom = htmlspecialchars($nom);
        $stock = intval($stock);
        $prix = intval($prix);
        $description = htmlspecialchars($description);
        $image = htmlspecialchars($image);
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("INSERT INTO produit (nomprod,stockprod,prixprod,description,imageprod)
          VALUES (?,?,?,?,?)");
        $sam->execute([$nom,$stock,$prix,$description,$image]);
        $connexion = null;
         header("location: $redirect");
    }

   //voir tout les produits
    function voirAllProduits(){
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM produit");
        $sam->execute();
        $Produits = $sam->fetchAll(PDO::FETCH_ASSOC);
        // var_dump( $Produits);
        $connexion = null;
    }

         //voir un seul produit
    function voirProduit( $id ){
        $id= intval($id);
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("SELECT * FROM produit WHERE idprod= ?");
        $sam->execute([$id]);
        $produit= $sam->fetch(PDO::FETCH_ASSOC);
        // var_dump($produit);
         $connexion = null;
    }
     //mise à jour de produits
    function updateProduit($nom,int $stock, int $prix,string $description,$redirect,$id,?string $image = null){
        $id= intval($id);
        $nom = htmlspecialchars($nom);
        $stock = intval($stock);
        $prix = intval($prix);
        $description = htmlspecialchars($description);
        $image = htmlspecialchars($image);
        include dirname(__DIR__). '/fonction/connexion.php';
        $sam = $connexion->prepare("UPDATE produit SET nomprod = ?,stockprod = ?,prixprod = ?,description =? ,imageprod =? WHERE idprod = ? ");
        $sam->execute([$nom,$stock,$prix,$description,$image,$id]);
        $connexion = null;
        //  header("location: $redirect");
    }
     
    //supprimer produit
    function supprimerproduit( $id ){
         $id= intval($id);
         include dirname(__DIR__). '/fonction/connexion.php';
         $sam = $connexion->prepare("DELETE FROM produit WHERE idprod = ?");
         $sam->execute([$id]);
         $connexion = null;
    }    
    
    
?>