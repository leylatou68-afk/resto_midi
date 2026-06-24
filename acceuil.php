<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A VOTE MIDI</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Elms+Sans:ital,wght@0,100..900;1,100..900&display=swap');
</style>
</head>
<body id='body1'>
    
    <nav id = 'nav-barre'> 
        <img src="asset/images/fond2.jpg" alt="Logo" id = 'logo'> 
        <div id ='sam'>
            <a href="acceuil.php" class = 'lien1'>ACCEUIL</a> 
            <a href="nosplats.php" class = 'lien'>NOS PLATS </a> 
            <a href="connexion.php" class = 'lien'>CONNEXION</a> 
        </div>
    </nav>
    <header>
        <img src="asset/images/poulet.jpg" alt="" id = 'fon'>
        <div id='akw'>
            <h1>AKWABA</h1>
            <div class='header-slogan'>
                <p id='phra'><span id='titre'>A VOTRE MIDI</span>, Savourez les couleurs ivoiriennes à chaque bouchée. </p>
            </div>
            <form action="">
                 <button id="cta">COMMANDER</button>
            </form>
        </div>
    </header>

    <div id='bloc'>
        <div class='ligne'>
            <div class='rin'>
                <img src="asset/images/foutou.jpg" alt="un plat de foutou" class='plat'>
                <h3 class='tit'>Foutou avec sauce arrachide</h3>
             </div>
             <div class='rin'>
                <img src="asset/images/Attieke.jpg" alt="un plat de attiete" class='plat'>
                <h3 class='tit'>Attiéké avec poisson</h3>
             </div>
             <div class='rin'>
                <img src="asset/images/escargot.jpg" alt="un plat de escargot" class='plat'>
                <h3 class='tit'>Escargot épicé</h3>
             </div>
        </div>
        <div class='ligne'>
            <div class='rin'>
                <img src="asset/images/garba.jpg" alt="un plat de garba" class='plat'>
                <h3 class='tit'>GARBA</h3>
            </div>
             <div class='rin'>
                <img src="asset/images/placali.jpg" alt="un plat de placali" class='plat'>
                <h3 class='tit'>Placali sauce copé</h3>
            </div>
             <div class='rin'>
                <img src="asset/images/alloco.jpg" alt="un plat de alloco" class='plat'>
                <h3 class='tit'>Alloco </h3>
            </div>
        </div>
        <form action="">
            <button class='ligne' id='uni'> <a href="nosplats.php" style="color:white; text-decoration: none; " id='bon'> Voir nos plats</a></button>
        </form>
    </div>
    <?php include 'composant/footer.php'?>
</body>
</html>