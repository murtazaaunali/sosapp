$(function(e) {
    $('body').on('click', '.c-sidebar__item.hashDropdown', function() {
        $(this).children('.subMenu').slideToggle();
    });
});

$(window).on('beforeunload', function() {
    $(window).scrollTop(0);
});

$(window).on("load", function() {
    $('.loader,.stOverlay').fadeOut();
});

$(window).scroll(function() {});

$(window).resize(function() {});

$(document).keyup(function(e) {
    if (e.keyCode === 13) {} //enter

    if (e.keyCode === 27) {} //esc

    if (e.keyCode === 38) {} //up

    if (e.keyCode === 40) {} //down
});