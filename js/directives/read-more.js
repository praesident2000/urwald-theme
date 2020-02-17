const $ = require('jquery');

$('.read-more__button').on('click', (event)=> {
    $(event.target).closest('.read-more').toggleClass('read-more--open');
});