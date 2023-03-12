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
      symbolValues: {
        "🍒": 50,
        "🍇": 75,
        "🍓": 100,
        "🍉": 125,
        "🍊": 150,
        "🍋": 175,
        "🍍": 200,
        "🍎": 225,
        "🍏": 250,
      },
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
      }, 1000);
    },
    checkWin() {
      let winningSymbol = "";
      let totalWin = 0;

      // Kollar horizontal rader
      for (let i = 0; i < this.rows.length; i++) {
        let row = this.rows[i];
        if (row[0] === row[1] && row[1] === row[2]) {
          winningSymbol = row[0];
        }
      }

      // Kollar columerna vertikalt
      for (let i = 0; i < this.rows[0].length; i++) {
        let column = [this.rows[0][i], this.rows[1][i], this.rows[2][i]];
        if (column[0] === column[1] && column[1] === column[2]) {
          winningSymbol = column[0];
        }
      }

      // Kollar Diagonalt
      let diagonal1 = [this.rows[0][0], this.rows[1][1], this.rows[2][2]];
      if (diagonal1[0] === diagonal1[1] && diagonal1[1] === diagonal1[2]) {
        winningSymbol = diagonal1[0];
      }

      let diagonal2 = [this.rows[0][2], this.rows[1][1], this.rows[2][0]];
      if (diagonal2[0] === diagonal2[1] && diagonal2[1] === diagonal2[2]) {
        winningSymbol = diagonal2[0];
      }

      // Räkna ut vinsten beroende på symbolen du får tre av
      if (winningSymbol === "") {
        return false; // om ingen vinst
      } else {
        totalWin = this.symbolValues[winningSymbol] * this.goldBet;
        this.win = totalWin;
        return true;
      }
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
  width: 20rem;
}
.result {
  color: white;
}
p {
  color: white;
}
</style>
