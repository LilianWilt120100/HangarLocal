import { ajtListe, ajtCarte } from "./Produit.js";
import { ajtCommande } from "./Commande.js";


//close les modal
let close = document.getElementsByClassName('close')
Array.prototype.forEach.call(close, function (el) {
    el.addEventListener('click', (e) => {
        e.preventDefault()
        document.querySelector('#modalShow').classList.remove('show');
        document.querySelector('#modalShow').classList.add('d-none');
    });
});

switch (window.location.pathname) {
    case "/Hangar_App/src/web/html/mesProduits.html":
        ajtListe();
        break;
    case "/Hangar_App/src/web/html/produits.html":
        ajtCarte();
        break;
    case "/Hangar_App/src/web/html/produits.html":
        ajtCarte();
        break;
    case "/Hangar_App/src/web/html/mesCommandes.html":
        ajtCommande();
        break;
    

    default:
        break;
}

async function load() {
    let url = "http://localhost:7272/producteur";
    let obj = await (await fetch(url)).json();
    console.log(obj);
}


