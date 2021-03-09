/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
require('./commons')

window.Vue = require("vue").default;
require('./components')

import App from "@/App.vue";
import VueAxios from "vue-axios";
import VueRouter from "vue-router";
import VueSweetalert2 from 'vue-sweetalert2';
import CustomToast from '@/pluguins/CustomToast';
import axios from "axios";
import { routes } from "./routes";

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueSweetalert2);
Vue.use(CustomToast);

const router = new VueRouter({
  mode: "history",
  routes: routes,
});

const DEFAULT_PAGE_TITLE = 'Pulz';
router.afterEach((to, from) => {
    Vue.nextTick(() => {
      document.title = `${DEFAULT_PAGE_TITLE} - ${to.meta.title}`;
    });
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: "#app",
  router: router,
  render: (h) => h(App),
});
