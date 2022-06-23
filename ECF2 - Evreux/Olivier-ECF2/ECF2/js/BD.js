//#region Constantes et Variables
const srcImg = "images/"; // emplacement des images de l'appli
const albumDefaultMini = srcImg + "noComicsMini.jpeg"; //image par défaut en grand
const albumDefault = srcImg + "noComics.jpeg"; //image par défaut en grand
const srcAlbumMini = "albumsMini/"; // emplacement des images des albums en petit
const srcAlbum = "albums/"; // emplacement des images des albums en grand
const auteursAuteur = "auteurs/"; //emplacement des auteurs
const preview = document.getElementById('preview');// Affichage des BD
var txtSerie = document.getElementById("serie");
var txtNumero = document.getElementById("numero");
var txtTitre = document.getElementById("titre");
var txtAuteur = document.getElementById("auteur");
var txtPrix = document.getElementById("prix");
var imgAlbum = document.getElementById("album");
var imgAlbumMini = document.getElementById("albumMini");
//#endregion Constantes et Variables
//#region Récupération de l'album par son id et appel de la fonction d'affichage

function getAlbum(num) {

	var album = albums.get(num.value);

	if (album === undefined) {
		txtSerie.value = "";
		txtNumero.value = "";
		txtTitre.value = "";
		txtAuteur.value = "";
		txtPrix.value = 0;

		afficheAlbums( $("#album"), albumDefault);

	} else {

		var serie = series.get(album.idSerie);
		var auteur = auteurs.get(album.idAuteur);

		txtSerie.value = serie.nom;
		txtNumero.value = album.numero;
		txtTitre.value = album.titre;
		txtAuteur.value = auteur.nom;
		txtPrix.value = album.prix;

		var nomFic = serie.nom + "-" + album.numero + "-" + album.titre;

		// Utilisation d'une expression régulière pour supprimer 
		// les caractères non autorisés dans les noms de fichiers : '!?.":$
		nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");

		afficheAlbums($("#album"), $("#albumMini"), srcAlbum + nomFic + ".jpg" , srcAlbumMini + nomFic + ".jpg"
		);

	}
}
function getAuteur(num) {

	var auteur = auteurs.get(num.value);

	if (auteur === undefined) {
		txtSerie.value = "";
		txtNumero.value = "";
		txtTitre.value = "";
		txtAuteur.value = "";
		txtPrix.value = 0;

		afficheAlbums($("#album"),$("#albumMini"), albumDefaultMini,  albumDefault);

	} else {

		var serie = series.get(album.idSerie);
		var auteur = auteursAuteur.get(auteurs.idAuteur);

		txtSerie.value = serie.nom;
		txtNumero.value = album.numero;
		txtTitre.value = album.titre;
		txtAuteur.value = auteur.nom;
		txtPrix.value = album.prix;

		var nomFic = serie.nom + "-" + album.numero + "-" + album.titre;

		// Utilisation d'une expression régulière pour supprimer 
		// les caractères non autorisés dans les noms de fichiers : '!?.":$
		nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");

		afficheAlbums($("#album"),srcAlbum + nomFic + ".jpg");

	}
}


function prbImg(element) {
	if (element.id === "albumMini")
		element.src = albumDefaultMini;
	else element.src = albumDefault;

}
//#endregion Récupération de l'album par son id et appel de la fonction d'affichage
//#region affichage des albums un par un avec anim
function afficheAlbums($albumMini, $album, nomFicMini, nomFic) {
	$album.stop(true, true).clearQueue().fadeOut(100, function () {
		$album.attr('src', nomFic);
		$albumMini.stop(true, true).clearQueue().fadeOut(150, function () {
			$albumMini.attr('src', nomFicMini);
			$albumMini.slideDown(200, function () {
				$album.slideDown(200);
			});
		})
	});


}



imgAlbum.addEventListener("error", function () {
	prbImg(this)
});

imgAlbumMini.addEventListener("error", function () {
	prbImg(this)
});

var id = document.getElementById("ident");
ident.addEventListener("change", function () {
	getAlbum(this)
});
//#endregion affichage des albums un par un avec anim
//#region Recherche Série------------------------------------------------
function recherche(typerecherche) {
		if (typerecherche == "serie") {
		var serieARechercher = document.getElementById('search').value;
		var idSerieSaved = 0;

		for (var [idSerie, serie] of series.entries()) {	// Recherche des albums de la série

			if (serie.nom.includes(serieARechercher)) {
				idSerieSaved = idSerie;
				preview.innerHTML = "";
				break;
			}
		}

		for (var [idAlbum, album] of albums.entries()) {

			if (album.idSerie.toLowerCase() == idSerieSaved.toLowerCase()) {
				serie = series.get(album.idSerie);
				auteur = auteurs.get(album.idAuteur);
				var nomFic = serie.nom + "-" + album.numero + "-" + album.titre;
				var card = document.createElement('card');
				card.setAttribute('class', 'card');
				nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");
				card.innerHTML =  '<div id=' + album.titre + '>'+'<p>' + album.titre + `</p>` + '<p>' + serie.nom + `</p>` + " par " + auteur.nom + '<br>' +'<img src="' + srcAlbum + nomFic + ".jpg" + '"/>' + '<br>' + album.prix + '€' + '</div>';
				preview.appendChild(card);
			}
		}
	}
//#endregion Recherche Série--------------------------------------------
//#region Recherche des albums de l'auteur--------------------------------	

	else {

		var nomARechercher = document.getElementById('search').value;
		var idAuteurSaved = 0;



		for (var [idAuteur, auteur] of auteurs.entries()) {

			if (auteur.nom.includes(nomARechercher)) {
				idAuteurSaved = idAuteur;
				preview.innerHTML = "";
				break;
			};

		};

		for (var [idAlbum, album] of albums.entries()) {

			if (album.idAuteur.toLowerCase() == idAuteurSaved.toLowerCase()) {
				serie = series.get(album.idSerie);
				var nomFic = serie.nom + "-" + album.numero + "-" + album.titre;
				var card = document.createElement('card');
				card.setAttribute('class', 'card');
				nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");
				card.innerHTML =  '<div id=' + album.titre + '>'+ '<p>' + album.titre + `</p>` + '<p>' + serie.nom + `</p>` + " par " + auteur.nom + '<br>' + '<img src="' + srcAlbum + nomFic + ".jpg" + '"/>' + '<br>' + album.prix + '€' + '</div>';
				preview.appendChild(card);
			}

		};


	}

};
//#endregion Recherche des albums de l'auteur
//#region Affichage avant la recherche
for (var [idAlbum, album] of albums.entries()) {
	serie = series.get(album.idSerie);
	auteur = auteurs.get(album.idAuteur);
	var nomFic = serie.nom + "-" + album.numero + "-" + album.titre;
	var card = document.createElement('card');
	card.setAttribute('class', 'card');
	
	nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");
	card.innerHTML = '<div id=' + album.titre + '>'+ '<p>' + album.titre + `</p>` + '<p>' + serie.nom + `</p>` + " par " + auteur.nom  + '<br>' + '<img src="' + srcAlbumMini + nomFic + ".jpg" + '"/>' + '<br>' + album.prix + '€' + '</div>';
	preview.appendChild(card);
};
	//#endregion Affichage avant la recherche
//#region Ajout au panier;
var quantite = "";
var titreAlbum = album.titre;
var prixAlbum = album.prix;
var selectedCard = addEventListener('click',preview.card);

const panier = createElement('table',[ titreAlbum , prixAlbum, quantite]) ;
panier.setAttribute( 'table', [ titreAlbum , prixAlbum, quantite]);
panier.setAttribute( ligneDAchat,'tr'  );
function ajouterAuPanier(selectedCard){
	let panier = [                         
    [titreAlbum , prixAlbum, quantite]
];	
	
};
//#endregion Ajout au panier