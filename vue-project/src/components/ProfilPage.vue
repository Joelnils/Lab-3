<template>
    <div class="accountPage">
    <div class="guest-account-page">
  <div class="profile-container">
    <h1>Profile</h1>
    <div v-if="isLoggedIn">
      <h2>Welcome, {{ username }}!</h2>
      <p>Email: {{ email }}</p>
      <p>Profile picture: {{ profilePicture }}</p>

    </div>
</div>

<div class="blue-side">
  <i class="bi bi-box-arrow-right"></i>
  <i class="bi bi-person-circle"></i>
  <router-link to="/login" class="logoutButtonP" @click="logout">Logout</router-link>
  <h1 class="guestName">{{ guestName }}</h1>
    <!--  <div v-else>
      <p>You need to be logged in to view your profile</p>
    </div>-->
  </div>
</div>
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
    };
  },
    logout() {
      // Tar bort cookie
      document.cookie =
        "username=; expires=Fri, 4 Mars 2000 00:00:00 UTC; path=/;";
      this.isLoggedIn = false;
      console.log("Logout successful!");
    },
}

/*export default {
  name: "ProfilePage",
  data() {
    return {
      username: "",
      email: "",
      profilePicture: "",
      isLoggedIn: false,
  /*  };
  },
 /* mounted() {
    const username = this.$cookies.get("username");
    if (username) {

      fetch(`http://localhost:3000/user.php?username=${username}`)
        .then((response) => response.json())
        .then((data) => {
          // Store the user data in the component's data
          this.username = data.username;
          this.email = data.email;
          this.profilePicture = data.profilePicture;
          this.isLoggedIn = true;
        })
        .catch((error) => {
          console.error(error);
        });
    }
  },
}; */
</script>
<style>
.accountPage {
  position: absolute;
  width: 1200px;
  height: 600px;
  left: 15%;
  top: 17%;
  background: rgba(73, 73, 73, 0.9);
  border-radius: 40px;
}
.gamePart {
  position: absolute;
  width: 400px;
  height: 400px;
  left: 30%;
  top: 17%;
  background: rgba(217, 199, 199, 0.9);
  border-radius: 40px;
}

.guest-account-page {
  margin: 0 auto;
  max-width: 60px;
}
.guestName {
  position: absolute;
  font-size: 20px;
  bottom: 70px;
  left: 80px;
}

.totalCash {
  position: absolute;
  font-size: 32px;
  margin-bottom: 20px;
  top: 25px;
}

p {
  font-size: 18px;
  margin-bottom: 20px;
}


.logoutButtonP {
  position: absolute;
  bottom: 28px;
  left: 70px;
  transition: color 0.15s ease-in-out 0.15s;
  font-family: "Lato";
  font-style: italic;
  font-weight: 700;
  font-size: 18px;
  color: #ffffff;
}
.logout-button:hover {
  color: rgba(152, 80, 13, 0.6);
}
.blue-side {
  position: absolute;
  width: 200px;
  height: 600px;
  top: 0px;
  left: 0%;
  background: #011b34;
  border-radius: 40px 0px 0px 40px;
}
.bi-box-arrow-right {
  position: absolute;
  bottom: 25px;
  left: 35px;
  font-size: 25px;
  color: azure;
}
.bi-person-circle {
  position: absolute;
  bottom: 64px;
  left: 30px;
  font-size: 40px;
  color: azure;
}
</style>
