
require('../bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

import App from './App.vue';
import router from './routes';

Vue.use(vueBraintree);
import vueBraintree from 'vue-braintree';



const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});

