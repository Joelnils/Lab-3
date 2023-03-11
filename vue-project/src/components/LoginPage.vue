<template>
  <div class="login-container">
    <form class="login-form" @submit.prevent>
      <!-- Skippar refresh av sidan med
    submit.prevent -->

      <h1>Login</h1>

      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" v-model="username" />
      </div>
      <div v-if="showPassword" class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password" />
      </div>
      <span class="errorM" v-if="errorMessage">{{ errorMessage }}</span>
      <!-- Om errorMessage är en tom string kommer error meddelande skrivas ut -->

      <template v-if="!showStartButton">
        <button class="custom-btn btn-1" @click.prevent="Login">Login</button>
        <button class="custom-btn btn-1" @click.prevent="LoginGuest">
          Guest
        </button>
      </template>
      <button
        v-if="showStartButton"
        class="custom-btn btn-1"
        @click="guestInfo"
      >
        Start playing
      </button>
      <!-- Knappen gör att showLoggedInUser visas -->

      <div v-if="showLoggedInUser && loggedInUser" class="inloggaswho">
        <h3>Logged in as: {{ loggedInUser }}</h3>
        <!-- Om ShowLoggedInUser och loggedInUser = true kommer Logged in as
        texten att skrivas ut -->
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: "",
      password: "",
      errorMessage: "",
      showPassword: true,
      showStartButton: false,
      showLoginForm: false,
      loggedInUser: null,
      showLoggedInUser: false,
      guestName: null,
      gold: 0 /* Nytt från 23/2 */,
    };
  },
  methods: {
    Login() {
      if (!this.username || !this.password) {
        this.errorMessage = "Please enter your username and password";
        return;
      }
    },
    LoginGuest() {
      if (!this.guestName) {
        this.guestName = `Guest${Math.floor(Math.random() * 1338)}`;
      }
      this.username = this.guestName;
      this.showPassword = false;
      this.showStartButton = true;
      this.errorMessage = "";
      this.loggedInUser = this.guestName;
      this.gold = Math.floor(Math.random() * 1000);
      /* Ger ett random "Guest namn" med math.floor + random mellan 0 till 1337
      username blir guestName
      Password delen försvinner och lägger till en showStartButton knapp */
      /* Från 23/2 har gold lagts till som ska vara sidans valuta */
    },

    guestInfo() {
      /* 21/2 - Gjort en metod som gör showLoggedInUser till true
        och pushar till en ny sida när man klickar på knappen
        Har även lagt till setTimeout här med 2 sekunders delay som gör att det tar två sekunder att komma till nästa sida

        */
      this.showLoggedInUser = true;
      if (!this.guestName) {
        this.guestName = `Guest${Math.floor(Math.random() * 1338)}`;
      }
      setTimeout(() => {
        this.$router.push({
          name: "GuestLogin",
          query: { guestName: this.guestName, gold: this.gold },
          /* Ligger som en query (så länge), funderar på att göra om till en props
          vid ett senare tillfälle */
        });
      }, 1500);
    },
  },
};
</script>

<style scoped>
/* Styling */
body {
  margin: 0;
  padding: 0;
  height: 100vh;
  background: /*linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.5) 0%,
      rgba(0, 0, 0, 0.8) 100%
    ),*/ url("https://images.unsplash.com/photo-1596838132731-3301c3fd4317?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80c")
    no-repeat center fixed;
  background-size: cover;
}
h1 {
  font-family: "Times New Roman";
  font-weight: 400;
  font-size: 30px;
  line-height: 20px;
  color: #d9d9d9;
}
.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: #f2f2f2;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.login-form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #484444dc;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
  transition: 0.5s;
}

.form-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

label {
  margin-bottom: 10px;
  font-family: "Times New Roman";
  font-style: normal;
  font-weight: 400;
  font-size: 20px;
  line-height: 25px;
  color: #d9d9d9;
}

input {
  padding: 15px;
  border-radius: 5px;
  border: 1px solid #b2b1b1;
  font-size: 18px;
}

.custom-btn {
  width: 100%;
  height: 40px;
  padding: 10px 25px;
  margin: 10px;
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

.custom-btn:active {
  transform: translate(2px);
  -webkit-transform: translate(2px);
}

/* 1 */
.btn-1 {
  background: linear-gradient(
    182deg,
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
.login-button {
  padding: 15px;
  background: rgba(242, 127, 21, 0.6);
  color: rgb(0, 0, 0);
  border: none;
  font-weight: solid;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
  transition: background-color 0.15s ease-in-out 0.15s;
}
.guest-login-button {
  padding: 15px;
  background: rgba(242, 127, 21, 0.6);
  color: rgb(0, 0, 0);
  border: none;
  font-weight: solid;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
  transition: background-color 0.15s ease-in-out 0.15s;
  /* animation: pulse 1s infinite;  */
}
/*@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.05);
  }
  100% {
    transform: scale(1);
  }
}/*  */
/* Koden här lägger in en animation på guest knappen */

.guest-login-button:hover {
  background: rgba(152, 80, 13, 0.6);
}
.start-playing-button {
  padding: 15px;
  background: rgba(242, 127, 21, 0.6);
  color: rgb(0, 0, 0);
  border: none;
  font-weight: solid;
  border-radius: 5px;
  cursor: pointer;
  font-size: 20px;
  transition: background-color 0.15s ease-in-out 0.15s;
}
.start-playing-button:hover {
  background: rgba(152, 80, 13, 0.6);
}

.login-button:hover {
  background: rgba(152, 80, 13, 0.6);
}

.errorM {
  padding: 0 20px 20px;
  font-weight: bold;
  color: rgb(236, 32, 32);
}
.inloggaswho {
  color: #d9d9d9;
}
</style>
