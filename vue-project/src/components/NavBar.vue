<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<!-- Navbar -->
<template>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <RouterLink to="/" class="navbar-brand">

        <img :src="logo" alt="logo" id="logo" height="60">

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
          <RouterLink class="nav-link" to="/login">Account</RouterLink>
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
      logo: "src/assets/img/logo.png",
    };
  },
};
</script>

<style>

a.nav-link {
  color: white;
  margin: 0.5rem;
  font-family: "Times New Roman", Times, serif;
  font-size: 1.3rem;
}

a.nav-link:hover {
  color: darkgrey;
}

.nav {
  border-radius: 10px;
  display: flex;
  justify-content: end;
  background-color: rgba(26, 23, 23, 0.7);
}


/* responsive for mobile devices */
@media screen and (max-width: 768px) {

  .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .navbar {
    background-color: rgba(26, 23, 23, 0.7);
  }

  .nav {
    justify-content: center;
    background-color: rgba(26, 23, 23, 0);
  }

  a.nav-link {
    font-size: 1.2rem;
    margin-bottom: 0;
  }

  .container .navbar-brand {
    margin-right: 0;
  }
}

</style>
