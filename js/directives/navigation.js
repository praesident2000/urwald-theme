const $ = require('jquery');

const $window  = $(window);
const header  = $('.header');
const item = $('.menu-item-has-children .nav-main__link');

let position = $window.scrollTop(); 

item.on('click', (event) => {
    event.preventDefault();
    header.toggleClass('header--active');
});

window.addEventListener('click', (event) => {
    const $target = $(event.target)
    if ( !$target.parents('.header').length > 0 ) {
        header.removeClass('header--active');
    }
});

window.addEventListener('scroll', () => {
    let scroll = $window.scrollTop();
    console.log(scroll);
    if ( scroll > 100 ){
        if( scroll > position ) {
            header.removeClass('header--show');
            header.removeClass('header--active');
            console.log('scrollDown');
        }
        else {
            header.addClass('header--show');
            header.addClass('header--active');
            console.log('scrollUp');
        }
        position = scroll;
    } else {
        header.addClass('header--show');
        header.removeClass('header--active');
        console.log('scrollTop');
    }
});