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
    infoPanier(p) {
        let list = document.createDocumentFragment();
        p.lProduit.forEach(prod => {
 
            let tr = document.createElement("tr");
            tr.innerHTML= `
                <td>${prod[0]}</td>
                <td>${prod[1]}</td>
                <td>${prod[2]}€</td>`
            list.appendChild(tr);
        });
        let tr = document.createElement("tr");
        //tr.setAttribute(class)
        tr.innerHTML= `
            <th scope="col">Total</th>
            <th scope="col"></th>
            <th id='montantTotal' scope="col">${p.prix}€</th>`
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

function getPanier() {
    let p = window.localStorage.getItem('panier');
    let prod = [];
    let cmd =new Commande();
    if (p !=null) {
        p = JSON.parse(p);
        for (let i = 1; i < p.length; i++) {
            prod.push([p[i]['nom'], p[i]['quantite'],p[i]['prix']]);
        }
        cmd= new Commande(null,p[0].montant,'non validé', prod);
    }
    return cmd;
}

export async function ajtCommande() {
    console.log("commande en cour de gen");
    let commande= await creerCommandes();
    let liste = document.getElementById("listProduits");
    console.log(commande);
    commande.forEach(cmd => {
        liste.appendChild(cmd.infoCommande());
    });
}

export function ajtPanier() {
    let p= getPanier();
    let liste = document.getElementById("listProduits");
    liste.appendChild(p.infoPanier(p));
}

export async function postPanier(nom_client, mail_client, tel_client, montant, etat, lieu_retrait) {
    let url = "http://localhost:7272/commandefromclient";
    let data = {
        nom_client : nom_client ,  
        mail_client : mail_client ,  
        tel_client : tel_client,
        montant : montant,  
        etat : etat,
        lieu_retrait : lieu_retrait 
    }
    // request options
    const options = {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }

    // send POST request
    fetch(url, options)
        .then(res => res.json())
        .then(res => console.log(res));
}