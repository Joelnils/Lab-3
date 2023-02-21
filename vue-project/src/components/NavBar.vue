<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>
<template>
  <RouterLink to="/"></RouterLink>
  <RouterLink to="about">About</RouterLink>
  <RouterLink to="Login">Login</RouterLink>
  <RouterView />
</template>
