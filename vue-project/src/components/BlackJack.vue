<template>
  <div>
    <h2>Blackjack</h2>
    <p>Dealer's cards: {{ dealerCards }}</p>
    <p>Your cards: {{ playerCards }}</p>
    <p v-if="gameOver">{{ outcome }}</p>
    <button v-if="!gameOver" @click="hit">Hit</button>
    <button v-if="!gameOver" @click="stand">Stand</button>
    <button v-if="gameOver" @click="reset">New Game</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      deck: [],
      dealerCards: [],
      playerCards: [],
      gameOver: false,
      outcome: "",
    };
  },
  created() {
    this.reset();
  },
  methods: {
    reset() {
      this.deck = this.generateDeck();
      this.dealerCards = [this.drawCard(), this.drawCard()];
      this.playerCards = [this.drawCard(), this.drawCard()];
      this.gameOver = false;
      this.outcome = "";
    },
    generateDeck() {
      const ranks = [
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "10",
        "J",
        "Q",
        "K",
        "A",
      ];
      const suits = ["♠", "♥", "♦", "♣"];
      const deck = [];
      for (let rank of ranks) {
        for (let suit of suits) {
          deck.push({ rank, suit });
        }
      }
      return deck;
    },
    drawCard() {
      const cardIndex = Math.floor(Math.random() * this.deck.length);
      const card = this.deck.splice(cardIndex, 1)[0];
      return card;
    },
    getCardValue(card) {
      const rank = card.rank;
      if (["J", "Q", "K"].includes(rank)) {
        return 10;
      } else if (rank === "A") {
        return 11;
      } else {
        return parseInt(rank);
      }
    },
    getHandValue(hand) {
      let value = 0;
      let numAces = 0;
      for (let card of hand) {
        const cardValue = this.getCardValue(card);
        if (cardValue === 11) {
          numAces++;
        }
        value += cardValue;
      }
      while (value > 21 && numAces > 0) {
        value -= 10;
        numAces--;
      }
      return value;
    },
    hit() {
      this.playerCards.push(this.drawCard());
      const playerValue = this.getHandValue(this.playerCards);
      if (playerValue > 21) {
        this.outcome = "Du torska som fan";
        this.gameOver = true;
      }
    },
    stand() {
      let dealerValue = this.getHandValue(this.dealerCards);
      while (dealerValue < 17) {
        this.dealerCards.push(this.drawCard());
        dealerValue = this.getHandValue(this.dealerCards);
      }
      const playerValue = this.getHandValue(this.playerCards);
      if (dealerValue > 21) {
        this.outcome = "Du vann";
      } else if (dealerValue > playerValue) {
        this.outcome = "Huset vann";
      } else if (dealerValue < playerValue) {
        this.outcome;
        this.outcome = "Du vann";
      } else {
        this.outcome = "Lika";
      }
      this.gameOver = true;
    },
  },
};
</script>

<style>
h2 {
  font-size: 1.5em;
  margin-bottom: 0.5em;
}
button {
  margin-right: 0.5em;
}
</style>
