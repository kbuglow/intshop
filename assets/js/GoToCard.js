var allAddToCardFields = document.getElementsByClassName('add-to-card-menu'),
    i,
    len;



for (i = 0, len = allAddToCardFields.length; i < len; i += 1) {
    allAddToCardFields[i].addEventListener('click',function(event){
        goToCard(event.target);
    })
}

function goToCard(target){
    target.parentNode.submit();
    
}
