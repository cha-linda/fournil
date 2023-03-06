'use strict';

// FONCTION DE RECHERCHE SÉLECTIVE
let input = document.querySelector("#search");

input.addEventListener('keyup', () => { // Ecoute d'évènement au keyup

    // Récupérer le text tapé dans l'input par l'utilisateur
    let textFind = document.querySelector('#search').value;

    // Faire un objet de type request
    let myRequest = new Request('src/Controllers/SearchController.php', {
        method  : 'POST',
        body    : JSON.stringify({ textToFind : textFind })
    })
        // On attend la réponse du fichier getArticle.php
        // Portez-vous à la ligne 229 pour suivre la logique du code et vous reviendrez ici pour lire la suite du code JS

    fetch(myRequest)
        // Récupère les données
        .then(res => res.text())

        // Exploite les données
        .then(res => {
            document.getElementById("search_target").innerHTML = res;
        })
})

// FONCTION POUR L'ACTUALISATION DU PANIER

let btn = document.querySelector(".addtocart");
console.log(btn);

btn.addEventListener('click', () => {
    
    console.log(btn);
})

