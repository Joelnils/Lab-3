<script setup>
import Games from "../components/GameList.vue";
import GameCard from "../components/GameCard.vue";
</script>

<template>
  <div class="container_top">
    <div class="container_top_content">
      <h1 class="container_top_title">{{ hero }}</h1>
      <input
        @click="$router.push('/games')"
        type="button"
        value="Play"
        class="hero_button"
      />
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
.container_top h1{
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

.container_top_button {
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
