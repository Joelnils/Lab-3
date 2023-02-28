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
body {
  margin: 0;
  padding: 0;
  height: 100vh;
  background: url("https://images.unsplash.com/photo-1596838132731-3301c3fd4317?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80c")
    no-repeat center fixed;
  background-size: cover;
}
h1 {
  color: #ffffff;
  font-size: 50px;
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
  color: #ffffff;
  margin: auto;
  margin-top: 10vh;
}
.card {
  background-color: rgba(0, 0, 0, 0.68);
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.38);
  display: flex;
  overflow: hidden;
  margin-top: 25vh;
  margin-bottom: 30vh;
}
.card__content {
  display: flex;
  flex-direction: column;
  padding: 2rem;
  margin-left: 20%;
  margin-right: 20%;
}
.card__text {
  color: #ffffff;
  font-size: 0.975rem;
  line-height: 1.5;
  margin-bottom: 0.15rem;
}
</style>
