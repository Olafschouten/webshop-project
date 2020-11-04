require('./bootstrap');

import Vue from 'vue';
import VueRouter from "vue-router";

Vue.use(VueRouter);

import App from './app.vue';
import Products from "./Components/Products";
import Product from "./Components/Product";
import Checkout from "./Components/Checkout";
import Cart from "./Components/Cart";

const routes = [
  { path: '/products', component: Products },
  { path: '/product/:id', component: Product, name: 'product' },
  { path: '/cart', component: Cart },
  { path: '/checkout', component: Checkout }, 
]

const router = new VueRouter({
  // mode: 'history',
  routes
})

new Vue({
  el: "#app",
  router,
  components: {
    App,
  }
});