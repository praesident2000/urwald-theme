const Flickity = require('flickity');

const flkty = new Flickity( '.header-slider', {
    autoPlay: 5000,
    cellAlign: 'left',
    cellSelector: ".header-slider__slide",
    pageDots: true,
    prevNextButtons: false,
    setGallerySize: false,
    wrapAround: true
});