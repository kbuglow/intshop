var productBox = document.getElementById('product-container1');

function showAddOption(){
    var productInformation = document.getElementById('product-information1'),
        productName = document.getElementById('product-name1'),
        priceBox = document.getElementById('product-price1'),
        oldPrice = document.getElementById('old-price1'),
        newPrice = document.getElementById('new-price1'),
        addMenu = document.getElementById('add-to-card-menu1');

    productInformation.style.height='60px';

    productName.style.fontSize='18px';
    productName.style.paddingTop='6px';

    priceBox.style.marginTop = '7px';

    oldPrice.style.fontSize='14px';
    newPrice.style.fontSize='14px';

    addMenu.style.top = '310px';
}

function hideAddOption(){
    var productInformation = document.getElementById('product-information1'),
        productName = document.getElementById('product-name1'),
        priceBox = document.getElementById('product-price1'),
        oldPrice = document.getElementById('old-price1'),
        newPrice = document.getElementById('new-price1'),
        addMenu = document.getElementById('add-to-card-menu1');

    productInformation.style.height='94px';

    productName.style.fontSize='22px';
    productName.style.paddingTop='12px';

    priceBox.style.marginTop = '15px';

    oldPrice.style.fontSize='16px';
    newPrice.style.fontSize='16px';

    addMenu.style.top = '344px';
}

productBox.addEventListener('mouseout',hideAddOption);

productBox.addEventListener('mouseover',showAddOption);



