const $        = require('jquery');

const $window  = $(window);
const header   = $('.header');
const navs     = $('.menu-item-has-children .nav-main__link');
const items    = $('.header__submenu');

let position   = $window.scrollTop();
let open       = false; 

// handle click events for submenu parents
navs.on('click', (event) => {
    event.preventDefault();
    event.stopPropagation();
    const $parent = $(event.target).closest('.menu-item-has-children');
    const $parentId = $parent.attr('id');

    if (open == false && !$parent.hasClass('active') ) {
        open = true;
        $parent.addClass('active');
        items.removeClass('active');
        $('.' + $parentId ).addClass('active');
        header.addClass('header--active');
    } 
    else if ( open == true && !$parent.hasClass('active') ) {
        open = true;
        navs.closest('.menu-item-has-children').removeClass('active');
        $parent.addClass('active');
        items.removeClass('active');
        $('.' + $parentId ).addClass('active');
    }
    else if ( open == true && $parent.hasClass('active') ) {
        open = true;
        $parent.removeClass('active');
        items.removeClass('active');
        // $('.' + $parentId ).removeClass('active');
        // header.removeClass('header--active');
    }
});

// handle header scroll behaviour
window.addEventListener('scroll', () => {
    let scroll = $window.scrollTop();
    console.log(scroll);
    if ( scroll > 0 ){
        if( scroll > position ) {
            header.removeClass('header--show');
            header.removeClass('header--active');
            items.removeClass('active');
            navs.closest('.menu-item-has-children').removeClass('active');
        }
        else {
            header.addClass('header--show');
            header.addClass('header--active');
        }
        position = scroll;
    } 
    else if ( scroll == 0 && open == true ) {

    }
    else {
        header.addClass('header--show');
        header.removeClass('header--active'); 
    }
});

// remove all active classes if clicked outside
window.addEventListener('click', (event) => {
    const $target = $(event.target)
    if ( !$target.parents('.header').length > 0 ) {
        open = false;
        header.removeClass('header--active');
        items.removeClass('active');
        navs.closest('.menu-item-has-children').removeClass('active');
    }
});
