import { postPanier } from "./Commande.js";


document.getElementById('validCmd').addEventListener('click', (e) => {
    e.preventDefault();
    let modal = document.getElementById('La tu met l id de ta modal');
    modal.classList.remove('d-none');
    modal.classList.add('show');
    
})


document.getElementById('validCmd').addEventListener('click', (e) => {
    e.preventDefault();
    let montant = document.getElementById('montantTotal').textContent;
    let nom_client='a recup dans modal';
    let mail_client='a recup dans modal';
    let tel_client='a recup dans modal';
    let etat='a recup dans modal';
    let lieu_retrait='a recup dans modal';
    postPanier(nom_client, mail_client, tel_client, montant, etat, lieu_retrait);
})