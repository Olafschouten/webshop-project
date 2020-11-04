<template>
    <div>
        <h1>Category</h1>
        <p>{{ category.id }}</p>
        <br />
        <p>{{ category.title }}</p>
        <br />
        <p>{{ category.created_at }}</p>
    </div>
</template>

<script>
export default {
    name: "category",
    data() {
        return {
            category: {
                // Not nessecery for getting it in the site
                id: "",
                title: "",
                created_at: "",
            },
        };
    },

    created() {
        const route = this.$route.fullPath;
        this.fetchCategory(route);
    },

    methods: {
        fetchCategory(route) {
            const page_url = "api" + route;
            fetch(page_url)
                .then((res) => res.json())
                .then((res) => {
                    this.category = res;
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>