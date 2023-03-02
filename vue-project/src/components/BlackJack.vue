<template>
  <div class="BlackuJacku">
    <div v-if="!isGameStarted">
      <button @click="startGame">Start Game</button>
    </div>
    <div v-if="isGameStarted">
      <div>
        <p>Player Hand</p>
        <div>
          <div v-for="card in playerCards" :key="card.code" class="card">
            <img :src="card.image" :alt="card.code" />
          </div>
        </div>
        <p>Dealer Hand</p>
        <div>
          <div
            v-for="(card, index) in dealerCards"
            :key="card.code"
            class="card"
            :class="{ hidden: index === 0 && !isGameOver }"
          >
            <!-- Försöka göra ett dealerns första dolda kort är en baksida av ett kort men API:t verkar inte hitta det längre -->
            <img
              :src="
                index === 0 && !isGameOver
                  ? 'https://deckofcardsapi.com/static/img/card-back.png'
                  : card.image
              "
              :alt="card.code"
            />
          </div>
        </div>
        <p v-if="isGameOver">{{ gameResult }}</p>
      </div>
      <button @click="hit" :disabled="isGameOver">Hit</button>
      <button @click="stand" :disabled="isGameOver">Stand</button>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      deckId: "",
      playerHand: [],
      dealerHand: [],
      playerCards: [],
      dealerCards: [],
      isGameStarted: false,
      isGameOver: false,
      gameResult: "",
    };
  },
  methods: {
    async startGame() {
      const response = await axios.get(
        "https://deckofcardsapi.com/api/deck/new/shuffle/?deck_count=1"
      );
      this.deckId = response.data.deck_id;
      const playerDrawResponse = await axios.get(
        `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=2`
      );
      this.playerHand = playerDrawResponse.data.cards.map((card) => card.value);
      this.playerCards = playerDrawResponse.data.cards;
      const dealerDrawResponse = await axios.get(
        `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=2`
      );
      this.dealerHand = dealerDrawResponse.data.cards.map((card) => card.value);
      this.dealerCards = dealerDrawResponse.data.cards;
      this.isGameStarted = true;
    },
    async hit() {
      const response = await axios.get(
        `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=1`
      );
      const newCard = response.data.cards[0];
      this.playerHand.push(newCard.value);
      this.playerCards.push(newCard);
      if (this.getHandValue(this.playerHand) > 21) {
        this.isGameOver = true;
        this.gameResult = "You bust! Dealer wins.";
      }
    },
    async stand() {
      this.isGameOver = true;
      while (this.getHandValue(this.dealerHand) < 17) {
        const response = await axios.get(
          `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=1`
        );
        const newCard = response.data.cards[0];
        this.dealerHand.push(newCard.value);
        this.dealerCards.push(newCard);
      }
      const playerValue = this.getHandValue(this.playerHand);
      const dealerValue = this.getHandValue(this.dealerHand);
      if (dealerValue > 21) {
        this.gameResult = "Dealer busts! You win. Now get out of here";
      } else if (dealerValue > playerValue) {
        this.gameResult = "Dealer wins.";
      } else if (dealerValue < playerValue) {
        this.gameResult = "You win. Get out of my casino.";
      } else {
        this.gameResult = "It's a tie! What are the odds??";
      }
    },
    getHandValue(hand) {
      let value = 0;
      let numAces = 0;
      for (const card of hand) {
        if (card === "ACE") {
          numAces++;
          value += 11;
        } else if (card === "KING" || card === "QUEEN" || card === "JACK") {
          value += 10;
        } else {
          value += parseInt(card);
        }
      }
      // Justera Essets value
      while (numAces > 0 && value > 21) {
        value -= 10;
        numAces--;
      }
      return value;
    },
  },
};
</script>

<style>
.BlackuJacku {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.blackjack {
  text-align: center;
}
.card {
  display: inline-block;
  margin-right: 10px;
}

.hidden img {
  visibility: hidden;
}
</style>
