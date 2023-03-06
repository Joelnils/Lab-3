<script setup>
   import wheel from '../components/Wheel.vue'
</script>

<template>
    <div class="extra">
   <wheel/>
</div>
</template>


<style scoped>
.extra{
    background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.5) 0%,
      rgba(0, 0, 0, 0.8) 100%
    ),
    url("https://images.unsplash.com/photo-1596838132731-3301c3fd4317?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80")
      no-repeat center fixed;
  background-size: cover;
  height: 110vh;
}
</style>
