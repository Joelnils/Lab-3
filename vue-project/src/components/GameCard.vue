<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-8">
        <img src="../assets/img/img2.jpg" class="img-fluid" alt="..." />
      </div>
      <div class="col-md-4">
        <div class="card-body">
          <h4 class="card-title">{{ cardTitel }}</h4>
          <RouterLink to="/rules" class="card-link">How to play</RouterLink>
          <input type="button" value="Play" class="card_button" />
        </div>
      </div>
    </div>
  </div>
  <RouterView />
</template>

<script>
export default {
  data() {
    return {
      cardTitel: "Blackjack",
    };
  },
};
</script>

<style scoped>
.col-md-4,
.col-md-8 {
  background-color: #191c21;
}

.card {
  border: none;
}

.card-body {
  padding-top: 3rem;
  font-family: "Times New Roman", Times, serif;
  color: white;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #191c21;
}

.card-link {
  color: rgb(100, 100, 100);
  text-decoration: none;
  font-size: 0.8em;
}

.card_button {
  margin-top: 3rem;
  width: 10rem;
  height: 2.5rem;
  background: #a25c1d;
  border: 1px solid #9c9c9c;
  border-radius: 10px;
}
</style>
