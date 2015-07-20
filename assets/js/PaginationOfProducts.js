var show_per_page = 9,
    current_page = 0,
    number_of_items = $('.product-containers').size(),
    number_of_pages = Math.ceil(number_of_items / show_per_page);

$(document).ready(function () {

    var leftArrow = '<a id="left-arrow" href="javascript:previous();"></a>',
        rightArrow = '<a id="right-arrow" href="javascript:next();"></a>',
        allLinkElementsOfPages = '',
        current_link = 0;

    $('#product-pages').html(leftArrow + '<div id="numbers-of-pages"></div>' + rightArrow);

    while (number_of_pages > current_link) {
        allLinkElementsOfPages += '<a class="page_link" href="javascript:go_to_page(' + current_link + ')" id="' + current_link + '">' + (current_link + 1) + '</a>';
        current_link++;
    }

    $('#numbers-of-pages').html(allLinkElementsOfPages);

    $(".page_link:first-child").css('font-size', '24px');

    $('.product-containers').css('display', 'none').slice(0, show_per_page).css('display', 'inline-block');

});

function previous() {
    new_page = current_page - 1;

    if (current_page > 0) {
        go_to_page(new_page);
    }

}

function next() {
    new_page = current_page + 1;

    if (current_page < number_of_pages - 1) {
        go_to_page(new_page);
    }

}
function go_to_page(page_num) {

    start_from = page_num * show_per_page;

    end_on = start_from + show_per_page;

    $('.product-containers').css('display', 'none').slice(start_from, end_on).css('display', 'inline-block');

    $('a#' + current_page + ".page_link").css('font-size', '18px');
    $('a#' + page_num + ".page_link").css('font-size', '24px');

    current_page = page_num;
}
