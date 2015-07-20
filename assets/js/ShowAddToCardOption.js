var allProductBoxes = document.getElementsByClassName('product-containers'),
    i,
    len;

for(i=0,len=allProductBoxes.length;i<len;i+=1){

    allProductBoxes[i].addEventListener('mouseover',function(event){
        var fullId=event.target.getAttribute('id');
        var currentId = fullId.slice(fullId.lastIndexOf('-')+1,fullId.length);

        showAddOption(event.target,currentId);
    });

    allProductBoxes[i].addEventListener('mouseout',function(event){
        var fullId=event.target.getAttribute('id');
        var currentId = fullId.slice(fullId.lastIndexOf('-')+1,fullId.length);

        hideAddOption(event.target);
    });


}

function showAddOption(target,id){

    var productInformation = document.getElementById('product-information'+id),
        productName = document.getElementById('product-name'+id),
        priceBox = document.getElementById('product-price'+id),
        oldPrice = document.getElementById('old-price'+id),
        newPrice = document.getElementById('new-price'+id),
        addMenu = document.getElementById('add-to-card-menu'+id);

    console.log(id);
    productInformation.setAttribute('style','height:60px');

    productName.setAttribute('style','font-size:18px');
    productName.setAttribute('style','padding-top:6px');

    priceBox.setAttribute('style','margin-top:7px');

    oldPrice.setAttribute('style','font-size:14px');
    newPrice.setAttribute('style','font-size:14px');

    addMenu.setAttribute('style','top:310px');
}

function hideAddOption(target,id){
    var productInformation = document.getElementById('product-information'+id),
        productName = document.getElementById('product-name'+id),
        priceBox = document.getElementById('product-price'+id),
        oldPrice = document.getElementById('old-price'+id),
        newPrice = document.getElementById('new-price'+id),
        addMenu = document.getElementById('add-to-card-menu'+id);

    productInformation.style.height='94px';

    productName.style.fontSize='22px';
    productName.style.paddingTop='12px';

    priceBox.style.marginTop = '15px';

    oldPrice.style.fontSize='16px';
    newPrice.style.fontSize='16px';

    addMenu.style.top = '344px';
}



