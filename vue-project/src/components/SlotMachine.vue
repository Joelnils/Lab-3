<template>
  <div class="slot-machine">
    <div class="SpinS"></div>
    <div class="grid-container" :class="moveClass">
      <div class="row" v-for="(row, index) in rows" :key="index">
        <div class="symbol" v-for="(symbol, index) in row" :key="index">
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

        <div class="bet">
          <button class="bet-buttons" @click="decreaseBet">-</button>
          <button class="bet-buttons" @click="increaseBet">+</button>
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
      moveClass: "",
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
      goldBet: 5,
      totalGold: 0,
      win: 5000,
    };
  },
  methods: {
    decreaseBet() {
      this.goldBet = Math.max(this.goldBet - 5, 0);
    },
    increaseBet() {
      this.goldBet = this.goldBet + 5;
    },
    spin() {
      if (this.spinning) return;
      this.spinning = true;
      this.gameResult = "";
      this.moveClass = "move";

      const minMomentum = 50;
      const maxMomentum = 100;
      const momentum =
        Math.floor(Math.random() * (maxMomentum - minMomentum + 1)) +
        minMomentum;

      this.animate(momentum, () => {
        this.moveClass = "";
        this.updateTileIndexes();
        this.spinning = false;
        if (this.checkWin()) {
          this.totalGold += this.goldBet;
          this.gameResult = `Congratulations! You won $${
            this.win
          }! (Note: the company takes 50%, so you actually won $${
            this.win / 2
          })`;
        } else {
          this.totalGold -= this.goldBet;
          this.gameResult =
            "You lost your entire life savings. Better luck next time!";
        }
      });
    },
    updateTileIndexes() {
      const updateSymbol = (symbol, rowIndex, symbolIndex) => {
        let newIndex = symbolIndex - 1;
        if (newIndex < 0) {
          newIndex = this.rows[rowIndex].length - 1;
        }
        this.rows[rowIndex][newIndex] = symbol;
      };

      const animationDuration = 3000; // Change this value to adjust the animation speed
      const startTime = Date.now();
      const update = () => {
        const elapsedTime = Date.now() - startTime;
        const t = Math.min(1, elapsedTime / animationDuration);

        this.rows.forEach((row, rowIndex) => {
          row.forEach((symbol) => {
            if (t === 1) {
              updateSymbol(symbol, rowIndex);
            }
          });
        });

        if (t < 1) {
          requestAnimationFrame(update);
        }
      };

      requestAnimationFrame(update);
    },

    checkWin() {
      // Titta efter tre i rad
      for (let i = 0; i < this.rows.length; i++) {
        let row = this.rows[i];
        if (row[0] === row[1] && row[1] === row[2]) {
          return true;
        }
      }
      // Leta efter matchningar från högst upp till vänster till längst ner till höger
      if (
        this.rows[0][0] === this.rows[1][1] &&
        this.rows[1][1] === this.rows[2][2]
      ) {
        return true;
      }
      // Leta efter matchningar från längst ner till vänster till högst upp till höger
      if (
        this.rows[2][0] === this.rows[1][1] &&
        this.rows[1][1] === this.rows[0][2]
      ) {
        return true;
      }
      return false;
    },

    animate(momentum, callback) {
      // Ta bort tidigare timeouts
      this.spinTimeouts.forEach((timeout) => clearTimeout(timeout));
      this.spinTimeouts = [];

      // Räkna ut hur länge och långt varje symbol ska röra sig
      const duration = 2000 / momentum;
      const distances = [];
      for (let i = 0; i < this.rows.length; i++) {
        let row = this.rows[i];
        let rowDistances = [];
        for (let j = 0; j < row.length; j++) {
          rowDistances.push(j * (40 / row.length));
        }
        distances.push(rowDistances);
      }

      // Animation på varje symbol
      for (let i = 0; i < this.rows.length; i++) {
        let row = this.rows[i];
        for (let j = 0; j < row.length; j++) {
          const tile = row[j];
          const distance = distances[i][j];
          const index = this.symbols.indexOf(tile);
          const newTileIndex = (index + 1) % this.symbols.length;
          const newTile = this.symbols[newTileIndex];
          this.spinTimeouts.push(
            setTimeout(() => {
              this.rows[i][j] = newTile;
              if (i === this.rows.length - 1 && j === row.length - 1) {
                callback();
              }
            }, distance * duration)
          );
        }
      }
    },
  },
};
</script>

<style scoped>
.slot-machine {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-left: 30px;
  margin-top: 30px;
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
  transition: transform 0.5s ease-out;
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(3, 1fr);
  gap: 0.5rem;
  margin-top: -15px;
  -moz-box-shadow: 0 0 20px black;
  -webkit-box-shadow: 0 0 20px black;
  padding: 20px;
  background: white;
  border: 1px solid #ccc;
  height: 210px;
  position: relative;
  width: 400px;
  margin-top: 420px;
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
  margin-right: 500px;
}

.spin-button:hover {
  background: rgba(152, 80, 13, 0.6);
}
.bet-buttons {
  padding: 15px;
  background: rgba(242, 127, 21, 0.6);
  color: rgb(0, 0, 0);
  border: none;
  font-weight: solid;
  border-radius: 5px;
  cursor: pointer;
  font-size: 10px;
}

.spinAndResult {
  position: absolute;
  left: 500px;
}

.result {
  color: white;
}

p {
  color: white;
}
</style>
