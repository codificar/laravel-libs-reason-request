window.vue = require('vue');

require('lodash');

import Vue from 'vue';

Vue.prototype.trans = (key) => {
    return _.get(window.lang, key, key);
};

import axios from "axios";
Vue.prototype.$axios = axios;

import pagination from 'laravel-vue-pagination';
Vue.component('pagination', pagination);

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

import AddReason from './pages/add.vue';
Vue.component('addreason', AddReason);

import ListReason from './pages/list.vue';
Vue.component('listreason', ListReason);

import Setting from './pages/setting.vue';
Vue.component('setting', Setting);

new Vue({
    el: '#reasons',
    VueSweetalert2
})