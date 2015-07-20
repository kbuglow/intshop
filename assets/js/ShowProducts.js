function changePathName() {
    var currentPath = document.getElementById('current-path-paragraph').innerHTML,
        newPart,
        indexOfCategory,
        pathParts = currentPath.split(' &gt; ');


    indexOfCategory = window.location.href.slice(window.location.href.lastIndexOf('/') + 1, window.location.href.length);
    console.log(indexOfCategory);
    document.getElementById(indexOfCategory).setAttribute('title', 'current');
    newPart = document.getElementById(indexOfCategory).firstElementChild.innerHTML;

    pathParts[pathParts.length - 1] = newPart;

    document.getElementById('current-path-paragraph').innerHTML = pathParts.join(' &gt; ');
}

window.onload = changePathName;