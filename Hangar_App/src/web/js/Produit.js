
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
            <div class="card-body d-flex">
                <h4 class="card-title" id="info${this.nom}">${this.nom}
                <img class="me-2" src="../assets/icone/info-circle-solid.svg" height=20 width=20 /></h4>
                <div class="card-text description d-flex">
                    <p>Vendu par : <a href="../pages/producteurs.html" class="producteur">${this.producteur}</a></p>
                    <p>Prix : <a class="prix">${this.prix}€</a></p>
                </div>
            </div>`
            let qt = document.createElement("div");
            qt.setAttribute("class", "card-desc");
            qt.innerHTML = `
                    <label for="quantite">
                        <input type="number" name="quantite" class="quantite" min="0" value="1">
                    </label>
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
                console.log(`Vous avez ajouter au panier ${v} ${this.nom} pour un total de ${total}€`);
            
            })
            
            
            document.getElementById('modalShow').classList.remove('d-none');
            document.getElementById('modalShow').classList.add('show');
        })
        
        //article.getElementsByClassName()
    }
    
  }


function creerProduit() {
    let prod = [];

    prod.push(new Produit("Carotte bio au kilo", "Michel", "1Kg", 2.99, "Légume",
        "carottes oranges", "../assets/img/carotte.png"));
    prod.push(new Produit("Poivron à l'unités", "prod1", "1", 4, "Légume",
        "très frais", "../assets/img/poivron.png"));
    prod.push(new Produit("petit pois", "prod1", "1Kg", 5, "Légume",
        "Petits pois qui font plaisir", "../assets/img/carotte.png"));

    return prod;
}
export function ajtCarte() {
    let prod= creerProduit();
    let body = document.getElementsByClassName("card-group")[0];
    prod.forEach(produit => {
        body.appendChild(produit.toHTML())
    });
}
export function ajtListe() {
    console.log("sah");
    let prod= creerProduit();
    let liste = document.getElementById("listProduits");
    prod.forEach(produit => {
        liste.appendChild(produit.toProduct());
    });
}