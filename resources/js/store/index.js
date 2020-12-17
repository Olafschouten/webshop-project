import Vuex from "vuex";
import Vue from "vue";
import product1Module from "./modules/product1";
import cartModule from "./modules/cart";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    products: product1Module,
    cart: cartModule
  }
});
