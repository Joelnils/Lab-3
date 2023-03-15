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
