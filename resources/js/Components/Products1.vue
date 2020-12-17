<template>
  <div class="content-container">
    <h1>Products1</h1>
    <div v-for="product in products.data" :key="product.id">
      <h1>{{ product.title }}</h1>
      <h4>{{ product.id }}</h4>
      <button @click="addToCart(product.id)">Add to cart</button>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "Products1",
  created() {
    this.getProductsAction();
  },
  computed: {
    ...mapGetters("products", { products: "getProductsData" }),
    ...mapActions("cart", ["setState"]),
  },
  methods: {
    ...mapActions("products", ["getProductsAction"]),
    ...mapActions("cart", ["addToCartAction", "setCount", "countAddOne"]),
    addToCart(productId) {
      this.addToCartAction(productId);
    },
    setCount1(store) {
      this.setCount();
    },
    countAddOne1() {
      this.countAddOne();
    },
  },
};
</script>