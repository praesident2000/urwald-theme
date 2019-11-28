const $              = require('jquery');
const Shuffle        = require('shufflejs');
const InfiniteScroll = require('infinite-scroll');
const lozad          = require('lozad');

const observer = lozad();

const shuffleInstance = new Shuffle(document.getElementById('post-masonry'), {
    itemSelector: '.tease',
});

$("select.post-filter__select").change(function(){
    var selectedCategory = $(this).children("option:selected").val();
    shuffleInstance.filter(selectedCategory);
});

var infScroll = new InfiniteScroll( '.post-masonry', {
    path: '.pagination__next',
    button: '.pagination__next',
    scrollThreshold: false,
    append: '.tease',
    history: false,
});

infScroll.on( 'append', function( response, path, items ) {
    shuffleInstance.add(items);
    observer.observe();
});