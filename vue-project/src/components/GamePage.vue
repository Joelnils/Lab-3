<script>
export default {
  data() {
    return {
      headline: "Our Games",
    };
  },
};
</script>

<template>
  <div class="container_top">
    <div>
      <h1>{{ headline }}</h1>
    </div>
  </div>
  <div class="container_bottom">
    <ul class="cards">
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--1"></div>
          <div class="card__content">
            <div class="card__title">Slots</div>
            <p class="card__text">
              What Are Slot Machines and How Do They Work? A slot machine is a
              gambling game with spinning reels. Those reels have symbols on
              them, which land randomly after you place a bet and spin the
              reels. If these symbols line up, you win prizes based on which
              symbols fall on that “payline”.
            </p>
            <button
              @click="$router.push('/games/slot')"
              class="custom-btn btn-1"
              type="button"
            >
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
            <p class="card__text">
              The objective is always to beat the dealer, which means getting
              to—or as close as possible to—a total point score of 21. If your
              cards total higher than the dealer's cards without going over 21,
              you win. If your hand goes over 21, you "bust" and lose your bet.
              If the dealer busts, you win.
            </p>
            <button
              @click="$router.push('/games/blackjack')"
              class="custom-btn btn-1"
              type="button"
            >
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
            <p class="card__text">
              The object of American Roulette is to guess on which number on the
              wheel the ball will come to rest. Every number has the same chance
              as any other of coming up on each spin i.e. the winning number on
              any spin has no effect on the outcome of the next spin.
            </p>
            <button
              @click="$router.push('#')"
              class="custom-btn btn-1"
              type="button"
            >
              <i class="icon ion-md-lock"></i>Go To Game
            </button>
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--4"></div>
          <div class="card__content">
            <div class="card__title">Punto Banco (Baccarat)</div>
            <p class="card__text">
              Baccarat is a game where, instead of playing each other, players
              play against the bank (similar to blackjack). The aim is to obtain
              nine points or get as close to nine as possible. What's most fun
              about this setup is the sense of collaboration between players.
            </p>
            <button
              @click="$router.push('#')"
              class="custom-btn btn-1"
              type="button"
            >
              <i class="icon ion-md-lock"></i>Go To Game
            </button>
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--5"></div>
          <div class="card__content">
            <div class="card__title">Three Card Poker</div>
            <p class="card__text">
              Three Card Poker (TCP) is a three card poker game that utilizes a
              player-dealer position. As in other games featuring a
              player-dealer, the players play against another player who will
              collect all winnings and pay all losing wagers to the extent that
              their wagers covers.
            </p>
            <button
              @click="$router.push('#')"
              class="custom-btn btn-1"
              type="button"
            >
              <i class="icon ion-md-lock"></i>Go To Game
            </button>
          </div>
        </div>
      </li>
      <li class="cards__item">
        <div class="card">
          <div class="card__image card__image--6"></div>
          <div class="card__content">
            <div class="card__title">Lucky Wheel</div>
            <p class="card__text">
              In money wheel the viewer first spins the wheel. Players then
              place their bets on the symbols that they think will come out
              during the spin.
            </p>
            <button
              @click="$router.push('/games/wheel')"
              class="custom-btn btn-1"
              type="button"
            >
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

.container_bottom {
}
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
  background-image: url(../assets/img/img3.jpg);
}
.card__image--2 {
  background-image: url(../assets/img/img4.jpg);
}
.card__image--3 {
  background-image: url(../assets/img/img1.jpg);
}
.card__image--4 {
  background-image: url(../assets/img/img3.jpg);
}
.card__image--5 {
  background-image: url(../assets/img/img4.jpg);
}
.card__image--6 {
  background-image: url(../assets/img/img1.jpg);
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
  background: linear-gradient(
    182deg,
    #fea 0%,
    #dc8 49%,
    rgb(195, 174, 91) 51%,
    #dc8 100%
  );
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
