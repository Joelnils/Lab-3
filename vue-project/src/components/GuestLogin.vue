<script scoped></script>
<template>
  <div class="account-page">
    <div class="guest-account-page">
      <!-- Hämtar
      värdet från LoginPage.vue -->
    </div>

    <div class="blue-side">
      <i class="bi bi-box-arrow-right"></i>
      <i class="bi bi-person-circle"></i>
      <router-link to="/login" class="custom-btn btn-1">Logout</router-link>
      <h1 class="guestName">{{ guestName }}</h1>
    </div>
  </div>
</template>
<script>
import SlotMachine from "./SlotMachine.vue";

export default {
  components: {
    SlotMachine,
  },
  computed: {
    guestName() {
      return this.$route.query.guestName;
    },
  },
  components: {
    SlotMachine,
  },
};
</script>

<style>
.account-page {
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
  max-width: 60px; /* Tillagd kod */
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

router-link {
  display: block;
  font-size: 20px;
  margin-bottom: 10px;
}
.logout-button {
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
  width: 240px;
  height: 600px;
  top: 0px;
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
