import { ajtListe, ajtCarte as ajtCarteProduit} from "./Produit.js";
import { ajtCommande, ajtPanier } from "./Commande.js";
import { ajtCarte as ajtCarteProducteur, ajtProfil, getProducteur } from "./Producteur.js";


const SERVEUR_URL = "http://localhost:7272";


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
        ajtCarteProduit();
        break;
    case "/Hangar_App/src/web/html/producteurs.html":
        ajtCarteProducteur();
        break;
    case "/Hangar_App/src/web/html/mesCommandes.html":
        ajtCommande();
        break;
    case "/Hangar_App/src/web/html/monProfil.html":
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
    case "/Hangar_App/src/web/html/panier.html":
        ajtPanier();
        break;

    default:
        break;
}



