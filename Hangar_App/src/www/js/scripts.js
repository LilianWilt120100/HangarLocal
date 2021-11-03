import { Produit } from "./Produit.js";

let prod = [];

let body = document.getElementsByClassName("card-group")[0];
prod.push(new Produit("Carotte bio au kilo", "Michel", "1Kg", 2.99, "Légume",
     "carottes oranges", "../assets/img/carotte.png"));
prod.push(new Produit("Poivron à l'unités", "prod1", "1", 4, "Légume",
    "très frais", "../assets/img/poivron.png"));
prod.push(new Produit("petit pois", "prod1", "1Kg", 5, "Légume",
     "Petits pois qui font plaisir", "../assets/img/carotte.png"));

prod.forEach(produit => {
    body.appendChild(produit.toHTML())
});

//close les modal
let close = document.getElementsByClassName('close')
Array.prototype.forEach.call(close, function (el) {
    el.addEventListener('click', (e) => {
        e.preventDefault()
        document.querySelector('#modalShow').classList.remove('show');
        document.querySelector('#modalShow').classList.add('d-none');
    });
});