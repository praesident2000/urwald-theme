const banner    = require('@beyonk/gdpr-cookie-consent-banner');

const options = {
    /**
     * You must set the cookie name.
     **/
    cookieName: 'urwald_gdpr',
   
    /**
     * The cookie configuration, such as domain and path.
     **/
    // cookieConfig: {
    //   domain: 'http://urwald:8888/',
    //   path: '/'
    // },
   
    /**
     * These are the top two lines of text on the banner
     * The 'description' field can include html such as links
     **/
    heading: 'Cookie Hinweis',
    description: 'We use cookies to offer a better browsing experience, analyze site traffic, personalize content, and serve targeted advertisements. Please review our <a href="/privacy-policy">privacy policy page</a>. By clicking accept, you consent to our privacy policy & use of cookies.',
   
    /**
     * All the button labels
     **/
    acceptLabel: 'Alle akzeptieren',
    settingsLabel: 'Einstellungen',
    closeLabel: 'Fenster schließen',
   
    /**
     * These are the default opt-ins and their descriptions.
     * When value is set to true, the option will automatically be checked on load.
     *
     * If you don't want to show a category, simply remove the specified key from this object.
     **/
    choices: {
        necessary: {
            label: 'Benötigte Cookies',
            description:
            "These can't be turned off as they are used to control all the other cookies",
            value: true
        },
        analytics: {
            label: 'Analyse Cookies',
            description:
            "Analysieren wichtiges Zeug.",
            value: true
        },
        tracking: false,
        marketing: false
    },
   
    /**
     * Show an icon to edit cookies later, when banner is closed.
    **/
    showEditIcon: false,
   
    /**
     * These are the functions which are run if a user opts-in to that category.
     * You should drop your cookies here (or set a variable to control the later dropping of cookies.
     *
     **/
    categories: {
        analytics: function() {
            // console.log('No analytics cookies specified');
            loadGAonConsent();
            loadIframes();
        },
        tracking: function() {
            console.log('No tracking cookies specified');
        },
        marketing: function() {
            console.log('No marketing cookies specified');
        },
        necessary: function() {
            console.log('No necessary cookies specified');
        }
    }
}
GdprConsent.attachBanner(document.body, options);

function loadIframes() {
    var vidDefer = document.getElementsByTagName('iframe');
    for (var i=0; i<vidDefer.length; i++) {
        if(vidDefer[i].getAttribute('data-vid')) {
            vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-vid'));
        }
    }
}

function loadGAonConsent(){
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('send', 'pageview');
    var gascript = document.createElement("script");
    gascript.async = true;
    gascript.src = "https://www.google-analytics.com/analytics.js";
    document.getElementsByTagName("head")[0].appendChild(gascript, document.getElementsByTagName("head")[0]);               
}