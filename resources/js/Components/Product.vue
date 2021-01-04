<template>
  <div>
    <div v-if="product.product != 0">
      <h1>{{ product.product.title }}</h1>
      {{ product.product.description }}
      <br />
      $ {{ product.product.price }}
      <br />
      <img
        v-bind:src="product.product.image"
        alt="img"
        width="100"
        height="100"
      />
      <br />
      <button @click="addToCart(product.id)">Add to cart</button>
    </div>
    <h3>Categories</h3>
    <div v-if="product.categories != 0">
      <div v-for="category in product.categories" v-bind:key="category.id">
        <h3>{{ category.title }}</h3>
        <ul>
          <!-- <li><router-link to="product.url">Link</router-link></li> -->
          <li>
            <a v-bind:href="'/#/category/' + category.id">Link to category</a>
          </li>
        </ul>
      </div>
    </div>
    <div v-else>
      <p>No product categories</p>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "product",
  data() {
    return {
      product: {
        // Not nessecery for getting it in the site
        id: "",
        title: "",
        price: "",
        description: "",
        image: "",
        url: "",
        created_at: "",
        categories: {},
      },
    };
  },

  created() {
    const route = this.$route.fullPath;
    this.fetchProducts(route);
  },

  methods: {
    fetchProducts(route) {
      const page_url = "api" + route;
      fetch(page_url)
        .then((res) => res.json())
        .then((res) => {
          this.product = res;
        })
        .catch((err) => console.log(err));
    },
    ...mapActions("cart", ["addToCartAction"]),
    addToCart(productId) {
      this.addToCartAction(productId);
    },
  },
};
</script>