<script setup>
import {ref} from 'vue'
const easeOutSpin = ref(null)
let disabled = ref(false)
let marker = ref()
let spin = ref(null)

let winner = ref('')
const zoneSize = 45
const symbolSegments = {
    1: "Bag of Money",
    2: "Black Cat",
    3: "Confused Cow",
    4: "Avancera Owl",
    5: "Greedy Croc",
    6: "Lambi",
    7: "Black Jack",
    8: "Linux Pingu",
  }

    function spinWheel(){
        disabled.value =true
        let degree = 0
        degree = Math.floor(5000 + Math.random()*5000)
        easeOutSpin.value = 'all 5s ease-out'
        
        spin.value= `rotate(${degree}deg)`
        const actualDeg = degree % 360
        setTimeout(function(){
            disabled.value =false
            
            easeOutSpin.value = 'all 0s'
            spin.value =`rotate(${actualDeg}deg)`
        handle(actualDeg)
        },5000)
    }
   function handle(actualDeg){
    const winSymNr= Math.ceil(actualDeg / zoneSize)
    winner = symbolSegments[winSymNr]
    // console.log(symbolSegments[winSymNr])
    console.log(actualDeg)
    console.log(winner)
   }
    
</script>

<template>
    <div id="shit">
        <div class="marker-container"><img class="marker" :marker="marker" src="../assets/img/marker.png" />
    </div>
      <div class="wheel-container"><img class="wheel" :style="{transition:easeOutSpin, transform: spin}"  src="../assets/img/wheel.png" />
    </div>
      <div class="btn-container"><button class="button btn btn-primary"  @click="spinWheel()" :disabled="disabled"> SPIN</button></div>
      
    </div>
    <div class="winner" v-if="winner">{{ winner }}</div>
</template>

<style scoped>

.marker-container{
    display: flex;
    justify-content: center;
}
.wheel-container{
    display: flex;
    justify-content: center;
}
.btn-container{
    display: flex;
    justify-content: center;
}
.wheel{
   max-width: 700px;
   width: 100%;
    height: auto;
    object-fit: cover;
}
.button{
    z-index: 99;
    position: relative;
}
</style>