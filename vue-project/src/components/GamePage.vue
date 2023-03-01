<script>
export default {
  data() {
    return {
      headline: "Our Different Games",
    };
  },

  methods: {
    linkToOtherWindow(url) {
      window.open(url);
    },
  },
};
</script>

<template>
  <div class="container">
    <div>
      <h1>{{ headline }}</h1>
    </div>
  </div>
  <div class="card_bg">
    <div class="centered">
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
                @click="linkToOtherWindow('/games/slot')"
                class="red"
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
                cards total higher than the dealer's cards without going over
                21, you win. If your hand goes over 21, you "bust" and lose your
                bet. If the dealer busts, you win.
              </p>
              <button
                @click="linkToOtherWindow('/games/blackjack')"
                class="red"
                type="button"
              >
                <i class="icon ion-md-lock"></i>Go To Game
              </button>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>
<style scoped>
.container {
  position: sticky;
  display: flex;
  justify-content: center;
  margin-top: 15vh;
}
.container,
h1 {
  font-size: 70px;
  margin-top: 10vh;
}

#wrapper-hero img {
  margin: 0 auto;
  height: auto;
  overflow-x: hidden;
}

.centered {
  display: flex;
  justify-content: center;
  margin-top: 22vh;
  margin-bottom: 30vh;
}

img {
  height: auto;
  max-width: 100%;
  vertical-align: middle;
}
.cards {
  display: -webkit-box;
  display: -ms-flexbox;
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
    width: 40%;
  }
}

.card_bg {
  background-color: rgba(0, 0, 0, 0.68);
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.38);
  display: flex;
  overflow: hidden;
  margin-top: 20vh;
  margin-bottom: 30vh;
}
.card {
  background-color: #000000;
  border: 0px solid #000000;
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
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
  -webkit-filter: contrast(70%);
  filter: contrast(65%);
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
  background-image: url(https://cdn.pixabay.com/photo/2017/03/05/14/10/gamble-2118702_960_720.jpg);
}
.card__image--2 {
  background-image: url(https://cdn.pixabay.com/photo/2016/06/05/17/30/cards-1437776_960_720.jpg);
}
.card__image--3 {
  background-image: url(https://cdn.pixabay.com/photo/2015/07/10/11/11/luck-839037_960_720.jpg);
}
.card__image--4 {
  background-image: url(https://cdn.pixabay.com/photo/2013/07/23/23/23/cards-166440_960_720.jpg);
}
.card__image--5 {
  background-image: url(https://cdn.pixabay.com/photo/2019/05/04/16/55/gambling-4178466_960_720.jpg);
}
.card__image--6 {
  background-image: url(https://cdn.pixabay.com/photo/2015/09/09/18/11/slots-932268_960_720.jpg);
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
body,
html {
  background-color: #ebecf0;
}

body,
p,
input,
select,
textarea,
button {
  font-family: "Montserrat", sans-serif;
  letter-spacing: -0.2px;
  font-size: 16px;
}

div,
p {
  color: #ffffff;
}

form {
  padding: 16px;
  width: 520px;
  margin: 0 auto;
  margin-top: 200px;
}

.segment {
  padding: 32px 0;
  text-align: center;
}

button,
input {
  color: #ffffff;
  font-size: 0.9rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-transform: uppercase;
  border: 0;

  outline: 0;
  border: 1px solid #9c9c9c;
  border-radius: 10px;
  padding: 16px;
  background-color: rgba(242, 127, 21, 0.6);
}

label {
  display: block;
  margin-bottom: 24px;
  width: 100%;
}

input {
  margin-right: 8px;
  box-shadow: inset 2px 2px 5px #babecc, inset -5px -5px 10px #fff;
  width: 100%;
  box-sizing: border-box;
  transition: all 0.2s ease-in-out;
  appearance: none;
  -webkit-appearance: none;
}

input:focus {
  box-shadow: inset 1px 1px 2px #babecc, inset -1px -1px 2px #fff;
}

button {
  color: #61677c;
  font-weight: normal;
  /*box-shadow: -5px -5px 20px rgba(242, 127, 21, 0.6), 5px 5px 20px rgba(242, 127, 21, 0.6);*/
  transition: all 0.2s ease-in-out;
  cursor: pointer;
  font-weight: 400;
}
button:hover {
  /*box-shadow: -2px -2px 5px rgba(242, 127, 21, 0.6), 2px 2px 5px rgba(242, 127, 21, 0.6);*/
}
button:active {
  box-shadow: inset 1px 1px 2px #babecc, inset -1px -1px 2px #fff;
}
button .icon {
  margin-right: 8px;
}
button.unit {
  border-radius: 8px;
  line-height: 0;
  width: 48px;
  height: 48px;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 8px 8px 8px 8px;
  font-size: 19.2px;
}
button.unit .icon {
  margin-right: 0;
}
button.red {
  display: block;
  width: 100%;
  color: #ffffff;
}

.input-group {
  display: flex;
  align-items: center;
  justify-content: flex-start;
}
.input-group label {
  margin: 0;
  flex: 1;
}
</style>
