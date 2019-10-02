let button  = document.getElementById('map-cta');

button.addEventListener('click', ()=> {
    
    loadScripts();

});

function loadScripts() {

    console.log('loadScripts');
    const documentHead = document.head;

    // load outdooractive javascript API
    let element = document.createElement('script');

    element.setAttribute('type', 'text/javascript');
    element.setAttribute('src',  "http://www.outdooractive.com/alpportal/oa_head.js?proj=api-dev-oa&key=yourtest-outdoora-ctiveapi&callback=initOA&lang=de");
                                //
    documentHead.appendChild(element);
}