const $       = require('jquery');
const Shuffle = require('shufflejs');

const shuffleInstance = new Shuffle(document.getElementById('post-masonry'), {
    itemSelector: '.tease',
});

$("select.post-filter__select").change(function(){
    var selectedCategory = $(this).children("option:selected").val();
    shuffleInstance.filter(selectedCategory);
});