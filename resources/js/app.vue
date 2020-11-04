<template>
    <div>
        <navbar></navbar>
        <router-view></router-view>
    </div>
</template>

<script>
  import navbar from "./Components/NavBar";

  export default {
      name: "app",
      components: {
          navbar,
      },
  };
</script>