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

// let addToCart = document.getElementById();

window.onload = e =>{
    fetch("http://localhost/Pets-website/controller/allProduct.php", {
        method: "GET",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        }
    })
        .then((response) => response.json())
        .then((res) => {
            console.log(res);
            res.forEach(product => {
                generateProduct(product);
            });

        })
}

let productRoot = document.getElementById('productRoot');

function generateProduct(product){

    let divContainer = document.createElement('div');
    divContainer.className = 'col-lg-3 col-md-6 col-sm-12 pb-1';
    productRoot.append(divContainer);

    let cardContainer = document.createElement('div');
    cardContainer.className = 'card product-item border-0 mb-4'
    divContainer.append(cardContainer);

    let cardHeader = document.createElement('div');
    cardHeader.className = 'card-header product-img position-relative overflow-hidden bg-transparent border p-0';
    cardContainer.append(cardHeader);

    let imageHeader = document.createElement('img');
    imageHeader.className='img-fluid w-100';
    // TODO: add image to product
    imageHeader.src = product.image;
    cardHeader.append(imageHeader);

    let cardBody = document.createElement('div');
    cardBody.className = 'card-body border-left border-right text-center p-0 pt-4 pb-3';
    divContainer.append(cardBody);

    let productName = document.createElement('h6');
    productName.className = 'text-truncate mb-3';
    productName.textContent = product.name;
    cardBody.append(productName);

    let productPriceBody = document.createElement('div');
    productPriceBody.className = 'd-flex justify-content-center';
    cardBody.append(productPriceBody);

    let productPrice = document.createElement('h6');
    productPrice.textContent = "$"+product.price;
    productPriceBody.append(productPrice);

    
    let productDiscountPrice = document.createElement('h6');
    productDiscountPrice.className = 'text-muted ml-2';
    // TODO: add discount price
    let discountPrice = document.createElement('del');
    discountPrice.textContent = "$"+'500';
    productDiscountPrice.append(discountPrice);
    productPriceBody.append(productDiscountPrice);

    let cardFooter = document.createElement('div');
    cardFooter.className = 'card-footer d-flex justify-content-between bg-light border';
    divContainer.append(cardFooter);

    let viewDetailsLink = document.createElement('a');
    viewDetailsLink.className = 'btn btn-sm text-dark p-0';
    viewDetailsLink.textContent = 'View Details';
    cardFooter.append(viewDetailsLink);

    let viewDetailsIcon = document.createElement('i');
    viewDetailsIcon.className = 'fas fa-eye text-warning mr-1';
    viewDetailsLink.append(viewDetailsIcon);

    let viewCartLink = document.createElement('a');
    viewCartLink.className = 'btn btn-sm text-dark p-0';
    viewCartLink.textContent = 'Add to cart';
    cardFooter.append(viewCartLink);

    let cartDetailsIcon = document.createElement('i');
    cartDetailsIcon.className = 'fas fa-shopping-cart text-warning mr-1';
    viewCartLink.append(cartDetailsIcon);



}


// addToCart.addEventListener("load", function (e) {
//     e.preventDefault();
//     //TODO: get user id 
//     let userId = 2;

//     //TODO: get product id 
//     let productId=1;
    
//     //TODO: check if there is the same item in card and increment the quantity   
//     let quantity = 2;
    
//     fetch("http://localhost/Pets-website/controller/cart.php", {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
//         },
//         body: `user_id=${userId}&product_id=${productId}&quantity=${quantity}`,
//     })
//         .then((response) => response.text())
//         .then((res) => {

//             console.log(res);

//         })
// })

