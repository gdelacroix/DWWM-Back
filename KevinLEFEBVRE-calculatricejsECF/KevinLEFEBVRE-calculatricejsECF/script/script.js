function CalculerIMC() {
    var r = document.getElementById("Result");//Pour récupérer les résultat de notre IMC dans le html
    r.innerHTML = ';'

    var prenom = document.getElementById("prenom").value;

    if (isNAN(document.getElementById('poids').value)) {
        alert('ce nest pas un nombre');
    }
    var poids = document.getElementById('poids').value;//Récupére l'élément id poids et permet de modifier sa valeur
    poids = parseInt(poids);

    var lataille = document.getElementById('lataille').value;//Récupére l'élément id de lataille et permet de modifier la valeur
    lataille = parseInt(lataille);



    let imc = poids * 10000 / (lataille * lataille);//formule de calcul de l'IMC
    // alert(imc);
    imc = Math.round(imc);
    imc = parseInt(imc);



    let p = document.createElement("p");//création du paragraphe 
    p.innerHTML = "<p>Votre prénom est " + prenom + "</p>" + "\n"
    "<p>Votre poids est de " + poids + "</p>" + '\n' + //ce que nous mettons dans le paragraphe pour chaque cas.
        ' <p>Votre taille est de ' + lataille + "</p>" + '\n' +
        ' <p>Votre imc est de ' + imc + "</p>" + "\n";
        
    if (imc <= 18.4) {
        //   alert(" Vous êtes bien maigre! ");// Les conditions de l'indice masse corporelle et ces conséquences selon les cas.

        p.innerHTML += "<p>Vous êtes bien maigre! &#128543; </p>";
   
    }
    else if (imc > 18.5 && imc <= 24.9) {

        p.innerHTML += "<p>Vous êtes de corpulence normal &#128512; </p>";

    }
    else if (imc > 25 && imc <= 29.9) {

        p.innerHTML += ' <p>Vous êtes en surpoids &#128559;</p> ';


    }
    else if (imc > 30 && imc <= 34.9) {

        p.innerHTML += ' <p>Vous êtes en obésité modérée! &#128562; </p> ';


    }
    else if (imc > 35 && imc <= 39.9) {

        p.innerHTML += ' <p>Vous êtes en obésité sévère!! &#128560;</p> ';

    }
    else {

        p.innerHTML += " <p>Vous êtes en obésité morbide!!!! &#128561;</p>";

    }

    r.appendChild(p);
}

