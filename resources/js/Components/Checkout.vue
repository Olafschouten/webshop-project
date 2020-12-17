<template>
  <div>
    <h1>Checkout</h1>

    <div v-for="product in cartData.products" :key="product.id">
      <h2>{{ product["title"] }}</h2>
      <p>Quantity: {{ product["qty"] }}</p>
      <p>$: {{ product["price"] }}</p>
    </div>

    <h2>Total $: {{ cartData.totalPrice }}</h2>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "Cart",
  computed: {
    ...mapActions("cart", ["setState", "getCartProducts"]),
    ...mapGetters("cart", { cartData: "getCart" }),
  },
  methods: {
    ...mapActions("cart", [
      "addToCartAction",
      "addOne",
      "reduceOne",
      "removeAll",
    ]),
    addToCart(productId) {
      this.addToCartAction(productId);
    },
  },
};
</script>