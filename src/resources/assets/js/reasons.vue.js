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
import ListReason from './pages/list.vue';
import Setting from './pages/setting.vue';

new Vue({
    el: '#reasons',

    components: {
        setting: Setting,
        addreason: AddReason,
        ListReason: ListReason
    }
})