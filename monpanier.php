<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MON PANIER</title>
    <link rel="stylesheet" href="asset/css/monpanier.css">
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
            <a href="monpanier.php" class="lien1">MON PANIER</a>
            <div id='deroul'>
                <a href="#" class="lien">DECONNEXION</a>
                <ul id='lis'>
                    <li><a href="" class="lien">Mon compte</a></li>
                    <li><a href="" class="lien">Modifier</a></li>
                    <li><a href="" class="lien">etc...</a></li>
                </ul>
            </div>
            
        </div>
    </nav>

    <header id="myheader">
        <img src="asset/images/poulet.jpg" alt="" id="fon">
    </header>
    <div id= 'div-vide'>
       <h1 id='titre'>MON PANIER</h1>
         <div id='liste'>
        <!--<div id='nav-barre1'>
                <h3>Produits</h3>
                <h3>Prix</h3>
                <h3>Quantité</h3>
                <h3>Total</h3>
                <h3>Annuler</h3>
            </div>
       
            <div id='nav-barre2'>
                <p>Alloco</p>
                <p>500</p>
                <form>
               <input type="number"  class='quant'><br>
               </form>
                <p>Total</p>
                <img src="asset/images/poub.svg" alt="trash" class='icons1'>
               
            </div>
             <div id='nav-barre2'>
                <p>Poisson brtaisé</p>
                <p>2000</p>
               <form>
               <input type="number"  class='quant'><br>
               </form>
                <p>Total</p>
                <img src="asset/images/poub.svg" alt="trash" class='icons1'>
               
            </div>
             <div id='nav-barre2'>
                <p>Garba</p>
                <p>1500</p>
                <form>
               <input type="number"  class='quant'><br>
               </form>
                <p>Total</p>
                <img src="asset/images/poub.svg" alt="trash" class='icons1'>
               
            </div>
        </div> -->

         <table >
                <tr class='nav-barre2'>
                    <td class='tr1'>Produits</td>
                    <td class='tr1'>Prix</td>
                    <td class='tr1'>Quantité</td>
                    <td class='tr1'>Total</td>
                    <td class='tr1'>Annuler</td>
                </tr>
       
                <tr class='nav-barre2'>
                    <td class='td1'>Alloco</td>
                    <td class='td2'>500F</td>
                    <td class='td3'> 
                        <form>
                            <input type="number" placeholder="1" class='quant'><br>
                        </form>
                    </td>
                    <td class='td4'>500F</td>
                    <td class='td5'>
                        <img src="asset/images/poub.svg" alt="trash" class='icons1'>
                    </td>
                </tr>
                
                <tr class='nav-barre2'>
                    <td class='td1'>Poisson braisé</td>
                    <td class='td2'>2000F</td>
                    <td class='td3'>
                        <form>
                            <input type="number" placeholder="1" class='quant'><br>
                        </form>
                    </td>
                    <td class='td4'>2000F</td>
                    <td class='td5'>
                        <img src="asset/images/poub.svg" alt="trash" class='icons1'>
                    </td>
                </tr>
                
                <tr class='nav-barre2'>
                    <td class='td1'>Garba</td>
                    <td class='td2'>1500F</td>
                    <td class='td3'>
                        <form>
                            <input type="number" placeholder="1" class='quant'><br>
                        </form>
                    </td>
                    <td class='td4'>1500F</td>
                    <td class='td5'>
                        <img src="asset/images/poub.svg" alt="trash" class='icons1'>
                    </td>
                </tr>
                <tr class='nav-barre2'>
                    <td class='td6'></td>
                    <td class='td6'></td>
                    <td class='td3'>Totaux</td>
                    <td class='td4'>4000F</td>
                </tr>
            </table>
            <button >COMMANDER</button>
        </div>
    </div>
    <!-- <script src="asset/js/style.js"></script> -->
     <script type="module" src="asset/js/style.js"></script>

</body>
</html>
