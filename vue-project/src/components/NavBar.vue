<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>
<template>
  <nav class="navbar">
    <div class="container">
      <RouterLink to="/" class="navbar-brand">
        <img :src="logo" alt="logo" height="60">
      </RouterLink>
      <ul class="nav">
        <li class="nav-item">
          <RouterLink class="nav-link" to="/">Games</RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link" to="/">Odds</RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link" to="/about">About</RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link" to="/">Contact</RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link" to="/">Account</RouterLink>
        </li>
      </ul>
    </div>
  </nav>
  <RouterView />
</template>

<script>
export default {
  data() {
    return {
      logo: 'src/assets/img/logo.png'
    }
  }
}
</script>

<style>
a.nav-link {
  color: white;
  margin: .5rem;
  font-family: 'Times New Roman', Times, serif;
  font-size: 1.3rem;
}

a.nav-link:hover {
  color: darkgrey;
}

.navbar {
  background-color: rgba(0, 0, 0, 0.5);
}

</style>
