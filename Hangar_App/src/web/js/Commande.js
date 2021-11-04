import { Produit, creerProduit } from "./Produit.js";
export class Commande {
    constructor(Client, prix, livré, lProduit) {
        //TODO test integrité des types

        this.Client=Client;
        this.prix=prix;
        this.livré=livré;
        this.lProduit=lProduit;
    }
    infoCommande() {
        let tr = document.createElement("tr");
        //TODO off par défaut si livré = false;  checked
        console.log(this.Client);
        tr.innerHTML= `
            <td>${this.Client}</td>
            <td>${this.prix}€</td>
            <td>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                <img class="me-2" src="../assets/icone/trash-solid-red.svg" height=20 width=20 />
            </div>`
        return tr;
    }
    showCommande() {
        let list = document.createDocumentFragment();
        this.lProduit.forEach(prod => {
            list.appendChild(prod.toProduct());
        });
        
        return list;
    }
    
  }


function creerCommande() {
    let prod = creerProduit();
    let lCommande =[];
    lCommande.push(new Commande("Marie Charrier", 8.20, false, prod));
    lCommande.push(new Commande("Jeanne", 2.20, false, prod));
    lCommande.push(new Commande("Marie Charrier", 8.20, false, prod));
    
    return lCommande;
}

export function ajtCommande() {
    console.log("commande en cour de gen");
    let commande= creerCommande();
    let liste = document.getElementById("listProduits");
    commande.forEach(cmd => {
        liste.appendChild(cmd.infoCommande());
    });
}