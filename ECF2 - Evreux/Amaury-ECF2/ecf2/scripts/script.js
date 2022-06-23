// INPUT VAR
let checkTitre = document.getElementById("checkTitre");
let checkAuteur = document.getElementById("checkAuteur");
let checkSerie = document.getElementById("checkSerie");
let searchbar = document.getElementById("searchbar");
let search = document.getElementById("confirm");
let erase = document.getElementById("delete");
// INPUT VAR
let displayCart = document.getElementById("cart");
let resultBDCards = document.getElementById("resultBDCards");
let toastLiveCart = document.getElementById("cartNotification");
let cartContainer = document.getElementById("cartContainer");
let deleteCart = document.getElementById("deleteCart");
let cart = [];
let cartArrayID = 0;

// RANDOM BD
function randomBD(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
// RANDOM BD

// CAROUSEL
function afficheBD() {
  let zoneImgBD = document.getElementById("carouselImgBD");
  for (let i = 1; i <= 5; i++) {
    let carItem;
    carItem = document.createElement("div");
    if (i > 1) {
      carItem.setAttribute("class", "carousel-item");
    } else {
      carItem.setAttribute("class", "carousel-item active");
    }
    let cont = document.createElement("div");
    cont.setAttribute("class", "container");
    let row = document.createElement("div");
    row.setAttribute("class", "row");
    for (let j = 0; j < 3; j++) {
      let bdCount = randomBD(1, 629);
      let col = document.createElement("div");
      if (j > 0) {
        col.setAttribute("class", "col-lg-4 d-none d-lg-block");
      } else {
        col.setAttribute("class", "col-lg-4");
      }
      let card = document.createElement("div");
      card.setAttribute("class", "card");
      bdCount = bdCount.toString();
      if (albums.get(bdCount) != undefined) {
        let idSeries = albums.get(bdCount).idSerie;
        var nomFic =
          series.get(idSeries).nom +
          "-" +
          albums.get(bdCount).numero +
          "-" +
          albums.get(bdCount).titre;
        nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");
        card.innerHTML =
          "<img id='carBDImage' class='d-block' src='../albums/" +
          nomFic +
          ".jpg'>";
      } else {
        card.innerHTML =
          "<img id='carBDImage' class='d-block' src='../images/noComicsMini.jpeg'>";
      }
      col.appendChild(card);
      row.appendChild(col);
    }
    cont.appendChild(row);
    carItem.appendChild(cont);
    zoneImgBD.appendChild(carItem);
  }
}
// CAROUSEL

// CHECKBOX EVENT
checkTitre.addEventListener("change", () => {
  if (checkTitre.checked) {
    checkAuteur.checked = false;
    checkSerie.checked = false;
  }
});
checkAuteur.addEventListener("change", () => {
  if (checkAuteur.checked) {
    checkTitre.checked = false;
    checkSerie.checked = false;
  }
});
checkSerie.addEventListener("change", () => {
  if (checkSerie.checked) {
    checkAuteur.checked = false;
    checkTitre.checked = false;
  }
});
// CHECKBOX EVENT

// SEARCHBAR EVENT
searchbar.addEventListener("keyup", (e) => {
  if (searchbar.value != "") {
    resultBDCards.innerHTML = "";
    // TITRE
    if (e.key == "Enter" && checkTitre.checked == true) {
      afficheResultTitre();
      searchbar.value = "";
      checkTitre.checked = false;
    }
    // AUTEUR
    if (e.key == "Enter" && checkAuteur.checked == true) {
      afficheResultAuteur();
      searchbar.value = "";
      checkAuteur.checked = false;
    }
    // SERIE
    if (e.key == "Enter" && checkSerie.checked == true) {
      afficheResultSerie();
      searchbar.value = "";
      checkSerie.checked = false;
    }
  }
});
// SEARCHBAR EVENT

// CONFIRM EVENT
search.addEventListener("click", () => {
  if (searchbar.value != "") {
    resultBDCards.innerHTML = "";
    if (checkTitre.checked == true) {
      afficheResultTitre();
      searchbar.value = "";
      checkTitre.checked = false;
    }
    if (checkAuteur.checked == true) {
      afficheResultAuteur();
      searchbar.value = "";
      checkAuteur.checked = false;
    }
    if (checkSerie.checked == true) {
      afficheResultSerie();
      searchbar.value = "";
      checkSerie.checked = false;
    }
  }
});
// CONFIRM EVENT

// DELETE EVENT
erase.addEventListener("click", () => {
  if (resultBDCards.innerHTML != "") {
    resultBDCards.innerHTML = "";
  }
});
// DELETE EVENT

// CART EVENT
displayCart.addEventListener("click", () => {
  cartContainer.innerHTML = "";
  console.log(cart);
  if (cart.length != 0) {
    for (let i = 0; i < cart.length; i++) {
      // VAR
      let cartItem = document.createElement("div");
      cartItem.setAttribute("id", "cartItem");
      let cartItemTitle = document.createElement("h5");
      cartItemTitle.setAttribute("id", "cartItemTitle");
      let cartItemPrice = document.createElement("p");
      cartItemPrice.setAttribute("id", "cartItemPrice");
      let cartItemImg = document.createElement("div");
      cartItemImg.setAttribute("id", "cartItemImg");
      let cartItemID = document.createElement("div");
      cartItemID.setAttribute("id", "cartItemID");
      let cartItemDelete = document.createElement("button");
      cartItemDelete.setAttribute("class", "btn btn-danger");
      let cartItemAmount = document.createElement("p");
      cartItemAmount.setAttribute("id", "cartItemAmount");
      let cartItemAmountChange = document.createElement("div");
      cartItemAmountChange.setAttribute("id", "amountButtonCont");
      let addAmount = document.createElement("button");
      addAmount.setAttribute("id", "addAmount");
      addAmount.setAttribute("class", "btn btn-secondary");
      let removeAmount = document.createElement("button");
      removeAmount.setAttribute("id", "removeAmount");
      removeAmount.setAttribute("class", "btn btn-secondary");
      // VAR

      // INNER HTML
      cartItemTitle.innerHTML = cart[i].titre;
      cartItemPrice.innerHTML = cart[i].prix + " €";
      cartItemImg.innerHTML =
        "<img id='cartImg' class='d-block' src='../albums/" +
        cart[i].img +
        ".jpg'>";
      cartItemDelete.innerHTML = "Supprimer";
      cartItemID.innerHTML = i;
      cartItemAmount.innerHTML = "Quantité : " + cart[i].amount;
      addAmount.innerHTML = "+";
      removeAmount.innerHTML = "-";
      // INNER HTML
      // cart.push(i: { id: i });
      // APPEND CHILD
      cartItem.appendChild(cartItemID);
      cartItem.appendChild(cartItemImg);
      cartItem.appendChild(cartItemTitle);
      cartItemAmountChange.appendChild(addAmount);
      cartItemAmountChange.appendChild(removeAmount);
      cartItem.appendChild(cartItemAmountChange);
      cartItem.appendChild(cartItemAmount);
      cartItem.appendChild(cartItemPrice);
      cartItem.appendChild(cartItemDelete);
      cartContainer.appendChild(cartItem);
      // APPEND CHILD

      // Add quantity
      // addAmount.addEventListener("click", () => {
      //   cart[cartItemID.textContent].amount++;
      //   cartItemAmount.innerHTML =
      //     "Quantité : " + cart[cartItemID.textContent].amount;
      //   console.log("AMOUNT" + cart[cartItemID.textContent].amount);
      // });
      // Add quantity

      // Remove quantity
      // removeAmount.addEventListener("click", () => {
      //   cart[cartItemID.textContent].amount--;
      //   cartItemAmount.innerHTML =
      //     "Quantité : " + cart[cartItemID.textContent].amount;
      //   console.log("AMOUNT" + cart[cartItemID.textContent].amount);
      // });
      // Remove quantity

      // Delete item from cart
      cartItemDelete.addEventListener("click", () => {
        if (cart.length != 0) {
          if (cart.length == 1) {
            cart.splice(0, 1);
            cartArrayID = 0;
            cartItem.innerHTML = "";
            console.log("cart length = 0");
            console.log(cart);
          } else {
            var cartItemIdToRemove;

            for (i = 0; i < cart.length; i++) {
              if (cart[i] == cartItemID) {
                cartItemIdToRemove = cart[i];
                break;
              }
            }

            // cart.splice(cartItemID.textContent, 1);
            cart.splice(cartItemIdToRemove, 1);
            cartArrayID = 0;
            cartItem.innerHTML = "";
            console.log(cart);
            for (let i = 0; i < cart.length; i++) {
              if (cartItemID != cart[i].ID) {
                cart[i].ID = i;
                cartItemID.innerHTML = "";
                cartItemID.innerHTML = i;
                console.log(cart);
              }
              console.log("ID" + cartItemID.textContent);
              console.log(i);
            }
          }
          // let iterato = cart.keys();
          // for (let i = 0; i < cart.length; i++) {
          //   for (const key of iterato) {
          //     console.log(key);
          //   }
          //   // PROBLEME : cartItemID = celui de la div sur laquelle on a cliqué = ne change pas
          // }
          // console.log(cart);
          if (cart.length == 0) {
            cartContainer.innerHTML =
              "<h5 style='text-align:center'>Le panier est vide.</h5>";
          }
        } else {
          cartContainer.innerHTML =
            "<h5 style='text-align:center'>Le panier est vide.</h5>";
        }
      });
      // Delete item from cart
    }
  } else {
    cartContainer.innerHTML =
      "<h5 style='text-align:center'>Le panier est vide.</h5>";
  }
});
// CART EVENT

// DELETE CART
deleteCart.addEventListener("click", () => {
  if (cart.length != 0) {
    cart.length = 0;
    cartContainer.innerHTML =
      "<h5 style='text-align:center'>Le panier est vide.</h5>";
    cartArrayID = 0;
  }
});
// DELETE CART

//Search By Title
function afficheResultTitre() {
  let cartButton;
  let afficheResultCard;
  let bdCount = 1;
  let rowCont = document.createElement("div");
  rowCont.setAttribute("class", "row");
  for (var [idAlbum, album] of albums.entries()) {
    let card = document.createElement("div");
    card.setAttribute("id", "cardCont");
    let cardPrice = document.createElement("div");
    cardPrice.setAttribute("id", "cardPrice" + idAlbum);
    cartButton = document.createElement("button");
    cartButton.setAttribute("class", "btn btn-primary");
    cartButton.setAttribute("id", "cartButton" + idAlbum);
    cartButton.innerHTML = `<p>Add <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </svg></p>`;
    let cardBody = document.createElement("div");
    cardBody.setAttribute("id", "cardBody" + idAlbum);
    afficheResultCard = document.createElement("div");
    afficheResultCard.setAttribute("id", "cardsResult" + idAlbum);
    afficheResultCard.setAttribute("class", "col-lg-2 mb-4");
    let albumsId = document.createElement("div");
    albumsId.setAttribute("class", "albumID");
    let idSeries = album.idSerie;
    let idAuteur = album.idAuteur;
    var nomFic =
      series.get(album.idSerie).nom + "-" + album.numero + "-" + album.titre;
    nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");
    if (
      album.titre
        .toLocaleLowerCase()
        .includes(searchbar.value.toLocaleLowerCase()) == true
    ) {
      card.innerHTML =
        "<img id='carBDImage' class='d-block' src='albums/" + nomFic + ".jpg'>";
      cardPrice.innerHTML = "<p>" + album.prix + "€</p>";
      cardBody.innerHTML =
        "<h2 id='cardBodyTitle'>" +
        album.titre +
        "</h2><p><strong>Numéro: </strong>" +
        album.numero +
        "</p><p><strong>Série: </strong>" +
        series.get(idSeries).nom +
        "</p><p><strong>Auteurs: </strong>" +
        auteurs.get(idAuteur).nom +
        "</p>";
      albumsId.innerHTML = bdCount;
      afficheResultCard.appendChild(albumsId);
      card.appendChild(cardBody);
      card.appendChild(cardPrice);
      card.appendChild(cartButton);
      afficheResultCard.appendChild(card);
      rowCont.appendChild(afficheResultCard);
      resultBDCards.appendChild(rowCont);

      // ADDTOCART

      cartButton.addEventListener("click", () => {
        const toast = new bootstrap.Toast(toastLiveCart);
        toast.show();
        let idSeries = album.idSerie;
        var cartItemIMG =
          series.get(idSeries).nom + "-" + album.numero + "-" + album.titre;
        cartItemIMG = cartItemIMG.replace(/'|!|\?|\.|"|:|\$/g, "");
        cart.push({
          titre: album.titre,
          prix: album.prix,
          img: cartItemIMG,
          amount: 1,
          ID: albumsId.textContent,
        });
        // cartArrayID++;
      });
      // ADDTOCART
    }
  }
}
//Search By Title

// Search By Author
function afficheResultAuteur() {
  let afficheResultCard;
  let auteurCount = 1;
  let rowCont = document.createElement("div");
  rowCont.setAttribute("class", "row");

  for (var [idAuteur, auteur] of auteurs.entries()) {
    if (
      auteur.nom
        .toLocaleLowerCase()
        .includes(searchbar.value.toLocaleLowerCase()) == true
    ) {
      console.log("yes");
      for (var [idAlbum, album] of albums.entries()) {
        if (album.idAuteur == idAuteur) {
          let card = document.createElement("div");
          card.setAttribute("id", "cardCont" + idAlbum);
          let cardPrice = document.createElement("div");
          cardPrice.setAttribute("id", "cardPrice" + idAlbum);
          cartButton = document.createElement("button");
          cartButton.setAttribute("class", "btn btn-primary");
          cartButton.setAttribute("id", "cartButton" + idAlbum);
          cartButton.innerHTML = `<p>Add <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </svg></p>`;
          let cardBody = document.createElement("div");
          cardBody.setAttribute("id", "cardBody" + idAlbum);
          afficheResultCard = document.createElement("div");
          afficheResultCard.setAttribute("id", "cardsResult" + idAlbum);
          afficheResultCard.setAttribute("class", "col-lg-2 mb-4");
          let albumsId = document.createElement("div");
          albumsId.setAttribute("class", "albumID");
          let idSeries = album.idSerie;
          let idAuteur = album.idAuteur;
          var nomFic =
            series.get(album.idSerie).nom +
            "-" +
            album.numero +
            "-" +
            album.titre;
          nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");

          card.innerHTML =
            "<img id='carBDImage" +
            idAlbum +
            "' class='d-block' src='albums/" +
            nomFic +
            ".jpg'>";
          cardPrice.innerHTML = "<p>" + album.prix + "€</p>";
          cardBody.innerHTML =
            "<h2 id='cardBodyTitle" +
            idAlbum +
            "'>" +
            album.titre +
            "</h2><p><strong>Numéro: </strong>" +
            album.numero +
            "</p><p><strong>Série: </strong>" +
            series.get(idSeries).nom +
            "</p><p><strong>Auteurs: </strong>" +
            auteur.nom +
            "</p>";
          albumsId.innerHTML = auteurCount;
          afficheResultCard.appendChild(albumsId);
          card.appendChild(cardBody);
          card.appendChild(cardPrice);
          card.appendChild(cartButton);
          afficheResultCard.appendChild(card);
          rowCont.appendChild(afficheResultCard);
          resultBDCards.appendChild(rowCont);

          // ADDTOCART

          cartButton.addEventListener("click", () => {
            const toast = new bootstrap.Toast(toastLiveCart);
            toast.show();
            let idSeries = album.idSerie;
            var cartItemIMG =
              series.get(idSeries).nom + "-" + album.numero + "-" + album.titre;
            cartItemIMG = cartItemIMG.replace(/'|!|\?|\.|"|:|\$/g, "");
            cart.push({
              titre: album.titre,
              prix: album.prix,
              img: cartItemIMG,
              amount: 1,
              ID: albumsId.textContent,
            });
            // cartArrayID++;
          });
          // ADDTOCART
        }
      }
    }
  }

  // for (let i = 1; i <= 159; i++) {
  //   let bdCount = 1;
  //   auteurCount = auteurCount.toString();
  //   if (auteurs.get(auteurCount) != undefined) {
  //     if (
  //       auteurs
  //         .get(auteurCount)
  //         .nom.toLocaleLowerCase()
  //         .includes(searchbar.value.toLocaleLowerCase()) == true
  //     ) {
  //       for (let j = 1; j <= 629; j++) {
  //         bdCount = bdCount.toString();
  //         if (albums.get(bdCount) != undefined) {
  //           if (auteurCount == albums.get(bdCount).idAuteur) {
  //             let card = document.createElement("div");
  //             card.setAttribute("id", "cardCont");
  //             let cardPrice = document.createElement("div");
  //             cardPrice.setAttribute("id", "cardPrice");
  //             let cartButton = document.createElement("button");
  //             cartButton.setAttribute("class", "btn btn-primary");
  //             cartButton.setAttribute("id", "cartButton");
  //             cartButton.innerHTML = `<p>Add <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  //             <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  //           </svg></p>`;
  //             let cardBody = document.createElement("div");
  //             cardBody.setAttribute("id", "cardBody");
  //             afficheResultCard = document.createElement("div");
  //             afficheResultCard.setAttribute("id", "cardsResult");
  //             afficheResultCard.setAttribute("class", "col-lg-2 mb-4");
  //             let albumsId = document.createElement("div");
  //             albumsId.setAttribute("class", "albumID");
  //             let idSeries = albums.get(bdCount).idSerie;
  //             let idAuteur = albums.get(bdCount).idAuteur;
  //             var nomFic =
  //               series.get(idSeries).nom +
  //               "-" +
  //               albums.get(bdCount).numero +
  //               "-" +
  //               albums.get(bdCount).titre;
  //             nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");
  //             card.innerHTML =
  //               "<img id='carBDImage' class='d-block' src='../albums/" +
  //               nomFic +
  //               ".jpg'>";
  //             cardPrice.innerHTML = "<p>" + albums.get(bdCount).prix + "€</p>";
  //             cardBody.innerHTML =
  //               "<h2 id='cardBodyTitle'>" +
  //               albums.get(bdCount).titre +
  //               "</h2><p><strong>Numéro: </strong>" +
  //               albums.get(bdCount).numero +
  //               "</p><p><strong>Série: </strong>" +
  //               series.get(idSeries).nom +
  //               "</p><p><strong>Auteurs: </strong>" +
  //               auteurs.get(idAuteur).nom +
  //               "</p>";
  //             albumsId.innerHTML = bdCount;
  //             afficheResultCard.appendChild(albumsId);
  //             card.appendChild(cardBody);
  //             card.appendChild(cardPrice);
  //             card.appendChild(cartButton);
  //             afficheResultCard.appendChild(card);
  //             rowCont.appendChild(afficheResultCard);
  //             resultBDCards.appendChild(rowCont);

  //             // ADDTOCART
  //             cartButton.addEventListener("click", () => {
  //               const toast = new bootstrap.Toast(toastLiveCart);
  //               toast.show();
  //               let idSeries = albums.get(albumsId.textContent).idSerie;
  //               var cartItemIMG =
  //                 series.get(idSeries).nom +
  //                 "-" +
  //                 albums.get(albumsId.textContent).numero +
  //                 "-" +
  //                 albums.get(albumsId.textContent).titre;
  //               cartItemIMG = cartItemIMG.replace(/'|!|\?|\.|"|:|\$/g, "");
  //               cart.push({
  //                 titre: albums.get(albumsId.textContent).titre,
  //                 prix: albums.get(albumsId.textContent).prix,
  //                 img: cartItemIMG,
  //                 amount: 1,
  //               });
  //             });
  //             // ADDTOCART
  //           }
  //         }
  //         bdCount++;
  //       }
  //     }
  //   }
  //   auteurCount++;
  // }
}
// Search By Author

// Search By Serie
function afficheResultSerie() {
  let afficheResultCard;
  let serieCount = 1;
  let rowCont = document.createElement("div");
  rowCont.setAttribute("class", "row");
  for (var [idSerie, serie] of series.entries()) {
    if (
      serie.nom
        .toLocaleLowerCase()
        .includes(searchbar.value.toLocaleLowerCase()) == true
    ) {
      for (var [idAlbum, album] of albums.entries()) {
        if (album.idSerie == idSerie) {
          let card = document.createElement("div");
          card.setAttribute("id", "cardCont" + idAlbum);
          let cardPrice = document.createElement("div");
          cardPrice.setAttribute("id", "cardPrice" + idAlbum);
          cartButton = document.createElement("button");
          cartButton.setAttribute("class", "btn btn-primary");
          cartButton.setAttribute("id", "cartButton" + idAlbum);
          cartButton.innerHTML = `<p>Add <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </svg></p>`;
          let cardBody = document.createElement("div");
          cardBody.setAttribute("id", "cardBody" + idAlbum);
          afficheResultCard = document.createElement("div");
          afficheResultCard.setAttribute("id", "cardsResult" + idAlbum);
          afficheResultCard.setAttribute("class", "col-lg-2 mb-4");
          let albumsId = document.createElement("div");
          albumsId.setAttribute("class", "albumID");
          let idSeries = album.idSerie;
          let idAuteur = album.idAuteur;
          var nomFic = serie.nom + "-" + album.numero + "-" + album.titre;
          nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");

          card.innerHTML =
            "<img id='carBDImage" +
            idAlbum +
            "' class='d-block' src='albums/" +
            nomFic +
            ".jpg'>";
          cardPrice.innerHTML = "<p>" + album.prix + "€</p>";
          cardBody.innerHTML =
            "<h2 id='cardBodyTitle" +
            idAlbum +
            "'>" +
            album.titre +
            "</h2><p><strong>Numéro: </strong>" +
            album.numero +
            "</p><p><strong>Série: </strong>" +
            serie.nom +
            "</p><p><strong>Auteurs: </strong>" +
            auteurs.get(idAuteur).nom +
            "</p>";
          albumsId.innerHTML = serieCount;
          afficheResultCard.appendChild(albumsId);
          card.appendChild(cardBody);
          card.appendChild(cardPrice);
          card.appendChild(cartButton);
          afficheResultCard.appendChild(card);
          rowCont.appendChild(afficheResultCard);
          resultBDCards.appendChild(rowCont);

          // ADDTOCART

          cartButton.addEventListener("click", () => {
            const toast = new bootstrap.Toast(toastLiveCart);
            toast.show();
            let idSeries = album.idSerie;
            var cartItemIMG =
              series.get(idSeries).nom + "-" + album.numero + "-" + album.titre;
            cartItemIMG = cartItemIMG.replace(/'|!|\?|\.|"|:|\$/g, "");
            cart.push({
              titre: album.titre,
              prix: album.prix,
              img: cartItemIMG,
              amount: 1,
              ID: albumsId.textContent,
            });
            // cartArrayID++;
          });
          // ADDTOCART
        }
      }
    }
    // for (let i = 1; i <= 114; i++) {
    //   let bdCount = 1;
    //   serieCount = serieCount.toString();
    //   if (series.get(serieCount) != undefined) {
    //     if (
    //       series
    //         .get(serieCount)
    //         .nom.toLocaleLowerCase()
    //         .includes(searchbar.value.toLocaleLowerCase()) == true
    //     ) {
    //       for (let j = 1; j <= 629; j++) {
    //         bdCount = bdCount.toString();
    //         if (albums.get(bdCount) != undefined) {
    //           if (serieCount == albums.get(bdCount).idSerie) {
    //             let card = document.createElement("div");
    //             card.setAttribute("id", "cardCont");
    //             let cardPrice = document.createElement("div");
    //             cardPrice.setAttribute("id", "cardPrice");
    //             let cartButton = document.createElement("button");
    //             cartButton.setAttribute("class", "btn btn-primary");
    //             cartButton.setAttribute("id", "cartButton");
    //             cartButton.innerHTML = `<p>Add <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
    //             <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    //           </svg></p>`;
    //             let cardBody = document.createElement("div");
    //             cardBody.setAttribute("id", "cardBody");
    //             afficheResultCard = document.createElement("div");
    //             afficheResultCard.setAttribute("id", "cardsResult");
    //             afficheResultCard.setAttribute("class", "col-lg-2 mb-4");
    //             let albumsId = document.createElement("div");
    //             albumsId.setAttribute("class", "albumID");
    //             let idSeries = albums.get(bdCount).idSerie;
    //             let idAuteur = albums.get(bdCount).idAuteur;
    //             var nomFic =
    //               series.get(idSeries).nom +
    //               "-" +
    //               albums.get(bdCount).numero +
    //               "-" +
    //               albums.get(bdCount).titre;
    //             nomFic = nomFic.replace(/'|!|\?|\.|"|:|\$/g, "");
    //             card.innerHTML =
    //               "<img id='carBDImage' class='d-block' src='../albums/" +
    //               nomFic +
    //               ".jpg'>";
    //             cardPrice.innerHTML = "<p>" + albums.get(bdCount).prix + "€</p>";
    //             cardBody.innerHTML =
    //               "<h2 id='cardBodyTitle'>" +
    //               albums.get(bdCount).titre +
    //               "</h2><p><strong>Numéro: </strong>" +
    //               albums.get(bdCount).numero +
    //               "</p><p><strong>Série: </strong>" +
    //               series.get(idSeries).nom +
    //               "</p><p><strong>Auteurs: </strong>" +
    //               auteurs.get(idAuteur).nom +
    //               "</p>";
    //             albumsId.innerHTML = bdCount;
    //             afficheResultCard.appendChild(albumsId);
    //             card.appendChild(cardBody);
    //             card.appendChild(cardPrice);
    //             card.appendChild(cartButton);
    //             afficheResultCard.appendChild(card);
    //             rowCont.appendChild(afficheResultCard);
    //             resultBDCards.appendChild(rowCont);
    //             // ADDTOCART
    //             cartButton.addEventListener("click", () => {
    //               const toast = new bootstrap.Toast(toastLiveCart);
    //               toast.show();
    //               let idSeries = albums.get(albumsId.textContent).idSerie;
    //               var cartItemIMG =
    //                 series.get(idSeries).nom +
    //                 "-" +
    //                 albums.get(albumsId.textContent).numero +
    //                 "-" +
    //                 albums.get(albumsId.textContent).titre;
    //               cartItemIMG = cartItemIMG.replace(/'|!|\?|\.|"|:|\$/g, "");
    //               cart.push({
    //                 titre: albums.get(albumsId.textContent).titre,
    //                 prix: albums.get(albumsId.textContent).prix,
    //                 img: cartItemIMG,
    //                 amount: 1,
    //               });
    //             });
    //             // ADDTOCART
    //           }
    //         }
    //         bdCount++;
    //       }
    //     }
    //   }
    //   serieCount++;
    // }
  }
}
// Search By Serie
