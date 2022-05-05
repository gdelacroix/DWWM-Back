let bonjour = document.getElementById('b1');
let ajouter = document.getElementById('b2');
//let prenom = "Je m'appelle Pierre";
//let age = 29;
//let age2 = '29';

//document.getElementById('p1').innerHTML = 'Type de prenom : ' + typeof prenom;
//document.getElementById('p2').innerHTML = 'Type de age : ' + typeof age;
//document.getElementById('p3').innerHTML = 'Type de age2 : ' + typeof age2;

//bonjour.addEventListener('click', alerte);
//ajouter.addEventListener('click', ajout);



/*let x = 2;
let y = 3;
let z = 4;

let a = x + 1; //a stocke 2 + 1 = 3
let b = x + y; //b stocke 2 + 3 = 5
let c = x - y; //c stocke 2 - 3 = -1
let d = x * y; //d stocke 2 * 3 = 6
let e = x / y; //e stocke 2 / 3
let f = 5 % 3; //f stocke le reste de la division euclidienne de 5 par 3
let g = x ** 3; //g stocke 2^3 = 2 * 2 * 2 = 8

On affiche les résultats dans une boite d'alerte en utilisant l'opérateur
 *de concaténation "+". On retourne à la ligne dans l'affichage avec "\n"*/
/*alert('a contient : ' + a +
      '\nb contient : ' + b +
      '\nc contient : ' + c +
      '\nd contient : ' + d +
      '\ne contient : ' + e +
      '\nf contient : ' + f +
      '\ng contient : ' + g);*/

function alerte(){
    alert('Bonjour');
}
function ajout(){
    let para = document.createElement('p');
    para.textContent = 'Paragraphe ajouté';
    document.body.appendChild(para);
}


/*"pierre" est une variable qui contient un objet. Par abus de langage,
 *on dira que notre variable EST un objet*/
let pierre = {
    //nom, age et mail sont des propriétés de l'objet "pierre"
    nom : ['Pierre', 'Giraud'],
    age : 29,
    mail : 'pierre.giraud@edhec.com',
    
    //Bonjour est une méthode de l'objet pierre
    bonjour: function(){
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
};

/*On accède aux propriétés "nom" et "age" de "pierre" et on affiche leur valeur
 *dans nos deux paragraphes p id='p1' et p id='p2'.
 *A noter : "document" est en fait aussi un objet, getElementById() une méthode
 *et innerHTML une propriété de l'API "DOM"!*/
document.getElementById('p1').innerHTML = 'Nom : ' + pierre.nom;
document.getElementById('p2').innerHTML = 'Age : ' + pierre.age;

//On modifie la valeur de la propriété "age" de "pierre"
pierre.age = 30;

document.getElementById('p3').innerHTML = 'Nouvel âge : ' + pierre.age;
