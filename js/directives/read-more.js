const $ = require('jquery');

$('.read-more__button').on('click', (event)=> {
    $(event.target).parent().toggleClass('read-more--open');
});