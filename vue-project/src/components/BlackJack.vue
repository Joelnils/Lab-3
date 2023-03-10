<template>
  <div class="bg-blackjack">
    <div class="game">
      <div class="BlackuJacku">
        <div v-if="!isGameStarted">
          <button @click="startGame" class="custom-btn-start btn-1">
            Start Game
          </button>
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
            class="custom-btn btn-1"
          >
            Hit
          </button>
          <button
            v-if="!isGameOver"
            @click="stand"
            :disabled="isGameOver"
            class="custom-btn btn-1"
          >
            Stand
          </button>
          <button v-if="isGameOver" @click="startGame" class="custom-btn btn-1">
            Play
          </button>
        </div>
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
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.2) 0%,
      rgba(0, 0, 0, 0.6) 100%
    ),
    url("../assets/img/bg/AdobeStock_289787097.jpeg") no-repeat center scroll;
  background-size: cover;
}
.game {
  margin-top: 20vh;
  margin-bottom: 10vh;
  width: 60%;
  border: 5px solid #a95;
  border-radius: 50px 50px 50px 50px;
  padding: 3rem 0;
  height: 88vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.2) 0%,
      rgba(0, 0, 0, 0.6) 100%
    ),
    url("../assets/img/games/BlackJack.jpeg") no-repeat center scroll;
  background-size: contain;
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
  width: 90px;
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

.custom-btn {
  width: 90px;
  height: 40px;
  padding: 10px 25px;
  margin-right: 10px;
  cursor: pointer;
  outline: none;
  border: transparent;
  color: #fff;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
  font-size: 1.2rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-transform: uppercase;
  outline: 0;
  border-radius: 10px;
  padding: 1px;
}
.custom-btn-start {
  width: 150px;
  height: 40px;
  padding: 10px 25px;
  margin-right: 10px;
  cursor: pointer;
  outline: none;
  border: transparent;
  color: #fff;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
  font-size: 1rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-transform: uppercase;
  outline: 0;
  border-radius: 10px;
  padding: 1px;
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
