var allCategories = document.getElementsByClassName('our-products-categories'),
    j,
    length;

for(j=0,length=allCategories.length;j<length;j+=1){
    allCategories[j].setAttribute('id',j);
    allCategories[j].addEventListener('click',function(event){
        changeStylesOfCategories(event.target);
    });
}

    function changeStylesOfCategories(target) {
        var i,
            len,
            currentPath=document.getElementById('current-path-paragraph').innerHTML,
            newPart = target.getElementsByTagName('a')[0].innerHTML.toLowerCase();


       /* document.getElementById('current-path-paragraph').innerHTML = changePathName(currentPath,newPart);*/

        for (i = 0, len = allCategories.length; i < len; i += 1) {
            if (allCategories[i] === target) {
                allCategories[i].setAttribute('title', 'current');
            }
            else {
                allCategories[i].removeAttribute('title');
            }
        }
    }

/*function changePathName(oldPath,newPart){
    var pathParts= oldPath.split(' > ');

    newPart = newPart[0].toUpperCase() + newPart.slice(1);
    pathParts[pathParts.length-1]=newPart;

    return pathParts.join(' > ')
}*/