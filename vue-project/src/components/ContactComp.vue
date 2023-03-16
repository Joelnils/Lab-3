<script setup>
import FormBasic from "./FormBasic.vue";
import { ref } from "vue";
import Modal from "./Modal.vue";
import Faq from "./FaqMenu.vue";
import Map from "./Map.vue";

const firstName = ref("");
let lastName = ref("");
let textArea = ref("");
let email = ref("");
let result = "";

function handleSubmit() {
  result = firstName.value;
  firstName.value = "";
  lastName.value = "";
  email.value = "";
  textArea.value = "";
}
</script>

<template>
  <div class="body-container">
    <div class="hero">
      <div class="hero-text">
        <h1>Contact</h1>
        
      </div>
      <div class="scroll">
      <bounce class="scroll-text">Scroll</bounce>
    </div>
    </div>
    <Faq />

    <div class="control">
      <div class="contact-header">
        <h1 class="big-h1">Contact us</h1>
      </div>
      <div class="border-bot"></div>
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
          <button
            @click="handleSubmit"
            data-bs-toggle="modal"
            data-bs-target="#staticBackdrop"
            class="btn-1"
          >
            SUBMIT
          </button>
          <Modal :firstName="result" />
        </div>
      </div>
      <!-- <Map /> -->
    </div>
  </div>
</template>

<style scoped>
* {
  margin: 0;
   
}
h1{
  color: #f7f7f7;
  font-size: 40px;
  
}
h2{
  text-align: left;
}

.body-container {
  display: flex;
  flex-direction: column;
  margin-left: 15%;
  margin-right: 15%;
  margin-top: 20px;
}

.control {
  width: 100%;
  background-color: #000000;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  flex-direction: column;
  padding-bottom: 250px;
  padding-top: 20px;
  
}
.form-container {
  max-width: 1200px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  flex-direction: column;
  
}
.big-h1{
  margin-top: 20px;
  text-align: left;
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

 
  display: flex;
  justify-content: center;
  text-align: left;
  padding-bottom: 40px;
  padding-top: 30px;
}
.hero-text {
  border-radius: 7px;
  padding: 40px;
}
.contact-header {
  color: white;
  width: 100%;
  
  text-align: center;
}
.border-bot{
  width: 100%;
  border-bottom: 3px solid white;
  text-align: center;
  opacity: .25;
  margin-bottom: 15px;
  margin-top: 15px;
}
.btn-1 {
  background: linear-gradient(
    182deg,
    #fea 0%,
    #dc8 49%,
    rgb(195, 174, 91) 51%,
    #dc8 100%
  );
  padding: 20px;
  margin-top: 10px;
  font-size: larger;
  font-weight: 800;
}
/* Scroll Animation */
.scroll {
  background: 0 0;
  border-width: 0;
  padding: 0;
  width: 0;
  position: absolute;
  right: 1.5rem;
  bottom: 0;
  z-index: 10;
  animation: scrollAnimation 2s ease-in-out infinite alternate;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.scroll::before {
  content: '';
  display: block;
  height: 80px;
  width: 24px;
  position: absolute;
  bottom: 0;
  left: calc(50% - 12px);
  z-index: 10;
}

.scroll-text {
  letter-spacing: .2rem;
  text-transform: uppercase;
  color: #f7f7f7;
  text-decoration: none;
  display: block;
  text-shadow: 0 0 1px rgb(0 0 0 / 30%), 0 1px 2px rgb(0 0 0 / 20%), 0 2px 4px rgb(0 0 0 / 10%);
  transform: translateX(50%)rotate(-90deg);
}

.scroll::after {
  background-color: #fff;
  content: '';
  display: block;
  height: 1.5rem;
  margin-left: -1px;
  transform-origin: 50% 100%;
  width: 2px;
}

@keyframes scrollAnimation {

  0%,
  100% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(20px);
  }
}
</style>
