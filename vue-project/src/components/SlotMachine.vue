<template>
  <div class="slot-machine">
    <div class="rows">
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
    <button class="spin-button" :disabled="spinning" @click="spin">Snurra</button>
    <div class="result">{{ gameResult }}</div>
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
    };
  },
  methods: {
    spin() {
      this.spinning = true;
      this.spinClass = "spin";
      this.spinTimeouts = [];
      for (let i = 0; i < 3; i++) {
        this.spinTimeouts.push(
          setTimeout(() => {
            this.rows[i].length = 0;
            this.rows[i].push(
              this.symbols[Math.floor(Math.random() * this.symbols.length)]
            );
            this.rows[i].push(
              this.symbols[Math.floor(Math.random() * this.symbols.length)]
            );
            this.rows[i].push(
              this.symbols[Math.floor(Math.random() * this.symbols.length)]
            );
          }, i * 500)
        );
      }
      setTimeout(() => {
        clearTimeouts(this.spinTimeouts);
        this.spinning = false;
        if (this.checkWin()) {
          this.gameResult = "Du vann 10kr! (Företaget tar 50% så du vann egentligen 5kr)";
        } else {
          this.gameResult = "Du förlorade hela din livsbesparning";
        }
      }, 2000);
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
      return false;
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
  height: 100vh;
}

.rows {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.row {
  display: flex;
  justify-content: center;
  align-items: center;
}

.symbol {
  display: inline-block;
  font-size: 5rem;
  margin: 1rem;
}

.spin {
  animation-name: spin;
  animation-duration: 1.5s;
  animation-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
  animation-fill-mode: forwards;
}

@keyframes spin {
  from {
    transform: translateY(-50%) rotateX(0deg);
  }
  to {
    transform: translateY(-50%) rotateX(720deg);
  }
}
</style>
