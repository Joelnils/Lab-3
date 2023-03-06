<script>
import gameData from "../../rules.json";
export default {
  data() {
    return {
      headline: "How To Play",
      headlineBJ: "Black Jack",
      games: gameData,
    };
  },
};
</script>

<template>
  <div class="headline">
    <h1>{{ headline }}</h1>
  </div>
  <div class="card">
    <div style="white-space: pre-line" class="card__content">
      <div>
        <h2>{{ headlineBJ }}</h2>
      </div>
      <hr class="solid" />
      <p class="card__text" v-for="game in games" :key="game">
        <!-- Gets strings from rules.json in Swedish & English -->
        {{ game.blackjack_swe }}
      </p>
      <hr class="solid" />
      <p class="card__text" v-for="game in games" :key="game">
        {{ game.blackjack_eng }}
      </p>
    </div>
  </div>
</template>

<style scoped>
h1 {
  color: #ffffff;
  font-size: 70px;
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
.headline,
h1 {
  color: #fff;
  font-family: "Times New Roman", Times, serif;
  font-size: 100px;
  margin: auto;
  margin-top: 22vh;
}
.card {
  background-color: #02070c;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.38);
  display: flex;
  overflow: hidden;
  margin-top: 40vh;

}
.card__content {
  display: flex;
  flex-direction: column;
  padding: 2rem;
  margin-left: 14%;
  margin-right: 14%;
}
.card__text {
  color: #ffffff;
  font-size: 0.975rem;
  line-height: 1.5;
  margin-bottom: 0.15rem;
}
</style>
