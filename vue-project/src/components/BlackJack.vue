<template>
  <div class="bg-blackjack">
    <div class="BlackuJacku">
      <div v-if="!isGameStarted">
        <button @click="startGame" class="red_start">Start Game</button>
      </div>
      <div v-if="isGameStarted">
        <div>
          <div>
            <div v-for="card in dealerCards" :key="card.code" class="card">
              <img :src="card.image" :alt="card.code" />
            </div>
          </div>
          <p>Dealer Hand - Value: {{ this.getHandValue(dealerHand) }}</p>
          <hr class="solid" />
          <h5 v-if="isGameOver">{{ gameResult }}</h5>

          <hr class="solid" />
          <p>Player Hand - Value: {{ this.getHandValue(playerHand) }}</p>
          <div>
            <div v-for="card in playerCards" :key="card.code" class="card">
              <img :src="card.image" :alt="card.code" />
            </div>
          </div>
        </div>
        <button
          v-if="!isGameOver"
          @click="hit"
          :disabled="isGameOver"
          class="red_hit"
        >
          Hit
        </button>
        <button
          v-if="!isGameOver"
          @click="stand"
          :disabled="isGameOver"
          class="red_stand"
        >
          Stand
        </button>
        <button v-if="isGameOver" @click="startGame" class="red">
          Play again
        </button>
      </div>
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
      hasBlackjack: false,
    };
  },
  methods: {
    async startGame() {
      // Vid start av spelet, rensa alla värden för att kunna "starta om"
      this.wipeGame();

      // Använder 6 kortlekar
      const response = await axios.get(
        "https://deckofcardsapi.com/api/deck/new/shuffle/?deck_count=6"
      );
      this.deckId = response.data.deck_id;

      // Drar två kort till spelare
      const playerDrawResponse = await axios.get(
        `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=2`
      );
      this.playerHand = playerDrawResponse.data.cards.map((card) => card.value);
      this.playerCards = playerDrawResponse.data.cards;

      // Drar ett kort till dealer
      const dealerDrawResponse = await axios.get(
        `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=1`
      );
      this.dealerHand = dealerDrawResponse.data.cards.map((card) => card.value);
      this.dealerCards = dealerDrawResponse.data.cards;

      // Om spelaren har fått blackjack direkt så ska spelaren inte kunna fortsätta dra kort
      if (this.getHandValue(this.playerHand) === 21) {
        this.hasBlackjack = true;
        return await this.stand();
      }

      this.isGameStarted = true;
    },

    // Rensa spelets alla värden
    wipeGame() {
      this.playerHand = [];
      this.dealerHand = [];
      this.playerCards = [];
      this.dealerCards = [];
      this.isGameOver = false;
      this.gameResult = "";
      this.hasBlackjack = false;
    },

    async hit() {
      const response = await axios.get(
        `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=1`
      );
      const newCard = response.data.cards[0];
      // Om det nya kortet är ett ess och spelarens hand är över 10 så ska värdet vara 1 för att inte busta
      if (newCard.value === "ACE" && this.getHandValue(this.playerHand) > 10) {
        newCard.value = 1;
      }
      this.playerHand.push(newCard.value);
      this.playerCards.push(newCard);

      if (this.getHandValue(this.playerHand) > 21) {
        this.isGameOver = true;
        this.gameResult = "You bust! Dealer wins.";
      }
      // Om spelaren får blackjack ska spelaren ej kunna fortsätta dra kort
      if (this.getHandValue(this.playerHand) === 21) {
        await this.stand();
      }
    },
    async stand() {
      this.isGameOver = true;

      // Om spelaren har fått blackjack och dealern har 10 eller 11 så ska dealern få dra ett kort sen avsluta
      if (
        this.hasBlackjack &&
        (this.getHandValue(this.dealerHand) === 10 ||
          this.getHandValue(this.dealerHand) === 11)
      ) {
        const response = await axios.get(
          `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=1`
        );
        const newCard = response.data.cards[0];
        this.dealerHand.push(newCard.value);
        this.dealerCards.push(newCard);

        // Annars om dealern inte har 10 eller 11 och spelaren har blackjack så ska spelaren vinna
      } else if (this.hasBlackjack) {
        this.gameResult = "BLACK JACK!! You win. Get out of my casino.";
        return;
      }

      // Annars får dealern dra kort tills värdet är över eller lika med 17
      // Delay på 1 sekund mellan varje drag
      let interval = setInterval(async () => {
        if (this.getHandValue(this.dealerHand) >= 17) {
          clearInterval(interval);
          const playerValue = this.getHandValue(this.playerHand);
          const dealerValue = this.getHandValue(this.dealerHand);
          if (dealerValue > 21) {
            this.gameResult = "Dealer busts! You win. Now get out of here!";
          } else if (dealerValue > playerValue) {
            this.gameResult = "Dealer wins! Better luck next time!";
          } else if (dealerValue < playerValue) {
            this.gameResult = "You win! Get out of my casino!";
          } else {
            this.gameResult = "Stand off! It's a tie, what are the odds??";
          }
        } else {
          const response = await axios.get(
            `https://deckofcardsapi.com/api/deck/${this.deckId}/draw/?count=1`
          );
          const newCard = response.data.cards[0];
          this.dealerHand.push(newCard.value);
          this.dealerCards.push(newCard);
        }
      }, 1000); // 1 sekund
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

<style scoped>
.bg-blackjack {
  background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.2) 0%,
      rgba(0, 0, 0, 0.4) 100%
    ),
    url("../assets/img/AdobeStock_420867335.jpeg") no-repeat center fixed;
  background-size: cover;
  height: 110vh;
}

.BlackuJacku {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin-bottom: 0vh;
  margin-top: 60px;
  color: #fff;
  font-family: "Times New Roman", Times, serif;
}

.blackjack {
  text-align: center;
}

.card {
  display: inline-block;
  margin-right: 10px;
  margin-bottom: 10px;
  width: 110px;
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
  font-size: 16px;
}

hr.solid {
  border-top: 7px solid #ffffff;
}

button,
input {
  font-size: 0.7rem;
  font-weight: 300;
  margin-bottom: 0px;
  letter-spacing: 2px;
  text-transform: uppercase;
  outline: 0;
  border: 2px solid #9c9c9c;
  border-radius: 10px;
  padding: 10px;
  background-color: rgba(242, 127, 21, 0.6);
}

.red {
  display: inline-block;
  width: 110px;
  margin-right: 10px;
  color: #ffffff;
}

.red_hit {
  display: inline-block;
  width: 110px;
  margin-right: 10px;
  color: #ffffff;
  font-size: 0.7rem;
  font-weight: 300;
  margin-bottom: 0px;
  letter-spacing: 2px;
  text-transform: uppercase;
  outline: 0;
  border: 2px solid #9c9c9c;
  border-radius: 10px;
  padding: 10px;
  background-color: rgba(0, 20, 196, 0.6);
}
.red_stand {
  display: inline-block;
  width: 110px;
  margin-right: 10px;
  color: #ffffff;
  font-size: 0.7rem;
  font-weight: 300;
  margin-bottom: 0px;
  letter-spacing: 2px;
  text-transform: uppercase;
  outline: 0;
  border: 2px solid #9c9c9c;
  border-radius: 10px;
  padding: 10px;
  background-color: rgba(255, 0, 0, 0.6);
}
.red_start {
  display: inline-block;
  width: 150px;
  margin-right: 10px;
  color: #ffffff;
}
</style>
