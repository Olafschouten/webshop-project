<template>
  <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
      <jet-nav-link :href="route('dashboard')" :active="$page.currentRouteName == 'dashboard'">
        Dashboard
      </jet-nav-link>
      <jet-nav-link :href="route('products')" :active="$page.currentRouteName == 'products'">
        Products
      </jet-nav-link>
    </div>
</template>

<script>
    import JetNavLink from './../Jetstream/NavLink'

    export default {
        components: {
            JetNavLink,
        },
    }
</script>

<style>

</style>