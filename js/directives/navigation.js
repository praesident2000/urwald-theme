const $ = require('jquery');

const header  = $('.header');
const item = $('.menu-item-has-children .nav-main__link');

item.on('click', (event) => {
    event.preventDefault();
    header.toggleClass('header--active');
});


 window.addEventListener('click', (event) => {
    const $target = $(event.target)
    if ( !$target.parents('.header').length > 0 ) {
        $(header).removeClass('header--active');
    }
});