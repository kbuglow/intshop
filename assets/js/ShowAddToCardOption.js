var allProductBoxes = document.getElementsByClassName('product-containers'),
    i,
    len;

for (i = 0, len = allProductBoxes.length; i < len; i += 1) {

    allProductBoxes[i].addEventListener('mouseover', function (event) {
        showAddOption(event.target);
    });

    allProductBoxes[i].addEventListener('mouseout', function (event) {
        hideAddOption(event.target);
    });


}

function showAddOption(target) {
    var currentId,
        fullId;

    fullId = target.getAttribute('id');
    currentId = fullId.slice(fullId.lastIndexOf('-') + 1, fullId.length);

    var productInformation = document.getElementById('product-information-' + currentId),
        productName = document.getElementById('product-name-' + currentId),
        priceBox = document.getElementById('product-price-' + currentId),
        oldPrice = document.getElementById('old-price-' + currentId),
        newPrice = document.getElementById('new-price-' + currentId),
        addMenu = document.getElementById('add-to-card-menu-' + currentId);

    if (productInformation) {
        productInformation.style.height = '60px';
    }

    if (productName) {
        productName.style.fontSize = '18px';
        productName.style.paddingTop = '6px';
    }

    if (priceBox) {
        priceBox.style.marginTop = '7px';
    }

    if (oldPrice) {
        oldPrice.style.fontSize = '14px';
    }

    if (newPrice) {
        newPrice.style.fontSize = '14px';
    }
    if (addMenu) {
        addMenu.style.top = '310px';
    }
}

function hideAddOption( target) {

    var currentId,
        fullId;

    fullId = target.getAttribute('id');
    currentId = fullId.slice(fullId.lastIndexOf('-') + 1, fullId.length);

    var productInformation = document.getElementById('product-information-' + currentId),
        productName = document.getElementById('product-name-' + currentId),
        priceBox = document.getElementById('product-price-' + currentId),
        oldPrice = document.getElementById('old-price-' + currentId),
        newPrice = document.getElementById('new-price-' + currentId),
        addMenu = document.getElementById('add-to-card-menu-' + currentId);

    if (productInformation) {
        productInformation.style.height = '94px';
    }

    if (productName) {
        productName.style.fontSize = '22px';
        productName.style.paddingTop = '12px';
    }

    if (priceBox) {
        priceBox.style.marginTop = '15px';
    }

    if (oldPrice) {
        oldPrice.style.fontSize = '16px';
    }

    if (newPrice) {
        newPrice.style.fontSize = '16px';
    }
    if (addMenu) {
        addMenu.style.top = '344px';
    }
}

function goToProductInformation(target){

}



