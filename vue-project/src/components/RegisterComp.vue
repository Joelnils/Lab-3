<script setup></script>

<template>
  <div class="loginContainer">
    <form class="registerForm" @submit.prevent="registerUser">
      <!-- Gör att
      man inte refreshar sidan -->
      <h1>Register</h1>
      <div class="formGroup">
        <label for="username">Username:</label>
        <input type="text" id="username" v-model="username" />
      </div>
      <div class="formGroup">
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email" />
      </div>
      <div class="formGroup">
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password" />
      </div>
      <div class="formGroup">
        <label for="confirm-password">Confirm Password:</label>
        <input
          type="password"
          id="confirm-password"
          v-model="confirmPassword"
        />
      </div>
      <span class="errorM" v-if="errorMessage">{{ errorMessage }}</span> <!-- Blir det fel kommer detta upp -->
      <div>
        <button class="custom-btn btn-1" type="submit">Register</button>
        <!-- <button class="loginButton" @click.prevent="login">Login</button> -->
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
      email: "",
      confirmPassword: "",
      errorMessage: "",
    };
  },
  methods: {
    async registerUser() {
      if (
        // Kontrollerar om allt är ifyllt
        !this.username.trim() ||
        !this.password.trim() ||
        !this.email.trim()
      ) {
        this.errorMessage = "Please fill in all fields";
        return;
      }
      if (this.password !== this.confirmPassword) { // Kontrollerar om lösenorden matchar med varandra
        this.errorMessage = "Passwords do not match";
        return;
      }
      const formData = new FormData(); // Denna lägger till username, lösen och email i form-datan
      formData.append("username", this.username);
      formData.append("password", this.password);
      formData.append("email", this.email);

      try { // Skickar Post till servern med formulärdatan
        const response = await fetch("http://localhost:3000/register.php", {
          method: "POST",
          body: formData,
        });

        const data = await response.json();

        if (response.ok) { // Om det fungerar utan problem
          // Användaren skapas "success"
          this.errorMessage = "Sucess!";
          setTimeout(() => {
            this.$router.push("/login");
          }, 2000); //Delay innan nästa sida
        } else {
          // Om det blir något fel
          this.errorMessage = data.message;
        }
      } catch (error) {
        console.error(error);
        this.errorMessage = "An error occurred. Please try again later.";
      }
    },
  },
};
</script>

<style scoped>
h1 {
  font-family: "Times New Roman";
  font-weight: 400;
  font-size: 30px;
  line-height: 20px;
  color: #d9d9d9;
  margin-bottom: 20px;
}
.loginContainer {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.errorM {
  position: relative;
  color: white;
  font-size: 20px;
}

.registerForm {
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

.innerPage {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #0c0a0adc;
  padding: 40px; /* Har varit 40 innan men behövde en quick fix för ljuset */
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
  transition: 0.5s;
}

.formGroup {
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
.f-container {
  position: relative;
  top: 50%;
  color: pink;
}
.custom-btn {
  width: 180px;
  height: 40px;
  margin-right: 10px;
  cursor: pointer;
  outline: none;
  border: transparent;
  border-radius: 10px;
  color: #fff;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
  text-transform: uppercase;
  font-size: 1.2rem;
  font-weight: 300;
  letter-spacing: 2px;
}
.custom-btn-start {
  width: 150px;
  height: 40px;
  margin-top: 290%;
  cursor: pointer;
  outline: none;
  border: transparent;
  border-radius: 10px;
  color: #fff;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
  text-transform: uppercase;
  font-size: 1rem;
  font-weight: 300;
  letter-spacing: 2px;
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
