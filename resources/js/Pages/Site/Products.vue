<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Products
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <h1>Products</h1>

          <div v-for="product in products" :key="product.id">
            <p>{{ product.id }}</p>
            <p>{{ product.title }}</p>
            <p>$ {{ product.price }}</p>
            <p>{{ product.url }}</p>
            <br />
            <ul>
              <li><a href="">Add to cart</a></li>
              <li><a href="">Link to Product</a></li>
            </ul>
            <br />
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: {
    products: Array,
  },
};
</script>