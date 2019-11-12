const Flickity = require('flickity');

const flkty = new Flickity( '.header-slider', {
    cellAlign: 'left',
    cellSelector: ".header-slider__slide",
    pageDots: false,
    prevNextButtons: false,
    setGallerySize: false,
    wrapAround: true
});