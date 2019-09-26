const Flickity = require('flickity');

const flkty = new Flickity( '.teaser-slider', {
    cellAlign: 'center',
    wrapAround: true,
    setGallerySize: false,
    cellSelector: ".teaser-slider__slide"
  });
  
// START – Flickity previous next classes
Flickity.createMethods.push( '_createPrevNextCells' );

Flickity.prototype._createPrevNextCells = function () {
    this.on( 'select', this.setPrevNextCells );
};

Flickity.prototype.setPrevNextCells = function () {
    // Remove classes
    changeSlideClasses( this.previousSlide, false, 'is-previous' );
    changeSlideClasses( this.nextSlide, false, 'is-next' );

    // Set previous and next slides
    this.previousSlide = this.slides[this.selectedIndex - 1];
    this.nextSlide = this.slides[this.selectedIndex + 1];

    // If wrapped around, use last and first slide accordingly.
    if (this.options.wrapAround) {
        if (this.previousSlide == null) {
            this.previousSlide = this.slides[this.slides.length - 1];
        }

        if (this.nextSlide == null) {
            this.nextSlide = this.slides[0];
        }
    }

    // Add classes
    changeSlideClasses( this.previousSlide, true, 'is-previous' );
    changeSlideClasses( this.nextSlide, true, 'is-next' );
};

function changeSlideClasses( slide, toggle, className ) {
    if (slide == null) {
        return;
    }

    slide.getCellElements().forEach( function ( cellElement ) {
        $( cellElement ).toggleClass( className, toggle );
    } );
}

// END – Flickity previous next classes