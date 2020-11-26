import axios from "axios";

const state = {
  products: [],
  cart: []
};

const getters = {
  allProducts: state => state.products,

  testProduct: state => state.products

  // getStateProducts: state => {
  //   return state.products;
  // }
};

const actions = {
  async fetchProducts({ commit }) {
    const response = await axios.get("http://127.0.0.1:8000/api/products");

    commit("setProducts", response.data.data);
  },

  async getProduct({ commit }, id) {
    const response = await axios.get(`http://127.0.0.1:8000/api/product/${id}`);

    commit("ADD_TO_CART", response.data.product);
  }
};

const mutations = {
  setProducts: (state, products) => (state.products = products),

  setCart(state, payload) {
    state.cart.push(payload);
  },

  ADD_TO_CART: (state, product) => state.cart.push(product)
};

export default {
  state,
  getters,
  actions,
  mutations
};
