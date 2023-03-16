<script>
import gameData from "../../rules.json";
export default {
  data() {
    return {
      headline: "Our Games",
      games: gameData,
    };
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
    <ul class="cards">
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--1"></div>
          <div class="card__content">
            <div class="card__title">Slots</div>
            <p class="card__text" v-for="game in games" :key="game">
              {{ game.slots_card }}
            </p>
            <button @click="$router.push('/games/slot')" class="custom-btn btn-1" type="button">
              <i class="icon ion-md-lock"></i>Go To Game
            </button>
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--2"></div>
          <div class="card__content">
            <div class="card__title">Black Jack</div>
            <p class="card__text" v-for="game in games" :key="game">
              {{ game.blackjack_card }}
            </p>
            <button @click="$router.push('/games/blackjack')" class="custom-btn btn-1" type="button">
              <i class="icon ion-md-lock"></i>Go To Game
            </button>
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--3"></div>
          <div class="card__content">
            <div class="card__title">American Roulette</div>
            <p class="card__text" v-for="game in games" :key="game">
              {{ game.roulette_card }}
            </p>
            <button class="custom-btn btn-5" type="button">
              <i class="icon ion-md-lock"></i>Coming soon!
            </button>
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--4"></div>
          <div class="card__content">
            <div class="card__title">Punto Banco (Baccarat)</div>
            <p class="card__text" v-for="game in games" :key="game">
              {{ game.baccarat_card }}
            </p>
            <button class="custom-btn btn-5" type="button">
              <i class="icon ion-md-lock"></i>Coming soon!
            </button>
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--5"></div>
          <div class="card__content">
            <div class="card__title">Three Card Poker</div>
            <p class="card__text" v-for="game in games" :key="game">
              {{ game.threecardpoker_card }}
            </p>
            <button class="custom-btn btn-5" type="button">
              <i class="icon ion-md-lock"></i>Coming soon!
            </button>
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--6"></div>
          <div class="card__content">
            <div class="card__title">Lucky Wheel</div>
            <p class="card__text" v-for="game in games" :key="game">
              {{ game.wheel_card }}
            </p>
            <button @click="$router.push('/games/wheel')" class="custom-btn btn-1" type="button">
              <i class="icon ion-md-lock"></i>Go To Game
            </button>
          </div>
        </div>
      </li>
    </ul>
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

.cards {
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
  justify-content: center;
}

.cards__item {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding: 1rem;
}

@media (min-width: 40rem) {
  .cards__item {
    width: 50%;
  }
}

@media (min-width: 56rem) {
  .cards__item {
    width: 35%;
  }
}

.card {
  background-color: #000000;
  border: 2px solid #a95;
  border-radius: 1rem;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.38);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  overflow: hidden;
  margin-top: 5vh;
}

.card:hover .card__image {
  -webkit-filter: contrast(100%);
  filter: contrast(100%);
}

.card__content {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  padding: 1rem;
}

.card__image {
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
  -webkit-filter: contrast(85%);
  filter: contrast(85%);
  overflow: hidden;
  position: relative;
  -webkit-transition: -webkit-filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
  transition: -webkit-filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
  transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
  transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91),
    -webkit-filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
}

.card__image::before {
  content: "";
  display: block;
  padding-top: 56.25%;
}

@media (min-width: 40rem) {
  .card__image::before {
    padding-top: 66.6%;
  }
}

.card__image--1 {
  background-image: url(../assets/img/games/img-slots2.png);
}

.card__image--2 {
  background-image: url(../assets/img/games/img-cards2.png);
}

.card__image--3 {
  background-image: url(../assets/img/games/img-roulette.png);
}

.card__image--4 {
  background-image: url(../assets/img/games/img-baccarat.png);
}

.card__image--5 {
  background-image: url(../assets/img/games/img-threecard.png);
}

.card__image--6 {
  background-image: url(../assets/img/games/img-wheel3.png);
}

.card__title {
  color: #ffffff;
  font-size: 1.25rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-transform: uppercase;
}

.card__text {
  color: #ffffff;
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  font-size: 0.875rem;
  line-height: 1.5;
  margin-bottom: 1.25rem;
}

.segment {
  padding: 32px 0;
  text-align: center;
}

.custom-btn {
  width: 100%;
  height: 40px;
  padding: 10px 25px;
  margin-right: 10px;
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

.btn-5 {
  background: linear-gradient(182deg,
      rgb(217, 212, 187) 0%,
      rgb(188, 182, 161) 49%,
      rgb(142, 136, 113) 51%,
      rgb(167, 159, 131) 100%);
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
