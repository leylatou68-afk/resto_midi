const splitLink   = document.querySelector("#split-link");
const infoUser    = document.querySelector("#info-user");
const btnPaiement = document.querySelector("#btnPaiement");
const paiementCont= document.querySelector("#paiement-container");
const Annuler     = document.querySelector("#annuler");

splitLink.addEventListener('click', (event)=> { 
    if(infoUser.style.display =="block")
        {infoUser.style.display = "none";}
    else
        {infoUser.style.display = "block";}
}
);

btnPaiement.addEventListener('click', (event)=> {paiementCont.style.display = "block";});
Annuler.addEventListener('click', (event)=> {paiementCont.style.display = "none";});
