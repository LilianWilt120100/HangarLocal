
export class Produit {
    constructor(nom, producteur, tailleLot, prix, categorie, description, img) {

        this.nom = nom;
        this.producteur = producteur;
        this.tailleLot = tailleLot;
        this.prix = prix;
        this.categorie = categorie;
        this.description = description;
        this.img = img;
    }
    toHTML() {
        let article = document.createElement("div");
        article.setAttribute("class", "card");
        
        article.innerHTML= `
            <div class="card-body">
                <h4 class="card-title" id="info${this.nom}">${this.nom}
                <img class="me-2" src="../assets/icone/info-circle-solid.svg" height=20 width=20 /></h4>
                <div class="card-text description">
                    <p>Vendu par : <a href="../html/producteurs.html" class="producteur">${this.producteur}</a></p>
                    <p>Prix : ${this.prix}€</p>
                </div>
            </div>`
            let qt = document.createElement("div");
            qt.setAttribute("class", "card-desc");
            qt.innerHTML = `
                    <input type="number" name="quantite" class="quantite" min="0" value="1">
                    <a class="btn btn-outline-primary">ajouter au panier</a>`
            this.panier(qt);
            this.info(article);
            article.getElementsByClassName
            article.appendChild(qt);
        return article;
    }
    toProduct() {
        let tr = document.createElement("tr");
        
        tr.innerHTML= `
            <th scope="row">${this.nom}</th>
            <td>${this.description}</td>
            <td>${this.prix}€</td>
            <td>${this.tailleLot}</td>
            <td>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                <img class="me-2" src="../assets/icone/trash-solid-red.svg" height=20 width=20 />
            </div>`
        return tr;
    }
    panier(qt){
        qt.getElementsByTagName("a")[0].addEventListener('click', (e) => {
            e.preventDefault();
            let v = qt.getElementsByTagName("input")[0].value;
            let total = v * this.prix;
            let panier = window.localStorage.getItem('panier');
                if (panier != null) {
                    panier = JSON.parse(panier);
                }else{
                    panier = [
                    {
                        montant: 0
                    }
                    ]
                }
                panier[0].montant+=total;

                panier.push([{
                    nom : this.nom,
                    quantite : v,
                    prix : total}]);
                window.localStorage.setItem('panier',JSON.stringify(panier));

            console.log(`Vous avez ajouter au panier ${v} ${this.nom} pour un total de ${total}€`);
        
        })
    }
    info(art){
        art.getElementsByTagName("h4")[0].addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('modalShowTitle').textContent=this.nom;
            document.getElementById('modalShowDesc').textContent=this.description + " Quantité par lot : " + this.tailleLot;
            document.getElementById('modalShowImg').style.backgroundImage =`url(${this.img})`;
            document.getElementById('modalShowPrice').textContent ="Prix : "+this.prix+"€";
            document.getElementById('modalShowProd').textContent =this.producteur;
            document.getElementById('modalShowAddCart').addEventListener('click', (e) => {
                e.preventDefault();
                let v = document.getElementById('modalShowGetQuantity').value;
                let total = v * this.prix;
                let panier = window.localStorage.getItem('panier');
                if (panier != null) {
                    panier = JSON.parse(panier);
                }else{
                    panier = [
                    {
                        montant: 0
                    }
                    ]
                }
                panier[0].montant+=total;

                panier.push([{
                    nom : this.nom,
                    quantite : v,
                    prix : total}]);
                window.localStorage.setItem('panier',JSON.stringify(panier));
                //console.log(`Vous avez ajouter au panier ${v} ${this.nom} pour un total de ${total}€`);
                
            })
            
            
            document.getElementById('modalShow').classList.remove('d-none');
            document.getElementById('modalShow').classList.add('show');
        })
        
        //article.getElementsByClassName()
    }
    
  }


export async function creerProduit(url = "http://localhost:7272/produit") {
    let prod = [];
    let obj = await (await fetch(url)).json();
    
    for (let i = 0; i < obj.length; i++) {
        let p = obj[i];
        prod.push(new Produit(p['nom'], p['id_producteur'], p['taille_lot'], p['tarif_unitaire'], p['id_categorie'],
        p['descritpion'], p['urlImage']));
        
    }
    return prod;
}
export async function creerProduitByCat(categorie) {
    let prod = [];
    let url = "http://localhost:7272/produit/"+categorie;
    //TODO
    return creerProduit(url)
}
export async function ajtCarte() {
    let prod= await creerProduit();
    let body = document.getElementsByClassName("card-group")[0];
    prod.forEach(produit => {
        body.appendChild(produit.toHTML())
    });
}
export async function ajtCarteByCat(categorie) {
    let prod= await creerProduitByCat(categorie);
    let body = document.getElementsByClassName("card-group")[0];
    prod.forEach(produit => {
        body.appendChild(produit.toHTML())
    });
}
export async function ajtListe() {
    let prod= await creerProduit();
    let liste = document.getElementById("listProduits");
    prod.forEach(produit => {
        liste.appendChild(produit.toProduct());
    });
}