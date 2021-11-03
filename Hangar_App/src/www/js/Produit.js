
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
            <div class="card-img-body">
                <img class="card-img" src="${this.img}" alt="image de ${this.nom}">
            </div>
            <div class="card-body">
                <h4 class="card-title" id="info${this.nom}">${this.nom}
                <img class="me-2" src="../assets/icone/info-circle-solid.svg" height=20 width=20 /></h4>
                <div class="card-text description">
                    <p>Vendu par : <a class="producteur">${this.producteur}</a></p>
                    <p>quantite par lot : <a class="lot">${this.tailleLot}</a></p>
                    <p>Prix : <a class="prix">${this.prix}€</a></p>
                    <p>Catégorie : <a class="categorie">${this.categorie}</a></p>
                </div>
            </div>`
            let qt = document.createElement("div");
            qt.setAttribute("class", "card-desc");
            qt.innerHTML = `
                    <label for="quantite">
                        <input type="number" name="quantite" class="quantite">
                    </label>
                    <a class="btn btn-outline-primary">ajouter au panier</a>`
            this.panier(qt);
            this.info(article);
            article.appendChild(qt);
        return article;
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
            document.querySelector('#modalShowDesc').textContent=this.description;

            document.getElementById('modalShow').classList.remove('d-none');
            document.getElementById('modalShow').classList.add('show');
        
            console.log(`Vous avez ajouter au panier ${v} ${this.nom} pour un total de ${total}€`);
        
        })
    }
    
  }