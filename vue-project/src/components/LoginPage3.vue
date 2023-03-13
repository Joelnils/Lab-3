<template>
  <div class="login-container">
    <form class="loginForm" @submit.prevent="login">
      <!-- Skippar refresh av sidan med
          submit.prevent -->

      <h1>Login</h1>

      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" v-model="username" />
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password" />
      </div>
      <span class="errorM" v-if="errorMessage">{{ errorMessage }}</span>
      <!-- Om errorMessage är en tom string kommer error meddelande skrivas ut -->

      <span>
        <div>
          <button class="custom-btn btn-1">Login</button>
          <router-link to="/register">
            <button class="custom-btn btn-1">Register</button>
          </router-link>
        </div>
        <button class="custom-btn btn-1">Guest</button>
        <button v-if="isLoggedIn" class="custom-btn btn-1" @click="logout">
          Logout
        </button>
      </span>

      <!-- Knappen gör att showLoggedInUser visas -->
    </form>
  </div>
</template>

<script>
// import router from '../router/index'

export default {
  name: "LoginPage3",
  data() {
    return {
      username: "",
      password: "",
      errorMessage: "",
      isLoggedIn: false,
    };
  },
  created() {
    // Använder created -- Denna kollar om en cookie finns
    if (document.cookie.includes("username")) {
      this.isLoggedIn = true;
    }
  },
  methods: {
    login() {
      fetch("http://localhost:3000/login.php")
        .then((response) => response.json())
        .then((data) => {
          const user = data.find(
            (user) =>
              user.username === this.username && user.password === this.password
          );
          if (user) {
            console.log("Login successful!");
            this.$router.push("/profile");
            document.cookie = "username=" + user.username; // Lägger till en cookie som syns i devTools
            this.isLoggedIn = true; // Kollar om man är inloggad eller inte
          } else {
            console.log("Login failed!");
            this.errorMessage = "Login failed";
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
    logout() {
      // Tar bort cookie
      document.cookie =
        "username=; expires=Fri, 4 Mars 2000 00:00:00 UTC; path=/;";
      this.isLoggedIn = false;
      console.log("Logout successful!");
    },
  },
};
</script>

<style>
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

.errorM {
  position: relative;
  color: white;
  font-size: 40px;
}

.loginForm {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #0c0a0adc;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
  transition: 0.5s;
  margin-bottom: 20px;
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
}

.custom-btn {
  width: 100%;
  height: 40px;
  margin-top: 10px;
  cursor: pointer;
  border: transparent;
  color: #fff;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
  font-size: 1.2rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-transform: uppercase;
  border-radius: 10px;
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

.loginButton {
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
.registerButton {
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
.registerButton:hover {
  background: rgba(152, 80, 13, 0.6);
}
.guestButton {
  position: relative; /* Bort? */

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
.logoutButton {
  position: relative;
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

.guestButton:hover {
  background: rgba(152, 80, 13, 0.6);
}
.logoutButton:hover {
  background: rgba(152, 80, 13, 0.6);
}

.loginButton:hover {
  background: rgba(152, 80, 13, 0.6);
}
</style>
