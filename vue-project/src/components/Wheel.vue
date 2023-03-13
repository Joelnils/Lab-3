<script setup>
import { ref } from "vue";
const easeOutSpin = ref(null);
let disabled = ref(false);
let marker = ref();
let spin = ref(null);

let winner = ref("");
const zoneSize = 45;
const symbolSegments = {
  1: "Bag of Money",
  2: "Black Cat",
  3: "Confused Cow",
  4: "Avancera Owl",
  5: "Greedy Croc",
  6: "Lambi",
  7: "Black Jack",
  8: "Linux Pingu",
};

function spinWheel() {
  //denna funktion startar igång rotationen på hjulet
  disabled.value = true; // här disablar vi knappen efter att hjulet börjat snurra
  let degree = 0; // vi sätter gradantalet till 0
  degree = Math.floor(5000 + Math.random() * 5000); //ger oss ett nytt random gradantal som används för att säga hur många grader den ska snurra(tal mellan 5k-10k)
  easeOutSpin.value = "all 5s ease-out"; //snurra dessa grader under 5sekunder och en ease-out

  spin.value = `rotate(${degree}deg)`; //här tar vi emot det nya gradvärdet och roterar bilden(hjulet)
  const actualDeg = degree % 360; //ny variabel som tar emot gradvärdet och delar det på 360(en cirkel) vilket ger oss vårat faktiska värde i bilden/cirkeln
  setTimeout(function () {
    // en liten timeout funktion 5000ms(under tiden den snurrar)
    disabled.value = false; //vi gör knappen klickbar igen

    easeOutSpin.value = "all 0s"; //sätter transition till 0 så att användaren inte ser vad som händer nedan
    spin.value = `rotate(${actualDeg}deg)`; //här tar vi det faktiska värdet som vi landat på(av en cirkel) och roterar den utan någon animation, så vi har ett värde mellan 0-360 istället för 5k-10k
    handle(actualDeg); //här ropar vi på nedanstående funktion som tar hand om vinsten
  }, 5000);
}
function handle(actualDeg) {
  const winSymNr = Math.ceil(actualDeg / zoneSize); //vi delar actualDegree värdet på zonesice och avrundar för att få fram det gradantal(och vilket segment) vi landat på
  winner = symbolSegments[winSymNr]; // här kollar vi på viket av segmenten som vunnit och spara det i variabeln winner, det vinnande segmentets namn.
  // console.log(symbolSegments[winSymNr])
  console.log(actualDeg);
  console.log(winner);
}
</script>

<template>
  <div class="main-container">
    <div id="game">
      <div class="marker-container">
        <img class="marker" :marker="marker" src="../assets/img/marker.png" />
      </div>
      <div class="wheel-container">
        <img
          class="wheel"
          :style="{ transition: easeOutSpin, transform: spin }"
          src="../assets/img/wheel.png"
        />
      </div>
      <div class="btn-container">
        <button
          class="btn-pink btn btn-primary"
          @click="spinWheel()"
          :disabled="disabled"
        >
          SPIN
        </button>
      </div>
    </div>

    <div class="print-win">
      <div class="no-winner" v-if="!winner">
        <h3>Let's see what Lady Fortune has in store for you..</h3>
      </div>
      <div class="avancera" v-else-if="winner === 'Avancera Owl'">
        <h2>Ohh my, look at that. It's the {{ winner }}</h2>
        <h4>
          This is the grand price! Printscreen this {{ winner }} and save it.
          Beacuse next time you're stuck on Avancera, send the screenshot of this owl to
          Johan Rutberg and he will give you the answer!
        </h4>
      </div>
      <div class="avancera" v-else-if="winner === 'Bag of Money'">
        <h2>Heey look, it's a {{ winner }}!</h2>
        <h4>
          And this might look like a winner but unfortunately the bag is empty.
          Better luck next time!
        </h4>
      </div>
      <div class="avancera" v-else-if="winner === 'Black Cat'">
        <h2>The {{ winner }} emerges from the shadows!</h2>
        <h4>
          The {{ winner }} is now giving you the chanse of a lifetime, you have
          won a dinner with team 8, you're buying!
        </h4>
      </div>
      <div class="avancera" v-else-if="winner === 'Confused Cow'">
        <h2>And the winner is...! Not you.</h2>
        <h4>
          The {{ winner }} has nothing to offer you, better luck next time!
        </h4>
      </div>
      <div class="avancera" v-else-if="winner === 'Greedy Croc'">
        <h2>
          {{ winner }} pops out of the water to share his spoils with you!
          <h4>
            But since it's a {{ winner }}, it wont share, better luck next time!
          </h4>
        </h2>
      </div>
      <div class="avancera" v-else-if="winner === 'Lambi'">
        <h2>A wild {{ winner }} appears and decides to give you a price!</h2>
        <h4>
          Go to the restroom and take as much toilettpaper as you want.
          Congrats!
        </h4>
      </div>

      <div class="avancera" v-else-if="winner === 'Black Jack'">
        <h2>Wow {{ winner }}Winner winner!</h2>
        <h4>
          That is if you go play BlackJack and win over there, otherwise..
          Better luck next time!
        </h4>
      </div>
      <div class="avancera" v-else-if="winner === 'Linux Pingu'">
        <h2>Yeah, you just got the {{ winner }}</h2>
        <h4>
          And as we all know, nobody likes the {{ winner }} so you get nothing,
          better luck next time!
        </h4>
      </div>
    </div>
  </div>
</template>

<style scoped>
* {
  color: white;
}
.main-container {
  display: flex;
  justify-content: space-around;
  align-items: center;
  flex-wrap: wrap;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.2) 0%,
      rgba(0, 0, 0, 0.6) 100%
    ),
    url("../assets/img/bg/AdobeStock_289787097.jpeg") no-repeat center scroll;
  background-size: cover;
}
.marker-container {
  display: flex;
  justify-content: center;
}
.wheel-container {
  display: flex;
  justify-content: center;
}
.btn-container {
  display: flex;
  justify-content: center;
}

.marker {
  width: 50px;
}
.wheel {
  max-width: 400px;
  width: 100%;
  height: auto;
  object-fit: cover;
}
.button {
  z-index: 99;
  position: relative;
}
h2,
h3,
h4 {
  margin-left: 30px;
}
.print-win {
  max-width: 500px;
 
}
.btn {
  transition: all 5s;
}
.btn:hover {
  color: #fff;
  transform: rotate(7200deg);
}
.btn-pink {
  background: #ec008c;
  background: -webkit-linear-gradient(to right, #fc6767, #ec008c);
  background: linear-gradient(to right, #fc6767, #ec008c);
  color: #fff;
  border: 3px solid #eee;
  scale: 150%;
}

@media screen and (max-width: 1200px) {   
    .main-container{
      margin-top: 100px;
      gap: 100px;
    }
    .wheel{
      scale: 0.7;
    }
  }
  @media screen and (max-width: 1000px) {   
    .main-container{
      margin-top: 200px;
      gap: 100px;
    }
  
  }
  
  </style>
