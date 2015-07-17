var allAddToCardFields = document.getElementsByClassName('add-to-card-menu'),
    i,
    len;

for (i = 0, len = allAddToCardFields.length; i < len; i += 1) {
    allAddToCardFields[i].getElementsByTagName('button')[0].addEventListener('click',function(event){
        changeProductsNumberInCard(event.target);
    })
}

function changeProductsNumberInCard(){
    var cardOldText=document.getElementById('product-card').getElementsByTagName('p')[0].innerHTML.split(' ');

    cardOldText[0]= parseInt(cardOldText[0]) + 1;

    document.getElementById('product-card').getElementsByTagName('p')[0].innerHTML = cardOldText.join(' ');
}
