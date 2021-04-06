/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import 'leaflet/dist/leaflet.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'mdbvue/lib/css/mdb.min.css';
import { Icon } from 'leaflet';

import store from "@/user/js/store/store";
import router from "@/user/js/router";

delete Icon.Default.prototype._getIconUrl;
Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('content', require('./components/sidebar.vue').default);
Vue.component('headside', require('./components/headside.vue').default);
Vue.component('ithem-list', require('./components/ithem-list.vue').default);
Vue.component('map-content', require('./components/map-content.vue').default);
Vue.component('navbar', require('./components/navbar.vue').default);
Vue.component('sidesearch', require('./components/sidesearch.vue').default);
Vue.component('TheAuth', require('./components/auth/TheAuth.vue').default);
Vue.component('RegForm', require('./components/auth/RegForm.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import App from './components/App';
window.app = new Vue({
    el: "#app",
    store: store,
    router: router,
    components: {},
    render: h => h(App)
});
/*
const app = new Vue({
    el: '#app',
});*/
/*
import Vue from "vue";
import 'leaflet/dist/leaflet.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'mdbvue/lib/css/mdb.min.css';
import { Icon } from 'leaflet';

//import store from "@/user/js/store/store";

Vue.component('ithem-list', require('./components/ithem-list.vue').default);
Vue.component('chtothis', require('./components/chtothis.vue').default);
Vue.component('map-content', require('./components/map-content.vue').default);

Vue.component('v-footer', require('./components/v-footer.vue').default);



import App from './components/App';

Vue.component('navbar', require('./components/navbar.vue').default);
Vue.component('authform', require('./components/authform.vue').default);
//ue.component('TheAuth', require('./components/TheAuth.vue').default);

window.app = new Vue({
    el: "#app",

    //router: router,
    //components: {},
    render: h => h(App)
});*/
