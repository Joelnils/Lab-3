<template>
  <div class="login-container">
    <form class="registerForm" @submit.prevent="registerUser">
      <!-- Gör att
      man inte refreshar sidan -->
      <h1>Register</h1>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" v-model="username" />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email" />
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password" />
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password:</label>
        <input
          type="password"
          id="confirm-password"
          v-model="confirmPassword"
        />
      </div>
      <span class="errorM" v-if="errorMessage">{{ errorMessage }}</span>
      <div>
        <button class="registerButton" type="submit">Register</button>
        <button class="loginButton" @click.prevent="login">Login</button>
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
        !this.username.trim() ||
        !this.password.trim() ||
        !this.email.trim()
      ) {
        this.errorMessage = "Please fill in all fields";
        return;
      }
      if (this.password !== this.confirmPassword) {
        this.errorMessage = "Passwords do not match";
        return;
      }
      const formData = new FormData();
      formData.append("username", this.username);
      formData.append("password", this.password);
      formData.append("email", this.email);

      try {
        const response = await fetch("http://localhost:3000/register.php", {
          method: "POST",
          body: formData,
        });

        const data = await response.json();

        if (response.ok) {
          // User created successfully
          this.errorMessage = "Sucess!";
          setTimeout(() => {
            this.$router.push("/login");
          }, 2000); //Delay innan nästa sida
        } else {
          // User creation failed
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
