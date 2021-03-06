/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('stepper', require('./components/Stepper.vue'));
Vue.component('stepper-form', require('./components/StepperForm.vue'));

import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

Object.defineProperty(Vue.prototype, '$bus', {
    get() {
        return this.$root.bus;
    }
});

let bus = new Vue({});

const app = new Vue({
    data: {
        bus: bus,
        form: {},
    },
    el: '#app'
});
