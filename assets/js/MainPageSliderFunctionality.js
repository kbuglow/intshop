var sliderPages = document.getElementById('circles').getElementsByTagName('div'),
    sliderPreviousButton = document.getElementById('previous'),
    sliderNextButton = document.getElementById('next'),
    currentIndex = 0,
    i,
    len;


sliderPages[0].addEventListener('click', function (event) {
    changeSliderImage(event.target, 0);
});

sliderPages[1].addEventListener('click', function (event) {
    changeSliderImage(event.target, 1);
});

sliderPages[2].addEventListener('click', function (event) {
    changeSliderImage(event.target, 2);
});

sliderPreviousButton.addEventListener('click',function(event){
    if(currentIndex>=0){
        currentIndex-=1;
        changeSliderImage(sliderPages[currentIndex],currentIndex);
    }
    if(currentIndex===-1){
        currentIndex=2;
        changeSliderImage(sliderPages[currentIndex],currentIndex);
    }
});

sliderNextButton.addEventListener('click',function(event){
    if(currentIndex<=2){
        currentIndex+=1;
        changeSliderImage(sliderPages[currentIndex],currentIndex);
    }
    if(currentIndex===3){
        currentIndex=0;
        changeSliderImage(sliderPages[currentIndex],currentIndex);
    }
});

function changeSliderImage(target, index) {
    var j,
        length;
    for (j = 0, length = sliderPages.length; j < length; j += 1) {
        if (sliderPages[j] === target) {
            target.style.backgroundColor = 'white';
        }
        else {
            sliderPages[j].style.backgroundColor = '#908986';
        }
    }

    document.getElementById('slider').style.backgroundImage = 'url(assets/img/slider-image-' + index + '.png)';
    document.getElementById('url-to-go').addEventListener('click',function(event){
        window.location.href+='products/cat/' + (index+1);
    })
}


window.onload = function () {
    changeSliderImage(document.getElementById(currentIndex + '-image'), currentIndex);
};