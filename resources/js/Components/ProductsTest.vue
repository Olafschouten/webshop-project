<template>
  <div>
    <h1>Products</h1>

    <p>{{ product }}</p>
    <!-- <div v-for="product in products" v-bind:key="product.id">
      <h3>{{ product.title }}</h3>
      <p>{{ product.description }}</p>
      <p>$ {{ product.price }}</p>
      <hr />
      <img v-bind:src="product.image" alt="img" width="100" height="100" />
      <ul>
        <li><router-link to="product.url">Link</router-link></li>
        <li><a v-bind:href="'/#/product/' + product.id">Link to product</a></li>
        <li>
          <a v-on:click.prevent="addToCart(product.id)" href="#">
            Add to cart
          </a>
        </li>
      </ul>
    </div> -->
  </div>
</template>

<script>
export default {
  name: "productstest",
  data: () => ({
    product: "",
    products: [],
  }),
  mounted() {
    this.product = this.$store.getters.getCurrentProduct;
    this.products = this.$store.getters.getProducts;
    // this.$store.dispatch("fetchProducts");

    // this.products = this.$store.getters.getProducts;
  },
};
</script>

<style>
</style>