<script setup>
import FormBasic from "../components/FormBasic.vue";
import { ref } from "vue";

const firstName = ref("");
const lastName = ref("")
const textArea = ref("")
const email = ref("")
</script>

<template>
    
    <div class="hero">   
        <h1>Use the form below to contact us</h1>
        <h2>or keep scrolling down to our FAQ</h2>
    </div>
    
    <div class="control">
        <div class="form-container">
  <div class="row">
    <div class="col">
      <FormBasic v-model="firstName" type="text" lable="First Name" class="form-control" rows="1" />
    </div>
    <div class="col">
      <FormBasic v-model="lastName" type="text" lable="Last Name" class="form-control" rows="1"/>
    </div>
    <FormBasic v-model="email" type="text" lable="E-Mail" class="form-control" rows="1"/>
    <FormBasic v-model="textArea" type="text" lable="Query" class="form-control" rows="3"/>
    <button type="submit" class="btn btn-primary">Send</button>
   
  </div>
</div>
    </div>

 
  <p>{{ firstName }}</p> <p>{{ lastName }}</p>
</template>

<style scoped>
*{
    margin:0;
    
}

.control{
    width: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    display: flex;
    justify-content: center;
}
.form-container{
   max-width: 1200px;
    display: flex;
    justify-content: center;
    align-items: center;
   width: 100%;
    flex-direction: column;
    padding: 40px;
}
.col{
    padding: 0px;
}
.btn{
    margin-top: 10px;
}
.hero{
    display: flex;
    flex-direction: column;
    height: 40vh;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.9);
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

</style>