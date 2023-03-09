<template>
  <div class="login-container">
    <form class="login-form" @submit.prevent="login">
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
          <button class="loginButton">Login</button>
          <button class="registerButton" @click.prevent="Register">
            Register
          </button>
        </div>
        <button class="guestButton">Guest</button>
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
    };
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
            this.$router.push("/");
          } else {
            console.log("Login failed!");
            this.errorMessage = "Login failed";
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
    Register() {
      this.$router.push("/register");
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

.login-form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #0c0a0adc;
  padding: 4000px; /* Har varit 40 innan men behövde en quick fix för ljuset */
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
  left: 25%;
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

.loginButton:hover {
  background: rgba(152, 80, 13, 0.6);
}
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
</style>
<template>
  <div>
    <h2>Login Page</h2>
    <form @submit.prevent="login">
      <div>
        <label for="username">Username:</label>
        <input type="text" id="username" v-model="username" />
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password" />
      </div>
      <div>
        <button type="submit">Login</button>
      </div>
      <div v-if="errorMessage">
        {{ errorMessage }}
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "LoginPage3",
  data() {
    return {
      username: "",
      password: "",
      errorMessage: "",
    };
  },
  methods: {
    login() {
      fetch("http://localhost:3000/login.php")
        .then((response) => response.json())
        .then((data) => {
          // Check if the username and password match the data
          const user = data.find(
            (user) =>
              user.username === this.username && user.password === this.password
          );
          if (user) {
            console.log("Login successful!");
          } else {
            console.log("Login failed!");
          }
        })
        .catch((error) => {
          // Handle any errors here
          console.error(error);
        });
    },
  },
};
</script>

<style>
.allLogin {
  position: absolute;
  top: 50%;
}
.uName {
  color: white;
}
.pWord {
  color: white;
}
</style>
