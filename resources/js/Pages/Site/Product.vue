<template>
  <div>
      <h1>Product</h1>

      <p>{{ product.id }}</p>
      <p>{{ product.title }}</p>
      <p>{{ product.description }}</p>
  </div>
</template>

<script>
export default {
  props: {
    product: Object,
  }
}
</script>

<style>

</style>