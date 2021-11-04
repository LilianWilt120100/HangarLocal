
export class Producteur {
    constructor(nom, localisation, mail, img) {

        this.nom = nom;
        this.localisation = localisation;
        this.mail = mail;
        //TODO lien vers tous ses produits

        this.img = img;
    }
    toHTML() {
        let article = document.createElement("div");
        article.setAttribute("class", "col");
        
        article.innerHTML= `                        
            <div class="card shadow-sm card-producteur">
                <img class="bd-placeholder-img card-img-top" src="${this.img}"  alt="${this.nom}">
                <div class="card-body">
                    <h2 class="card-title">${this.nom}</h2>

                    <div class="card-text description">
                        <p><a class="localisation">${this.localisation}</a></p>
                        <p><a class="mail">${this.mail}</a></p>
                    </div>
                <div class="d-flex justify-content-between align-items-center">


                </div>
            </div>`
            
            
        return article;
    }
    info(art){
        art.getElementsByTagName("h4")[0].addEventListener('click', (e) => {
            e.preventDefault();
            document.querySelector('#modalShowDesc').textContent=this.description;
            document.getElementById('modalShow').classList.remove('d-none');
            document.getElementById('modalShow').classList.add('show');
        })
        
        //article.getElementsByClassName()
    }
    
  }


let prod = [];

let body = document.getElementsByClassName("card-group")[0];
prod.push(new Producteur("Jean Michel", "2 rue de la gare", "jm2@mail.Fr", "../assets/img/michel.png"));
prod.push(new Producteur("Jean Claude", "2 rue de la gare", "jm2@mail.Fr", "../assets/img/michel.png"));
prod.push(new Producteur("Jean Charles", "2 rue de la gare", "jm2@mail.Fr", "../assets/img/michel.png"));
prod.push(new Producteur("Jean Eudes", "2 rue de la gare", "jm2@mail.Fr", "../assets/img/michel.png"));

prod.forEach(producteur => {
    body.appendChild(producteur.toHTML())
});