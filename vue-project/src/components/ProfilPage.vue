<script setup></script>

<template>
  <div class="accountPage">
    <div class="guestAccountPage">
      <div class="card" style="width: 18rem">
      <!-- Visar en bild som representerar användaren -->
        <img
          src="https://media.istockphoto.com/id/1356420393/photo/3d-futuristic-woman-with-metaverse-vr-glasses.jpg?b=1&s=170667a&w=0&k=20&c=UTCXG8WzdGTrm4JOVan7Q8WbizJ-oSWW1GMvtvhNEpY="
          class="card-img-top"
          alt="..."
        />
        <div class="card-body">
          <!-- Bootstrap -->

          <h5 class="card-title">Welcome, {{ username }}!</h5>
          <p class="card-text"> <!-- Random text för att fylla kortet -->
            Random text written by me - Random text written by me part 2!
          </p>
          <!-- Visar användarens e-postadress i en knapp -->
          <a href="#" class="btn btn-primary">{{ email }}</a>
        </div>
        <!-- Bootstrap -->
      </div>
      <div class="profileContainer">
        <h1>Profile</h1>
        <!-- Visar användarens information om de är inloggade -->
        <!-- <div v-if="isLoggedIn">
          <h2>Welcome, {{ username }}!</h2>
          <p>Email: {{ email }}</p>
          <p>Money: {{ money }}</p>
        </div> -->
      </div>

      <!-- Blå vänstra delen som innehåller länk för utloggning och bootstrap -->
      <div class="blueSide">
        <i class="bi bi-box-arrow-right"></i>
        <i class="bi bi-person-circle"></i>
        <h1 class="guestName">{{ guestName }}</h1>
        <router-link to="/login" class="logoutButtonP" @click="logout"
          >Logout</router-link
        >
            <!-- Länk för utloggning -->

      </div>
    </div>
    <div class="col-8">
      <!-- Bootstrap -->
      <div class="card text-center">
        <div class="card-header">Profile Page</div>
        <div class="card-body">
          <h5 class="card-title">Hey {{ username }},<br> Welcome back!</h5> <!-- Välkomstmeddelande med namn -->
          <p class="card-text">Total money: {{ money }}</p> <!-- Total money -->
          <a href="/games" class="btn btn-primary">Play</a> <!-- Skickar till games -->

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
    // Kollar om användaren är inloggad
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
    // Hämtar användarinformation från servern
    async loadUserInfo(username) {
      try {
        const response = await fetch(
          `http://localhost:3000/userInfo.php?username=${username}`
        );
        const data = await response.json();
        this.email = data.email;
        //this.money = data.money; - Tanken var att varje användare skulle ha "egna pengar"
      } catch (error) {
        console.error(error);
      }
    },

    logout() {
      // Tar bort cookie och loggar ut
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
.blueSide {
  display: flex;
  position: relative;
  /*position: sticky; */
  margin-left: -272px;
  margin-top: -437px;
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
.custom-btn {
  width: 80px;
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
