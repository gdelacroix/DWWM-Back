/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


/*
 * 
 * @type Element
 * 
 */

// Test si le mot clé a bien été renseigné
let saisie   = document.getElementById("saisie");
let submit  = document.getElementById("sub");

if(submit!=null){
    submit.addEventListener("click", function(e){
        if(saisie.value == ""){
            e.preventDefault();
            alert("Le mot clé doit être saisi");
        }
    });
}



let auteur = document.getElementById("auteur");
let siecle = document.getElementById("siecle");

if(auteur!=null){
    // Tester si la liste déroulante a changé et disabled l'autre
    auteur.addEventListener("change", function(){
        if(this.value=="Liste des auteurs"){
            siecle.disabled = false;
        }else{
            siecle.disabled = true;
        };

    })
}

if(siecle!=null){
    siecle.addEventListener("change", function(){
        if(this.value=="Liste des siècles"){
            auteur.disabled = false;
        }else{
            auteur.disabled = true;
        };

    })
}




/*
 * 
 * Vérification du formulaire de saisie
 * 
 */

// Vérifier si les champs sont OK
// avec les bons types de données