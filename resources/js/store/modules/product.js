import axios from "axios";

const captains = console;

export default {
  namespaced: true,
  state: {
    products: []
  },
  mutations: {
    GET_PRODUCTS(state, products) {
      state.products = products;
    }
  },
  actions: {
    async getProductsAction({ commit }) {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/products`);
        const products = response;
        commit("GET_PRODUCTS", products);
        return products;
      } catch (error) {
        return captains.log(error);
      }
    }
  },
  getters: {
    getProductsData: state => state.products
  }
};
