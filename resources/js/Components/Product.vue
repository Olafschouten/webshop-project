<template>
    <div>
        <h1>Product</h1>
        {{ product.id }}
        <br />
        {{ product.title }}
        <br />
        {{ product.description }}
        <br />
        {{ product.created_at }}
        <br />
        <img v-bind:src="product.image" alt="img" width="100" height="100"/>
        <!-- {{ product.pivot.category_id }} -->
        <br />
        <!-- {{ product.pivot.product_id }} -->
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