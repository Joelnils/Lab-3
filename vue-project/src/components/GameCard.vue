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
          <input
            @click="$router.push('/games/blackjack')"
            type="button"
            value="Play"
            class="custom-btn btn-1"
          />
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

.custom-btn {
  width: 100px;
  height: 40px;
  padding: 10px 25px;
  cursor: pointer;
  outline: none;
  border: transparent;
  color: #fff;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
  font-size: 1.2rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-transform: uppercase;
  outline: 0;
  border-radius: 10px;
  padding: 1px;
}
.custom-btn:active {
  transform: translate(2px);
  -webkit-transform: translate(2px);
}

/* 1 */
.btn-1 {
  background: linear-gradient(182deg, #fea 0%, #dc8 49%, rgb(195, 174, 91) 51%, #dc8 100%);
}
/*2*/
.btn-2 {
  background: linear-gradient(
    top,
    #a95,
    #f2f2f2 25%,
    #fff 38%,
    #c5c5c5 63%,
    #f7f7f7 87%,
    #a95
  );
  background: -webkit-linear-gradient(
    top,
    #a95,
    #fea 25%,
    #fff 38%,
    #dc8 63%,
    #fea 87%,
    #a95
  );
}
/*3*/
.btn-3 {
  background: linear-gradient(#a95, #fea);
}
/*4*/
.btn-4 {
  background-image: -webkit-repeating-linear-gradient(
      left,
      rgba(255, 238, 170, 0) 0%,
      rgba(255, 238, 170, 0) 3%,
      rgba(255, 238, 170, 0) 5%
    ),
    linear-gradient(180deg, #a95 0%, #fea 47%, #dc8 53%, #fea 100%);
}
</style>
