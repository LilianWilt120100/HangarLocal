import { postPanier } from "./Commande.js";


document.getElementById('validCmd').addEventListener('click', (e) => {
    e.preventDefault();
    let modal = document.getElementById('modalShow');
    modal.classList.remove('d-none');
    modal.classList.add('show');
    
})


document.getElementById('popup_submit').addEventListener('click', (e) => {
    e.preventDefault();
    let montant = document.getElementById('montantTotal').textContent;
    montant.replace('€','');
    let nom_client= document.getElementById('client_lastname').value+ document.getElementById('client_firstname').value;
    let mail_client= document.getElementById('client_mail').value;
    //montant.replace('.','_');
    console.log('salu', mail_client);
    let tel_client= document.getElementById('client_tel').value;
    let lieu_retrait= document.getElementById('client_retrait').value;
    postPanier(nom_client, mail_client, tel_client, montant, lieu_retrait)
})