const $        = require('jquery');

$('#share').on('click', ()=> {
    const $parent = $('#share').parent();
    $parent.toggleClass('share--active');
});