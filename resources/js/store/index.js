import Vuex from "vuex";
import Vue from "vue";
// import Productstest from "./modules/products";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    currentProduct: "Current Product",
    cart: []
  },
  mutations: {
    // setProducts: (state, products) => (state.products = products),

    // ADD_TO_CART: (state, product) => state.cart.push(product)

    // setCurrentProduct(state, payload) {
    //   state.currentProduct = payload;
    //   state.cart.push(payload);
    // }
  },
  actions: {
    async fetchProducts(state) {
      const response = await axios.get("http://127.0.0.1:8000/api/products");

      state.commit("setProducts", response.data.data);
    },

    async getProduct(state, id) {
      const response = await axios.get(
        `http://127.0.0.1:8000/api/product/${id}`
      );

      state.commit("ADD_TO_CART", response.data.product);
    }
  },
  modules: {},
  getters: {
    getProducts: state => state.products,

    getCurrentProduct: state => state.currentProduct
  }
});
