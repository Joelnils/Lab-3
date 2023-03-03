<script setup>
import FormBasic from "../components/FormBasic.vue";
import { ref } from "vue";
import Modal from "../components/Modal.vue";
import Faq from "../components/FaqMenu.vue";
import Map from "../components/Map.vue";

const firstName = ref("");
const lastName = ref("");
const textArea = ref("");
const email = ref("");
</script>

<template>
  
  <div class="body-container">
    <div class="hero">
      <div class="hero-text">
        <h1>Take a look at our FAQ</h1>
        <h2>...or keep scrolling down to contact us!</h2>
      </div>
    </div>
    <Faq />

    <div class="control">
      <div class="contact-header">
        <h1>Contact us</h1>
      </div>
      <div class="form-header">
        <h2>
          Please fill out the form below and we'll get back to you as soon as
          possible
        </h2>
      </div>
      <div class="form-container">
        <div class="row">
          <div class="col">
            <FormBasic
              v-model="firstName"
              type="text"
              lable="First Name"
              class="form-control"
              rows="1"
            />
          </div>
          <div class="col">
            <FormBasic
              v-model="lastName"
              type="text"
              lable="Last Name"
              class="form-control"
              rows="1"
            />
          </div>
          <FormBasic
            v-model="email"
            type="email"
            lable="E-Mail"
            class="form-control"
            rows="1"
          />
          <FormBasic
            v-model="textArea"
            type="text"
            lable="Query"
            class="form-control"
            rows="3"
          />
          
          <Modal />
        </div>
      </div>
    </div>
    <div class="map"><Map /></div>
  </div>
</template>

<style scoped>
* {
  margin: 0;
}

/* .body-container {
  display: flex;
  flex-direction: column;
} */
.row {
  height: 100%;
}
/* .control {
  width: 100%;
  background-color: rgba(0, 0, 0, 0.9);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 60vh;
  flex-direction: column;
  padding: 40px;
  
} */
.form-container {
  max-width: 1200px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  flex-direction: column;
  padding: 40px;
}
.col {
  padding: 0px;
}
.btn {
  margin-top: 10px;
}
.hero {
  display: flex;
  flex-direction: column;
  height: 100vh;
  justify-content: center;
  align-items: center;
  background-size: cover;
  background-repeat: no-repeat;
  color: white;
  text-align: center;
}
.img {
  height: auto;
  width: 100px;
  margin-bottom: 40px;
}
.form-header {
  color: white;

  padding: 40px;
  display: flex;
  justify-content: center;
  text-align: center;
}
.hero-text {
  border: 2px solid #dadada;
  border-radius: 7px;
  padding: 40px;
}
.contact-header {
  color: white;
  width: 100%;
  border-bottom: 2px solid white;
  text-align: center;
}
</style>
