<template>
  <div>
    <h1>Shoppingcart</h1>
    <div v-for="product in products" v-bind:key="product.id">
      <h3>{{ product.id }}</h3>
      <!-- <p>{{ product.description }}</p> -->
      <!-- <p>$ {{ product.price }}</p> -->
    </div>
  </div>
</template>

<script>
export default {
  ame: "cart",
  components: {},
  data() {
    return {
      products: {},
      totalPrice: "",
    };
  },

  created() {
    this.fetchCart();
  },

  methods: {
    fetchCart() {
      fetch("/api/cart")
        .then((res) => res.json())
        .then((res) => {
          this.products = res.products;
          this.totalPrice = res.totalPrice;
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>