require('./bootstrap');

import Vue from 'vue';
import VueRouter from "vue-router";

Vue.use(VueRouter);

import App from './app.vue';
import Products from "./Components/Products";
import Product from "./Components/Product";
import Checkout from "./Components/Checkout";
import Cart from "./Components/Cart";
import Categories from "./Components/Categories";
import Category from "./Components/Category";
import About from "./Components/About";

const routes = [
  { path: '/products', component: Products },
  { path: '/product/:id', component: Product, name: 'product' },
  { path: '/cart', component: Cart },
  { path: '/checkout', component: Checkout },
  { path: '/categories', component: Categories },
  { path: '/category/:id', component: Category },
  { path: '/about', component: About },
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