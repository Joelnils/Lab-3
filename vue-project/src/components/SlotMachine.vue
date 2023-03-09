<template>
  <div class="slot-machine">
    <div class="SpinS"></div>
    <div class="grid-container">
      <div class="row" v-for="(row, index) in rows" :key="index">
        <div
          class="symbol"
          :class="spinClass"
          v-for="(symbol, index) in row"
          :key="index"
        >
          {{ symbol }}
        </div>
      </div>
      <div class="spinAndResult">
        <button class="spin-button" @click="spin" :disabled="spinning">
          Spin
        </button>
        <div class="result">{{ gameResult }}</div>
        <p style="color: white">Bet amount: ${{ goldBet }}</p>
        <p style="color: white">Total cash: ${{ totalGold }}</p>
        <!-- Tillagd kod -->

        <div class="bet-buttons">
          <button @click="decreaseBet">-</button>
          <button @click="increaseBet">+</button>
          <!-- Tillagd kod -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      symbols: ["🍒", "🍇", "🍓", "🍉", "🍊", "🍋", "🍍", "🍎", "🍏"],
      rows: [
        ["🍍", "🍓", "🍊"],
        ["🍉", "🍇", "🍒"],
        ["🍋", "🍎", "🍏"],
      ],
      gameResult: "",
      spinning: false,
      spinClass: "",
      spinTimeouts: [],
      goldBet: 5 /* Tillagd kod */,
      totalGold: this.$route.query.gold /* Tillagd kod */,
      win: 5000,
    };
  },
  methods: {
    decreaseBet() {
      this.goldBet = Math.max(
        this.goldBet - 5,
        0
      ); /* Gör att minsta belopp är 0 */
    },
    increaseBet() {
      this.goldBet = this.goldBet + 5;
    },
    /* Tillagd kod */
    spin() {
      this.spinning = true;
      this.spinClass = "spin";
      this.spinTimeouts = [];
      for (let i = 0; i < 3; i++) {
        let j = 0;
        this.spinTimeouts.push(
          setInterval(() => {
            this.rows[i][j] =
              this.symbols[Math.floor(Math.random() * this.symbols.length)];
            j++;
            if (j >= 3) {
              clearInterval(this.spinTimeouts[i]);
            }
          }, 100)
        );
      }
      setTimeout(() => {
        clearTimeouts(this.spinTimeouts);
        this.spinning = false;
        this.spinClass = "";
        if (this.checkWin()) {
          this.totalGold += this.goldBet;
          this.gameResult = `Du vann $${
            this.win
          }! (Företaget tar 50% så du vann egentligen $${this.win / 2})`;
        } else {
          this.totalGold -= this.goldBet;
          this.gameResult = "Du förlorade hela din livsbesparning";
        }
      }, 5000);
    },
    checkWin() {
      for (let i = 0; i < this.rows.length; i++) {
        if (
          this.rows[i][0] === this.rows[i][1] &&
          this.rows[i][1] === this.rows[i][2]
        ) {
          return true;
        }
      }
      for (let j = 0; j < this.rows[0].length; j++) {
        /* Denna kollar column också */
        if (
          this.rows[0][j] === this.rows[1][j] &&
          this.rows[1][j] === this.rows[2][j]
        ) {
          return true;
        }
      }
      return false;
    },
    changeBet(amount) {
      /* Denna kod är ny men fungerar, gör att total cash ändringen
          fungerar */
      const newBet = this.bet + amount;
      if (newBet < 5 || newBet > this.totalCash) {
        return;
      }
      this.bet = newBet;
    },
  },
};
function clearTimeouts(timeouts) {
  for (let i = 0; i < timeouts.length; i++) {
    clearTimeout(timeouts[i]);
  }
}
</script>

<style scoped>
.slot-machine {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-left: 30px;
  margin-top: 20rem;
  margin-bottom: 10rem;
}
.rows {
  display: flex;
  height: 100%; /* set the height of the rows to match the container */
}
.row {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  align-self: stretch; /* make the rows fill the height of the rows container */
}
.symbol {
  transform-origin: center;
  font-size: 40px;
  margin-left: 25px;
}
.spin {
  animation-name: spin;
  animation-duration: 1.5s;
  animation-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
  animation-fill-mode: forwards;
}
.grid-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(3, 1fr);
  gap: 0.5rem;
  margin-top: -15px;
  padding: 20px;
  background: white;
  border: 1px solid #ccc;
  height: 210px;
  position: relative;
  width: 400px;
}
.spin-button {
  padding: 15px;
  background: rgba(242, 127, 21, 0.6);
  color: rgb(0, 0, 0);
  border: none;
  font-weight: solid;
  border-radius: 5px;
  cursor: pointer;
  font-size: 20px;
}
.spin-button:hover {
  background: rgba(152, 80, 13, 0.6);
}
.spinAndResult {
  position: absolute;
  left: 500px;
}
.result {
  color: white;
}
.symbol.spin {
  animation-name: spin;
  animation-duration: 4s;
  animation-timing-function: cubic-bezier(0.25, 0.1, 0.5);
  animation-fill-mode: forwards;
  animation: somersault 4s infinite;
}
@keyframes somersault {
  0% {
    transform: rotateX(0deg);
  }
  50% {
    transform: rotateX(1320deg);
  }
  100% {
    transform: rotateX(0deg);
  }
}
p {
  color: white;
}
</style>
