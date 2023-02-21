<template>
  <div class="slot-machine">
    <div class="rows">
      <div class="row" v-for="(row, index) in rows" :key="index">
        <div class="symbol" v-for="(symbol, index) in row" :key="index">
          {{ symbol }}
        </div>
      </div>
    </div>
    <button class="spin-button" @click="spin">Snurra</button>
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
    };
  },
  methods: {
    spin() {
      this.shuffle(this.symbols);
      this.rows.forEach((row) => {
        row.length = 0;
        row.push(this.symbols[Math.floor(Math.random() * this.symbols.length)]);
        row.push(this.symbols[Math.floor(Math.random() * this.symbols.length)]);
        row.push(this.symbols[Math.floor(Math.random() * this.symbols.length)]);
      });
      if (this.checkWin()) {
        this.gameResult = "Du vann!";
      } else {
        this.gameResult = "Du förlorade";
      }
    },
    shuffle(array) {
      let currentIndex = array.length;
      let temporaryValue, randomIndex;
      while (currentIndex !== 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
      }
      return array;
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

.spin-button {
  margin-top: 2rem;
  padding: 1rem 2rem;
  font-size: 1.5rem;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.result {
  margin-top: 2rem;
  font-size: 3rem;
  font-weight: bold;
  text-align: center;
}
</style>
