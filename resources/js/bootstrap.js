window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) { }

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';
import Larasocket from 'larasocket-js';
window.Echo = new Echo({
    broadcaster: Larasocket,
    token: process.env.MIX_LARASOCKET_TOKEN,
});


// Listen for the MessageSent event on the 'chat' private channel
window.Echo.private('chat').listen('MessageSent', (event) => {
    console.log(event.message);
    let h1 = document.createElement('h1');
    h1.innerText = event.message;
    document.body.appendChild(h1);
});
