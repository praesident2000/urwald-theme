const $              = require('jquery');
const Shuffle        = require('shufflejs');
const InfiniteScroll = require('infinite-scroll');
const lozad          = require('lozad');

const observer = lozad();

const shuffleInstance = new Shuffle(document.getElementById('post-masonry'), {
    itemSelector: '.tease',
});

var infScroll = new InfiniteScroll( '.post-masonry', {
    path: '.pagination__next',
    button: '.pagination__next',
    scrollThreshold: false,
    append: '.tease',
    history: false,
});

// TO DO: Update filter function to load all posts into the shuffle instance and then filter
$("select.post-filter__select").change(function(){
    var selectedCategory = $(this).children("option:selected").val();
    infScroll.loadNextPage(); // WiP Load all posts instead
    observer.observe();
    shuffleInstance.filter(selectedCategory);
});

infScroll.on( 'append', function( response, path, items ) {
    shuffleInstance.add(items);
    observer.observe();
});