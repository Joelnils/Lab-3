<script setup>
import Games from "../components/GameList.vue";
import GameCard from "../components/GameCard.vue";
</script>

<template>
  <div class="container_top">
  <div class="container_top_content">
    <h1 class="container_top_title">{{ hero }}</h1>
      <!--<input
                @click="$router.push('/games')"
                type="button"
                value="Play"
                class="custom-btn btn-1"
              />-->
    </div>
    <div class="scroll">
      <bounce class="scroll-text">Scroll</bounce>
    </div>
  </div>
  <div class="container_bottom">
    <h3 class="game_list-title">{{ listTitle }}</h3>
    <div class="game_list">
      <Games />
    </div>

    <div class="game">
      <h3 class="game_card-title">{{ cardTitle }}</h3>
      <div class="game_card">
        <GameCard />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      hero: "“The greatest risk is not taking one.”",
      listTitle: "Most popular games",
      cardTitle: "Game of the month",
    };
  },
};
</script>

<style scoped>
.container_top {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.container_top h1 {
  color: #fff;
  font-family: "Times New Roman", Times, serif;
  font-size: 40px;
}

.container_top_content {
  margin-top: 1vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.container_top_title {
  color: #fff;
  font-family: "Times New Roman", Times, serif;
  font-size: 100px;
}

.container_bottom {}

.container_bottom {
  padding-top: 5rem;
}

.container_bottom,
.game {
  background: #000000;
  padding: 5rem 0 3rem 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.game_list-title {
  color: #fff;
  font-family: "Times New Roman", Times, serif;
  align-self: flex-start;
  margin-left: 20%;
}

.game_card-title {
  color: #fff;
  font-family: "Times New Roman", Times, serif;
}

.game_list {
  width: 70vw;
  border: 2px solid #a95;
  border-radius: 2px;
  padding: 3rem 0;
}

.game_card {
  width: 70vw;
  padding: 3rem 0;
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
  background: linear-gradient(182deg,
      #fea 0%,
      #dc8 49%,
      rgb(195, 174, 91) 51%,
      #dc8 100%);
}

/*2*/
.btn-2 {
  background: linear-gradient(top,
      #a95,
      #f2f2f2 25%,
      #fff 38%,
      #c5c5c5 63%,
      #f7f7f7 87%,
      #a95);
  background: -webkit-linear-gradient(top,
      #a95,
      #fea 25%,
      #fff 38%,
      #dc8 63%,
      #fea 87%,
      #a95);
}

/*3*/
.btn-3 {
  background: linear-gradient(#a95, #fea);
}

/*4*/
.btn-4 {
  background-image: -webkit-repeating-linear-gradient(left,
      rgba(255, 238, 170, 0) 0%,
      rgba(255, 238, 170, 0) 3%,
      rgba(255, 238, 170, 0) 5%),
    linear-gradient(180deg, #a95 0%, #fea 47%, #dc8 53%, #fea 100%);
}

/* Scroll Animation */
.scroll {
  background: 0 0;
  border-width: 0;
  padding: 0;
  width: 0;
  position: absolute;
  right: 1.5rem;
  bottom: 0;
  z-index: 10;
  animation: scrollAnimation 2s ease-in-out infinite alternate;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.scroll::before {
  content: '';
  display: block;
  height: 80px;
  width: 24px;
  position: absolute;
  bottom: 0;
  left: calc(50% - 12px);
  z-index: 10;
}

.scroll-text {
  letter-spacing: .2rem;
  text-transform: uppercase;
  color: #f7f7f7;
  text-decoration: none;
  display: block;
  text-shadow: 0 0 1px rgb(0 0 0 / 30%), 0 1px 2px rgb(0 0 0 / 20%), 0 2px 4px rgb(0 0 0 / 10%);
  transform: translateX(50%)rotate(-90deg);
}

.scroll::after {
  background-color: #fff;
  content: '';
  display: block;
  height: 1.5rem;
  margin-left: -1px;
  transform-origin: 50% 100%;
  width: 2px;
}

@keyframes scrollAnimation {

  0%,
  100% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(20px);
  }
}
</style>
