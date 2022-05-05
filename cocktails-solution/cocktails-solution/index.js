function createCocktailCard(drink) {
    var result = document.createElement('div');

    // Setting the class
    result.classList.add('card');

    var img = document.createElement('img');
    img.src = drink.strDrinkThumb;
    result.appendChild(img);

    var h3 = document.createElement('h3');
    h3.textContent = drink.strDrink;
    result.appendChild(h3);

    // Add some function to be called whenever we click the element
    result.addEventListener('click', function (event) {
        var spotlight = createCocktailSpotlight(drink);
        document.body.appendChild(spotlight);
    })

    return result;
}

function createCocktailSpotlight(drink) {
    var result = document.createElement('div');
    result.id = 'spotlight';

    // Create a card for the cocktail details
    var card = document.createElement('div');
    card.id = 'spotlight-card';

    var img = document.createElement('img');
    img.src = drink.strDrinkThumb;
    card.appendChild(img);

    var h1 = document.createElement('h1');
    h1.textContent = drink.strDrink;
    card.appendChild(h1);

    var instructions = document.createElement('p');
   
    instructions.innerHTML = drink.strInstructions + '<br/>';
    instructions.innerHTML += 'Ingrédients : <br/>'
    instructions.innerHTML += '- ' + drink.strIngredient1 + '<br/>';
    instructions.innerHTML += '- ' + drink.strIngredient2 + '<br/>';
    instructions.innerHTML += '- ' + drink.strIngredient3 + '<br/>';
    instructions.innerHTML += '- ' + drink.strIngredient4 + '<br/>';

    card.appendChild(instructions);

    // Add the card to the spotlight
    result.appendChild(card);

    result.addEventListener('click', function (event) {
        result.remove();
    })

    return result;
}

//on fait une petite classe pour récupérer que les infos qui nous interresse
class Drink {
    constructor(_strDrink, _strDrinkThumb, _idDrink) {
        this.strDrink = _strDrink;
        this.strDrinkThumb = _strDrinkThumb;
        this.idDrink = _idDrink;
        this.strIngredient1;
        this.strIngredient2;
        this.strIngredient3;
        this.strIngredient4;
        this.strInstructions;
        // RecupInfos();


        this.RecupInfos();


    }
    RecupInfos = async function () {
        var apiResponse = await fetchJSON("https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=" + String(this.idDrink));
        this.strInstructions = apiResponse.drinks[0].strInstructions;
        this.strIngredient1 = apiResponse.drinks[0].strIngredient1;
        this.strIngredient2 = apiResponse.drinks[0].strIngredient2;
        this.strIngredient3 = apiResponse.drinks[0].strIngredient3;
        this.strIngredient4 = apiResponse.drinks[0].strIngredient4;
    }

}

function addCocktailCards(drinks) {
    var cocktailList = document.querySelector('#cocktail-list');
    for (var i = 0; i < drinks.length; i++) {
        var drink = drinks[i];

        var cocktailCard = createCocktailCard(drink);
        cocktailList.appendChild(cocktailCard);
    }
}

/// Une autre façon d'appeler une API: on fait une xmlHttpRequest
function fetchJSON(url) {
    return new Promise(function (resolve, reject) {
        var request = new XMLHttpRequest();
        request.open("GET", url);
        request.addEventListener("load", function (event) {
            if (request.status == 200) {
                //On a une réponse mais celle-ci n'est pas interprété comme du JSON, on a donc besoin de faire un parse
                resolve(JSON.parse(request.response));
            }
            else {
                reject();
            }
        })
        request.send();
    });
}

async function init() {
    var apiResponse = await fetchJSON("https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=Gin");

    var drinks = new Array();
    for (i = 0; i < apiResponse.drinks.length; i++) {
        var _drink = new Drink(apiResponse.drinks[i].strDrink, apiResponse.drinks[i].strDrinkThumb, apiResponse.drinks[i].idDrink);
        _drink.RecupInfos();
        drinks.push(_drink);
    }
    addCocktailCards(drinks);
};

init();
