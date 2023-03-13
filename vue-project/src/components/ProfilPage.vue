<script setup></script>

<template>
  <div class="accountPage">
    <div class="guestAccountPage">
      <div class="card" style="width: 18rem">
        <img
          src="https://media.istockphoto.com/id/1356420393/photo/3d-futuristic-woman-with-metaverse-vr-glasses.jpg?b=1&s=170667a&w=0&k=20&c=UTCXG8WzdGTrm4JOVan7Q8WbizJ-oSWW1GMvtvhNEpY="
          class="card-img-top"
          alt="..."
        />
        <div class="card-body">
          <!-- Bootstrap -->

          <h5 class="card-title">Welcome, {{ username }}!</h5>
          <p class="card-text">
            Random text written by me - Random text written by me part 2!
          </p>
          <a href="#" class="btn btn-primary">{{ email }}</a>
        </div>
        <!-- Bootstrap -->
      </div>
      <div class="profile-container">
        <h1>Profile</h1>
        <!-- <div v-if="isLoggedIn">
          <h2>Welcome, {{ username }}!</h2>
          <p>Email: {{ email }}</p>
          <p>Money: {{ money }}</p>
        </div> -->
      </div>

      <div class="blue-side">
        <i class="bi bi-box-arrow-right"></i>
        <i class="bi bi-person-circle"></i>
        <h1 class="guestName">{{ guestName }}</h1>
        <router-link to="/login" class="logoutButtonP" @click="logout"
          >Logout</router-link
        >
      </div>
    </div>
    <div class="col-8">
      <!-- Bootstrap -->
      <div class="card text-center">
        <div class="card-header">Profile Page</div>
        <div class="card-body">
          <h5 class="card-title">Hey {{ username }},<br> Welcome back!</h5>
          <p class="card-text">Total money: {{ money }}</p>
          <a href="/games" class="btn btn-primary">Play</a>
        </div>
        <div class="card-footer text-muted">Casino</div>
      </div>
    </div>
    <!-- Bootstrap -->
  </div>
</template>
<script>
export default {
  name: "ProfilePage",
  data() {
    return {
      username: "",
      email: "",
      profilePicture: "",
      isLoggedIn: false,
      money: 1000,
      //guestName: "Guest",
    };
  },
  created() {
    // Check if the user is logged in
    const cookie = document.cookie
      .split("; ")
      .find((row) => row.startsWith("username="));
    if (cookie) {
      const username = cookie.split("=")[1];
      this.isLoggedIn = true;
      this.username = username;
      this.loadUserInfo(username);
    }
  },
  methods: {
    async loadUserInfo(username) {
      try {
        const response = await fetch(
          `http://localhost:3000/userInfo.php?username=${username}`
        );
        const data = await response.json();
        this.email = data.email;
        //this.profilePicture = data.profilePicture;
        //this.money = data.money;
      } catch (error) {
        console.error(error);
      }
    },

    logout() {
      // Remove cookie
      document.cookie =
        "username=; expires=Fri, 4 Mar 2000 00:00:00 UTC; path=/;";
      this.isLoggedIn = false;
      console.log("Logout successful!");
    },
  },
};
</script>
<style>
h1 {
  display: flex;
  margin-left: 50px;
}
.accountPage {
  display: flex;
  position: sticky;
  top: 0;
  z-index: 1;
  margin-top: 150px;
  margin-left: 300px;
  margin-bottom: 115px;
  width: 1500px;
  height: 800px;
  left: 10%;
  background: rgba(142, 142, 142, 0.9);
  border-radius: 40px;
  padding: 50px;
}

.guestAccountPage {
  margin: 0 auto;
  max-width: 60px;
}
.guestName {
  position: absolute;
  font-size: 20px;
  bottom: 70px;
  left: 80px;
}

p {
  font-size: 18px;
  margin-bottom: 20px;
}

.logoutButtonP {
  display: flex;
  margin-top: 750px;
  margin-left: 5px;
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
.logout-button:hover {
  color: rgba(152, 80, 13, 0.6);
}
.blue-side {
  display: flex;
  position: relative;
  /*position: sticky; */
  margin-left: -272px;
  margin-top: -451px;
  width: 300px;
  height: 800px;
  bottom: 7.2%;
  right: 165%;
  background: #011b34;
  border-radius: 40px 0px 0px 40px;
}
.bi-box-arrow-right {
  display: flex;
  margin-top: 750px;
  margin-left: 50px;
  bottom: 25px;
  left: 35px;
  font-size: 25px;
  color: azure;
}
.bi-person-circle {
  margin-top: 60px;
  margin-left: -30px;
  bottom: 64px;
  left: 30px;
  font-size: 40px;
  color: azure;
}
.col-8 {
  position: relative;
  width: 50%;
}
.card {
  position: relative;
  top: 50px;
}
</style>
