<script setup>
import { RouterLink } from "vue-router";

const onClick = () => window.scrollTo(0, 0);
</script>

<template>
  <div class="f-container">
    <div class="left">
      <div class="one">
        <img class="img" src="../assets/img/logo.png" alt="" />
      </div>
      <div class="two">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
    </div>
    <div class="mid"></div>
    <div class="right">
      <div class="three">
        <h4>Copyright</h4>
        <p>© 2023 blabla</p>
      </div>
      <div class="four">
        <ul>
          <li class="nav-item">
            <RouterLink class="nav-text" to="/">Games</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-text" to="/">Odds</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-text" to="/about">About</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-text" to="/">Contact</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-text" to="/">Account</RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped>
* {
  color: white;
}
.f-container {
  height: auto;
  background-color: rgba(0, 0, 0, 0.68);
  width: 100%;
  padding: 20px;
}
.img {
  height: auto;
  width: 100px;
}
.left {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding-bottom: 30px;
  gap: 20px;
}
.right {
  display: flex;
  align-items: center;
  justify-content: space-around;
  border-top: 1px solid rgb(255, 255, 255);
  text-align: left;
  gap: 40px;
  padding-top: 30px;
}
.four ul li {
  list-style: none;
  text-decoration: none;
  color: white;
}
.four ul {
  text-align: right;
}
.two {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}
.nav-text {
  list-style: none;
  text-decoration: none;
}
@media only screen and (min-width: 991px) {
  .f-container {
    height: 30vh;
    background-color: rgba(0, 0, 0, 0.68);
    width: 100%;
    padding: 20px;
    display: flex;
    justify-content: space-around;
  }
  .right {
    border: 0;
  }
  .mid {
    border: 1px solid white;
  }
}
</style>
