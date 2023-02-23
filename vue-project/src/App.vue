<script setup>
import NavBar from "./components/NavBar.vue";
import foot from "./components/FootEr.vue"
</script>

<template>
  <div class="main">
  <NavBar />
  <div class="footer"><foot/></div>
</div>
</template>

<style scoped>
.main{
  min-height: 100vh;
    display: flex;
    flex-direction: column;
}
.footer{
  margin-top: auto;
}

</style>