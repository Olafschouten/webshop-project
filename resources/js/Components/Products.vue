<template>
  <div>
    <h1>Products</h1>

    <div v-for="product in products" v-bind:key="product.id">
      <h3>{{ product.title }}</h3>
      <p>{{ product.description }}</p>
      <p>$ {{ product.price }}</p>
      <hr />
      <img v-bind:src="product.image" alt="img" width="100" height="100" />
      <ul>
        <li><a v-bind:href="'/#/product/' + product.id">Link to product</a></li>
        <button @click="addToCart(product.id)">Add to cart</button>
      </ul>
    </div>

    <nav aria-label="Page navigation example">
      <ul>
        <li v-bind:class="[{ disabled: !pagination.prev_page_url }]">
          <a href="#" @click="fetchProducts(pagination.prev_page_url)"
            >Previous</a
          >
        </li>

        <li>
          <a href="#"
            >Page {{ pagination.current_page }} of {{ pagination.last_page }}</a
          >
        </li>

        <li v-bind:class="[{ disabled: !pagination.next_page_url }]">
          <a href="#" @click="fetchProducts(pagination.next_page_url)">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "products",
  components: {},
  data() {
    return {
      products: {
        // Not nessecery for getting it in the site
        id: "",
        title: "",
        price: "",
        description: "",
        image: "",
        url: "",
        created_at: "",
      },
      pagination: {},
    };
  },
  created() {
    this.fetchProducts();
    this.getProductsAction();
  },
  computed: {
    ...mapGetters("products", { products1: "getProductsData" }),
    ...mapActions("cart", ["setState"]),
  },
  methods: {
    fetchProducts(page_url) {
      let vm = this;
      page_url = page_url || "/api/products";
      fetch(page_url)
        .then((res) => res.json())
        .then((res) => {
          this.products = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch((err) => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
      };

      this.pagination = pagination;
    },
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