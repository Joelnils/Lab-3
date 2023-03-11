<template>
  <div class="slot-machine">
    <div class="game">
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
      </div>
      <div class="buttons">
        <div class="decr-button">
          <button @click="decreaseBet" class="custom-btn-bet btn-1">-</button>
        </div>
        <div class="spin-button">
          <button @click="spin" :disabled="spinning" class="custom-btn btn-1">
            Spin
          </button>
        </div>
        <div class="incr-button">
          <button @click="increaseBet" class="custom-btn-bet btn-1">+</button>
        </div>
      </div>
    </div>
    <div class="bet-result">
      <p>Result: {{ gameResult }}</p>
    </div>
    <!-- Tillagd kod -->
    <div class="bet-cash">
      <p style="color: white">Bet amount: ${{ goldBet }}</p>
      <p style="color: white">Total cash: ${{ totalGold }}</p>
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
          this.gameResult = `You won $${
            this.win
          }! (The company takes 50% so you actually won $${this.win / 2})`;
        } else {
          this.totalGold -= this.goldBet;
          this.gameResult = "You lost your entire life savings!";
        }
      }, 1000);
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
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.3) 0%,
      rgba(0, 0, 0, 0.9) 100%
    ),
    url("../assets/img/bg/AdobeStock_300089803.jpeg") no-repeat center scroll;
  background-size: cover;
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
  font-size: 26px;
  margin-left: 10px;
}
.game {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 15vh;
  margin-bottom: 2vh;
  width: 480px;
  height: 500px;
  border: 2px solid #a95;
  border-radius: 50px 50px 50px 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.1) 0%,
      rgba(0, 0, 0, 0.1) 100%
    ),
    url("../assets/img/games/SlotMachine.jpeg") no-repeat center local;
  background-size: contain;
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(3, 1fr);
  margin-top: 106px;
  margin-left: 6px;
  padding: 0px;
  background-image: linear-gradient(
    to bottom,
    #222222,
    #404040,
    #757575,
    #aeaeae,
    #dfdfdf,
    #ededed,
    #ededed,
    #dfdfdf,
    #aeaeae,
    #757575,
    #404040,
    #222222
  );
  border: 2px solid #a95;
  height: 118px;
  position: relative;
  width: 165px;
}

.buttons {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}

.spin-button {
  margin-top: 65px;
  margin-left: 20px;
  margin-right: 1px;
}

.incr-button {
  margin-top: 70px;
  margin-left: 10px;
}

.decr-button {
  margin-top: 70px;
  margin-right: 5px;
}

.result {
  display: flex;
  flex-direction: row;
  width: 30rem;
}

.bet-result,
p {
  color: white;
  font-size: 0.8rem;
}
.bet-cash,
p {
  display: flex;
  flex-direction: column;
  position: static;
  width: 30rem;
  color: white;
  font-size: 0.8rem;
}
.custom-btn {
  width: 127px;
  height: 43px;
  margin-right: 9px;
  cursor: pointer;
  outline: none;
  border: transparent;
  border-radius: 13px;
  color: #fff;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
  text-transform: uppercase;
  font-size: 1.2rem;
  font-weight: 300;
  letter-spacing: 2px;
}

.custom-btn-bet {
  width: 30px;
  height: 30px;
  cursor: pointer;
  outline: none;
  border: transparent;
  border-radius: 10px;
  color: #fff;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
  text-transform: uppercase;
  font-size: 1rem;
  font-weight: 300;
  letter-spacing: 2px;
}

.custom-btn:active,
.custom-btn-start:active {
  transform: translate(2px);
  -webkit-transform: translate(2px);
}

/* 1 */
.btn-1 {
  background: linear-gradient(
    180deg,
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
