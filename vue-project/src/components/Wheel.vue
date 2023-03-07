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
  disabled.value = true;
  let degree = 0;
  degree = Math.floor(5000 + Math.random() * 5000);
  easeOutSpin.value = "all 5s ease-out";

  spin.value = `rotate(${degree}deg)`;
  const actualDeg = degree % 360;
  setTimeout(function () {
    disabled.value = false;

    easeOutSpin.value = "all 0s";
    spin.value = `rotate(${actualDeg}deg)`;
    handle(actualDeg);
  }, 5000);
}
function handle(actualDeg) {
  const winSymNr = Math.ceil(actualDeg / zoneSize);
  winner = symbolSegments[winSymNr];
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
    
    <div class="no-winner" v-if="!winner"><h3>Let's see what Lady Fortune has in store for you..</h3></div>
    <div class="avancera" v-else-if="winner === 'Avancera Owl'"><h2>Ohh my, look at that. It's the {{ winner }}</h2><h4>This is the grand price! Printscreen this {{ winner }} and save it, beacuse next time you're stuck on Avancera, send the screenshot to Johan Rutberg and he will give you the answer!</h4></div>
    <div class="avancera" v-else-if="winner === 'Bag of Money'"><h2>Heey look, it's a {{ winner }}!</h2><h4>And this might look like a winner but unfortunately the bag is empty. Better luck next time!</h4></div>
    <div class="avancera" v-else-if="winner === 'Black Cat'"><h2>The {{ winner }} emerges from the shadows!</h2><h4>The {{ winner }} is now giving you the chanse of a lifetime, you have won a dinner with team 8, you're buying!</h4></div>
    <div class="avancera" v-else-if="winner === 'Confused Cow'"><h2>And the winner is...! Not you.</h2><h4>The {{ winner }} has nothing to offer you, better luck next time!</h4></div>
    <div class="avancera" v-else-if="winner === 'Greedy Croc'"><h2>{{ winner }} pops out of the water to share his spoils with you! <h4>But since it's a {{ winner }}, it wont share, better luck next time!</h4></h2></div>
    <div class="avancera" v-else-if="winner === 'Lambi'"><h2>A wild {{ winner }} appears and decides to give you a price!</h2><h4>Go to the restroom and take as much toilettpaper as you want. Congrats!</h4></div>
    <div class="avancera" v-else-if="winner === 'Black Jack'"><h2>Wow {{ winner }} winner!</h2><h4>That is if you go play BlackJack and win over there, otherwise.. Better luck next time!</h4></div>
    <div class="avancera" v-else-if="winner === 'Linux Pingu'"><h2>Yeah, you just got the {{ winner }}</h2><h4>And as we all know, nobody likes the {{ winner }}, so you get nothing. Better luck next time!</h4></div>
  
    
    </div>
  
  </div>

</template>

<style scoped>
*{
    color: white;
}
.main-container{
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;

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
.wheel {
  max-width: 700px;
  width: 100%;
  height: auto;
  object-fit: cover;
}
.button {
  z-index: 99;
  position: relative;
}
.print-win{
    
    max-width: 500px;
}
.btn{
    transition: all 5s
}
.btn:hover{
    color: #fff;
    transform: rotate(7200deg);
}
.btn-pink {
    background: #ec008c;  
    background: -webkit-linear-gradient(to right, #fc6767, #ec008c);  
    background: linear-gradient(to right, #fc6767, #ec008c); 
    color: #fff;
    border: 3px solid #eee;
    scale: 200%;
}

</style>
