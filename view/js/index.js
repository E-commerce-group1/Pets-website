function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}

let addToCart = document.getElementById();

addToCart.addEventListener("load", function (e) {
    e.preventDefault();
    //TODO: get user id 
    let userId = 2;

    //TODO: get product id 
    let productId=1;
    
    //TODO: check if there is the same item in card and increment the quantity   
    let quantity = 2;
    
    fetch("http://localhost/Pets-website/controller/cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `user_id=${userId}&product_id=${productId}&quantity=${quantity}`,
    })
        .then((response) => response.text())
        .then((res) => {

            console.log(res);

        })
})

