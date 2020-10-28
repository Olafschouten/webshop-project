<template>
  <div>
    <h1>Products</h1>
  
      <div v-for="product in products" :key="product.id">
        <p>{{ product.id }}</p>
        <p>{{ product.title }}</p>
        <p>$ {{ product.price }}</p>
        <p>{{ product.url }}</p>
        <br>
        <ul>
          <li><a href="">Add to cart</a></li>
          <li><a href="">Link to Product</a></li>
        </ul>
        <br>
      </div>
  </div>
</template>

<script>
export default {
  props: {
    products: Array,
  },
}
</script>