<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION</title>
    <link rel="stylesheet" href="asset/css/connexion.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Elms+Sans:ital,wght@0,100..900;1,100..900&display=swap');
</style>
</head>
<body id="body2">

    <nav id="nav-barre">
        <img src="asset/images/fond2.jpg" alt="Logo" id="logo">
        <div id="sam">
            <a href="acceuil.php" class="lien">ACCEUIL</a>
            <a href="nosplats.php" class="lien">NOS PLATS</a>
            <a href="connexion.php" class="lien1">CONNEXION</a>
        </div>
    </nav>

    <header id="myheader">
        <img src="asset/images/poulet.jpg" alt="" id="fon">
    </header>

    <div id="div-vide"></div>

    <div id="bloc2">
        <div class='bon'>
            <h3>Se connecter</h3>
            <div>
                <form action="">
                    <input type="text" placeholder=" téléphone "><br>
                    <input type="text" placeholder=" mot de passe"><br>
                    <button class='bouton'>Se connecter</button>
                </form>
            </div>
        </div>

        <div class='bon'> 
            <h3>S'inscrire</h3>
            <div>
                <form action="">
                    <input type="text" placeholder="  nom"><br>
                    <input type="text" placeholder=" prénom"><br>
                    <input type="text" placeholder=" adresse"><br>
                    <input type="text" placeholder=" numéro de téléphone "><br>
                    <button class='bouton'>S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

    <div id="div-vide"></div>

    <?php include 'composant/footer.php'?>

</body>
</html>