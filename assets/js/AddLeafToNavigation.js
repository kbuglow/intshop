function addLeaf() {
    var allNavigationFields = document.getElementsByClassName('navigation-list-items'),
        i,
        len,
        lastItemOfURL=window.location.href.split('/')[window.location.href.split('/').length-1];

    for (i = 0, len = allNavigationFields.length; i < len; i += 1) {
        if(lastItemOfURL===''){
            document.getElementById('home').setAttribute('title', 'leaf');
        }
        if (lastItemOfURL===allNavigationFields[i].getAttribute('id')) {
            allNavigationFields[i].setAttribute('title', 'leaf');
            return;
        }
    }
}

addLeaf();