
require('./bootstrap');

window.Vue = require('vue');
import axios from 'axios';
Vue.use(axios);

const app = new Vue({
    el: '#app',
    components:{
    	'home-components':require('./components/home.vue').default,
	    'applicant-registration': require('./components/registration.vue').default
    }
});
