<template>
  <div class="BlackuJacku">
    <div v-if="!isGameStarted">
      <button @click="startGame" class="red">Start Game</button>
    </div>
    <div v-if="isGameStarted">
      <div>
        <p>Dealer Hand - Value: {{ this.getHandValue(dealerHand) }}</p>

        <div>
          <div
            v-for="(card, index) in dealerCards"
            :key="card.code"
            class="card"
          >
            <!-- :class="{ hidden: index === 0 && !isGameOver }" -->
            <!-- Försöka göra ett dealerns första dolda kort är en baksida av ett kort men API:t verkar inte hitta det längre -->
            <img
              :src="
                index === 0 && !isGameOver
                  ? 'https://cdn.discordapp.com/attachments/1081528132953190433/1081528321101279232/blue_back.png'
                  : card.image
              "
              :alt="card.code"
            />
          </div>
        </div>
        <hr class="solid" />
        <p>Player Hand - Value: {{ this.getHandValue(playerHand) }}</p>
        <div>
          <div v-for="card in playerCards" :key="card.code" class="card">
            <img :src="card.image" :alt="card.code" />
          </div>
        </div>
        <p v-if="isGameOver">{{ gameResult }}</p>
      </div>
      <button @click="hit" :disabled="isGameOver" class="red">Hit</button>
      <button @click="stand" :disabled="isGameOver" class="red">Stand</button>
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
        `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=1`
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
body {
  background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.5) 0%,
      rgba(0, 0, 0, 0.8) 100%
    ),
    url("https://images.unsplash.com/photo-1596838132731-3301c3fd4317?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80")
      no-repeat center fixed;
  background-size: cover;
  height: 200vh;
}

.BlackuJacku {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 120vh;
  margin-top: 30vh;
  margin-bottom: 50vh;
  color: #fff;
  font-family: "Times New Roman", Times, serif;
}

.blackjack {
  text-align: center;
}
.card {
  display: inline-block;
  margin-right: 10px;
  width: 180px;
  height: 290px;
  background: none;
  border: none;
}

.card img {
  width: inherit;
  height: inherit;
  object-fit: contain;
}

.hidden img {
  visibility: hidden;
}

p {
  color: #fff;
  font-family: "Times New Roman", Times, serif;
  font-size: 25px;
}

hr.solid {
  border-top: 5px solid #ffffff;
}

button,
input {
  color: #ffffff;
  font-size: 0.9rem;
  font-weight: 300;
  margin-bottom: 5px;
  letter-spacing: 2px;
  text-transform: uppercase;
  border: 0;
  outline: 0;
  border: 1px solid #9c9c9c;
  border-radius: 10px;
  padding: 10px;
  background-color: rgba(242, 127, 21, 0.6);
}

.red {
  display: inline-block;
  width: 180px;
  margin-right: 10px;
  color: #ffffff;
}
</style>
