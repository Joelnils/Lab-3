<script setup>
import Games from "../components/GameList.vue";
import GameCard from "../components/GameCard.vue";
</script>

<template>
  <div class="hero">
    <div class="hero_content">
      <h1 class="hero_title">{{ hero }}</h1>
      <input type="button" value="Play" class="hero_button" />
    </div>
  </div>
  <div class="games">
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
      hero: "Main",
      listTitle: "Most popular games",
      cardTitle: "Game of the month",
    };
  },
};
</script>

<style scoped>
.hero {
  background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.5) 0%,
      rgba(0, 0, 0, 0.8) 100%
    ),
    url("https://images.unsplash.com/photo-1596838132731-3301c3fd4317?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80")
      no-repeat center fixed;
  background-size: cover;
  height: 100vh;
}

.hero_content {
  margin-top: 20rem;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.hero_title {
  color: #fff;
  font-family: "Times New Roman", Times, serif;
  font-size: 100px;
}

.hero_button {
  margin-top: 1rem;
  width: 12rem;
  height: 3rem;
  background: #a25c1d;
  border: 1px solid #9c9c9c;
  border-radius: 10px;
}

.games {
  padding-top: 5rem;
}

.games,
.game {
  background: #02070c;
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
  border: 2px solid #a25c1d;
  border-radius: 2px;
  padding: 3rem 0;
}

.game_card {
  width: 70vw;
  padding: 3rem 0;
}
</style>
