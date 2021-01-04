<template>
  <div>
    <h1>Categories</h1>

    <div v-for="category in categories" v-bind:key="category.id">
      <h3>{{ category.title }}</h3>
      <p>{{ category.created_at }}</p>
      <ul>
        <li><a v-bind:href="category.url + category.id">Link</a></li>
      </ul>
      <hr />
    </div>
  </div>
</template>

<script>
export default {
  name: "categories",
  components: {},
  data() {
    return {
      categories: {
        // Not nessecery for getting it in the site
        id: "",
        title: "",
        created_at: "",
      },
    };
  },

  created() {
    this.fetchProducts();
  },

  methods: {
    fetchProducts(page_url) {
      page_url = page_url || "/api/categories";
      fetch(page_url)
        .then((res) => res.json())
        .then((res) => {
          this.categories = res;
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>