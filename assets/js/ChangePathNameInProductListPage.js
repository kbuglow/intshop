function changePathName() {
    var indexOfCategory = window.location.href.slice(window.location.href.lastIndexOf('cat/') + 4, window.location.href.length),
        currentPath,
        newPart,
        pathParts;

    if (parseInt(indexOfCategory) >= 0) {
        currentPath = document.getElementById('current-path-paragraph').innerHTML;
        pathParts = currentPath.split(' &gt; ');

        document.getElementById(indexOfCategory).setAttribute('title', 'current');
        newPart = document.getElementById(indexOfCategory).firstElementChild.innerHTML;

        pathParts.push(newPart.replace(/&nbsp;/g, ''));

        document.getElementById('current-path-paragraph').innerHTML = pathParts.join(' &gt; ');
    }

    if (window.location.href.lastIndexOf('/products') >= 0 && window.location.href.lastIndexOf('cat/') < 0) {

        currentPath = document.getElementById('current-path-paragraph').innerHTML;
        pathParts = currentPath.split(' &gt; ');

        pathParts.push('Всички продукти');

        document.getElementById('current-path-paragraph').innerHTML = pathParts.join(' &gt; ');
    }

}


window.onload = changePathName;