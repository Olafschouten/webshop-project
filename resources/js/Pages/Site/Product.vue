<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <p>{{ product.id }}</p>
          <p>{{ product.title }}</p>
          <p>{{ product.description }}</p>
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
    product: Object,
    },
  };
</script>

<style>
</style>