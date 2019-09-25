const $ = require('jquery');

var nav  = $('.nav-main');
var item = $('menu-item-has-children');

item.on('click', function () {
    nav.toggleClass('nav-main--active')
});