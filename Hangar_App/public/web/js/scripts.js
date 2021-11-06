import { ajtListe, ajtCarte as ajtCarteProduit, ajtCarteByCat as ajtCarteProduitByCat} from "./Produit.js";
import { ajtCommande, ajtPanier } from "./Commande.js";
import { ajtCarte as ajtCarteProducteur, ajtProfil, getProducteur } from "./Producteur.js";
import config from './config.js';


//close les modal
let close = document.getElementsByClassName('close')
Array.prototype.forEach.call(close, function (el) {
    el.addEventListener('click', (e) => {
        e.preventDefault()
        document.querySelector('#modalShow').classList.remove('show');
        document.querySelector('#modalShow').classList.add('d-none');
    });
});

export async function getSetCategorie() {
    let url = config.webetu_url+"/categorie";
    let obj = await (await fetch(url)).json();
    let lCat = document.getElementById('caTabs');

    for (let i = 0; i < obj.length; i++) {
        let c = obj[i];
        console.log(c['nom']);
        let ca = document.createElement('li');
        ca.setAttribute('class','nav-item');
        ca.innerHTML = `<a id="${c['nom']}" class="nav-link Nav">${c['nom']}</a>`;
        ca.addEventListener('click', (e) => {
            console.log('click on ',c['nom']);
            ajtCarteProduitByCat(c['nom']);
        });
        lCat.appendChild(ca);  
    }
    
    return lCat;
}


switch (window.location.pathname) {
    case "/public/web/html/mesProduits.html":
    case "/~franco377u/hangarLocal/client/src/web/html/mesProduits.html":
        ajtListe();
        break;
    case "/public/web/html/produits.html":
    case "/~franco377u/hangarLocal/client/src/web/html/produits.html":
        getSetCategorie();
        ajtCarteProduit();
        break;
    case "/public/web/html/producteurs.html":
    case "/~franco377u/hangarLocal/client/src/web/html/producteurs.html":
        ajtCarteProducteur();
        break;
    case "/public/web/html/mesCommandes.html":
    case "/~franco377u/hangarLocal/client/src/web/html/mesCommandes.html":
        ajtCommande();
        break;
    case "/public/web/html/monProfil.html":
    case "/~franco377u/hangarLocal/client/src/web/html/monProfil.html":
        let cu =window.localStorage.getItem("currentUser");
        //if !connecté
        if (cu ===null) {
            window.location.href="../html/espaceProducteur.html"
        } else {
            ajtProfil(cu)
        }
        window.localStorage
        //ajtCommande();
        break;
    case "/public/web/html/panier.html":
    case "/~franco377u/hangarLocal/client/src/web/html/panier.html":
        ajtPanier();
        break;

    default:
        console.log(window.location.pathname);
    
        break;
}



