<template>
  <div class="container">
    <RouterLink to="/"> </RouterLink>
    <ul class="nav">
      <li class="links flex-grow-1">
        <RouterLink class="nav-link" to="/games/Slot">Slot</RouterLink>
      </li>
      <li class="links flex-grow-1">
        <RouterLink class="nav-link" to="/games/Wheel">Lucky Wheel</RouterLink>
      </li>
      <li class="links flex-grow-1">
        <RouterLink class="nav-link" to="/games/Blackjack"
          >Blackjack</RouterLink
        >
      </li>
    </ul>
  </div>
  <RouterView />
</template>

<style scoped>
.container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.links {
  list-style-type: none;
  margin-right: 10px;
}

.flex-grow-1 {
  flex-grow: 1;
}

.nav-link {
    color: #ffffff;
  text-decoration: none;
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  font-size: 0.875rem;
  line-height: 1.5;
  margin-bottom: 1.25rem;
  

}

.nav-link:hover {
    background: linear-gradient(
    182deg,
    #fea 0%,
    #dc8 49%,
    rgb(195, 174, 91) 51%,
    #dc8 100%
  );
  border-radius: 10px;
}
</style>
