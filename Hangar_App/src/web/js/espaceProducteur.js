document.getElementById("formLogin").addEventListener('click', (e) => {
    e.preventDefault();
    let log = document.getElementById('login').value;
    let pass = document.getElementById('pass').value;
    if (verifierLogin(log, pass)) {
        window.location.href='./mesProduits.html?login='+log;
    } else {
        //TODO message d'erreur propre
        console.log('mauvaise combinaison login mdp');
    }

})

function verifierLogin(login, pass) {
    return login==='login' && pass==='pass';
}
