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
    infoPanier() {
        let list = document.createDocumentFragment();
        this.lProduit.forEach(prod => {
            let tr = document.createElement("tr");
            console.log(this.Client);
            tr.innerHTML= `
                <td>${prod.nom}</td>
                <td>${prod.quantite}€</td>
                <td>${prod.prix}€</td>`
            list.appendChild(tr);
        });
        let tr = document.createElement("tr");
        //tr.setAttribute(class)
        console.log(this.Client);
        tr.innerHTML= `
            <th scope="col">Total</th>
            <th scope="col"></th>
            <th scope="col">${this.prix}€</th>`
        list.appendChild(tr);

        return list;
    }
    showCommande() {
        let list = document.createDocumentFragment();
        this.lProduit.forEach(prod => {
            list.appendChild(prod.toProduct());
        });
        
        return list;
    }
    
  }


export async function creerCommandes() {
    //TODO route quantite
    let prod = await creerProduit();
    let lCommande =[];
    let url = "http://localhost:7272/commande";
    let obj = await (await fetch(url)).json();
    
    for (let i = 0; i < obj.length; i++) {
        let c = obj[i];
        lCommande.push(new Commande(c['nom_client'],c['montant'],c['etat'], prod));
        
    }
    
    return lCommande;
}

export async function ajtCommande() {
    console.log("commande en cour de gen");
    let commande= await creerCommandes();
    let liste = document.getElementById("listProduits");

    commande.forEach(cmd => {
        liste.appendChild(cmd.infoPanier());
    });
}