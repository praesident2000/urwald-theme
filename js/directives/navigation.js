const $ = require('jquery');

const $window  = $(window);
const header  = $('.header');
const item = $('.menu-item-has-children .nav-main__link');

let position = $window.scrollTop();
let open; 

item.on('click', (event) => {
    event.preventDefault();
    const name = $(event.target).parent().attr('id');
    $('.' + name ).toggleClass('active');
    header.toggleClass('header--active');
});

$('.header .hamburger').on('click', function () {
    $(this).toggleClass('hamburger--active');
    $('.header').toggleClass('header--active');
    $('.nav-item-hamburger').toggleClass('active');
});


window.addEventListener('scroll', () => {
    let scroll = $window.scrollTop();
    console.log(scroll);
    if ( scroll > 0 ){
        if( scroll > position ) {
            header.removeClass('header--show');
            header.removeClass('header--active');
            // console.log('scrollDown');
        }
        else {
            header.addClass('header--show');
            header.addClass('header--active');
            // console.log('scrollUp');
        }
        position = scroll;
    } else {
        header.addClass('header--show');
        header.removeClass('header--active');
        // console.log('scrollTop');
    }
});

// remove header active if clicked outside
window.addEventListener('click', (event) => {
    const $target = $(event.target)
    if ( !$target.parents('.header').length > 0 ) {
        header.removeClass('header--active');
    }
});
