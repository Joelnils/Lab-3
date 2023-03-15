<script>
import gameData from "../../rules.json";
import LinkMenu from "@/components/LinkMenu.vue";
export default {
  data() {
    return {
      headline: "How To Play",
      headlineBJ: "Black Jack",
      headlineSlot: "Slots",
      headlineWheel: "Lucky Wheel",
      headlineAR: "American Roulette",
      headlineBaccarat: "Baccarat",
      headlineTCP: "Three Card Poker",
      games: gameData,
    };
  },
  components: {
    LinkMenu,
  },
};
</script>

<template>
  <div class="container_top">
    <div>
      <h1>{{ headline }}</h1>
    </div>
    <div class="scroll">
      <bounce class="scroll-text">Scroll</bounce>
    </div>
  </div>
  <div class="container_bottom">
    <div style="white-space: pre-line" class="container_bottom_content">
      <div>
        <h2 id="blackjack">{{ headlineBJ }}</h2>
      </div>
      <LinkMenu />
      <hr class="solid" />
      <p class="container_bottom_text" v-for="game in games" :key="game">
        <!-- Gets strings from rules.json in English -->
        {{ game.blackjack_eng }}
      </p>

      <div>
        <h2 id="Slot">{{ headlineSlot }}</h2>
      </div>
      <hr class="solid" />
      <p class="container_bottom_text" v-for="game in games" :key="game">
        {{ game.slots_eng }}
      </p>

      <div>
        <h2 id="Wheel">{{ headlineWheel }}</h2>
      </div>
      <hr class="solid" />
      <p class="container_bottom_text" v-for="game in games" :key="game">
        {{ game.wheel_eng }}
      </p>

      <div>
        <h2 id="Roulette">{{ headlineAR }}</h2>
      </div>
      <hr class="solid" />
      <p class="container_bottom_text" v-for="game in games" :key="game">
        {{ game.roulette_eng }}
      </p>

      <div>
        <h2 id="Baccarat">{{ headlineBaccarat }}</h2>
      </div>
      <hr class="solid" />
      <p class="container_bottom_text" v-for="game in games" :key="game">
        {{ game.baccarat_eng }}
      </p>

      <div>
        <h2 id="tcp">{{ headlineTCP }}</h2>
      </div>
      <hr class="solid" />
      <p class="container_bottom_text" v-for="game in games" :key="game">
        {{ game.threecardpoker_eng }}
      </p>
    </div>
  </div>
</template>

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

h2 {
  color: #ffffff;
}

hr.solid {
  border-top: 3px solid #ffffff;
}

div p {
  color: #ffffff;
}

.container_bottom {
  background-color: #000000;
  display: flex;
  overflow: hidden;
}

.container_bottom_content {
  display: flex;
  flex-direction: column;
  padding: 2rem;
  margin-left: 15%;
  margin-right: 15%;
}

.container_bottom_text {
  color: #ffffff;
  font-size: 0.975rem;
  line-height: 1.5;
  margin-bottom: 0.15rem;
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
