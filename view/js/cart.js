function GetURLParameter(sParam) {
  var sPageURL = window.location.search.substring(1);
  var sURLVariables = sPageURL.split("&");
  for (var i = 0; i < sURLVariables.length; i++) {
    var sParameterName = sURLVariables[i].split("=");
    if (sParameterName[0] == sParam) {
      return sParameterName[1];
    }
  }
}
/*
<div class="card">
              <div class="card-image">
                <img src="https://rvs-checkout-page.onrender.com/photo1.png" alt="">
              </div>
              <div class="card-details">
                <div class="card-name">Vintage Backbag</div>
                <div class="card-price">$54.99 <span>$94.99</span></div>
                <div class="card-wheel">
                  <button>-</button>
                  <span>1</span>
                  <button>+</button>
                </div>
              </div>
            </div>
*/

//checkout

let checkoutRoot = document.getElementById("checkoutRoot");

function genareteCard(product) {
  let cardBody = document.createElement("div");
  cardBody.className = "card";
  checkoutRoot.append(cardBody);

  let cardImageDev = document.createElement("div");
  cardImageDev.className = "card-image";
  cardBody.append(cardImageDev);

  let cardImage = document.createElement("img");
  cardImage.src = "https://rvs-checkout-page.onrender.com/photo1.png";
  cardImageDev.append(cardImage);

  let cardDetails = document.createElement("div");
  cardDetails.className = "card-details";
  cardBody.append(cardDetails);

  let cardName = document.createElement("div");
  cardName.className = "card-name";
  cardName.textContent = product.name;
  cardDetails.append(cardName);

  let cardPrice = document.createElement("div");
  cardPrice.className = "card-price";
  cardPrice.textContent = product.price;
  cardDetails.append(cardPrice);
}

// change to onload event
window.onload = (e) => {
  let userId = 3;
  //   let quantity = 1;
  fetch("http://localhost/Pets-website/controller/checkout.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `user_id=${userId}`,
  })
    .then((response) => response.json())
    .then((res) => {
      console.log(res);
      res.forEach((element) => {
        genareteCard(element);
      });
    });
};
