<template>
    <div>
        <h1>Product</h1>
        {{ product.product.id }}
        <br />
        {{ product.product.title }}
        <br />
        {{ product.product.description }}
        <br />
        {{ product.product.created_at }}
        <br />
        <img v-bind:src="product.product.image" alt="img" width="100" height="100"/>
        <hr>
        <br />
        <div v-for="category in product.categories" v-bind:key="category.id">
            <h3>{{ category.title }}</h3>
            <hr />
            <ul>
                <!-- <li><router-link to="product.url">Link</router-link></li> -->
                <li><a v-bind:href="category.url">Link</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
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
    },
};
</script>