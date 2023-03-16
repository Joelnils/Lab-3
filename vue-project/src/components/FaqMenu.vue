<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
const qs = ref([]);

const getItems = () => {
  return axios
    .get("faq.json")
    .then((res) => (qs.value = res.data))
    .catch((error) => console.log(error));
};

onMounted(() => {
  getItems();
});
</script>

<template>
  <div class="main-thing">
    <div class="faq">
      <h1>FAQ</h1>
    </div>
    <div class="border-bot"></div>
    <div v-for="q in qs" :key="q.id" class="box">
      <h3>{{ q.title }}</h3>

      <p>{{ q.info }}</p>
    </div>
  </div>
</template>
<style scoped>
.main-thing {
  background-color: #000000;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin-top: 20px;
}
.box {
  color: white;
 
  
}
.faq {
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

</style>
