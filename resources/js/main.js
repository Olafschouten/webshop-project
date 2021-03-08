require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';

Vue.use(VueRouter);

import App from './app.vue';
import Products from './Components/Products';
import Product from './Components/Product';
import Cart from './Components/Cart';
import Categories from './Components/Categories';
import Category from './Components/Category';
import About from './Components/About';
import Checkout from './Components/Checkout';
import Contact from './Components/Contact';
// import Orders from "./Components/Orders";

const routes = [
    { path: '/products', component: Products },
    { path: '/product/:id', component: Product, name: 'product' },
    { path: '/cart', component: Cart },
    { path: '/categories', component: Categories },
    { path: '/category/:id', component: Category },
    { path: '/about', component: About },
    { path: '/checkout', component: Checkout },
    { path: '/contact', component: Contact },
    // { path: "/orders", component: Orders },
];

const router = new VueRouter({
    // mode: 'history',
    routes,
});

new Vue({
    el: '#app',
    store,
    router,
    components: {
        App,
    },
});
